<!--以前にログインしていたらそのまま通貨-->
<?php 
    session_start();
    if(isset($_SESSION["mailaddress"])== true){
        header('Location: list.php');
    }
?>