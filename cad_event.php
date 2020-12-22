<?php
session_start();

include_once './conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$data_start = str_replace('/', '-', $dados['start']);
$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

$data_end = str_replace('/', '-', $dados['end']);
$data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));

$query_event = "INSERT INTO events (solicitante, title, conexao, gatekeeper, link, sala, color, start, end) VALUES (:solicitante, :title, :conexao, :gatekeeper, :link, :sala, :color, :start, :end)";

$insert_event = $conn->prepare($query_event);
$insert_event->bindParam(':solicitante', $dados['solicitante']);
$insert_event->bindParam(':title', $dados['title']);
$insert_event->bindParam(':conexao', $dados['conexao']);
$insert_event->bindParam(':gatekeeper', $dados['gatekeeper']);
$insert_event->bindParam(':link', $dados['link']);
$insert_event->bindParam(':sala', $dados['sala']);
$insert_event->bindParam(':color', $dados['color']);
$insert_event->bindParam(':start', $data_start_conv);
$insert_event->bindParam(':end', $data_end_conv);


if($insert_event->execute()){

    $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Solicitação cadastrada com sucesso!! '.$dados['title'].'</div>'];
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Solicitação cadastrado com sucesso!!</div>';

}else{
    $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Solicitação não foi cadastrada com sucesso!!'.$dados['title'].'</div>'];
}


header('Content-Type: application/json');

echo json_encode($retorna);