<?php
    function InsertCart(){
    $id = isset($_POST['id'])? htmlspecialchars($_POST['id'], ENT_QUOTES, 'utf-8') : '';
    $name = isset($_POST['name'])? htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8') : '';
    $price = isset($_POST['price'])? htmlspecialchars($_POST['price'], ENT_QUOTES, 'utf-8') : '';
    $count = isset($_POST['count'])? htmlspecialchars($_POST['count'], ENT_QUOTES, 'utf-8') : '';
    $img = isset($_POST['img'])? htmlspecialchars($_POST['img'], ENT_QUOTES, 'utf-8') : '';

    require_once "sessioncheck.php";
//配列に入れるには、$name,$count,$priceの値が取得できていることが前提なのでif文で空のデータを排除する
    if($name!=''&&$count!=''&&$price!=''){
            $_SESSION['products'][$id]=[
                'name' => $name,
                'img' => $img,
                'count' => $count,
                'price' => $price
            ];
       }
    }
?>