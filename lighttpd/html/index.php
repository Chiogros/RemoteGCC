<?php

$inputFolder = "/tmp";
$outputFolder = "/tmp";
$logFile = "/var/log/apache2/access.log";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>🐋 MI4 - RemoteGCC</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<h1>RemoteGCC</h1>
	</header>
	<section>
		<article>
			<h2>Inputs</h2>
			<div class="filesList">
				<?php
				$dir = opendir($inputFolder);
				while ($filename = readdir($dir)) { 
					if ($filename == "." || $filename == "..") continue; ?>
					<p><?= $filename ?></p>
					<hr/>
				<?php } ?>
			</div>
			<form method="POST" action="filesUpload.php" enctype="multipart/form-data">
				<label for="filesToUpload">Upload files</label>
				<input type="file" name="filesToUpload[]" accept="Makefile,.c,.h" multiple />
				<input type="submit" value="Push"/>
			</form> 
		</article>
		<article>
			<h2>Logs</h2>
			<p id="log">
			<?php
			# Open file
			$f = fopen($logFile, "r");
			if (!$f) {
				 printf("Log file not available.");
			} else {
				 $content = "";
				 # Read log content
				 while (!feof($f)) {
						$content .= fread($f, 1024);
				 }

				 # Print log file
				 print($content);

				 fclose($f);
			}
			?>
			</p>
		</article>
		<article>
			<h2>Binaries</h2>
			<div class="filesList">
				<?php
				$dir = opendir($outputFolder);
				while ($filename = readdir($dir)) { 
					if ($filename == "." || $filename == "..") continue; ?>
					<p><?= $filename ?></p>
					<hr/>
				<?php } ?>
			</div>
		</article>
	</section>
</body>
</html>
