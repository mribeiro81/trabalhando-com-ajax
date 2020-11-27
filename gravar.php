<?php

function processaRequest($array){

    if(isset($array)){
       
       for($i = 0, $size = count($array); $size > $i; $i++){
            $dados_post_recebidos.= ucfirst($array[$i]["name"]).": ".$array[$i]["value"]."<br>";
       }       

      echo $dados_post_recebidos; 
      exit();     
     
    }    

    echo "Não foi possível processar os dados que você enviou.";

}    


switch ($_SERVER['REQUEST_METHOD']) {
    case (("POST") && isset($_POST["camposPost"])):
        processaRequest($_POST["camposPost"]);
        break;

    case (("POST") && isset($_POST["camposPostAjax"])):
        processaRequest($_POST["camposPostAjax"]);
        break;    
    
    case (("GET") && isset($_GET["camposGet"])):
        processaRequest($_GET["camposGet"]);
        break;
}



?>