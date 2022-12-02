<?php
require_once 'SearchProduct.php';
$pdo = $dbmng->dbConnect();
$items = $pdo -> search($_POST['pdcname']);
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <link rel="stylesheet" href="./css/pcStyle.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
        <div>
            <form action="SearchProduct.php" method="post">
                <ul class="header-menu">
                    <li class="menu-item">
                        <a href=./ProductList.html><p>Work<br>buddy</p></a>
                    </li>
                    <li class="menu-item">
                        <input type="text" name="pdtname">
                    </li>
                    <li class="menu-item">
                        <input type="submit" value="探す">
                    </li>
                    <li class="menu-item">
                        <input type="submit" value="ログアウト">
                    </li>
                </ul>
            </form>
        </div>
        <div>
            <label class="model-box">
                <?php 
                    foreach($items as $i){
                ?>
                <div class="container">
                    <div class="item-src" src=<?= $i->source; ?>></div>
                    <div class="item-name"><?= $i->product_name; ?></div>
                    <div class="item-detail"><?= $i->function_detail; ?></div>
                    <div class="item-price"><?= $i->product_price; ?></div>
                </div>
                <?php
                    }
                ?>
            </label>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="./js/model.js"></script>
    </body>
</html>