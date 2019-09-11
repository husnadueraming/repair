<?php
$running_number = 0;
$date1=date_create("2019-03-20");
$date2=date_create("2019-03-20");
$diff=date_diff($date1,$date2);
echo $diff->format("%d days");
$num = (int)$diff;
if ($num == 0) {
    $running_number++;
} else {
    $running_number = 0;
}
?>