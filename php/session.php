<?php
    session_start();

    require_once "DBManager.php";

   $dbm = new DBManager();

    $userData = $dbm->checkLoginByMailAndPass($_POST['mail'],$_POST['pass']);
    foreach($userData as $row){
        $_SESSION['id'] = $row['client_id'];
        $_SESSION['mailaddress'] = $row['mailaddress'];
        $_SESSION['pass'] = $row['client_password'];
        $_SESSION['name'] = $row['client_name'];
    }
    if(count($userData) == 0){
	echo "bbbbb";
        header("location:../login.html");
    }else{
        header("location:../ProductList.html");        
    }
?>