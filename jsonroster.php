<?php
$url = "https://api.vatusa.net/XtwF3x3Zm6QzU+ch/roster";
$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
         if ($httpcode != "200") {
           echo "Encountered $httpcode from API\n"; exit;
         }
else {
include("db.php");
$query = "SELECT vatsimid FROM users WHERE status <> 'V'";
$stmt = $dbh->prepare($query);
$stmt->execute();
$current = array();
while($row = $stmt->fetch())
{
 $current[] = $row['vatsimid'];
}
// $Current is everyone currently in the database.
//print_r($current);
//print_r($current);
$jsondata = json_decode($data, TRUE);
//print_r($jsondata);
$tmpArray=array($jsondata);
$cidArray=array();
print_r($tmpArray[0]['facility']['roster']);
foreach($tmpArray[0]['facility']['roster'] as $controller)
{
 echo $controller['cid'] . " ". $controller['fname'] . " ". $controller['lname']. "<br />";
//print_r($controller);
 $cidArray[]=$controller['cid']; //Add CID to array to check for removed CTL in step 2
 $query = "SELECT vatsimid, fname, lname, email, rating, status FROM controllers WHERE vatsimid='".$controller['cid']."'";
//echo $query . "<br />";
 //$query=mysql_query($query);
 //$fetch=mysql_fetch_assoc($query);
 //Lets add new people
 //echo $controller['join_date'];
 $q = $dbh->prepare($query);
 try {
 $q->execute();
 }
    catch (PDOException $e) {
    echo "Okay error: " . $e->getMessage() . "\n";
    } 
 //$q->debugDumpParams();
//echo $q->rowCount();
 $fetch = $q->fetch();
 print_r($fetch);
 if(in_array($controller['cid'], $current))
 {
 if($fetch['status'] == "R")
 {
 $query = "UPDATE controllers SET status=? WHERE vatsimid=?";
 //echo $query;
 $stmtq = $dbh->prepare($query);
 $stmtq->execute(array("A",$controller['cid']));
 $query = mysql_query($query);
echo $controller['cid'] . " has been marked as reactivated.<br />";
  }
  if($controller['rating'] != $fetch['rating'])
  {
    $queryc = "UPDATE controllers SET rating=? WHERE vatsimid=?";
    $queryc = $dbh->prepare($queryc);
    try {
    $queryc->execute(array($controller['rating'], $controller['cid']));
    echo "Rating for ". $controller['cid'] . " changed frorm ". $fetch['rating'] . " to " . $controller['rating'] . "<br />";
    }
    catch (PDOException $e) {
    echo "Please report this message to the webmaster: " . $e->getMessage() . "\n";
    exit;
    }
  }
 if($controller['email'] != $fetch['email'])
  {
  echo "HI " . $controller['fname'];
  $queryd = "UPDATE controllers SET email=? WWHERE vatsimid=?";
  $qd = $dbh->prepare($queryd);
  try {
  $qd->execute(array($controller['email'], $controller['cid']));
  //$qd->debugDumpParams();
  echo "Email for ". $controller['cid'] . " changed from " . $fetch['email'] . " to " . $controller['email'] . "<br />";
  }
      catch (PDOException $e) {
    echo "Please report this message to the webmaster: " . $e->getMessage() . "\n";
    exit;
  }
 }
 echo "HI " . $controller['cid'];
 }
//Check for a non-existent controller in the db, but in vatusa
elseif(!in_array($controller['cid'], $current))
  {
  echo $controller['cid'] . " not in database<br />";
 //$stmt1=$dbh->query("INSERT INTO `controllers` (`vatsimid`, `fname`, `lname`, `email`, `rating`, `joindate`, `userlvl`, `training`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
 //$stmt1=$dbh->query("INSERT INTO `controllers` (`vatsimid`, `fname`, `lname`, `email`, `rating`, `userlvl`, `training`, `status`) VALUES (:vatsimid, :fname, :lname, :email, :rating, :userlvl, :training, :status)");
 /* $stmt1->bindParam(':vatsimid'. $controller['cid'], PDO::PARAM_INT);
 $stmt1->bindParam(':fname', $controller['fname'], PDO::PARAM_STR);
 $stmt1->bindParam(':lname', $controller['lname'], PDO::PARAM_STR);
 $stmt1->bindParam(':email', $controller['email'], PDO::PARAM_STR);
 //$stmt1->bindParam(':joindate', $controller['join_date'], PDO::PARAM_STR);
 $stmt1->bindParam(':rating', $controller['rating'], PDO::PARAM_INT);
 $stmt1->bindParam(':userlvl', '0', PDO::PARAM_INT);
 $stmt1->bindParam(':training', '0', PDO::PARAM_INT);
 $stmt1->bindParam(':status', 'A', PDO::PARAM_STR); */
 $fname = $controller['fname'];
 $lname = $controller['lname'];
 if($lname == "O'Shea")
 {
  $lname = "OShea";
 }
 $rname = $fname . " " . $lname;
 $query = "INSERT INTO `controllers` (`vatsimid`, `fname`, `lname`, `email`, `rating`, `userlvl`, `training`, `status`) VALUES ('".$controller['cid']."', '".$fname."', '".$lname."', '".$controller['email']."', '".$controller['rating']."', '0', '0', 'A')";
 echo $query;
 $stmt1=$dbh->prepare($query);
//$stmt1->debugDumpParams();
try {
$stmt1->execute();
}
      catch (PDOException $e) {
    echo "Please report this message to the webmaster: " . $e->getMessage() . "\n";
    exit;
    }
//$stmt1->execute(array($controller['cid'], $controller['fname'], $controller['lname'], $controller['email'], $controller['join_date'], $controller['rating'], '0', '0', 'A'));

  //$query = mysql_query($query);
echo $controller['cid'] . " added to database<br />";
// Lets create the forum account!
$smf_dbh=new PDO('mysql:host=localhost;dbname=smf', 'smf', 'wolfomega69!');
$smf_dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$smf_dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$realname = $fname . " " . $lname;
$now = time ();
$smf_query = "INSERT INTO members(`member_name`, `date_registered`, `real_name`, `passwd`, `buddy_list`, `email_address`, `message_labels`, `openid_uri`, `signature`, `ignore_boards`)
VALUES('".$controller['cid']. "', '".$now."', '".$rname."','".sha1($realname."5")."','NONE','".$controller['email']."', 'None', 'None','ZDC Controller', '0')";
echo $smf_query;
$smf_add = $smf_dbh->prepare($smf_query);
try {
$smf_add->execute();   
}
      catch (PDOException $e) {
    echo "Please report this message to the webmaster: SMF> " . $e->getMessage() . "\n";
    exit;
    }                     
$smf_dbh = null; // Closed connection
 // Next up we wowuld add them to SMF databasae here
 }
}

/* print_r($cidArray);
echo "<br />";
print_r($current);
echo "<br />"; */
// Check for removed controllers
print_r($cidArray);
foreach($current as $controller)
{
 if(!in_array($controller, $cidArray))
{
$q = "SELECT * FROM controllers WHERE vatsimid=?";
$stmt = $dbh->prepare($q);
//echo $current;
try {
$stmt->execute(array($controller));
}
      catch (PDOException $e) {
    echo "P
    }lease report this message to the webmaster: REACTIVATE " . $e->getMessage() . "\n";
    exit;
    }
$f = $stmt->fetch();
//echo $stmt->rowCount();
}
if($f['status'] == "A")
{
 $query ="UPDATE controllers SET status='R' WHERE vatsimid=?";
 $q=$dbh->prepare($query);
 try {
 $q->execute(array($controller));
echo $controller. " is now marked as removed.<br />";
}
      catch (PDOException $e) {
    echo "Please report this message to the webmaster: DEACTIVATE" . $e->getMessage() . "\n";
    exit; 
    }
}
//}
/* if(in_array($controller, $cidArray))
 {
  //$query = "SELECT * FROM controllers WHERE CtlVATSIMID='".$controller."'";
 $queryb = "SELECT * FROM controllers WHERE vatsimid='".$controller."' AND status=='R'";
 $stmtb=$dbh->prepare($queryb);
$stmtb->execute();
 $fetch = $stmtb->fetch();
  if(($fetch['status'] == "R")&&($fetch['status'] != "L"))
  {
  $query = "UPDATE controllers SET status=? WHERE vatsimid=?";
  //$qa=$dbh->prepare($query);
  //$qa = $qa->execute(array("A", $controller));
  echo $controller . " is now activated<br />";
  }
} */

}
}
$dbh = null;
?>
