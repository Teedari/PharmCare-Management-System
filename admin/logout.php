<?php session_start(); ?>
<?php

        $_SESSION['username'] = null;
        $_SESSION['firstname'] = null;
        $_SESSION['lastname'] = null;
        $_SESSION['user_role'] = null;
        $_SESSION['admin_id'] = null;
        session_start();

        session_destroy();
        header("location: ../index.php");
        exit();

?>
