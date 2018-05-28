<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$database = 'compliance_review';
$user = 'root';
$pass = '';
$host = 'localhost';
//$dir = dirname(__FILE__) . '\dump.sql';
$dir = 'backup/backup.sql';
echo "<h3>Backing up database to `<code>{$dir}</code>`</h3>";
exec("mysqldump.exe --user={$user} --password={$pass} --host={$host} {$database} < $dir", $output);
var_dump($output);

