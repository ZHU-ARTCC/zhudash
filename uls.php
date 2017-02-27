<?php
include("header.php");
include("smf/SSI.php");
?>
Processing ULS login . . . 
<?php
  //$_SESSION['logged'] = 0;
  if($_SESSION['user_logged'])
  {
   header("location: ".$curl);
  }
  else {
    //Clicked Login button
//echo " . . .";
    $IP=$_SERVER["REMOTE_ADDR"];
    echo $IP . "<br />";
    //$IP = "69.164.221.11";
    $Salt="CW4OOWf15yanbK6H";
    $Facility="ZDC";
    $CheckIt=$Salt."-".$IP;
    $Token = $_REQUEST['token'];
    echo " . ";
    // JSON stuff
   $Token=$_REQUEST['token'];
    echo "<br />1. ".sha1($CheckIt)."<br />2. ".$Token;
    if($Token != sha1($CheckIt)) { echo "Token authentication failed"; }
   elseif($Token == sha1($CheckIt)) {
    $URL="https://login.vatusa.net/uls/info?token=".sha1($CheckIt);
    echo $URL;
    //echo " . . . ";
    $ch=curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    echo " . . . ";
         if ($httpcode != "200") {
           echo "Encountered $httpcode from ULS\n"; exit;
         }
              $data = json_decode($output, true);
    // Check if user exists in ZDC
    $Username = $data['user']['cid']; 
    //$Username=$_GET['Username'];
    $lsql="SELECT * FROM controllers WHERE vatsimid=?";
    echo " . ";
    $stmt=$dbh->prepare($lsql);
    $stmt->execute(array($Username)); 
   if($stmt->rowCount() == 1) {
        //Valid credentials
        echo " . . .";
        $userinfo=$stmt->fetch();
        $_SESSION['loggedin']=1;
        $_SESSION['user_logged']=$userinfo['vatsimid'];
        $_SESSION['cid']=$userinfo['vatsimid'];
        $_SESSION['fname'] = $userinfo['fname'];
        $_SESSION['lname'] = $userinfo['lname'];
        $_SESSION['rating'] = $userinfo['rating'];
        $_SESSION['userlvl'] = $userinfo['userlvl'];
        $_SESSION['training'] = $userinfo['training'];
        $_SESSION['status'] = $userinfo['status'];
        //see vZDC_session_start in functions.php for below line
        $_SESSION['timeout_idle'] = time() + $vZDCtimeout;
        //print_r($_SESSION);
       if($userinfo['status'] == "R") { 
            echo "You have been removed from the ZDC Roster. You will need to initiate a transfer back to ZDC via the VATUSA ARTCC Transfer Interface. If you have not trained within the last six months the ZDC Basic Exam may be re-assigned.";
            // #
            //include("footer.php");
            //session_desroy();
            //exit;
        }
      // Time to find user id in SMF
      echo "SMF login<br />";
     $smf_dbh=new PDO('mysql:host=localhost;dbname=smf', 'smf', 'wolfomega69!');
     $smf_dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $smf_dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $smf_query = $smf_dbh->prepare("SELECT id_member, member_name FROM members WHERE member_name=?");
      $smf_query->execute(array($Username));
      $smf_fetch=$smf_query->fetch();
      $smf_id = $smf_fetch['id_member'];
      //echo "<br /> SMF member id: ". $smf_id;
      smfapi_login($Username);
      //print_r($_SESSION);
     $smfpass=sha1($fname. " ".$lname."5");
     
          ?>
          Finializing cookies and forwarding you (Please wait three seconds before clicking a link if it fails) . . .
               <meta http-equiv="refresh" content="3;URL=index.php">
          <?php
    }
     else {
      //Login failed
      echo "<p><h1>Controller is not in ZDC database.</h1></p>";
      include("footer.php");
      session_desroy();
      exit;   
    } 
    } //DEBUG
  }
?>
</div></div>
<?php include("footer.php"); ?>
