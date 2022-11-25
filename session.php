<!--ログインしてセッションに格納する-->
<?php 
    session_start();
    require_once "DBManager.php";
    $dbm = new DBManager();
    $userData = $dbm->checkLoginByMailAndPass($_POST['mail'],$_POST['pass']);
    foreach($userData as $row){
        $_SESSION['mailaddress'] = $row['mail_address'];
        header('Location: list.php');
    }
    if(count($userData)==0){
        header('Location:login.php');
    }
?>