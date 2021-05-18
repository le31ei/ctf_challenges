<?php
if("admin"===$_GET[id]) {
  echo("<p>not allowed!</p>");
  exit();
}

$_GET[id] = urldecode($_GET[id]);
if($_GET[id] == "admin")
{
  echo "<p>Access granted!</p>";
  echo "<p>Flag: flag{5caecd63b7dca4bcee15d262eb3af4f4} </p>";
}
?>

Can you anthenticate to this website?