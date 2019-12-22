<?php session_start(); ?>
<?php

    if($_SESSION['user_role'] == 'admin'){

    header("Location: administrator");
    }
    
    if($_SESSION['user_role'] == 'user'){

        header("Location: user");
    }
?>
