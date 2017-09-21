<?php
  /** Testing to see if you can send get/post vars instead of params with AJAX call */
  $part_type = $_GET['partType'];
  $part_id  = $_GET['id'];

  $dir = "../../phase_2_prod/files/".$part_type."/".$part_id;
  $fileStr = "";
  if(!file_exists($dir)) {
    $fileStr = "<p>No files found</p><br>";
  } else {
    if(file_exists($dir) && ($handle = opendir($dir))) {
      while(false !== ($entry=readdir($handle))) {
        if($entry != "." && $entry != "..") {
          $fileStr = $fileStr . "<a href=\"$dir/$entry\" target=\"_blank\">$entry</a><br>";
        }
      }
    }
  }
  $dir = "../../phase_2_prod/pics/".$part_type."/".$part_id."/";
  $picStr = "";
  if(!file_exists($dir)) {
    $picStr = "No pictures found <br>";
  } elseif (file_exists($dir) && ($handle = opendir($dir))) {
    $picStr = "<table border=1>";
    while(false !== ($entry=(readdir($handle)))) {
      if($entry != "." && $entry != ".." && substr($entry,-3) !="txt") {
        $str = rawurlencode($entry);
        $picStr = $picStr . "<tr><td>";
        $picStr = $picStr . "<a href=$dir/$str target=\"blank\"> <img src=\"$dir/$entry\" width=\"200\" height=\"200\"></a>";
        $picStr = $picStr . "</td><td>";
        $txt = $dir."/".substr($entry,0,-3)."txt";
        if(file_exists($txt)) {
          $fp = fopen($txt, 'r');
          $picStr = $picStr + nl2br(fread($fp, filesize($txt)));
          fclose($fp);
        }
        #echo "picture text here";
        $picStr = $picStr . "</td></tr>";
      }
    }
    $picStr = $picStr . "</table>";
  }
  $return = new stdClass;
  $return->picStr  = $picStr;
  $return->fileStr = $fileStr;
  $json = json_encode($return);
  echo $json;

?>
