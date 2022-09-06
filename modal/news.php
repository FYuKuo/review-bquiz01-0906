<?php
$do = ($_GET['do'])??'title';
include('../api/base.php');
?>
<p class="t cent botli"><?= $STR->addHeader ?></p>
<form action="../api/add.php" method="post">
<table class="aut">
    <tr>
        <td><?= $STR->addText[0] ?></td>
        <td>
            <textarea name="text" id="text" cols="40" rows="5"></textarea>
        </td>
    </tr>
</table>
<div class="cent">
    <input type="hidden" name="table" value="<?=$_GET['do']?>">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>

</form>