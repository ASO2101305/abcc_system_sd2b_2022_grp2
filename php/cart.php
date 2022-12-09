<?php
require_once 'DBManager.php';
require_once 'Tbl_Cart.php';

if(isset($_POST["mode"])){
    $PDO = new DBManager();
    $pdo = $pdo->dbConnect();
    switch($_POST["mode"]){
        case cart::POST_INSERT_CART;
        $client_id = intval($_POST["client_id"]);
        $product_id = intval($_POST["product_id"]);
        $rt = cart::insertItem($pdo, $client_id, $product_id);
            // 更新後、ユーザーごとの件数を取得（非同期に備えて）
        $cart_array = cart::selectForClient($pdo, $client_id);      
        break;
        case cart::POST_DELETE_CART:
        $client_id = intval($_POST["client_id"]);
        $cart_id = intval($_POST["cart_id"]);
        
        $rt = cart::deletetRecord($pdo, $cart_id);
        // 更新後、ユーザーごとの件数を取得（非同期に備えて）
        $cart_array = cart::selectForClient($pdo, $client_id);      
        break;
                
        default:
        echo "DB操作失敗";
    }
        
}
class cart{
    public const POST_INSERT_CART = "POST_INSERT_CART";
    public const POST_DELETE_CART = "POST_DELETE_CART";

    public static function selectForClient($pdo,$client_id){
        $sql ="SELECT c.cart_id,c.product_id,c.client_id,p.product_name,p.product_price,p.source 
        FROM (cart AS c LEFT OUTER JOIN client AS cl ON c.client_id = cl.client_id)
         LEFT OUTER JOIN product AS p ON c.product_id = p.product_id WHERE c.client_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $client_id);
        $stmt->execute();
        $results = $stmt->fetchall();
        $carts = array();
        foreach($results as $result){
            $cart = new Tbl_Cart();
            $cart->client_id = $client_id;
            $cart->cart_id = $result['cart_id'];
            $cart->product_id = $result['product_id'];
            $cart->product_name = $result['product_name'];
            $cart->product_price = $result['product_price'];
            $cart->source = $result['source'];
            $carts[] = $cart; // リストに追加
        }
        return $carts;
    }
    public static function insertItem($pdo, $client_id, $product_id){
        //実行したいSQLを準備する
        $sql = "INSERT INTO cart (client_id, `product_id`) values( ? , ?)";
        try{
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $client_id);
            $stmt->bindValue(2, $product_id);
            //SQLを実行
            $rt = $stmt->execute();
        }
        catch(PDOException $e){
            echo "INSERT ERROR";
            exit($e->getMessage());
            // return $e->getMessage();
        }
        return $rt;
    }
    public static function deletetRecord($pdo, $cart_id){
        //実行したいSQLを準備する
        $sql = "DELETE FROM cart WHERE cart_id = ?";
        try{
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $id);
            //SQLを実行
            $rt = $stmt->execute();
        }
        catch(PDOException $e){
            echo "DELETE ERROR";
            exit($e->getMessage());
            // return $e->getMessage();
        }
        return $rt;
    }
}
?>