<?php

function relativeTime($time, $reference = null) {

    if(null == $reference) $reference = time();
    if(!is_numeric($time)) $time = strtotime($time);
    if(!is_numeric($reference)) $reference = strtotime($reference);

    $difference = abs($reference - $time);

    $secondsIn['second'] = 1;
    $secondsIn['minute'] = $secondsIn['second'] * 60;
    $secondsIn['hour']   = $secondsIn['minute'] * 60;
    $secondsIn['day']    = $secondsIn['hour']   * 24;
    $secondsIn['week']   = $secondsIn['day']    * 7;
    $secondsIn['month']  = $secondsIn['day']    * 30;
    $secondsIn['year']   = $secondsIn['month']  * 12;
    $secondsIn['decade'] = $secondsIn['year']   * 10;
    $secondsIn['century'] = $secondsIn['decade'] * 10;
    $secondsIn['millenium'] = $secondsIn['century'] * 10;

    $scale = array_keys($secondsIn);
    krsort($scale);

    foreach($scale as $i => $currentScale) {
        if($difference >= $secondsIn[$currentScale]) {
            $units = floor($difference / $secondsIn[$currentScale]);
            /*if($currentScale != 'millenium' && $difference > $secondsIn[$scale[$i + 1]] * 0.8)
                $string = (('hour' == $scale[$i + 1])? 'almost an ': 'almost a '). $scale[$i + 1];
            elseif($difference % $secondsIn[$currentScale] > $secondsIn[$currentScale] * 0.6)
                $string = 'almost '.($units+1)." {$currentScale}s";
            else*/if(1 == $units) $string = (('hour' == $currentScale)? 'an ': 'a '). $currentScale;
            else $string = "$units {$currentScale}s";
            break;
        }
    }

    if(!$string) $string = 'now';
    elseif($time - $reference > 0) $string .= ' from now';
    else $string .= ' ago';

    return $string;
}

?>