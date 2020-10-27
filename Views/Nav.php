<?php
    namespace Views;
    include_once('Header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body id="menu">
    <header>
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"> <img src="boton-nav.png" alt=""></label>
            <nav class="menu">
                <ul>
                    <li>
                        <a>Welcome <strong><?php echo $_SESSION['email']?></strong></a>
                    </li>
                    <li>
                        <a href="#">Billboard</a>
                    </li>
                    <?php if($_SESSION['isAdmin']=="1")
                    {
                    ?>
                    <li>
                        <a href="<?php echo FRONT_ROOT ?>Cinema/ShowAddView">Add Cinema</a>
                    </li>
                    <?php 
                    }
                    ?>
                    <li>
                        <a href="<?php echo FRONT_ROOT ?>Cinema/ShowCinemaList">Cinema Listings</a>
                    </li>
                    <li>
                        <a href="<?php echo FRONT_ROOT ?>Session/Logout">Logout</a>
                    </li>
                    
                </ul>
            </nav>
    </header>
</body>
</html>