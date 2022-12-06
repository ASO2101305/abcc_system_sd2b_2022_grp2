<?php
    require_once "sessioncheck.php";
    require_once "DBManager";
    class search_result{
        public function search($getpdcname){
            $dbmng = new DBManager;
            $pdo = $dbmng->dbConnect();
            $sql = "SELECT * FROM shohin WHERE shohin_name LIKE '%$getpdcname%'";
            $result = $pdo -> query($sql);

            if(!$result) {
                echo $pdo->error;
                exit();
            }

            //連想配列で取得
            $rows = array();
            while($row = $result->fetchAll()){
                $rows[] = $row;
            }

            //結果セットを解放
            $result->free();

            return $rows[];
        }
    }
?>