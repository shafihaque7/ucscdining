<?php
        $typeMeal = "None";

        $breakFast = array();
        $lunch = array();
        $dinner = array();
        $lateNight = array();

      require_once('simple_html_dom.php');

      $servername = "localhost";
      $username = "i1639483_wp1";
      $password = "R&*8FTFft466(#6";
      $dbName = "dininghallapp";
     
      $conn = new mysqli($servername, $username, $password, $dbName);

      $sql = "select * from allitems where dininghallname = '$diningHall' AND timeofmeal = 'Breakfast';";

        $result = mysqli_query($conn, $sql);

        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){
             while ($row = mysqli_fetch_assoc($result)){
                $breakFast[] = $row['food'];
            }
        }

        $sql = "select * from allitems where dininghallname = '$diningHall' AND timeofmeal = 'Lunch';";

        $result = mysqli_query($conn, $sql);

        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){
             while ($row = mysqli_fetch_assoc($result)){
                $lunch[] = $row['food'];
            }
        }

        $sql = "select * from allitems where dininghallname = '$diningHall' AND timeofmeal = 'Dinner';";

        $result = mysqli_query($conn, $sql);

        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){
             while ($row = mysqli_fetch_assoc($result)){
                $dinner[] = $row['food'];
            }
        }

        $sql = "select * from allitems where dininghallname = '$diningHall' AND timeofmeal = 'Late Night';";

        $result = mysqli_query($conn, $sql);

        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0){
             while ($row = mysqli_fetch_assoc($result)){
                $lateNight[] = $row['food'];
            }
        }


 ?>
