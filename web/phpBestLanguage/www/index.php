<?php
include 'flag.php';
extract($_GET);
if (!empty($ac))
{
	$f = trim(file_get_contents($fn));
	if ($ac === $f)
	{
		echo "<p>This is flag:" ." $flag</p>";
	}
	else
	{
		echo "<p>sorry!</p>";
	}
}
else
{
	highlight_file(__FILE__);
}
?>