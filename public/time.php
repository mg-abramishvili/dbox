<?php
$date = new DateTime;
$date->setTimezone(new DateTimeZone('Asia/Yekaterinburg'));

echo $date->format('d.m.Y H:i');
?>