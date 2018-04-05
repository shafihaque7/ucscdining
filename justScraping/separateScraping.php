<?php require_once '../databaseconnection.php';?>
<?php

   require_once('../simple_html_dom.php');
   
   $websiteURL = "https://dining.ucsc.edu/eat/";

   $html = file_get_html($websiteURL);

   $allDiningHallsUrl = array();
   $allDiningHallNames = array();

   // This gets the href for the menu from dining ucsc

   foreach($html->find('.btn-info') as $diningHalls) {

      if (strpos($diningHalls->attr['href'], "Banana+Joe") != false){
         break;
      }

         $allDiningHallsUrl[] = $diningHalls->attr['href'];

   }
   // This loop gets the name of each dining hall
   foreach($html->find('h2') as $eachDiningHall) {

         if (strpos($eachDiningHall, "Banana Joe's") != false){
            break;
         }

         $allDiningHallNames[] =  $eachDiningHall->plaintext;

      }

      // This finds the source file

   $finishedUrls = array();
   // echo '<br>';
   foreach ($allDiningHallsUrl as $individualUrlPre ) {
         $websiteURL = $individualUrlPre;

         $html = file_get_html($websiteURL);

         foreach($html->find('frame[NAME=AuroraMain]') as $type) {

            $finishedUrls[] = 'http://nutrition.sa.ucsc.edu/' . $type->attr['src'];
         //   echo 'http://nutrition.sa.ucsc.edu/' . $type->attr['src'];
         //   echo'<br>';

         }
   }

   $sql = "delete from restaurants;";
   mysqli_query($conn, $sql);

   $sql = "delete from allitems;";
   mysqli_query($conn, $sql);


   for ($i=0; $i < count($allDiningHallNames); $i++){

      $currentDate = date('m-d-Y');
      $sql = "insert into restaurants (dining_hall_name, dining_hall_href, dining_hall_update_date) VALUES ('$allDiningHallNames[$i]', '$finishedUrls[$i]','$currentDate');";

      mysqli_query($conn, $sql);

      // This is where it goes through each dining hall


        $html = file_get_html($finishedUrls[$i]);

        foreach($html->find('table[height=100%]') as $type) {

            foreach($type->find('.menusampmeals') as $postDiv){
                // echo '<h1>' . $postDiv -> innertext . '</h1>'.'<br>';

                $typeMeal = $postDiv -> innertext;
            }
            foreach($type->find('.menusamprecipes') as $item)
            {
                // echo $item -> innertext . '<br>';
                if ($typeMeal == "Breakfast"){
                     $itemFood = trim($item->plaintext);
                     $itemFood = mysqli_real_escape_string($conn,$itemFood);
                    $currentDate = date('m-d-Y');
                    $sql = "insert into allitems (dininghallname,timeofmeal, food, date) VALUES ('$allDiningHallNames[$i]','$typeMeal','$itemFood','$currentDate');";
                    mysqli_query($conn, $sql);

                 
                }
                else if ($typeMeal == "Lunch"){
                   
                  $itemFood = trim($item->plaintext);

                  $itemFood = mysqli_real_escape_string($conn,$itemFood);


                  $currentDate = date('m-d-Y');
                  $sql = "insert into allitems (dininghallname,timeofmeal, food, date) VALUES ('$allDiningHallNames[$i]','$typeMeal','$itemFood','$currentDate');";
                  mysqli_query($conn, $sql);
                }
                else if ($typeMeal == "Dinner"){
                  $itemFood = trim($item->plaintext);
                  $itemFood = mysqli_real_escape_string($conn,$itemFood);
                  $currentDate = date('m-d-Y');
                  $sql = "insert into allitems (dininghallname,timeofmeal, food, date) VALUES ('$allDiningHallNames[$i]','$typeMeal','$itemFood','$currentDate');";
                  mysqli_query($conn, $sql);
                }
                else if ($typeMeal == "Late Night"){
                  $itemFood = trim($item->plaintext);
                  $itemFood = mysqli_real_escape_string($conn,$itemFood);
                  $currentDate = date('m-d-Y');
                  $sql = "insert into allitems (dininghallname,timeofmeal, food, date) VALUES ('$allDiningHallNames[$i]','$typeMeal','$itemFood','$currentDate');";
                  mysqli_query($conn, $sql);

                }
            }
        }
   }

   mysqli_close($conn);

?>