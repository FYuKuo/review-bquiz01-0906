<?php
include('./base.php');
$ch = $Admin->find(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
if(empty($ch)){
    alert('帳號或密碼錯誤');
    header("refresh:0,url='../index.php?do=login'");
}else{
    $_SESSION['admin'] = $_POST['acc'];
    to('../back.php');
}
?>