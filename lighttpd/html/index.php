<?php

$inputFolder = getenv('inputFolder');
$outputFolder = getenv('outputFolder');
$logFile = getenv('logFile');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	 <title>MI4 - RemoteGCC</title>
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
				 <article>
						<h3>Files</h3>
						<?php
						$dir = opendir($inputFolder);
						while ($filename = readdir($dir)) { ?>
							 <p><?= $filename ?></p> 			 
						<?php } ?>
				 </article>				 
			</article>
				 <form method="POST" action="">
						<input type="file" accept="Makefile,.c,.h" multiple />
						<input type="submit" value="Push"/>
				 </form>
			</article>
			<article>
				 <h2>Logs</h2>
				 <p>
				 <?php
						# Open file
						$f = fopen($logFile, "r");
						if (!$f) {
							 printf("Log file not available.");
						}

						$content = "";
						# Read log content
						while (!feof($f)) {
							 $content .= fread($f, 1024);
						}

						# Print log file
						print($content);

						fclose($f);
				 ?>
				 </p>
			</article>
			<article>
				 <h2>Binaries</h2>
						<?php
						$dir = opendir($outputFolder);
						while ($filename = readdir($dir)) { ?>
							 <p><?= $filename ?></p> 			 
						<?php } ?>
			</article>
	 </section>
</body>
</html>
