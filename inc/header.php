 <?php require_once 'inc/scalablescraper.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>UCSC dining hall menu</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style4.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">

                  <a href="index.php"> 
                    <h3>UCSC Dining</h3>
                    <strong>DH</strong>

                    </a>
                </div>

                <?php

                $allNames = getAllNames();


                 ?>

                <ul class="list-unstyled components" id="checkClick">


                    <?php foreach($allNames as $name): ?>
                                 <li <?php echo "name='$name'";if($name==$diningHall)echo "class='active'";?>>
                                     <a href="alldininghall.php">
                                         <i class="glyphicon glyphicon-briefcase"></i>
                                         <?php
                                         echo str_replace(" Dining Hall","",$name);
                                         ?>
                                     </a>

                                 </li>
                    <?php endforeach ?>


                </ul>
            </nav>

            <div id="resultip">
            </div>

            <script>
            $(function(){

                $('#checkClick li').click(function(){


                    var currentDhall = $(this).index();
                    var _href = $(this).find('a').attr('href');
                    $(this).find('a').attr('href', _href + '?diningHallIndex='+currentDhall);
                });

            }); // document.ready

            </script>


            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span></span>
                            </button>
                        </div>

                    </div>
                </nav>

                <div class="container">
