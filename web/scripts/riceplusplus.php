<?php require_once "prepend.php";

class riceplusplus {
	
	const DBURL = "mysql://p472666_rice:T=t6Grz9W[rm@localhost/p472666_rice";
	const base_image_url = "http://rice.charliesoft.net/images/";
	const base_image_folder = "/home/p472666/public_html/rice/images/";
	
	// Get Functions
	
	public static function get_reports($options = "") {
		$url = self::DBURL."/reports.assoc?{$options}";
		$reports = xdb::select($url);
		$reports = self::append_bases_multiple($reports);
		return $reports;
	}
	
	public static function get_report($report_id) {
		$url = self::DBURL."/reports/${report_id}.singleassoc";
		$report = xdb::select($url);
		$report = self::append_bases_single($report);
		return $report;
	}
	
	public static function get_reports_by_area($tl_lat, $tl_lng, $br_lat, $br_lng) {
		return self::get_reports();
	}
	
	// Comments
	
	public static function get_comments($report_id) {
		$url = self::DBURL."/comments/report_id/${report_id}.assoc?orderby=date+asc";
		$comments = xdb::select($url);
		return $comments;
	}
	
	public static function get_comment_count($report_id) {
		$url = self::DBURL."/comments/report_id/${report_id}";
		$comments = xdb::count($url);
		return $comments;
	}
	
	public static function get_user($user_id) {
		$url = self::DBURL."/users/report_id/${user_id}.assoc";
		$user = xdb::select($url);
		return $user;
	}
	
	public static function get_static_map($report_id, $size = "300x300", $zoom = "4") {
		$report = self::get_report($report_id);
		$lat = $report['lat'];
		$lng = $report['long'];
		return "http://maps.googleapis.com/maps/api/staticmap?zoom={$zoom}&size={$size}&maptype=roadmap&markers=color:red%7Clabel:X%7C{$lat},{$lng}&sensor=false";
	}
	
	// Add Functions 
	
	public static function add_report($report) {
		$data = array(
			'description' => $report['description'],
			'name' => $report['name'],
			'contact_no' => $report['mobile'],			
			'address' => $report['address'],			
			'rice_variety' => $report['variety'],			
			'stage' => $report['stage'],
			'part' => $report['part'],			
			'color' => $report['color'],			
			'hole' => $report['hole'],
			'broken' => $report['broken'],
			'pillars' => $report['pillars'],
			'spotty' => $report['spotty'],
			'image' => $report['image'],
			'lat' => $report['latitude'],
			'long' => $report['longitude'],
		);
		return xdb::insert(self::DBURL."/reports", $data, 3);
	}
	
	public static function add_comment($report_id, $comment) {
		$data = array(
			'report_id' => $report_id,
			'comment' => $comment['comment'],
			'name' => $comment['name'],
		);
		return xdb::insert(self::DBURL."/comments", $data, 3);
	}
	
	public static function add_user($user) {
		
	}
		
	public static function save_image($image) {
		
	}
	
	// Utility functions
	
	public static function append_bases($basename, $web = true) {
		return ($web) ? self::base_image_url.$basename: self::base_image_folder.$basename;
	}
	
	public static function append_bases_single($report, $web = true) {
		$report['image'] = self::append_bases($report['image'], $web);
		return $report;
	}
	
	public static function append_bases_multiple($reports, $web = true) {
		$result = array();
		foreach($reports as $report) {
			$result[] = self::append_bases_single($report);
		}
		return $result;
	}
}

?>