<?php

$target_dir = $_POST["path"] ?? "/mnt/out/";

for ($i = 0 ; $i < count($_FILES["filesToUpload"]["name"]) ; $i++) {
	$target_file = $target_dir . $_FILES["filesToUpload"]["name"][$i];
	move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$i], $target_file);
}

header("Location: index.php");
die();
