<?php
include('./base.php');
$DB = new DB($_POST['table']);
$data = $DB->find($_POST['id']);

if(isset($_FILES['img']['tmp_name']) && $_FILES['img']['error'] == 0){
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
    $data['img'] =  $_FILES['img']['name'];
}


$DB->save($data);
to("../back.php?do={$_POST['table']}");
?>