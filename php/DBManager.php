<?php 
    class DBManager{
        public static function dbConnect(){
            $pdo = new PDO('mysql:lost=localhost,dbname=workbuddydb,charset=utf8','wbdb','abccsd2');
            //$pdo = new PDO('mysql:host=mysql209.phy.lolipop.lan;dbname=LAA1418782-kaihatsu;charset=utf8','LAA1418782','Pass0629');
            return $pdo;
        }
        
        public function checkLoginByMailAndPass($mail,$pass){
            $ret = [];
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM Customer WHERE mail_address = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$mail,PDO::PARAM_STR);
            $ps->execute();
            $userList = $ps->fetchAll();
            foreach($userList as $row){
                if(password_verify($pass, $row['customer_pass']) == true){
                    $ret = $userList;
                }
            }
            return $ret;
        }
    }
?>