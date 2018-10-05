<?php
//include ("versioncheck.inc.php");
require "wd_cal_config.inc.php";
# some settings of vars
if (!isset($_GET['op']))
  $op = '';
else
  $op = $_GET['op'];
if (!isset($_GET['month']))
  $month = '';
else
  $month = $_GET['month'];
if (!isset($_GET['year']))
  $year = '';
else
  $year = $_GET['year'];
if (!isset($_GET['date']))
  $date = '';
else
  $date = $_GET['date'];
if (!isset($_GET['ask']))
  $ask = '';
else
  $ask = $_GET['ask'];
if (!isset($_GET['da']))
  $da = '';
else
  $da = $_GET['da'];
if (!isset($_GET['mo']))
  $mo = '';
else
  $mo = $_GET['mo'];
if (!isset($_GET['ye']))
  $ye = '';
else
  $ye = $_GET['ye'];
if (!isset($_GET['next']))
  $next = '';
else
  $next = $_GET['next'];
if (!isset($_GET['prev']))
  $prev = '';
else
  $prev = $_GET['prev'];
if (!isset($_GET['id']))
  $id = '';
else
  $id = $_GET['id'];

# navbar at the top
$m = date("n");
$y = date("Y");
$d = date("j");

?>
