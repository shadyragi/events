<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

$importedFieldsNames = ["employee_name", "employee_mail" , "event_id" , "participation_fee"  , "event_date", "event_name"];

$importedFieldsTypes = [

	"employeeName" => "string",
	"eventName"    => "string",
	"date"         => "string",
	"price"        => "number"

];

define("ImportedFieldsNames", $importedFieldsNames);

define("ImportedFieldsTypes", $importedFieldsTypes);


?>