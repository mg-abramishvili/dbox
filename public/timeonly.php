<?php
$date = new DateTime;
$date->setTimezone(new DateTimeZone('Asia/Yekaterinburg'));

echo $date->format('H:i');
?>