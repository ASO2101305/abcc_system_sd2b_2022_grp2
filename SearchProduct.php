<?php
    class search_result{
        public function search(){
            require_once "sessioncheck.php";

            $search_box = $_POST['?????']; //検索ボックスに入力された文字
            $sql = "SELECT * FROM shohin WHERE shohin_name LIKE '%$search_box%'";
            $result = $mysqli -> query($sql);

            if(!$result) {
                echo $mysqli->error;
                exit();
            }

            //連想配列で取得
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                $rows[] = $row;
            }

            //結果セットを解放
            $result->free();

            return $rows[];
        }
    }
?>