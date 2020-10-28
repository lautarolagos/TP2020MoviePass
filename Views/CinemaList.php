<?php
     require_once("Config/Autoload.php");
     include('Header.php');
     include('Nav.php');
     
     use DAO\CinemaDAOMySQL as CinemaDAOMySQL;
     use Models\Cinema as Cinema;
     $cinemaDAO = new CinemaDAOMySQL();
     $cinemasList = $cinemaDAO->GetAll();
    // Se supone que aca no es necesario hacer todo esto, ya que en CinemaController/ShowCinemaList se pasa la lista de cines, pero por algun motivo
    // Aca llega vacio el array
?>
     <!DOCTYPE html>
     <html lang="en">
     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Cinema List</title>
     </head>
     <body>
          <div class="table-list"> 
               <title>Cinema Listings - MoviePass</title>
                    <h2 class="table-title">Cinema List</h2>
                    <table>
                         <thead>
                              <?php if($_SESSION['isAdmin']=="1"){?>
                              <th>ID</th>
                              <?php }?>
                              <th>Name</th>
                              <th>Capacity</th>
                              <th>Adress</th>
                              <th></th>
                              <th>Options</th>
                              <th></th>
                         </thead>
                         <tbody>
                         <?php
                              foreach($cinemasList as $cinema)
                                   {?>
                                             <tr>
                                                  <?php if($_SESSION['isAdmin']=="1"){?>
                                                  <td><?php echo $cinema->getIdCinema(); ?></td>
                                                  <?php }?>
                                                  <td><?php echo $cinema->getName(); ?></td>
                                                  <td><?php echo $cinema->getCapacity(); ?></td>
                                                  <td><?php echo $cinema->getAdress(); ?></td>
                                                  
                                                  <!-- Boton de Edit -->
                                                  <?php if($_SESSION['isAdmin']=="1"){
                                                   ?>
                                                   <td>
                                                   <form action="<?php echo FRONT_ROOT ?>Cinema/ShowCinemaEdit" method="POST">
                                                   <button class="button-edit" type="submit" name="idCinema" value="<?php echo $cinema->getIdCinema(); ?>">EDIT</button>
                                                   <?php }?>
                                                   </form>
                                                   </td>    

                                                  <!-- Boton de Delete -->
                                                  <?php if($_SESSION['isAdmin']=="1"){
                                                  ?>
                                                  <td>
                                                  <form action="<?php echo FRONT_ROOT ?>Cinema/DeleteCinema" method="POST">
                                                  <button class="button-delete" type="submit" name="idCinema" value="<?php echo $cinema->getIdCinema();?>">DELETE</button>
                                                  <?php }?>
                                                  </form>
                                                  </td>
                                                  <!-- Boton de Ver Salas -->
                                                  <td>
                                                  <form action="<?php echo FRONT_ROOT ?>Cinema/ShowAuditoriums" method="POST">
                                                  <button class="button-auditoriums" type="submit" name="idCinema" value="<?php echo $cinema;?>">SEE AUDITORIUMS</button>
                                                  </form>
                                                  </td>
                                             </tr>     
                              <?php     } ?>
                         </tbody>
                    </table>
               </div>
               <?php if(isset($message)){
                    ?>
                    <p><?php echo $message; ?></p>
               <?php }?>
          </body>
     </html>