<?php
// Verificação do  login
if(isset($_POST["email"])){

    // Verificação do campo de email 
    if(strlen($_POST["email"]) == 0){
        echo "<code>Insira o email para cadastrado</code>";
    }
    else{
        include("conn.php");
        $email = $_POST["email"];
        $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql_query = $mysqli->query($sql_code) or die("Erro ao logar!");
        
        $quantidade = $sql_query->num_rows;
        if($quantidade == 1){

            recuperar_senha($email);

        }
        // Caso tenha mais de 1 resultado no select
        else{
            echo "<code><center>Email inválido!</center></code>";
        }
    }

}
function recuperar_senha($email){
    include("conn.php");
    $novasenha = substr(md5(time()), 0, 6);
    $criptosenha = md5(md5($novasenha));

    if(mail($email, "Requisição de nova senha", "Sua nova senha no momento: ". $criptosenha)){
        $sql_code = "UPDATE usuarios SET senha = $criptosenha WHERE email = '$email'";
        $sql_query = $mysqli->query($sql_code) or die("Erro ao logar!");
        
    }
    
    /*$sql_code = "INSERT INTO recuperacao_senha() '";
    $sql_query = $mysqli->query($sql_code) or die("Erro ao logar!");*/
}   
?>