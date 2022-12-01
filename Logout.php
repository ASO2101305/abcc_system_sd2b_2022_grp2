<?php
    session_start();
    require_once "sessioncheck.php";

    $_SESSION = array();
    session_destroy();
?>


<DOCTYPE html>
<html>
    <head>
        <titel>ログアウト</title>
    </head>
    <body>
        <h1>
            <font size='5'>ログアウトしました</font>
        </h1>
        <p><a href='login.php'>ログインページに戻る</p>
    </body>
</html