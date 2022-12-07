<?php
require_once 'DBManager.php';
class search{
    function SearchPdcByDate(){
        $pdo = new DBManager;
        $PDO = $pdo->dbConnect();
        $sql = "SELECT * FROM Product ORDER BY sale_date DESC";
        $ps = $PDO->prepare($sql);
        $ps->execute();
        $results = $ps->fetchAll();

        $ArrayPdc = array();
        foreach($results as $result){
            $product = new Product();
            $product->product_id = $result['product_id'];
            $product->product_name = $result['product_name'];

            $product->source = $result['source'];
            // 全部代入する

            // リターンする配列に追加
            $ArrayPdc[ ] = $product;
        }
        return $ArrayPdc;
    }
    
    function SearchPdcByLogs(){
        $pdo = new DBManager;
        $PDO = $pdo->dbConnect();
        $sql = "SELECT * FROM order_log ORDER BY order_date DESC";
        $ps = $PDO->prepare($sql);
        $ps->execute();
        $Arraylogs = $ps->fetchAll();
        return $Arraylogs;
    }
}

class Product {
    public $product_id;
    public $product_bunrui_id;
    public $product_name;
    public $product_price;
    public $function_detail;
    public $size;
    public $sale_date;
    public $maker_id;
    public $source;
}  
