<?php

include("conexao_pesquisa.php");

$nome_dado = filter_input(INPUT_GET, "nome", FILTER_DEFAULT);

if (!empty($nome_dado)) {

    $query = mysqli_query($conexao, "SELECT * FROM dados WHERE id_tag LIKE '%$nome_dado%' LIMIT 5");
    $num = mysqli_num_rows($query);
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $dados[] = ["id" => $row['id_tag'],
                        "name" => $row['nome_tag'],
                        "origem" => $row['origem_tag'],
                        "func" => $row['function_tag'],
                        "ex" => $row['exemplo_tag'],
                        "how" => $row['how_tag']]; 
        }
        $retorna = ['status' => true, 'dados' => $dados];
    } else {
        $retorna = ['status' => false, 'msg' => "Erro: nenhum código encontrado!"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "Erro: nenhum código encontrado"];
}

echo json_encode($retorna);
