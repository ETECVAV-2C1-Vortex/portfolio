<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
  
    <style>
       body{
        margin:0;
       }
       
       .head{

            color: white;
            height: 96px;
            background-color:#051db0 ;
            
            text-align: center;
            display:flex;
            align-items:center;
            justify-content:center;

            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px; 

            }

        .navb{
            height:48px;
            background-color:#00acb0; 

            text-align:center;
             display:flex;
            align-items:center;
            justify-content:center;
            gap:10px;

        }
        .navb a{
            color:white;
            text-decoration:none;

            font-family:Arial;
            font-size:18px;

            width:80px;
        
        }
        .navb a:hover{
            color:#051db0;
            font-weight:bold;
        }





@media(min-width:600px){

        .head{
        height: 120px;
        font-size: 18px; 
        }

        .navb{
        height:56px;
        gap:32px;
      
        }
       


}


    </style>


    <title>Gerenciador</title>
</head>
<body>

<div class="head">
<h1>Gerenciador de Farmácia</h1>
</div>
<div class="navb">
    <a href="./index.php">Visualizar</a>
    <a href="./cadastro.php">Inserir</a>
    <a href="./editar.php">Editar</a>
    <a href="./excluir.php">Deletar</a>
</div>


    



