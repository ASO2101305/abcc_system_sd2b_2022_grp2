<?php
require_once 'DBManager.php';
require_once 'Tbl_Product.php';
class SearchPdc{
    public function SearchPdcByDate(){
        $dbm = new DBManager;
        $PDO = $dbm->dbConnect();
        $sql = "SELECT p.product_id,p.product_name,p.product_price,p.size,pb.bunrui_name,p.source FROM Product AS p RIGHT OUTER JOIN Product_bunrui AS pb ON p.product_bunrui_id = pb.product_bunrui_id ORDER BY p.sale_date DESC";
        $ps = $PDO->prepare($sql);
        $ps->execute();
        $results = $ps->fetchAll();
        $ArrayPdc = array();
        foreach($results as $result){
            $product = new Product();
            $product->product_id = $result['product_id'];
            $product->product_name = $result['product_name'];
            $product->product_price = $result['product_price'];
            $product->product_size = $result['size'];
            $product->product_bunrui = $result['bunrui_name'];
            $product->source = $result['source'];
            // 全部代入する

            // リターンする配列に追加
            $ArrayPdc[ ] = $product;
        }
        return $ArrayPdc;
    }

    public function selectAll($pdo){

        //実行したいSQLを準備する
        $sql = "SELECT * FROM Product";
        $stmt = $pdo->prepare($sql);
        // //SQLを実行
        // try{
        $stmt->execute();
        // // //データベースの値を取得
        $results = $stmt->fetchall();
        // }catch(Exception $ex){
        //     echo $ex;
        // }

        $items = array();
        foreach($results as $result){
            $item = new Product();
            $item->product_id = $result['product_id'];
            $item->product_name = $result['product_name'];
            $item->product_price = $result['product_price'];
            $item->source = $result['source'];
            $items[] = $item; 
        }
        return $items;
    }
}
?>