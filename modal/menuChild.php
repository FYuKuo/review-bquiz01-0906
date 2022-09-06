<?php
$do = ($_GET['do'])??'title';
include('../api/base.php');
?>
<p class="t cent botli"><?= $STR->updateHeader ?></p>
<form action="../api/addChild.php" method="post">
<table class="aut cent myTable">
    <tr>
        <td><?= $STR->updateText[0] ?></td>
        <td><?= $STR->updateText[1] ?></td>
        <td>刪除</td>
    </tr>
    <?php
    $rows = $Menu->all(['parent'=>$_GET['id']]);
    foreach ($rows as $key => $row) {
    ?>
        <tr>
        <td>
            <input type="text" name="text[]" id="text" style="width: 80%;" value="<?=$row['text']?>">
        </td>
        <td>
            <input type="text" name="href[]" id="href" style="width: 80%;" value="<?=$row['href']?>">
        </td>
        <td>
            <input type="checkbox" name="del[]" id="del" value="<?=$row['id']?>">
        </td>
        <input type="hidden" name="id[]" value="<?=$row['id']?>">
    </tr>
    <?php
    }
    ?>

</table>
<div class="cent">
    <input type="hidden" name="table" value="<?=$_GET['do']?>">
    <input type="hidden" name="parentId" value="<?=$_GET['id']?>">
    <input type="submit" value="修改確定">
    <input type="reset" value="重置">
    <input type="button" value="<?= $STR->updateText[2] ?>" onclick="add()">
</div>

</form>

<script>
    function add(){
        $('.myTable').append(`<tr>
        <td>
            <input type="text" name="addtext[]" id="addtext" style="width: 80%;">
        </td>
        <td>
            <input type="text" name="addhref[]" id="addhref" style="width: 80%;">
        </td>
        <td>

        </td>
    </tr>`)
    }
</script>