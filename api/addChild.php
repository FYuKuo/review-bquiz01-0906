<?php
include('./base.php');
$DB = new DB($_POST['table']);

if(isset($_POST['id'])){

    foreach ($_POST['id'] as $key => $id) {
        
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $DB->del($id);
        }else{
            $data = $DB->find($id);
            $data['text'] = $_POST['text'][$key];
            $data['href'] = $_POST['href'][$key];
            $DB->save($data);
        }
    }

}


if(isset($_POST['addtext'])){
    $data = [];

    foreach ($_POST['addtext'] as $key => $addtext) {
        
        $data['text'] = $_POST['addtext'][$key];
        $data['href'] = $_POST['addhref'][$key];
        $data['sh'] = 1;
        $data['parent'] = $_POST['parentId'];

        $DB->save($data);
        // dd($data);
    }

}

to("../back.php?do={$_POST['table']}");
?>