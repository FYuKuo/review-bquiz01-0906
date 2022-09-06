<?php
$do = ($_GET['do'])??'title';
include('../api/base.php');
?>
<p class="t cent botli"><?= $STR->updateHeader ?></p>
<form action="../api/edit_img.php" method="post" enctype="multipart/form-data">
<table class="aut">
    <tr>
        <td><?= $STR->updateText[0] ?></td>
        <td>
            <input type="file" name="img" id="img">
        </td>
    </tr>
</table>
<div class="cent">
    <input type="hidden" name="table" value="<?=$_GET['do']?>">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>

</form>