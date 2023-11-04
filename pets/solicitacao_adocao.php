<?php
    include("../painel/conn.php");
    
    // Verificação do form de solicitação do animal
    if(isset($_POST["solicitante"]) || isset($_POST["cpf"]) || isset($_POST["email"]) 
    || isset($_POST["cel"]) || isset($_POST["nascimento"]) || isset($_POST["animal"])){
        
        // Verificação do campo do solicitante
        if(strlen($_POST["solicitante"]) == 0){
            echo "<code><center>Preencha o campo do nome!</center></code>";
        }

        // Verificação do campo do nome do animal
        else if(strlen($_POST["animal"]) == 0){
            echo "<code><center>Preencha o campo do nome do animal  </center></code>";
        }
    
        // Verificação do campo do email
        else if(strlen($_POST["email"]) == 0){
            echo "<code><center>Preencha o campo do email!</center></code>";
        }
    
        // Verificação do campo do cpf
        else if(strlen($_POST["cpf"]) !== 11){
            echo "<code><center>Preencha o campo de cpf: 01234567891</center></code>";
        }

        // Verificação do campo do telefone
        else if(strlen($_POST["cel"]) !== 14){
            echo "<code><center>Preencha o campo do seu telefone: (99)01234-5678</center></code>";
        }

        // Verificação do campo da data de nascimento
        else if(strlen($_POST["nascimento"]) == 0){
            echo "<code><center>Preencha o campo da sua data de nascimento: dd/mm/aaaa</center></code>";
        }
    
        // Caso os campos estiverem preenchidos
        else{
            $email = $mysqli->real_escape_string($_POST["email"]);
            $nome_preenchido = $mysqli->real_escape_string($_POST["solicitante"]);
            
            $sql_code = "SELECT nome FROM usuarios WHERE email = '$email'";
            $sql_query = $mysqli->query($sql_code) or die("Erro ao logar!");

            if ($sql_query->num_rows == 0){
                echo "<code><center>Email inválido!</center></code>";
            }
            else{
                $nome_resultado= $sql_query->fetch_assoc();
                if ($nome_resultado["nome"] == $nome_preenchido){   
                    $nome_dono = $_POST["solicitante"];
                    $animal = $_POST["animal"];
                    $email_dono = $_POST["email"];
                    $cpf_dono = $_POST["cpf"];
                    $cel_dono = $_POST["cel"];
                    $nascimento_dono = $_POST["nascimento"];
                    
                    $sql_code = "INSERT INTO solicitacao_adocao (nome_dono, nome_animal, cpf, email_dono, telefone, data_nascimento)
                                 VALUES ('$nome_dono', '$animal', '$cpf_dono', '$email_dono','$cel_dono','$nascimento_dono');";
                    $sql_query = $mysqli->query($sql_code) or die("Erro ao logar!");
                    echo $nascimento_dono;
                }
                    
            }
            /*// Armazenando nome, email, senha e confsenha preenchidos no formulário
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
            }*/
        }
    }
?>