<?php
include("../painel/conn.php");

// Se existir o codigo do animal na url
if (isset($_GET['cod'])){

    // Armazenando o código do animal
    $cod_animal = $_GET['cod'];

    // Fazendo um select e conferindo a existência do animal
    $sql_code = "SELECT * FROM animais_adocao WHERE codigo_animal = $cod_animal";               
    $sql_query = $mysqli->query($sql_code) or die("Erro! ");

    // Pegando todos os dados que foram retornados do select
    $animal = $sql_query->fetch_assoc();

    // Armazenando todos os dados do animal selecionado
    $nome_animal = $animal["nome_animal"];
    $localidade  = $animal["localidade"];
    $sexo = $animal["sexo"];
    $especie = $animal["especie"];
    $raca  = $animal["raca"];
    $descricao = $animal["descricao"];
    $idade = $animal["idade"];
    $peso  = $animal["peso"];
    $porte = $animal["porte"];

    // Fazendo um select de todas as imagens do animal
    $sql_code2 = "SELECT * FROM imagens WHERE animal_id = $cod_animal";               
    $sql_query2 = $mysqli->query($sql_code2) or die("Erro! ");

    // Contando quantas imagens foram retornadas
    $quantidade = $sql_query2->num_rows;

    // Mostrando a Navbar
    echo'
    <nav aria-label="breadcrumb" class="p-3 bg-custom-light">
        <div class="container">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item fs-sm"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item fs-sm"><a href="quero-adotar.php">Quero Adotar</a></li>
                <li class="breadcrumb-item active fs-sm" aria-current="page">'.$nome_animal.'</li>
            </ol>
        </div>
    </nav>

    <section class="bg-light py-5">
        <div class="container mb-5">
            <div class="row align-items-start">';

            // Conferindo se há mais de uma imagem, se sim, mostre todas as imagens que há
            if($quantidade > 1){
                // Inicialize uma lista vazia para armazenar os códigos
                $lista_url = array(); 
    
                // Loop através dos resultados e adicione os códigos à lista
                while ($row = $sql_query2->fetch_assoc()) {
                    $lista_url[] = $row["nome_arquivo"];

                }

                // Exibindo  dos cards à esquerda com as fotos do animal
                echo'
                    <div class="col-8 d-flex">
                        <div class="col-3 d-flex flex-wrap row-gap-3">';
                            
                            // Para cada imagem do animal, exiba dentro do card
                            for($i = 0; $i < $quantidade - 1; $i++){
                                echo 
                                '
                                    <div class="col-12 rounded overflow-hidden">
                                        <img src="img/'.$lista_url[$i].'" alt="'.$nome_animal.'" class="object-fit-cover w-100" height="120">
                                    </div>
                                ';}

                        // Exibindo a Foto principal do animal
                        echo'
                        </div>
                        <div class="col-8 d-flex">
                            <div class="col-9 rounded overflow-hidden">
                                <img src="img/'.$lista_url[$i].'" alt="'.$nome_animal.'" class="object-fit-cover w-100 ms-3" height="530">
                            </div>
                        </div>
                    </div>';
                }

            // Se tiver apenas uma foto do animal
            else{
                $imagem = $sql_query2->fetch_assoc();
                $url = $imagem['nome_arquivo'];

                echo'
                <div class="col-8 d-flex">
                    <div class="col-3 d-flex flex-wrap row-gap-3"></div>
                        <div class="col-8 d-flex">
                            <div class="col-9 rounded overflow-hidden">
                                <img src="img/'.$url.'" alt="'.$nome_animal.'" class="object-fit-cover w-100 ms-1" height="530" >
                            </div>
                        </div>
                    </div>';
            }
            echo'
            <div class="py-3 col-4 d-flex flex-wrap row-gap-3">                   
                <h2 class="col-12 d-flex align-items-center gap-2">
                    '.$nome_animal.'';

                    // Se o sexo do animal for masculino, mostre o símbolo masculino
                    if($sexo == 'M'){
                        echo'
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16">
                            <path fill="#006AB0" fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"/>
                        </svg>';
                    }

                    // Senão, mostre o símbolo feminino
                    else{
                        echo'
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16">
                            <path fill="#FF7373" fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z"/>
                        </svg>';
                    }

                    // Exibindo as características e descrições do animal
                    echo '
                </h2>

                <div class="col-12">
                    <h3 class="fs-sm destaque m-0">Código</h3> 
                    <div>'.$cod_animal.'</div>
                </div>

                <div class="col-6">
                    <h3 class="fs-sm destaque m-0">Espécie</h3> 
                    <div>'.$especie.'</div>
                </div>

                <div class="col-6">
                    <h3 class="fs-sm destaque m-0">Porte</h3> 
                    <div>'.$porte.'</div>
                </div>

                <div class="col-12">
                    <h3 class="fs-sm destaque m-0">Raça</h3> 
                    <div>'.$raca.'</div>
                </div>

                <div class="col-6">
                    <h3 class="fs-sm destaque m-0">Peso</h3> 
                    <div>'.$peso.'</div>
                </div>

                <div class="col-6">
                    <h3 class="fs-sm destaque m-0">Idade</h3> 
                    <div>'.$idade.'</div>
                </div>

                <div class="col-12">
                    <h3 class="fs-sm destaque m-0">Local</h3> 
                    <div>'.$localidade.'</div>
                </div>
                
                <div class="col-12">
                    <h3 class="fs-sm destaque m-0">Sobre</h3> 
                    <div>'.$descricao.'</div>
                </div>

                <!-- Botão para redirecionar para a doação -->
                
                <div class="col-12">
                    <a href="formulario.php" class="btn btn-custom mt-5 w-100 d-flex align-items-center justify-content-center gap-2">
                        Solicitar adoção

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </section>';}
    else{
        echo 'Erro de conexão, estamos trabalhando pra arrumar!';
    }

?>