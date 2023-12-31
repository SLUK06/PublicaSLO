<?php

include "Config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `postagens` WHERE `id` = ?";
    $stmt = $Conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultExc = $stmt->get_result();

    if ($stmt->affected_rows > 0) {
        //Sucesso ao Excluir
        $fallback = 'index.php';

        $anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $fallback;

        header("location: {$anterior}");
        exit;
    } else {
        //Falha ao Excluir
        echo "Error deleting the news article.";
    }
} else {
    echo "Id da Publicação Não Encontrado";
}