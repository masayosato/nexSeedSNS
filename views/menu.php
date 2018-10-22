<?php
require '../models/UserDataBean.php';
require '../models/PostDataBean.php';
require '../models/CommentBean.php';

session_start();

if(isset($_SESSION["user"])){
    $u_name=$_SESSION["user"]->getU_name();
}else{
    $_SESSION["errMessage"]="システムの不具合が発生しました。";
    header('Location: err.php');
}

 echo <<< EOM
    <table><tr>
        <td class="navi">
                <a href="../postControl.php?menu=myPage">MyPage</a>
                &nbsp;|&nbsp;<a href="../postControl.php?menu=newPost">NewPost</a>
                &nbsp;|&nbsp;<a href="../postControl.php?menu=myFriend">MyFriend</a>
        </td>
        <td class="navi">
               <p class="textR">UserName：{$u_name}
                &nbsp;&nbsp;
               <a href="../postControl.php?logout">ログアウト</a>
      </td></tr></table>
EOM;
