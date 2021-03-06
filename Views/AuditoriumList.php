<?php
     include('Header.php');
     include('Nav.php');
?>

     <!DOCTYPE html>
     <html lang="en">
     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Auditorium List</title>
     </head>
     <body>

     <!-- NOMBRE DEL CINE AL QUE PERTENECE -->
     <?php foreach($cinemasList as $cinemaName)
                    {
                         if($cinemaName->getIdCinema() == $idCinema)
                         {
                    ?>
                    <h2 class="table-title" style="margin-top: 3.5rem;"><?php echo $cinemaName->getName();?></h2>
                    <?php     break;
                         } 
                    } ?>
     <!-- VENTAS DEL CINE -->
     <section  class="">
     <h2 class="table-title">SALES</h2>
         <div class="cont-form">
                   <form  class="form">
                    <div>
                         <div>
                         <label for="aproxEarnings">Estimate earnings:</label>
                              <input class="form-input" type="Text" name="aproxEarnings" value="" placeholder="<?php echo "$" .$estimateEarnings; ?>" readonly>
                         </div>
                    </div>
                    <div>
                         <div>
                              <label for="discounts">Discounts applied:</label>
                              <input class="form-input" type="Text" name="discounts" value="" placeholder="<?php echo $discountsApplied; ?>" readonly>
                         </div>
                    </div>
               </form>
          </div>
     </section>
          <!-- TABLA DE AUDITORIUMS -->
          <div class="table-list" style="margin-top: 30px;"> 
                    <h2 class="table-title">Auditorium List</h2>
                    
                    <!-- AGREGAR AUDITORIUM -->
                    <?php if((isset($_SESSION['userLogedIn'])) && $_SESSION['userLogedIn']->getIsAdmin()=="1") {
                    ?>
                    <form class="form" action="<?php echo FRONT_ROOT ?>Auditorium/AddView" method="post">
                    <center><button class="button-add" type="submit" name="idCinema" value="<?php echo $idCinema ?>" style="margin-bottom: 8px">Add Auditorium</button></center>
                    </form>
                    <?php }?>
                    <table>
                         <thead>
                              <th>Name</th>
                              <th>Total Seats</th>
                              <th>Ticket Price</th>
                              <?php if((isset($_SESSION['userLogedIn'])) && $_SESSION['userLogedIn']->getIsAdmin()=="1") {?><th></th> <?php } ?>
                              <?php if((isset($_SESSION['userLogedIn'])) && $_SESSION['userLogedIn']->getIsAdmin()=="1") {?><th>Options</th> <?php } ?>
                              <?php if((isset($_SESSION['userLogedIn'])) && $_SESSION['userLogedIn']->getIsAdmin()=="1") {?><th></th> <?php } ?>
                         </thead>
                         <tbody>
                         <?php
                              foreach($cinemasList as $cinema)
                                   {
                                        if($cinema->getIdCinema() == $idCinema)
                                        {
                                             foreach($cinema->getAuditoriums() as $auditorium)
                                             {
                                        ?>
                                             <tr>
                                             <td><?php echo $auditorium->getNameAuditorium(); ?></td>
                                                  <td><?php echo $auditorium->getAmountOfSeats(); ?></td>
                                                  <td><?php echo $auditorium->getTicketPrice(); ?></td>
                                                  <!-- Boton de Edit -->
                                                  <?php if((isset($_SESSION['userLogedIn'])) && $_SESSION['userLogedIn']->getIsAdmin()=="1") {
                                                   ?>
                                                   <td>
                                                   <form action="<?php echo FRONT_ROOT ?>Auditorium/ShowEditView" method="POST">
                                                   <button class="button-edit" type="submit" name="idAuditorium" value="<?php echo $auditorium->getIdAuditorium(); ?>">EDIT</button>
                                                   <input type="hidden" name="idCinema" value="<?php echo $idCinema; ?>">
                                                   <?php }?>
                                                   </form>
                                                   </td>    
                                                  <!-- Boton de Delete -->
                                                  <?php if((isset($_SESSION['userLogedIn'])) && $_SESSION['userLogedIn']->getIsAdmin()=="1") {
                                                  ?>
                                                  <td>
                                                  <form action="<?php echo FRONT_ROOT ?>Auditorium/Delete" method="POST">
                                                  <button class="button-delete" type="submit" name="idAuditorium" value="<?php echo $auditorium->getIdAuditorium();?>">DELETE</button>
                                                  <input type="hidden" name="idCinema" value="<?php echo $idCinema; ?>">
                                                  <?php }?>
                                                  </form>
                                                  </td>
                                                  <!-- Boton de Ver Add Movie -->
                                                  <?php if((isset($_SESSION['userLogedIn'])) && $_SESSION['userLogedIn']->getIsAdmin()=="1") {
                                                  ?>
                                                  <td>
                                                  <form action="<?php echo FRONT_ROOT ?>API/ShowMovies" method="POST">
                                                  <button class="button-auditoriums" type="submit" name="idAuditorium">ADD MOVIE</button>
                                                  <input type="hidden" name="idAuditorium" value="<?php echo $auditorium->getIdAuditorium();?>">
                                                  </form>
                                                  <?php }?>
                                                  </td>
                                             </tr>     
                              <?php          }
                                        }
                                   } ?>          
                         </tbody>
                    </table>
                    
                    <?php if((isset($_SESSION['userLogedIn'])) && $_SESSION['userLogedIn']->getIsAdmin()=="1") {
                    ?>
                    <form class="form" action="<?php echo FRONT_ROOT ?>Cinema/ShowCinemaList" method="post">
                    <center><button class="button-add" type="submit" style="margin: 8px;">Go Back</button></center>
                    </form>
                    <?php } ?>

               </div>
               <?php 
          if($message!='')
          {
          ?>
          <div class="container">
               <div class="alert alert-danger">
                    <strong><?php echo $message; ?></strong>
               </div>
          </div>
          <?php }
          ?>
          </body>
     </html>