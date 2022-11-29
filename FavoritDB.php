<?php
require_once 'DBManager.php';
require_once 'list.php';
$dbmng = new DBManager();

public function FavoritDB($getflag,$getclient,$getproduct){
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
?>