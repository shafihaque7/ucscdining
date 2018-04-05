<?php

   function getAllNamesAndUrls(&$allNames, &$allURLS){
      $servername = "localhost";
      $username = "i1639483_wp1";
      $password = "R&*8FTFft466(#6";
      $dbName = "dininghallapp";
     
      $conn = new mysqli($servername, $username, $password, $dbName);


      $sql = "SELECT * FROM restaurants;";

      $result = mysqli_query($conn, $sql);

      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
               $allNames[] =  $row['dining_hall_name'] ;
               $allURLS[] = $row['dining_hall_href'] ;
         }
      }
      return;

   }

   function getAllNames(){
      $servername = "localhost";
      $username = "i1639483_wp1";
      $password = "R&*8FTFft466(#6";
      $dbName = "dininghallapp";
   
      $conn = new mysqli($servername, $username, $password, $dbName);


      $sql = "SELECT * FROM restaurants;";

      $result = mysqli_query($conn, $sql);

      $resultCheck = mysqli_num_rows($result);

      if ($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
               $allNames[] =  $row['dining_hall_name'] ;
            
            }
      }
      return $allNames;

   }

  ?>
