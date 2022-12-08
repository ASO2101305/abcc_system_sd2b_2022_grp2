<?php
require_once 'DBManager.php';
class Favorit{
    public function InsertFavoritDB($getflag,$getclient,$getproduct){
        $dbmng = new DBManager;
        $pdo = $dbmng-> dbConnect();
        if($_POST['flag'] == "INSERT"){
            $sql = "INSERT INTO favorit(favorit_id,client_id,product_id) VALUES (1,$getclient,$getproduct)";
            $ps=$pdo->prepare($sql);
            $ps->execute();
        }else{
            $sql = "DELETE FROM favorit WHERE product_id = $getproduct"; 
            $ps=$pdo->prepare($sql);
            $ps->execute();
        }
    }
    public function SelsectFavoritPdc(){
        $dbmng = new DBManager;
        $pdo = $dbmng-> dbConnect();
        $sql = "SELECT * FROM favorit";
        $ps = $pdo->prepare($sql);
        $ps->execute();
        $Fitem = $ps->fetchAll();
        return $Fitem;
}
}


?>