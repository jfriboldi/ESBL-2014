<?php

$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");



$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = 'uploads';   //2

$_FILES['file']['name'] = $_POST['filename'];
$userimg = $_POST['userimg'];
$userid = $_POST['userid'];

if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6

    if ($userimg == 's') {
            
    $sql = mysqli_query($con, "UPDATE users SET img = '1' where id = '$userid'");
    $_SESSION['img'] = '1';
    }
}
?>     
