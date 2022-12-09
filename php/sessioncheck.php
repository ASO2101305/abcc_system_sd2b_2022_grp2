<?php 
    session_start();

    if(isset($_SESSION['mailaddress'])==false){
        header('Location: login.html');
    }
?>