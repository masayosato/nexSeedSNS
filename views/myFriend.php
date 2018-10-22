<?php
include 'header.php';
include 'menu.php';

echo <<< EOM
    <div class="textC"><hr class="center"><h3>MyFriend Page</h3><hr class="center"></div>
    <div class="textC">Are you nice?  Let's click the  <img  src="../common/nice.png"  width="25px" height="25px"> button ! </div>
EOM;

if(empty($_SESSION["postDataList"])){
    $_SESSION["errMessage"]="システムの不具合が発生しました。";
    header('Location: err.php');
}else{
    foreach ( $_SESSION["postDataList"] as $postData){
        echo <<< EOM
            <table id="tableCenter"><th><td>
                <p><b>{$postData->getU_nickname()}</b></p>
                <b>{$postData->getP_date()}</b><br>
                <b>{$postData->getP_title()}</b><br>
                {$postData->getP_text()}<br>
                <a href="../postControl.php?menu=addNice&p_id={$postData->getP_id()}&p_nice={$postData->getP_nice()}">
                    <img  src="../common/nice.png"></a>{$postData->getP_nice()}
            </td></th></table>
            <div id="space02"></div>
EOM;
    }
}

include 'footer.html';
?>
