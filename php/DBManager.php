<?php 
    class DBManager{
        public function dbConnect(){
            
            $pdo = new PDO('mysql:host=mysql209.phy.lolipop.lan;dbname=LAA1417875-wbdb;charset=utf8','LAA1417875','Pass0114');
            return $pdo;
        }
        
        public function checkLoginByMailAndPass($mail,$pass){
            $ret = [];
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM Client WHERE mailaddress = ? AND client_password = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$mail,PDO::PARAM_STR);
            $ps->bindValue(2,$pass,PDO::PARAM_STR);
            $ps->execute();
            $userList = $ps->fetchAll();
	     return $userList;
        }

        public function PdcList($pdo){
            $sql = "SELECT * FROM shohin";
            $selectdata = $pdo->query($sql);
            return $selectdata;
        }

        //注文履歴入れるやつ
        public function InsertHistory($client_id,$product_id,$maker_id,$num){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO order_log(order_id,client_id,product_id,maker_id,order_date,order_num)
            VALUES(?,?,?,?,?,?)";
            $ps = $pdo->prepare($sql);
            $dayStr = date("Y/m/d");
            //件数を下のクラスから持ってくる
            $ps->bindValue(1,MAX(order_id)+1,PARAM_INT);//order_idを1から順に入れる方法がわからん
            $ps->bindValue(2,$client_id,PARAM_INT);
            $ps->bindValue(3,$product_id,PARAM_INT);
            $ps->bindValue(4,$maker_id,PARAM_INT);
            $ps->bindValue(5,$dayStr,PARAM_STR);
            $ps->bindValue(6,$num,PARAM_INT);
            $ps->execute();
        }

        public function DBCount(){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM order_log";
            $sth = $pdo -> query($sql);
            $count = $sth -> rowCount();
            return $count;
        }
    }
?>