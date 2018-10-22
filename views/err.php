<?php
include 'header.php';
session_start();
if(isset($_SESSION["errMessage"])){
    $errMessage=$_SESSION["errMessage"];
}else{
    $errMessage="";
}
echo<<<EOM
<div id="menu">
    <div id="space"></div>
    <p class="redText">{$errMessage}<br>ログインからやり直してください。</p>
    <div id="space"></div>
    <form  action="../postControl.php"  method="post">
            <input type="submit" value="システムを終了する"/>
            <input type="hidden" name=" menu" value="logout">
    </form>
</div>
EOM;
include 'footer.html';
?>
