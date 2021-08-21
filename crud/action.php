<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   $input = filter_input_array(INPUT_POST);
} else {
   $input = filter_input_array(INPUT_GET);
};
// connection Database
$mysqli = new mysqli('Host', 'user', 'password', 'DB_Name');

if (mysqli_connect_errno()) {
   echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
   exit;
}

//condition Update or delete , you can custom Where add or delete or update Live with Table Edit
if ($input['action'] === 'edit') {
   $tanggal_update = strip_tags(date_create()->format('Y-m-d'), "");
   $mysqli->query("UPDATE permohonan_informasi SET status='" . $input['status'] . "',tanggalupdate='$tanggal_update' WHERE nomor_identitas='" . $input['nomor_identitas'] . "'");
} else if ($input['action'] === 'delete') {
   $mysqli->query("UPDATE permohonan_informasi SET deleted=1 WHERE nomor_identitas='" . $input['nomor_identitas'] . "'");
} else if ($input['action'] === 'restore') {
   $mysqli->query("UPDATE permohonan_informasi SET deleted=0 WHERE nomor_identitas='" . $input['nomor_identitas'] . "'");
}

mysqli_close($mysqli);

echo json_encode($input);
