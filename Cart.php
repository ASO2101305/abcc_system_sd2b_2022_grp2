<?php 
    require_once "sessioncheck.php";
    
    	// $_SESSION["cart"] をループし、カートの商品を表示する。
	if( isset ( $_SESSION["products"] ) ){
		foreach( $_SESSION["products"] as $cart ){
      ?>
                <tr>
                  <td class="tc1"><img src="img/thumb2/<?php print( $cart['image'] ); ?>"></td>
                  <td class="tc2"><?php print( $cart["item_name"] ); ?>
                  (<?php print( $cart["num"] ); ?>個)</td>
                  <td class="tc3">&yen;<?php print( $cart["price"] ); ?></td>
                  <td class="tc4"><a href="item_detail.php?code=<?php print( $cart["item_code"] ); ?>">詳細へ</a></td>
                  <td class="tc5"><a href="cart.php?cmd=del&code=<?php print( $cart["item_code"] ); ?>">削除</a></td>
                </tr>
                <?php
		}
	}
?>