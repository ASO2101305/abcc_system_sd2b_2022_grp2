<?php
require_once 'DBManager.php';
class History{
    function HistoryPdcByDate(){
        $pdo = new DBManager;
        $PDO = $pdo->dbConnect();
        $sql = "SELECT * FROM order_log AS o LEFT OUTER JOIN product AS p ON o.product_id = p.product_id ORDER BY order_date DESC";
        $ps = $PDO->prepare($sql);
        $ps->execute();
        $results = $ps->fetchAll();

        $ArrayPdc = array();
        foreach($results as $result){
            $product = new O_History();
            $product->product_id = $result['product_id'];
            $product->product_name = $result['product_name'];
            $product->order_date = $result['order_date'];
            $product->order_num = $result['order_num'];
            $product->source = $result['source'];
            // 全部代入する

            // リターンする配列に追加
            $ArrayPdc[ ] = $product;
        }
        return $ArrayPdc;
    }
    
    function HistoryPdcByLogs(){
        $pdo = new DBManager;
        $PDO = $pdo->dbConnect();
        $sql = "SELECT * FROM order_log AS o LEFT OUTER JOIN product AS p ON o.product_id = p.product_id ORDER BY order_date DESC";
        $ps = $PDO->prepare($sql);
        $ps->execute();
        $Arraylogs = $ps->fetchAll();
        return $Arraylogs;
    }
}

class O_History {
    public $order_id;
    public $client_id;
    public $product_id;
    public $maker_id;
    public $order_date;
    public $order_num;
}  