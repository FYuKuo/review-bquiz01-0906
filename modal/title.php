<?php
$do = ($_GET['do'])??'title';
include('../api/base.php');
?>
<p class="t cent botli"><?= $STR->addHeader ?></p>
<form action="../api/add.php" method="post" enctype="multipart/form-data">
<table class="aut">
    <tr>
        <td><?= $STR->addText[0] ?></td>
        <td>
            <input type="file" name="img" id="img">
        </td>
    </tr>
    <tr>
        <td><?= $STR->addText[1] ?></td>
        <td>
            <input type="text" name="text" id="text">
        </td>
    </tr>
</table>
<div class="cent">
    <input type="hidden" name="table" value="<?=$_GET['do']?>">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>

</form>