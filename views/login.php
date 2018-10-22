<?php
require '../models/UserDataBean.php';
include 'header.php';

session_start();
if(isset($_SESSION["userid"])) {
    $userid= $_SESSION["userid"];
}else{
    $userid="";
}

if(isset($_SESSION["pass"])) {
    $pass= $_SESSION["pass"];
}else{
    $pass="";
}

if(isset($_SESSION["u_msg"])) {
    $u_msg= '<br><hr class="center"><p id="item" class="redText">'.$_SESSION["u_msg"].'</p>';
}else{
    $u_msg="";
}

echo<<<EOM
<div id="space"></div>
<div class="textC">
<img class="anime_move" src="../common/logo.png">
<div id="space"></div>
<form  action="../loginControl.php"  method="post">
        User ID：<input type="text" name="userid" value="{$userid}" />
        Password：<input type="password" name="pass" value="{$pass}" />
        <input type="hidden" name="cmd" value="login">
        <input type="submit" value="LOGIN"/>
</form>
{$u_msg}
</div>
EOM;
include 'footer.html';
