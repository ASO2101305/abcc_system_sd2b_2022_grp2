<?php
class Tbl_Cart{
    public $client_id;
    public $product_id;
    /* 以下はitemテーブルとの複合検索時に使用するフィールド */
    public $cart_id;
    // public $itemid; テーブルのカラムと重複
    public $product_name;
    public $product_price;
    public $source;
}
?>