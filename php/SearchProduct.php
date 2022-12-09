<?php
    require_once "sessioncheck.php";
    require_once "DBManager.php";
    class search_result{
        function SearchPdc_result($getpdcname){
            $pdo = new DBManager;
            $PDO = $pdo->dbConnect();
            $sql = "SELECT * FROM Product AS p LEFT OUTER JOIN product_bunrui AS pb ON p.product_bunrui_id = pb.product_bunrui_id WHERE p.product_name LIKE ? OR pb.bunrui_name LIKE ? ORDER BY p.sale_date DESC";
            $ps = $PDO->prepare($sql);
            $ps->bindValue(1,"%".$getpdcname."%",PDO::PARAM_STR);
            $ps->bindValue(2,"%".$getpdcname."%",PDO::PARAM_STR);
            $ps->execute();
            $results = $ps->fetchAll();
    
            $ArrayPdc = array();
            foreach($results as $result){
                $product = new Product();
                $product->product_id = $result['product_id'];
                $product->product_name = $result['product_name'];
                $product->product_price = $result['product_price'];
                $product->source = $result['source'];
                // 全部代入する
    
                // リターンする配列に追加
                $ArrayPdc[ ] = $product;
            }
            return $ArrayPdc;
        }
    }
?>