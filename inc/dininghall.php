<?php require_once 'inc/header.php'; ?>
                    <?php if ($diningHall) :?>

                        <?php echo '<center><h1>'.$diningHall.'</h1></center>';?>

                    <?php endif; ?>

                    <ul id="tabs" class="nav nav-tabs">
                        <li><a data-toggle="tab" href="#Breakfast">Breakfast</a></li>
                        <li><a data-toggle="tab" href="#Lunch">Lunch</a></li>
                        <li><a data-toggle="tab" href="#Dinner">Dinner</a></li>
                        <li><a data-toggle="tab" href="#LateNight">Late Night</a></li>
                      </ul>

                      <div class="tab-content">
                        <div id="Breakfast" class="tab-pane fade">
                            <?php if (count($breakFast) == 0) echo "<center><h2>Closed</h2></center>";?>
                            <?php if (count($breakFast) > 0) :?>
                                <h3>Breakfast</h3>
                                 <ul class="list-group">
                                     <?php foreach($breakFast as $item): ?>
                                         <li class="list-group-item">
                                             <?php echo $item; ?>
                                         </li>
                                     <?php endforeach ?>
                                 </ul>

                             <?php endif; ?>
                        </div>
                        <div id="Lunch" class="tab-pane fade">
                            <?php if (count($lunch) == 0) echo "<center><h2>Closed</h2></center>";?>
                            <?php if (count($lunch) > 0) :?>
                             <h3>Lunch</h3>
                                 <ul class="list-group">
                                     <?php foreach($lunch as $item): ?>
                                         <li class="list-group-item">
                                             <?php echo $item; ?>
                                         </li>
                                     <?php endforeach ?>
                                 </ul>

                             <?php endif; ?>
                        </div>
                        <div id="Dinner" class="tab-pane fade">
                            <?php if (count($dinner) == 0) echo "<center><h2>Closed</h2></center>";?>
                            <?php if (count($dinner) > 0) :?>
                             <h3> Dinner</h3>
                                 <ul class="list-group">
                                     <?php foreach($dinner as $item): ?>
                                         <li class="list-group-item">
                                             <?php echo $item; ?>
                                         </li>
                                     <?php endforeach ?>
                                 </ul>

                             <?php endif; ?>
                        </div>
                        <div id="LateNight" class="tab-pane fade">
                            <?php if (count($lateNight) == 0) echo "<center><h2>Closed</h2></center>";?>
                            <?php if (count($lateNight) > 0) :?>
                             <h3> Late Night</h3>
                                 <ul class="list-group">
                                     <?php foreach($lateNight as $item): ?>
                                         <li class="list-group-item">
                                             <?php echo $item; ?>
                                         </li>
                                     <?php endforeach ?>
                                 </ul>

                             <?php endif; ?>
                        </div>
                      </div>

                      <script>
                      $(function(){

                        var dt = new Date();
                        var time = dt.getHours();


                        if (time >= 0 && time < 12){
                            $('#tabs li').eq(0).addClass('active');
                            $('#Breakfast').addClass('in active');
                        }

                        else if (time >= 12 && time < 17){
                            $('#tabs li').eq(1).addClass('active');
                            $('#Lunch').addClass('in active');


                        }
                        else if (time>=17 && time <= 22){
                            $('#tabs li').eq(2).addClass('active');
                            $('#Dinner').addClass('in active');
                        }

                        else{
                            $('#tabs li').eq(3).addClass('active');
                            $('#LateNight').addClass('in active');

                        }


                      });

                      </script>


<?php require_once 'inc/footer.php'; ?>
