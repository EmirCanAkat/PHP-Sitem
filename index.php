<?php
// Directory path
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds ) . $ds;

// Include FetchData class file
$incFetchDataFile = "{$base_dir}inc{$ds}FetchData.class.php"; 
require_once($incFetchDataFile); 

// FetchData Object
$fetchDataObj = new FetchData();
$dataSet = (object) $fetchDataObj->getDataSet();

// Header information
if ($dataSet->enable_maintenance) {
	header("HTTP/1.1 503 Service Temporarily Unavailable");
	header("Status: 503 Service Temporarily Unavailable");
	header("Retry-After: ". date('D, d M Y H:i:s', strtotime($dataSet->end_datetime)) . " GMT");
}

if ("style-1" == $dataSet->dt_home_style) {
 	require 'crad-style-1.php';
} else {
 	require 'crad-style-2.php';
}
exit();

?>