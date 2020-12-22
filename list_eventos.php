<?php
include 'conexao.php';

$query_events = "SELECT id, title, color, start, end  FROM events";

$results_events = $conn->prepare($query_events);

$results_events->execute();

$eventos = [];

while($rows_events = $results_events->fetch(PDO::FETCH_ASSOC)){
    $id = $rows_events['id'];
    $title = $rows_events['title'];
    $color = $rows_events['color'];
    $start = $rows_events['start'];
    $end = $rows_events['end'];


    $eventos[] = [
        'id' => $id,
        'title' => $title,
        'color' => $color,
        'start' => $start,
        'end' => $end
    ];
}

echo json_encode($eventos);