<?php

$file2remove = isset($_GET["filename"]) ? $_GET["filename"] : "";

if (strlen($file2remove) > 0 && !strpos($file2remove, "..") && !strpos($file2remove, "/")) {	// check filename is okay
	$filepath = "/mnt/out/" . $file2remove;
	unlink($filepath);
}

header("Location: index.php");
die();
