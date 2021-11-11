<?php

$toCompile = "/mnt/out/";
$compiled = "/mnt/in/";
$logFile = "/mnt/log/access.log";

// $toCompile = "/mnt/out";
// $compiled = "/mnt/in";
// $logFile = "/mnt/log/compilation.log";

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
			<form method="POST" action="runCompilation.php" id="compile">
				<input type="hidden" name="path" value="<?= $toCompile ?>"/>
				<input type="hidden" name="logfile" value="<?= $logFile ?>"/>
				<input type="submit" value="Compile">
			</form>
			<div class="filesList">
				<?php
				$dir = opendir($toCompile);
				while ($filename = readdir($dir)) { 
					if ($filename == "." || $filename == "..") continue; ?>
					<a href="removeFile.php?filename=<?= $filename ?>">
						<p><?= $filename ?></p>
					</a>
					<hr/>
				<?php } ?>
			</div>
			<form method="POST" action="filesUpload.php" enctype="multipart/form-data">
				<label for="filesToUpload">Upload files</label>
				<input type="file" name="filesToUpload[]" accept="Makefile,.c,.h" multiple />
				<input type="hidden" name="path" value="<?= $toCompile ?>"/>
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
				 printf("Log file not available...");
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
				$dir = opendir($compiled);
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
