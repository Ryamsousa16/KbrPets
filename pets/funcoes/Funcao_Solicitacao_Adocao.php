<?php
    include("../painel/conn.php");
    
    // Verificação do form de solicitação do animal
    if(isset($_POST["solicitante"]) || isset($_POST["cpf"]) || isset($_POST["email"]) 
    || isset($_POST["cel"]) || isset($_POST["nascimento"])){
        
        // Verificação do campo do solicitante
        if(strlen($_POST["solicitante"]) == 0){
            echo "<code><center>Preencha o campo do nome!</center></code>";
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
            echo "<code><center>Preencha o campo da sua data de nascimento: aaaa/mm/dd</center></code>";
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

                // Se o nome inserido for o mesmo do cadastro
                if ($nome_resultado["nome"] === $nome_preenchido){   

                    $nome_dono = $_POST["solicitante"];
                    $animal = $_GET["nome_animal"];
                    $email_dono = $_POST["email"];
                    $cpf_dono = $_POST["cpf"];
                    $cel_dono = $_POST["cel"];
                    $nascimento_dono = $_POST["nascimento"];
                    
                    // Inserindo o animal na lista de animais em processo de adoção
                    $sql_code = "INSERT INTO solicitacao_adocao (nome_dono, nome_animal, cpf, email_dono, telefone, data_nascimento)
                                 VALUES ('$nome_dono', '$animal', '$cpf_dono', '$email_dono','$cel_dono','$nascimento_dono');";
                    $sql_query = $mysqli->query($sql_code) or die("Erro!");

                    // Atualizando o status do animal para Desativado
                    $cod_animal = $_GET["cod"];
                    $sql_code = "UPDATE animais_adocao SET ativo = 'Desativado' WHERE codigo_animal = '$cod_animal'";
                    $sql_query = $mysqli->query($sql_code) or die("Erro!");

                    // Mostrando a mensagem de aprovação da adoção e redirecionando para a página index.html
                    echo "<center>Animal aprovado para adoção!</center>

                    <script>
                        setTimeout(function() {
                            window.location.href = 'index.html';
                        }, 5000); 
                    </script>
                    ";
                }
            }
        }
    }
?>