<?php

// arvin castro
// December 28, 2010
// http://codecri.me/sources/includes/class-xdb-php/

/* Changelog:

April 2, 2011 - addded support for incrementing a field on update statements
	array('field' => '++', 'field2' => '++12'); # first one increments by 1, latter incr's by 12


*/

class xdb {

	public static $connections = array();
	public static $last_query;
	public static $last_error;
	public static $last_url;

	public static function select($url)  {

		extract(self::parseQuery($url));

        $query  = "SELECT $fields from $table";
        if($where)   $query.= " WHERE $where";
        if($orderby) $query.= " ORDER BY $orderby";
        if($limit)   $query.= " LIMIT $limit";

        $resource = self::query($query, $link);
        return self::formatResource($resource, $format);
	}

	public static function insert($url, $data = array(), $tries = 1) {
		extract(self::parseQuery($url));

		list($fields, $values) = self::toInsertData($data, $link);

		$query  = "INSERT INTO $table ($fields) VALUES $values";
        return self::query($query, $link, $tries) ? mysqli_insert_id($link): false;
	}

	public static function update($url, $data = array(), $tries = 1) {
		extract(self::parseQuery($url));

        $values = self::toSetData($data, $link);

        $query  = "UPDATE $table SET $values";
        if($where)   $query.= " WHERE $where";
        if($orderby) $query.= " ORDER BY $orderby";
        if($limit)   $query.= " LIMIT $limit";

        return self::query($query, $link, $tries) ? mysqli_affected_rows($link): false;
	}

	public static function delete($url, $tries = 1) {
		extract(self::parseQuery($url));

		$query  = "DELETE FROM $table";
        if($where)   $query.= " WHERE $where";
        if($orderby) $query.= " ORDER BY $orderby";
        if($limit)   $query.= " LIMIT $limit";

        return self::query($query, $link, $tries) ? mysqli_affected_rows($link): false;
	}

	public static function count($url) {
		extract(self::parseQuery($url));

        $query  = "SELECT COUNT(*) from $table";
        if($where)   $query.= " WHERE $where";

        $resource = self::query($query, $link);
        $row = mysqli_fetch_row($resource);
        return (int) $row[0];
	}

	public static function queryDatabase($url, $query) {
		extract(self::parseQuery($url));
		return self::query($query, $link);
	}

	public static function query($query, $link, $tries = 1) {
		self::$last_query = $query;
		self::$last_error = '';
		if($link) {
			$try = 0;
			do $resource = mysqli_query($link, $query);	while($resource === false and $try++ < $tries);
			if(!$resource) self::$last_error = mysqli_error($link);
        } else {
	        self::$last_error = 'Invalid MySQL link.';
	    }
	    if(self::$last_error) {
	    	trigger_error(sprintf("XDB: %s\n%s\n%s\n", self::$last_error, self::$last_query, self::$last_url), E_USER_WARNING);
	    	$resource = null;
	    }
	    return $resource;
	}

	public static function parseQuery($url) {

		self::$last_url = $url;
		$urlparts = array_merge(
			array('scheme'=>'mysql','user'=>'root','pass'=>'','host'=>'localhost','port'=>'','path'=>'/','query'=>'','fragment'=>''),
			parse_url($url));

		# Get Format
		$urlparts['format'] = pathinfo($urlparts['path'], PATHINFO_EXTENSION) or $urlparts['format'] = 'assoc';
		# Remove format
		if($urlparts['format']) $urlparts['path'] = preg_replace('/(\.'.$urlparts['format'].')$/i', '', $urlparts['path'], 1);

		$options = self::toQueryArray($urlparts['query']);

		$query = array(
			'database'=> isset($options['database']) ? $options['database']: '',
			'fields'  => isset($options['fields'])   ? $options['fields']: '*',
			'where'   => isset($options['where'])    ? $options['where']: '',
			'orderby' => isset($options['orderby'])  ? $options['orderby']: '',
			'limit'   => isset($options['limit'])    ? $options['limit']: $urlparts['fragment'],
			'values'  => isset($options['values'])   ? $options['values']: '',
			'format'  => isset($options['format'])   ? $options['format']: $urlparts['format'],
			'link'    => '',
			'table'   => '',
 		);

		$crumbs = explode('/', trim($urlparts['path'], '/ '));
		foreach($crumbs as &$c) $c = urldecode($c);

		# Get Database name
		if(isset($crumbs[0]) and $crumbs[0]) $query['database'] = array_shift($crumbs);

		# Get Tables
		if(isset($crumbs[0]) and $crumbs[0]) $query['table'] = array_shift($crumbs);
		if($query['table']) {
			$tables  = explode(',', $query['table']);
			$do_join = count($tables) > 1;
			foreach($tables as $i => &$table) $table = $query['database'].'.'.$table. ($do_join ? ' AS T'.($i+1): '');
			$query['table'] = implode(', ', $tables);
		}

		# Get MySQL Link
		$query['link'] = self::createLink($urlparts['host'], $urlparts['user'], $urlparts['pass']);

		# Get fields
		$query['where'] = array();
		while(isset($crumbs[0]) and $crumbs[0]) {
			$key = array_shift($crumbs);
			if(preg_match('/^([0-9]+)$/', $key)) {
				$field = $key;
				$key = 'id';
			} else {
				$field = array_shift($crumbs) or $field = '';
			}
			# Add to WHERE clause
			$field = urldecode($field);
			if(preg_match('/^T[0-9]+\./', $field)) {
				$query['where'][]  = "{$key} = {$field}";
			} else {
				$query['where'][]  = "{$key} = '".mysqli_real_escape_string($query['link'], $field)."'";
			}
		}
		if(count($query['where'])) {
			$query['where'] = implode(' and ', $query['where']);
		} else {
			$query['where'] = '';
		}
		return $query;
	}

