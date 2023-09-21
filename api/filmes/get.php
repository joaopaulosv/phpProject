<?php

if ($acao == '' && $param == '') { echo json_encode(['ERRO' => 'Caminho não encontrado!'], JSON_UNESCAPED_UNICODE); }
        
    if ($acao == 'lista' && $param == '') {
        $db = DB::connect();
        $rs = $db->prepare("SELECT * FROM filmes ORDER BY id");
        $rs->execute();
        $obj = $rs->fetchAll(PDO::FETCH_ASSOC);

        if ($obj) {
            echo json_encode(["dados" => $obj], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["dados" => 'Não existe dados para retornar'], JSON_UNESCAPED_UNICODE);
        }
    }

    if ($acao == 'lista' && $param != '') {
        $db = DB::connect();
        $rs = $db->prepare("SELECT * FROM filmes WHERE id={$param}");
        $rs->execute();
        $obj = $rs->fetchObject();

        if ($obj) {
            echo json_encode(["dados" => $obj], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["dados" => 'Não existe dados para retornar'], JSON_UNESCAPED_UNICODE);
        }
    }