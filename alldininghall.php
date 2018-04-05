<?php require_once 'inc/databaseconnection.php'; ?>
 <?php require_once 'inc/scalablescraper.php'; ?>
<?php


    // echo "The session number is";
    if ($_GET['diningHallIndex']):
        $ip = $_GET['diningHallIndex'];
        // echo '<h1>'.($ip).'</h1>';
    endif;

    if ($ip == 0){
        $ip = 0;
    }

   $theIndex = $ip;


   $allNames;
   $allURLS;

   getAllNamesAndUrls($allNames, $allURLS);

   //All the session stuff
   // session_start();
   // if (isset($_SESSION['alltheURLS'])){
   //     $allURLS = $_SESSION['alltheURLS'];
   //     $allNames = $_SESSION['alltheNames'];
   // }
   // else{
   //        getAllNamesAndUrls($allNames, $allURLS);
   // }
   //
   // session_destroy();




   $websiteURL = $allURLS[$theIndex];

   $diningHall = $allNames[$theIndex];

?>



 <?php require_once 'inc/logic.php'; ?>
 <?php require_once 'inc/dininghall.php'; ?>
