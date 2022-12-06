<?php
require_once 'DBManager.php';

    function SearchPdcByDate(){
    $pdo = new DBManager;
    $PDO = $pdo->dbConnect();
    $sql = "SELECT * FROM Product ORDER BY sale_date DESC";
    $ps = $PDO->prepare($sql);
    $ps->execute();
    $ArrayPdc = $ps->fetchAll();
    return $ArrayPdc;
}

    function SearchPdcByLogs(){
    $pdo = new DBManager;
    $PDO = $pdo->dbConnect();
    $sql = "SELECT * FROM order_logs ORDER BY order_date DESC";
    $ps = $PDO->prepare($sql);
    $ps->execute();
    $Arraylogs = $ps->fetchAll();
    return $Arraylogs;
}