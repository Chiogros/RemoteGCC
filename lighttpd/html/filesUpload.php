<?php

$target_dir = "/mnt/out";

for ($i = 0 ; $i < count($_FILES["filesToUpload"]["name"]) ; $i++) {
	$target_file = $target_dir . $_FILES["filesToUpload"]["name"][$i];
	move_uploaded_file($_FILES["filesToUpload"]["tmp_name"][$i], $target_file);
}

require("index.php");
