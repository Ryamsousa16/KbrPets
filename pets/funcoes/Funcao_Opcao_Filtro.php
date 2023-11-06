<?php
    include("../painel/conn.php");

    // Iniciando a barra de opções
    echo'
        <div class="form-group py-2">
            <label for="especie" class="text-capitalize text-light">Espécie</label>
            <select name="especie" id="especie" class="form-control form-select">
                <option value="" selected disabled>Selecione</option>';
        
    // Selecionando todas as espécies diferentes da tabela animais_adocao
    $sql = "SELECT DISTINCT especie FROM animais_adocao";
    $result = $mysqli->query($sql);
    
    // Caso tenha algum resultado
    if ($result) {

        // Para cada resultado distindo, crie uma opção com o valor dessa espécie
        while ($row = $result->fetch_assoc()) {

            echo '<option name="'.$row['especie'].'">'.$row['especie'].'</option>';

        }

        // Fechando a barra de opções
        echo'      
            </select>
        </div>';
    }
    // Caso não tenha nenhuma espécie, aparece a opção vazia
    else{
        echo'
        <div class="form-group py-2">
            <label for="especie" class="text-capitalize text-light">Espécie</label>
            <select name="especie" id="especie" class="form-control form-select">
                <option value="" selected disabled>Selecione</option>
            </select>
        </div>';
    }
    
    // Iniciando a barra de opções
    echo'
        <div class="form-group py-2">
            <label for="raca" class="text-capitalize text-light">Raça</label>
            <select name="raca" id="raca" class="form-control form-select">
                <option value="" selected disabled>Selecione</option>';
        
    // Selecionando todas as raças diferentes da tabela animais_adocao
    $sql = "SELECT DISTINCT raca FROM animais_adocao";
    $result = $mysqli->query($sql);
    
    // Caso tenha algum resultado
    if ($result) {

        // Para cada resultado distindo, crie uma opção com o valor dessa raça
        while ($row = $result->fetch_assoc()) {

            echo '<option name="'.$row['raca'].'">'.$row['raca'].'</option>';
        }

        // Fechando a barra de opções
        echo'      
            </select>
        </div>';
    }
    // Caso não tenha nenhuma raça, aparece a opção vazia
    else{
        echo'
        <div class="form-group py-2">
            <label for="raca" class="text-capitalize text-light">Raça</label>
            <select name="raca" id="raca" class="form-control form-select">
                <option value="" selected disabled>Selecione</option>
            </select>
        </div>';
    }

    // Iniciando a barra de opções
    echo'
        <div class="form-group py-2">
            <label for="porte" class="text-capitalize text-light">porte</label>
            <select name="porte" id="porte" class="form-control form-select">
                <option value="" selected disabled>Selecione</option>';

    $sql = "SELECT DISTINCT porte FROM animais_adocao";
    $result = $mysqli->query($sql);
    
    // Caso tenha algum resultado
    if ($result) {

        // Para cada resultado distindo, crie uma opção com o valor do porte
        while ($row = $result->fetch_assoc()) {


            echo '<option name="'.$row['porte'].'">'.$row['porte'].'</option>';
        }

        // Fechando a barra de opções
        echo'      
            </select>
        </div>';
    }

    // Caso não tenha nenhum porte, aparece a opção vazia
    else{
        echo'
        <div class="form-group py-2">
            <label for="porte" class="text-capitalize text-light">porte</label>
            <select name="porte" id="porte" class="form-control form-select">
                <option value="" selected disabled>Selecione</option>
            </select>
        </div>';
    }

    echo'
        <div class="form-group py-2">
            <label for="sexo" class="text-capitalize text-light">sexo</label>
            <select name="sexo" id="sexo" class="form-control form-select">
                <option value="" selected disabled>Selecione</option>
                <option name="Macho" value="M">Macho</option>
                <option name="Fêmea" value="F">Fêmea</option>
            </select>
        </div>';         
?>