<?php
include('./base.php');
$DB = new DB($_POST['table']);

if(isset($_POST['id'])){

    foreach ($_POST['id'] as $key => $id) {
        
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $DB->del($id);
        }else{
            $data = $DB->find($id);


            switch ($_POST['table']) {
                case 'title':
                    $data['text'] = $_POST['text'][$key];
                    $data['sh'] = ($_POST['sh'] == $data['id'])?1:0;
            
                break;
            
                case 'ad':
                case 'news':
                    $data['text'] = $_POST['text'][$key];
                    $data['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                break;
            
                case 'mvim':
                case 'image':
                    $data['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                break;
            
                case 'admin':
                    $data['acc'] = $_POST['acc'][$key];
                    $data['pw'] = $_POST['pw'][$key];
                break;
            
                case 'menu':
                    $data['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                    $data['text'] = $_POST['text'][$key];
                    $data['href'] = $_POST['href'][$key];
                break;
            }

            // dd($data);
            $DB->save($data);
        }
    }
    
}

to("../back.php?do={$_POST['table']}");
?>