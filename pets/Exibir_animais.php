<?php
    // Fazendo conexão com o banco de dados
    include("../painel/conn.php");

    // Selecionando somente o código dos animais que estão disponíveis para adoção 
    $sql_code1 = "SELECT codigo_animal FROM animais_adocao WHERE ativo = 'Ativo'";
    $sql_query1 = $mysqli->query($sql_code1) or die("Erro!");

    // Contando quantos resultados ocorreram
    $quantidade = $sql_query1->num_rows;

    // Se houve mais de um resultado
    if ($quantidade > 0) {
        
        // Inicialize uma lista vazia para armazenar os códigos
        $lista_codigos = array(); 
    
        // Loop através dos resultados e adicione os códigos à lista
        while ($row = $sql_query1->fetch_assoc()) {
            $lista_codigos[] = $row["codigo_animal"];

        }
    }

    // Para cada usuário no banco, mostre em ordem de ID
    for ($i = 0; $i < $quantidade; $i++) {

        // Selecionando todos os dados de todos os animais na tabela animais_adocao, um de cada vem
        $sql_code2 = "SELECT * FROM animais_adocao WHERE codigo_animal = $lista_codigos[$i]";               
        $sql_query2 = $mysqli->query($sql_code2) or die("Erro! ");

        // Pegando todos os dados que foram retornados do select
        $animal = $sql_query2->fetch_assoc();

        // Armazenando os dados do animal
        $nome_animal = $animal["nome_animal"];
        $localidade  = $animal["localidade"];
        $sexo = $animal["sexo"];

        // Crie um ID único para cada modal
        $modalID = 'ModalId' . $i; 
        
        // Selecionando somente o nome da imagem do animal  
        $sql_code3 = "SELECT nome_arquivo FROM imagens WHERE animal_id = $lista_codigos[$i]";               
        $sql_query3 = $mysqli->query($sql_code3) or die("Erro! ");

        // Pegando todos os dados que foram retornados do select
        $imagem_animal = $sql_query3->fetch_assoc();

        // Armazenando o endereço da imagem
        $endereco_img = $imagem_animal["nome_arquivo"];
        echo'
            <div class="col-xxl-3 col-4">
                <div class="card rounded overflow-hidden">
                    <a href="integra.php?cod='.$lista_codigos[$i].'">
                        <img src="img/'.$endereco_img.'" alt="'.$nome_animal.'" class="w-100 object-fit-cover" height="320">
                    </a>

                    <div class="p-3">
                        <p class="m-0 fs-sm">Cód. '.$lista_codigos[$i].'</p>

                        <div class="d-flex align-items-center gap-2 mt-2 py-2">
                            <h3 class="h4 m-0">'.$nome_animal.'</h3>';

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

                        echo'
                        </div>

                    <p class="mb-4 fs-md">'.$localidade.'</p>

                    <a href="integra.php?cod='.$lista_codigos[$i].'" class="btn btn-custom-2 d-flex align-items-center justify-content-center gap-2 w-100">
                        Quero Adotar

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
                    </a>
                </div>
            </div>
        </div>';
    }
?>