<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $STR->header ?></p>
    <form method="post" action="./api/update.php">
        <table width="50%" class="cent aut">
            <tbody>
                <tr >
                    <?php
                $DB = new DB($_GET['do']);
                    ?>
                    <td width="50%" class="yel"><?= $STR->text[0] ?></td>
                    <td width="50%"><input type="text" name="text" id="text" value="<?=$DB->find(1)['text']?>"></td>

                </tr>

            </tbody>
        </table>

        <table style="margin-top:40px; width:50%;" class="aut">
            <tbody>
                <tr>
                    <td class="cent" colspan="2">
                         <input type="hidden" name="table" value="<?=$_GET['do']?>">
                         <input type="hidden" name="id" value="1">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>