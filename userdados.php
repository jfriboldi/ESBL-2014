<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$userid = $_POST['userid'];

$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");

$sql = mysqli_query($con, "select * from users where id = '$userid'");



while($res = $sql->fetch_assoc()){
    
echo'<div class="col-md-10 padding-user">
    <img src="/esbl/imgs/edit.png" id="foto">
    Nick: <input type="text" name="nick" disabled value="'.$res[nick].'"><p>
   Nome: <input type="text" name="nome" disabled value="'.$res[nome].'"><p>
       Sobrenome: <input type="text" name="sobrenome" disabled value="'.$res[sobrenome].'"><p>
           cpf: <input type="text" name="cpf" disabled value="'.$res[cpf].'"><p>
               Nascimento: <input type="text" name="nasc" disabled value="'.$res[nasc].'"><p>
                   E-mail: <input type="text" name="mail" disabled value="'.$res[mail].'"><p>
                       Telefone: <input type="text" name="tel" disabled value="'.$res[tel].'"><p>
                           Endereço: <input type="text" name="endereco" disabled value="'.$res[endereco].'"><p>
                               Cidade: <input type="text" name="cidade" disabled value="'.$res[cidade].'"><p>
                                   cep: <input type="text" name="cep" disabled value="'.$res[cep].'"><p>
                                       Nº: <input type="text" name="num" disabled value="'.$res[num].'"><p>
                                           Bairro: <input type="text" name="bairro" disabled value="'.$res[bairro].'"><p>
                                               Complemento: <input type="text" name="complemento" disabled value="'.$res[complemento].'"><p>
                                                  Estado: <input type="text" name="uf" disabled value="'.$res[uf].'">
        </div>';
      

    
}