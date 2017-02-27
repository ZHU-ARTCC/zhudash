<?php
$stations = array("KDCA", "KIAD", "KBWI", "KRDU", "KORF");
foreach($stations as $s)
{
 echo "Writing ". $s."<br />";
 $wx = file_get_contents("ftp://tgftp.nws.noaa.gov/data/observations/metar/decoded/".$s.".TXT");
 print_r($wx);
  file_put_contents($s.".TXT", $wx);
}
?>