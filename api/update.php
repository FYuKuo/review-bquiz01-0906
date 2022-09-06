<?php
include('./base.php');
$table = $_POST['table'];
unset($_POST['table']);
$DB = new DB($table);
$DB->save($_POST);
to("../back.php?do=$table");
?>