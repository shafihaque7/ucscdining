<?php
$doc = new DOMDocument();
$file = "cron.html";

if ($doc->loadHTMLFile($file)){
   $span = $doc->getElementsByTagName('span')-> item(0);
   $count = $span->textContent;
   $count++;

   $doc->getElementsByTagName('span')->item(0)->nodeValue = $count;
   $doc->saveHTMLFile($file);

   echo 'file updated successfully';
}
else{
   return false;
}


?>