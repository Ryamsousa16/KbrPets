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

                }
            }
        }
    }
?>