<?php
include("../painel/conn.php");

// Iniciando a sessão
if(!isset($_SESSION)){
    session_start();
}

// Verificação do  login
if(isset($_POST["email"]) || isset($_POST["password"])){

    // Verificação do campo de email 
    if(strlen($_POST["email"]) == 0){
        echo "<code><center>Preencha o campo do email</center></code>";
    }

    // Verificação do campo da senha
    else if(strlen($_POST["password"]) == 0){
        echo "<code><center>Preencha o campo da senha</center></code>";
        }

    else{
        // Armazenando email e senha preenchidos no formulário
        $email = $mysqli->real_escape_string($_POST["email"]);
        $senha = $mysqli->real_escape_string($_POST["password"]);

        // Verificando se o email é da kbrtec ou se é usuário comum
        if (strpos($email, "@kbrtec.com.br") !== false) {

            // Código sql pra verificar o email e a senha
            $sql_code = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Erro ao logar!");

            // Armazenando o número de resultados do select
            $quantidade = $sql_query->num_rows;

            // Verificando se o número de resultados do select é igual a 1
            if($quantidade == 1){

                // Armazenando os dados do select 
                $usuario = $sql_query->fetch_assoc();

                // Armazenando o id e nome do usuário e o redirecionando para o painel
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];
                
                // Atualização do estado do usuário para online, ou no caso, ativo 
                $sql_code = $sql = "UPDATE usuarios SET ativo = 'Ativado' WHERE email = '$email'";
                $sql_query = $mysqli->query($sql_code) or die("Erro ao logar!");

                // Redirecionando para a página painel.php
                header("Location: painel.php");

            }
            // Caso tenha mais de 1 resultado no select
            else{
                echo "<code><center>Falha ao logar, email ou senha incorretos!</center></code>";
            }
        }
    echo "<code><center>Acesso Negado!<br></center></code>";
    }
}
?>