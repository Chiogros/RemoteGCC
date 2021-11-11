<?php

$toCompile = "/mnt/out/";
$compiled = "/mnt/in/";
$logFile = "/mnt/log/compilation.log";

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
			if (!file_exists($logFile)) {
				 printf("Log file not available...");
			} else {
				 $content = "";
				 # Read log content
				 foreach (file($logFile) as $line) {
					$content .= $line;
				 }
				 
				 # Print log file
				 print(nl2br($content));
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
					<a href="<?= $compiled . $filename ?>" download>
						<p><?= $filename ?></p>
					</a>
					<hr/>
				<?php } ?>
			</div>
		</article>
	</section>
</body>
</html>
