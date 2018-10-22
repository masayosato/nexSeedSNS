<?php
include 'header.php';
include 'menu.php';

echo<<<EOM
<div class="textC"><hr class="center"><h3>NewPost Page</h3><hr class="center"></div>

<form  name="newPost" action="../postControl.php"  method="post">
    <table id="tableCenter">
            <tr><td>Title：</td>
            <td><input type="text"  maxlength="30" size="102" name="p_title" /></td></tr>
            <tr><td>Text：</td>
            <td><textarea name="p_text" rows="10" cols="100" /></textarea></td></tr>
            <td><input type="submit" value="POST"/></td></tr>
     </table>
            <input type="hidden" name=" cmd" value="newPost">
</form>
EOM;
include 'footer.html';
?>

