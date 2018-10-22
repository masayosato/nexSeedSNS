<?php
require 'DBConn.php';
require 'PostDataBean.php';

class PostDataDAO extends  DBConn{

    // NewPost登録
    public function newPost(PostDataBean $postData){
        try {
            $stmt= $this->db->prepare("INSERT INTO PostData (
                                                                      U_ID,
                                                                      U_NICKNAME,
                                                                      P_DATE,
                                                                      P_TITLE,
                                                                      P_TEXT)VALUES (?,?,?,?,?)");
            $stmt->bindParam(1, $u_id);
            $stmt->bindParam(2, $u_nickname);
            $stmt->bindParam(3, $p_date);
            $stmt->bindParam(4, $p_title);
            $stmt->bindParam(5, $p_text);
            $u_id=$postData->getU_id();
            $u_nickname=$postData->getU_nickname();
            $p_date=$postData->getP_date();
            $p_title=$postData->getP_title();
            $p_text=$postData->getP_Text();
             $count=$stmt->execute();

            if ( $stmt->rowCount() == 0 ) {
                try{
                        throw new Exception();
                }catch (Exception $e){
                        parent::dbErr();
                }
            }

        } catch(PDOException $e) {
            try{
                throw new Exception();
            }catch (Exception $e){
                parent::dbErr();
            }
        }
        return $postData;
    }

    // ログインユーザーのPostData一覧（削除データは含まず）
    public function myPostList(UserDataBean $user){
        try {
            $stmt= $this->db->prepare("select * from PostData where U_ID=? and P_DELETE=0");
            $stmt->execute(array($user->getU_id()));
            $postDataList = array();
            while($row = $stmt->fetch()){
                $postData=new PostDataBean();
                $postData->setP_id($row["P_ID"]);
                $postData->setU_id($row["U_ID"]);
                $postData->setU_nickname($row["U_NICKNAME"]);
                $postData->setP_date($row["P_date"]);
                $postData->setP_title($row["P_TITLE"]);
                $postData->setP_text($row["P_TEXT"]);
                $postData->setP_nice($row["P_NICE"]);
                $postData->setP_delete($row["P_DELETE"]);
                $postDataList[]=$postData;
            }

            if ( $stmt->rowCount() == 0 ) {
                try{
                    throw new Exception();
                }catch (Exception $e){
                    parent::dbErr();
                }
            }

        } catch(PDOException $e) {
            try{
                throw new Exception();
            }catch (Exception $e){
                parent::dbErr();
            }
        }
        return $postDataList;
    }

    // 全PostData一覧（削除データは含まず）
    public function myPostAllList(){

        try {
            $stmt= $this->db->prepare("select * from PostData where  P_DELETE=0");
            $stmt->execute();
            $postDataList = array();
            while($row = $stmt->fetch()){
                $postData=new PostDataBean();
                $postData->setP_id($row["P_ID"]);
                $postData->setU_id($row["U_ID"]);
                $postData->setU_nickname($row["U_NICKNAME"]);
                $postData->setP_date($row["P_date"]);
                $postData->setP_title($row["P_TITLE"]);
                $postData->setP_text($row["P_TEXT"]);
                $postData->setP_nice($row["P_NICE"]);
                $postData->setP_delete($row["P_DELETE"]);
                $postDataList[]=$postData;
            }

            if ( $stmt->rowCount() == 0 ) {
                try{
                    throw new Exception();
                }catch (Exception $e){
                    parent::dbErr();
                }
            }

        } catch(PDOException $e) {
            try{
                throw new Exception();
            }catch (Exception $e){
                parent::dbErr();
            }
        }
        return $postDataList;
    }

    // コメントの取得
    public function commentList(PostDataBean $postData){
        try {
            $stmt= $this->db->prepare("select * from Comment where P_ID=?");
            $stmt->execute(array($postData->getP_id()));
            $commentList = array();
            while($row = $stmt->fetch()){
                $comment=new CommentBean();
                $comment->setP_id($row["P_ID"]);
                $comment->setU_nickname($row["C_NICKNAME"]);
                $comment->setC_Data($row["C_DATA"]);
                $comment->setC_delete($row["C_DELETE INT"]);
                $commentList[]=$comment;
            }

            if ( $stmt->rowCount() == 0 ) {
                try{
                    throw new Exception();
                }catch (Exception $e){
                    parent::dbErr();
                }
            }

        } catch(PDOException $e) {
            try{
                throw new Exception();
            }catch (Exception $e){
                parent::dbErr();
            }
        }
        return $commentList;
    }

    // Post論理削除処理
    public function postDelete( $p_id){
        try {
            $stmt= $this->db->prepare("UPDATE PostData SET
                                                                        P_DELETE=1 WHERE P_ID=?");
            $stmt->execute(array($p_id));

            if ( $stmt->rowCount() == 0 ) {
                try{
                    throw new Exception();
                }catch (Exception $e){
                    parent::dbErr();
                }
            }

        } catch(PDOException $e) {
            try{
                throw new Exception();
            }catch (Exception $e){
                parent::dbErr();
            }
        }
        return;
    }

    // Niceカウント処理
    public function addNice( $p_id,$p_nice){
        try {
            $stmt= $this->db->prepare("UPDATE PostData SET
                                                                        P_Nice=$p_nice+1 WHERE P_ID=?");
            $stmt->execute(array($p_id));

            if ( $stmt->rowCount() == 0 ) {
                try{
                    throw new Exception();
                }catch (Exception $e){
                    parent::dbErr();
                }
            }

        } catch(PDOException $e) {
            try{
                throw new Exception();
            }catch (Exception $e){
                parent::dbErr();
            }
        }
        return;
    }
}
