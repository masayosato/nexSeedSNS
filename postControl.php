<?php
require 'models/PostDataDAO.php';
require 'models/UserDataBean.php';

session_start();

//セッションの存在確認
try{
    if(!$_SESSION){
        throw new Exception();
    }
}catch (Exception $e){
    $_SESSION["errMessage"]="システムの不具合が発生しました。";
    header('Location: views/err.php');
}

//menuの分岐処理
if(isset($_GET["menu"])){
    if(strcmp($_GET["menu"], "logout")==0){
        logout();
        header('Location:views/login.php');
    }else if(strcmp($_GET["menu"], "myPage")==0){
        $_SESSION["u_msg"]="";
        $_SESSION["postDataList"]=myPage($_SESSION["user"]);
        header('Location:  views/myPage.php');
    }else if(strcmp($_GET["menu"], "newPost")==0){
        $_SESSION["u_msg"]="";
        header('Location:  views/newPost.php');
    }else if(strcmp($_GET["menu"], "myFriend")==0){
        $_SESSION["u_msg"]="";
        $_SESSION["postDataList"]=myFriend();
        header('Location:  views/myFriend.php');
    }else if(strcmp($_GET["menu"], "postDelete")==0){
        $_SESSION["u_msg"]="";
        postDelete($_GET["p_id"]);
        $_SESSION["postDataList"]=myPage($_SESSION["user"]);
        header('Location:  views/myPage.php');
    }else if(strcmp($_GET["menu"], "addNice")==0){
        $_SESSION["u_msg"]="";
        addNice($_GET["p_id"],$_GET["p_nice"]);
        $_SESSION["postDataList"]=myFriend($_SESSION["user"]);
        header('Location:  views/myFriend.php');
    }

//cmdの分岐処理
}else if(isset($_POST["cmd"])){
    if(strcmp($_POST["cmd"], "myPage")==0){
        $_SESSION["u_msg"]="";
        $_SESSION["postDataList"]=myPage($_SESSION["user"]);
        header('Location:  views/myPage.php');
    }elseif (strcmp($_POST["cmd"], "newPost")==0){
        $_SESSION["u_msg"]="";
        newPost(objPost($_SESSION["user"]));
        $_SESSION["postDataList"]=myPage($_SESSION["user"]);
        header('Location:  views/myPage.php');
    }
}else{
    logout();
    header('Location: views/login.php');
}

//newPost画面の入力データをPostDataBean型のオブジェクトにする
function objPost(UserDataBean  $user){
    $postData = new PostDataBean();
    $postData->setU_id($user->getU_id());
    $postData->setU_nickname($user->getU_nickname());
    $postData->setP_date(date("Y/m/d"));
    $postData->setP_title($_POST["p_title"]);
    $postData->setP_text($_POST["p_text"]);
    return $postData;
}

// NewPost登録処理
function newPost(postDataBean $postData){
    $pdao= new PostDataDAO();
    $pdao->newPost($postData);
}

// MyPage処理
function myPage(UserDataBean $user){
    $pdao= new PostDataDAO();
    $postDataList=$pdao->myPostList($user);
    return $postDataList;
}

// MyFriend処理
function myFriend(){
    $pdao= new PostDataDAO();
    $postDataList=$pdao->myPostAllList();
    return $postDataList;
}

// Deleteアイコンクリック時処理(myPage画面で有効）
function postDelete($p_id){
    $pdao= new PostDataDAO();
    $pdao->postDelete($p_id);
}

// Niceアイコンクリック時処理(myFriend画面で有効）
function addNice($p_id,$p_nice){
    $pdao= new PostDataDAO();
    $pdao->addNice($p_id,$p_nice);
}

// ログアウト処理
function logout(){
    $_SESSION = array();
    if (isset($_COOKIE["PHPSESSID"])) {
        setcookie("PHPSESSID", '', time() - 1800, '/');
    }
    if(!isset($_SESSION)){
        session_destroy();
    }
}
?>