<?php

$nick = $_GET['nick'];
$team = $_GET['team'];
$tornid = $_GET['tornid'];

$usuario = "root";
$senha = "";
$banco_de_dados = "esbl";

$logo = '';

$con = mysqli_connect("localhost",$usuario,$senha, $banco_de_dados) or die("Erro ao conectar no banco de dados");



if ($nick)
{

function get_http_response_code($url) {
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}
if ((get_http_response_code('https://br.api.pvp.net/api/lol/br/v1.4/summoner/by-name/'.$nick.'?api_key=f5f5fd59-705a-4b4a-821b-53e663fc0ca9') == "500") || (get_http_response_code('https://br.api.pvp.net/api/lol/br/v1.4/summoner/by-name/'.$nick.'?api_key=f5f5fd59-705a-4b4a-821b-53e663fc0ca9') == "503")) {
    
    $dados['id'][] = array (
            'erro' => "5xx",
        );
    echo json_encode($dados);
}
else {
if(get_http_response_code('https://br.api.pvp.net/api/lol/br/v1.4/summoner/by-name/'.$nick.'?api_key=f5f5fd59-705a-4b4a-821b-53e663fc0ca9') != "404"){
    $json = file_get_contents('https://br.api.pvp.net/api/lol/br/v1.4/summoner/by-name/'.$nick.'?api_key=f5f5fd59-705a-4b4a-821b-53e663fc0ca9');



$encoded = json_decode($json);


$id = $encoded->$nick->id;


if(get_http_response_code('https://br.api.pvp.net/api/lol/br/v2.4/team/by-summoner/'.$id.'?api_key=f5f5fd59-705a-4b4a-821b-53e663fc0ca9') != "404")
                {
$jsn = file_get_contents('https://br.api.pvp.net/api/lol/br/v2.4/team/by-summoner/'.$id.'?api_key=f5f5fd59-705a-4b4a-821b-53e663fc0ca9');



$cabala = json_decode($jsn);



    foreach ($cabala->$id as $value)
    {
            $sql = mysqli_query($con, "select * from equips where nome = '$value->name'");
            
        $row_cnt = $sql->num_rows;
        
        if ($row_cnt > 0) {
            while($res = $sql->fetch_assoc()){
            
                  
                    if ($res['logo'] === 's')
                    {
                    $logo = 's';
                    $tid = $res[id];
                    
                    }
                    else 
                    {
                        $logo = 'n';
                    }
                
                
            }
        }
        else {
            $logo = 'n';
        }
           
     
        $dados['id'][] = array( 
                                                                                                                'team' => $value->name,
                                                                                                                'teamID' => $value->fullId,
                                                                                                                'logo' => $logo,   
                                                                                                                'tid' => $tid,

                );

    }

    echo json_encode($dados);
    }
    else{
        $dados['id'][] = array (
            'erro' => "time",
        );
    echo json_encode($dados);
    }
}
   
    else{
        $dados['id'][] = array (
            'erro' => "nick",
        );
    echo json_encode($dados);
    }
}

}
if ($team)
{

    function get_http_response_code($url) {
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}
    
$sql2 = mysqli_query($con, "select * from instorn where torneioid = '$tornid' and idtime = '$team'");
    
    $row_cnt2 = $sql2->num_rows;
    
    if ($row_cnt2 > 0)
    {
      
        $poa['na'][] = array (
            'erro' => 'cad',
            );
        
    
        $xas = json_encode($poa);
        
        echo $xas;

        
    
    }    
    
    else{
if ((get_http_response_code('https://br.api.pvp.net/api/lol/br/v2.4/team/'.$team.'?api_key=f5f5fd59-705a-4b4a-821b-53e663fc0ca9') == "500") || (get_http_response_code('https://br.api.pvp.net/api/lol/br/v2.4/team/'.$team.'?api_key=f5f5fd59-705a-4b4a-821b-53e663fc0ca9') == "503")){
  
    $poa['na'][] = array (
            'erro' => "5xx",
        );
    echo json_encode($poa);
    
}
else {
$jst = file_get_contents('https://br.api.pvp.net/api/lol/br/v2.4/team/'.$team.'?api_key=f5f5fd59-705a-4b4a-821b-53e663fc0ca9');

$td = json_decode($jst);



    foreach ($td->$team->roster->memberList as $members)
    {
        $mb[] = $members->playerId;
    }

    
    foreach ($mb as $pname)
    {
        $img = '';
        $idu = '';
        $mail = '';
        
        $js = file_get_contents('https://br.api.pvp.net/api/lol/br/v1.4/summoner/'.$pname.'?api_key=f5f5fd59-705a-4b4a-821b-53e663fc0ca9');
        
        
        
       $pzt = json_decode($js);
       
       $nicklol = $pzt->$pname->name;
       
       $sql3 = mysqli_query($con, "select * from users where nicklol = '$nicklol'");
        
        while($res3 = $sql3->fetch_assoc()){
            
           $img = $res3['img'];  
           $idu = $res3['id'];
           $mail = $res3['mail'];
            
        }
        
       $poa['na'][] = array (
            'nick' => $pzt->$pname->name,
            'img' => $img,
            'idu' => $idu,
            'mail' => $mail,
           
            
        );
       
       
    }
    
  $xas = json_encode($poa);
  echo $xas;
}
    }
}




    
        
    