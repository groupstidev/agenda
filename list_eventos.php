<?php
include 'conexao.php';

// $insert_event->bindParam(':conexao', $dados['conexao']);
// $insert_event->bindParam(':gatekeeper', $dados['gatekeeper']);
// $insert_event->bindParam(':link', $dados['link']);
// $insert_event->bindParam(':sala', $dados['sala']);

$query_events = "SELECT id, solicitante, title, conexao, gatekeeper, link, sala, color, start, end  FROM events";

$results_events = $conn->prepare($query_events);

$results_events->execute();

$eventos = [];

while($rows_events = $results_events->fetch(PDO::FETCH_ASSOC)){
    $id = $rows_events['id'];
    $solicitante = $rows_events['solicitante'];
    $title = $rows_events['title'];
    $conexao = $rows_events['conexao'];
    $gatekeeper = $rows_events['gatekeeper'];
    $link = $rows_events['link'];
    $sala = $rows_events['sala'];
    $color = $rows_events['color'];
    $start = $rows_events['start'];
    $end = $rows_events['end'];

    $eventos[] = [
        'id' => $id,
        'solicitante' => $solicitante,
        'title' => $title,
        'conexao' => $conexao,
        'gatekeeper' => $gatekeeper,
        'link' => $link,
        'sala' => $sala,
        'color' => $color,
        'start' => $start,
        'end' => $end
    ];
}

echo json_encode($eventos);