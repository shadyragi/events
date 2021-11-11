<?php
	
require_once("./config.php");

require_once("./validator.php");

require_once("./dbConnector.php");


if(isset($_FILES['upload_file'])) {

	$fileContent = file_get_contents($_FILES['upload_file']['tmp_name']);

	$jsonDecodedResult = json_decode($fileContent);

	foreach($jsonDecodedResult as $record) {

	if(validateFields($record)) {

		$columnFields = implode(", ", ImportedFieldsNames);

		$sql = "INSERT INTO events ($columnFields) VALUES(:employeeName, :mail , :eventId ,:price , :date ,:eventName)";

		$query = $conn->prepare($sql);

		$query->execute([

			":employeeName" => $record->employee_name,
			":eventName"    => $record->event_name,
			":date"         => $record->event_date,
			":price"        => $record->participation_fee,
			":mail"         => $record->employee_mail,
			":eventId"      => $record->event_id,
		]);

		$_SESSION["import_success_message"] = "file Imported successfully";


	} 

	}
	echo "uploaded";

	return;


} else {
	echo "error file not set";

	return;


}



function validateFields($data) {

	foreach (ImportedFieldsNames as $name) {
		// code...

		if(!isset($data->$name)) {
			return false;
		}


	}

	return true;
}


?> 