
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        <link rel="stylesheet" href="./css/Style.css" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    </head>
    <body>
        <?php 
        require_once "sessioncheck.php";
        $gokei = 0;
    
    	// $_SESSION["cart"] をループし、カートの商品を表示する。
	    if( isset ( $_SESSION["products"] ) ){
		    foreach( $_SESSION["products"] as $cart ){
            $gokei += $cart["product_price"]
        ?>
            <tr>
                <td class="tc1"><img src="img/thumb2/<?php print( $cart['source'] ); ?>"></td>
                <td class="tc2"><?php print( $cart["product_name"] ); ?>
                (<?php print( $cart["num"] ); ?>個)</td>
                <td class="tc3">&yen;<?php print( $cart["product_price"] ); ?></td>
            </tr>
        <?php
		    }
	    }
        ?>
                <div class="gokei"><?= $gokei; ?></div>
    </body>
</html>