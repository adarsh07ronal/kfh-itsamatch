<?php
$doc = new DOMDocument();
$doc->loadHTMLFile("outputscreen.html");
echo $doc->saveHTML();
?>