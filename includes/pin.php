<?php
$startDate = new DateTime('2022-06-23');
$today = new DateTime();

$interval = date_diff($startDate, $today);
$daysSince = $interval->format('%a');

$correctPin = str_pad($daysSince, 4, '0', STR_PAD_LEFT);
?>