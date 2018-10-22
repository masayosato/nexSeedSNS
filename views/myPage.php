<?php

include 'header.php';
include 'menu.php';

echo <<< EOM
    <div class="textC"><hr class="center"><h3>MyPage</h3><hr class="center"></div>
    <div class="textC">Delete with  <img  src="../common/delete.png"  width="25px" height="25px"> button ! </div>
EOM;

if(empty($_SESSION["postDataList"])){
    $_SESSION["errMessage"]="システムの不具合が発生しました。";
    header('Location: err.php');
}else{
    foreach ( $_SESSION["postDataList"] as $postData){
        echo <<< EOM
            <table id="tableCenter"><th><td>
                <p class="textR"><a href="../postControl.php?menu=postDelete&p_id={$postData->getP_id()}"><img  src="../common/delete.png"></a></p>
                <b>{$postData->getP_date()}</b><br>
                <b>{$postData->getP_title()}</b><br>
                {$postData->getP_text()}<br>
                <img  src="../common/nice.png">{$postData->getP_nice()}
           </td></th></table>
            <div id="space02"></div>
EOM;
    }
}
include 'footer.html';
?>
