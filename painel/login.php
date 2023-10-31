<?php
include("conn.php");

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
                
                $sql_code = $sql = "UPDATE usuarios SET ativo = 'Ativo' WHERE email = '$email'";
                $sql_query = $mysqli->query($sql_code) or die("Erro ao logar!");
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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KBRTEC ADMIN</title>

    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <main class="py-5" style="min-height: calc(100vh - 72px);">
        <div class="container">
            <div class="bg-custom mx-auto row col-8 rounded shadow-sm overflow-hidden">
                <div class="col-6 bg-white p-5 d-flex align-items-center justify-content-center">
                    <img src="img/kbrtec.webp" alt="KBRTEC" height="200" width="200" class="object-fit-contain">
                </div>
    
                <div class="col-6 d-flex align-items-center p-5">
                    <form action="" class="form w-100" method="POST">
                        <h2 class="h4 text-light mb-4">Painel Administrativo</h2>
    
                        <div class="row row-gap-3">
                            <div class="col-12 form-group text-light">
                                <label for="email">E-mail:</label>
                                <input type="email" name="email" class="form-control bg-dark border-dark text-light" id="email" placeholder="example@kbrtec.com.br">
                                <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
                            </div>
    
                            <div class="col-12 form-group text-light">
                                <label for="password">Senha:</label>
                                <input type="password" name="password" class="form-control bg-dark border-dark text-light" id="password">
                                <!-- <small class="bg-danger rounded py-1 px-2 mt-1 d-block text-light">Erro</small> -->
    
                                <a href="recuperar-senha.php" class="link-light"><small>Esqueci minha senha</small></a>
                            </div>
    
                            <div class="col-12">
                                <button type="submit" class="btn btn-light mt-3">Entrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-custom text-light text-center py-4">
        <small>© Copyright 2023 - KBR TEC - Todos os Direitos Reservados</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>