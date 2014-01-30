<?
include("../conf/config.php");
define("ADMINCENTER",true);
include("../includes/languages/ru/general.php");
include("../includes/core.php");
if ($GlobalUsers->checkthisadmin()==false)
{
	header('location: index.php');
	exit;
};