	public static function createLink($host, $user, $pass, $port = null) {
		if(!$host) $host = 'localhost';
		if(!$user) $user = 'root';
		if(!$pass) $pass = '';

        $key  = md5("$user:$pass@$host");

        # Check for existing connection
        if(!isset(self::$connections[$key])) {
            self::$connections[$key] = ($port === null) ? mysqli_connect($host, $user, $pass): mysqli_connect($host, $user, $pass, $port);
        }
        return self::$connections[$key];
	}

	public static function toQueryString($data) {
        foreach($data as $key => $value)
            $pairs[] = $key.'='.urlencode($value);
        return implode('&', $pairs);
    }

	public static function toQueryArray($string, $urldecode = true) {
        $pairs = explode('&', $string);
        $array = array();
        foreach($pairs as $pair) if(trim($pair)) {
            $keyvalue = explode('=', $pair, 2);
            $key   = trim($keyvalue[0]);
            $value = (isset($keyvalue[1])) ? ($urldecode) ? urldecode($keyvalue[1]): $keyvalue[1]: '';
            if($key) $array[$key] = $value;
        }
        return $array;
    }

    private static function toSetData($data, $link) {
	    if(is_array($data)) {
	        foreach($data as $key => $value) {
		        if(preg_match('/^(\+\+|--)([0-9]*)$/', $value, $matches)) {
			        $step = ($matches[2] > 0) ? $matches[2]: 1;
			        $op   = ($matches[1] == '++') ? '+': '-';
					$pairs[] = '`'.$key.'` = `'.$key.'`'.$op.$step;
		        } else {
	            	$pairs[] = '`'.$key.'` = \''. mysqli_real_escape_string($link, $value) .'\'';
            	}
            }
	        return implode(', ', $pairs);
        }
    }

    public static function toInsertData($datum, $link) {
	    if(is_array($datum)) {
	        if(isset($datum[0])) $data = $datum;
	        else                 $data = array($datum);

	        $fields = array_keys($data[0]);

	        foreach($data as $set) {
		        $row = array();
	            foreach($fields as $field) $row[] = '\''. mysqli_real_escape_string($link, $set[$field]) .'\'';
	            $values[] = '('. implode(', ', $row) .')';
	            unset($row);
	        }
	        return array ('`'.implode('`, `', $fields).'`', implode(', ', $values));
        }
    }

    public static function formatResource($resource, $format) {

	    if($format == 'resource') return $resource;

    	if(!$resource) {
    		if(strpos($format, 'single') === 0 || $format == 'scalar') return '';
    		return array();
    	}

        # formats that needs the resource to be fetched as a numeric array
        $row_formats = array('array', 'singlearray', 'string', 'scalar', 'singlestring');
        if(in_array($format, $row_formats)) {

            # iterate through array to convert each row to desired format
            while($row = mysqli_fetch_row($resource)) {

                # convert data to desired format
                switch($format) {
                    case 'string': case 'singlestring': case 'scalar':
                        $result[] = $row[0];
                        break;
                    default:
                    	$result[] = $row;
                    	break;
                }
            }

            # return first item of array, when format is prefixed single-
            if(strpos($format, 'single') === 0 || $format == 'scalar')
                return $result[0];

            return $result;

        } else {

			# fetch rows as associative arrays to accomodate remaining formats
		    while($row = mysqli_fetch_assoc($resource)) {
		        # convert row to desired format
		        switch($format) {
		            case 'querystring': case 'singlequerystring':
		                $result[] = self::toQueryString($row); break;
		            default:
		                $result[] = $row; break;
		        }
		    }

		    # return data in specified format
		    switch($format) {
		        case 'singlequerystring': case 'singleassoc':
		            return $result[0];
		            break;

		        case 'assoc': default:
		            return $result;
		            break;
		    }
		}
	}
}

?>