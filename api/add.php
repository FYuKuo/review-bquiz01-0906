<?php
include('./base.php');
$DB = new DB($_POST['table']);
$data = [];

if(isset($_FILES['img']['tmp_name']) && $_FILES['img']['error'] == 0){
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
    $data['img'] =  $_FILES['img']['name'];
}

if(isset($_POST['text'])){

    $data['text'] = $_POST['text'];
}

switch ($_POST['table']) {
    case 'title':
        $data['sh'] = 0;
    break;

    case 'news':
    case 'ad':
    case 'mvim':
    case 'image':
        $data['sh'] = 1;
    break;


    break;

    case 'admin':
        if($_POST['pw'] == $_POST['pwch']){
            $data['acc'] = $_POST['acc'];
            $data['pw'] = $_POST['pw'];
        }
    break;

    case 'menu':
        $data['href'] = $_POST['href'];
        $data['sh'] = 1;
        $data['parent'] = 0;

    break;
}

if(!empty($data)){
    $DB->save($data);
}
to("../back.php?do={$_POST['table']}");
?>