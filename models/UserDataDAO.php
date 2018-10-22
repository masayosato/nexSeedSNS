<?php
require 'DBConn.php';
require 'UserDataBean.php';

class UserDataDAO extends  DBConn{
    //認証処理
    public function loginUser(UserDataBean $user){
            //リクエストパラメータ$userオブジェクトのフィールド値をキーにUserDataDBからデータを取得する処理
            try {
                $stmt=$this-> db->prepare("select * from UserData where U_USERID=? ");
                $stmt->execute(array($user->getU_userid()));
                if($row = $stmt->fetch()){
                    $user->setU_id($row["U_ID"]);
                    $user->setU_userid($row["U_USERID"]);
                    $user->setU_pass($row["U_PASS"]);
                    $user->setU_name($row["U_NAME"]);
                    $user->setU_nickname($row["U_NICKNAME"]);
                }else{
                    $user=null;
                }
            } catch(PDOException $e) {
                    parent::dbErr();
            }
        return $user;
    }
}