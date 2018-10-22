<?php
require 'models/UserDataDAO.php';

session_start();

//UserIDとPasswordチェック処理
if(!($_POST["cmd"]=="" ) ||  strcmp($_POST["cmd"], "login")==0){
        if(($_POST["userid"] =="")  &&  ($_POST["pass"] =="")){
            loginNg("UserID、Passwordを入力してください。");
        }else{
                $user=loginUser(objUser());
                if($user==null){
                        loginNg("UserIDに誤りがあります。");
                }else{
                        if(strcmp($_POST["pass"],$user->getU_pass())==0){
                            loginOk($user);
                        }else{
                            loginNg("Passwordに誤りがあります。");
                        }
                }
        }
}else{
    header('Location: views/login.php');
}

//ログイン画面から取得した＄_POSTの値をUserDataBean型のオブジェクトにする
function objUser(){
    $user=new UserDataBean();
    $user->setU_userid($_POST["userid"]);
    $user->setU_pass($_POST["pass"]);
    return $user;
}

//DBに登録さているUserIDかの確認処理
function  loginUser(UserDataBean $user){
    $udao= new UserDataDAO();
    $user=$udao->loginUser($user);
    return $user;
}

//認証成功時処理
function loginOk(UserDataBean $user){
    $_SESSION["user"]=$user;
    echo<<<EOM
        <form method="post" action="postControl.php">
            <input type="hidden" name="cmd" value="myPage" />
        </form>
        <script>
            document.forms[0].submit();
        </script>
EOM;
}

//認証失敗時処理
function loginNg($u_msg){
    $_SESSION["u_msg"]=$u_msg;
    $_SESSION["userid"]=$_POST["userid"];
    $_SESSION["pass"]=$_POST["pass"];
    header('Location:views/login.php');
}

//エラー画面遷移処理
function sessionErr(){
    $_SESSION["errMessage"]="システムの不具合が発生しました。";
    header('Location: views/err.php');
}