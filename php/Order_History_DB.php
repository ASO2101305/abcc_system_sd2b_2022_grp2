<?php
require_once 'DBManager.php';
class History{
    function HistoryPdcByDate(){
        $pdo = new DBManager;
        $PDO = $pdo->dbConnect();
        $sql = "SELECT * FROM Order_log AS o LEFT OUTER JOIN Product AS p ON o.product_id = p.product_id LEFT OUTER JOIN Product_bunrui AS pd ON p.product_bunrui_id = pd.product_bunrui_id ORDER BY order_date DESC";
        $ps = $PDO->prepare($sql);
        $ps->execute();
        $results = $ps->fetchAll();

        $ArrayPdc = array();
        foreach($results as $result){
            $product = new O_History();
            $product->product_id = $result['product_id'];
            $product->product_name = $result['product_name'];
            $product->product_bunrui = $result['bunrui_name'];
            $product->product_size = $result['size'];
            $product->product_price = $result['product_price'];
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
        $sql = "SELECT * FROM Order_log AS o LEFT OUTER JOIN Product AS p ON o.product_id = p.product_id ORDER BY order_date DESC";
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
    public $product_name;
    public $product_bunrui;
    public $product_size;
    public $product_price;
    public $maker_id;
    public $order_date;
    public $order_num;
}  