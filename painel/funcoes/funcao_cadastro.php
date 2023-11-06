<?php
include("../painel/conn.php");

// Iniciando a sessão
if(!isset($_SESSION)){
    session_start();
}

// Verificação do  login
if(isset($_POST["email"]) || isset($_POST["senha"]) || isset($_POST["nome"]) || isset($_POST["confSenha"])){
    
    // Verificação do campo do nome
    if(strlen($_POST["nome"]) == 0){
        echo "<code><center>Preencha o campo do nome!</center></code>";
    }

    // Verificação do campo de email 
    else if(strlen($_POST["email"]) == 0){
        echo "<code><center>Preencha o campo do email!</center></code>";
    }
    
    // Verificação do campo da senha
    else if(strlen($_POST["senha"]) == 0){
        echo "<code><center>Preencha o campo da senha!</center></code>";
    }

    // Verificação do campo da confirmação da senha
    else if(strlen($_POST["confSenha"]) == 0){
        echo "<code><center>Preencha o campo da confirmação da senha!</center></code>";
    }

    // Caso os campos estiverem preenchidos
    else{
        // Armazenando nome, email, senha e confsenha preenchidos no formulário
        $nome = $mysqli->real_escape_string($_POST["nome"]);
        $email = $mysqli->real_escape_string($_POST["email"]);
        $senha = $mysqli->real_escape_string($_POST["senha"]);
        $confsenha = $mysqli->real_escape_string($_POST["confSenha"]); 
        
        // Código sql pra verificar o email e a senha
        $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql_query = $mysqli->query($sql_code) or die("Erro ao logar!");

        // Armazenando o número de resultados do select
        $quantidade = $sql_query->num_rows;

        // Verificando se o email não existe na base de dados
        if($quantidade == 0){

            // Verificando se as senhas são idênticas
            if ($senha === $confsenha) {

                // Comando de insert na base de dados
                $sql_code = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha');";
                $sql_query = $mysqli->query($sql_code) or die("Erro ao logar!");
                
                header("Location: painel.php");
            }
            else{
                echo "<code><center>As senhas são incompatíveis!</center></code>";
            } 

        }
        // Caso tenha mais de 1 resultado no select
        else{
            echo "<code><center>Esse email já está cadastrado!</center></code>";
        }
    }
}
?>