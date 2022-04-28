<?php
    if (isset($_COOKIE["login_name"])) {
        include 'menu.php';
        include 'content.php';

    }
    else{
        include 'login.php';
        
    }
?>