<?php

$target_dir = $_POST["path"] ?? "/mnt/out/";
$target_file = $target_dir . "compile.gcc";

$logFile = $_POST["logfile"] ?? "/mnt/out/compilation.log";

// Write compile.gcc to indicates to run compilation
fopen($target_file, "w");

// Wait for compilation to finish
while (!file_exists($logFile)) sleep(2);

header("Location: index.php");
die();
