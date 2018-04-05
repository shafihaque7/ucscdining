<?php include_once 'inc/databaseconnection.php'; ?>


<?php
$sql = "insert into restaurants (dining_hall_name, dining_hall_href, dining_hall_update_date) VALUES ('anotherone', 'iniffffcom','$currentDate');";

        mysqli_query($conn, $sql);


?>