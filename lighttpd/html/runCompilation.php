<?php

$target_dir = $_POST["path"] ?? "/mnt/out/";
$target_file = $target_dir . "ok.gcc";

$logFile = $_POST["logfile"] ?? "/mnt/out/compilation.log";

// Remove old log file
unlink($logFile);

// Write compile.gcc to indicates to run compilation
fopen($target_file, "w");

// Wait for compilation to finish
while (!file_exists($logFile)) sleep(2);

header("Location: index.php");
die();
