<?php

function dateD($strDate){
	$y = date("Y",strtotime($strDate))+543;
    $dateDay = date_default_timezone_set('asia/bangkok');
    $date= date("d-m-");
    $h = date("H:i:s");
    return $date.$y."  ".$h;
}

?>