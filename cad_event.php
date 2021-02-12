<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once './conexao.php';
require './mailer/src/Exception.php';
require './mailer/src/PHPMailer.php';
require './mailer/src/SMTP.php'; 


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

    $mensagem = 'Solicitante: '. $dados['solicitante']. ' </br> '.
    'Titulo: '. $dados['title']. '<br>'.
    'Conexão: '. $dados['conexao']. '<br>'.
    'Gatekeeper: '. $dados['gatekeeper']. '<br>'.
    'Link: '. $dados['link']. '<br>'.
    'Sala: '. $dados['sala']. '<br>'.
    'Data inicial: '. $data_start_conv .'<br>'.
    'Data Final: '. $data_end_conv;

    $assunto = 'Agenda STI';

    $mail = new PHPMailer();
    $mail-> isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'groupstidev@gmail.com';
    $mail->Password = 'gr0up#st1#d3v';
    $mail->Port = 587;


    $mail->setFrom('groupstidev@gmail.com', 'VideoConferencia');
    $mail->addAddress('janotijr@gmail.com');
    $mail->addBCC('');

    $mail->isHTML(true);
    $mail->Subject = $assunto;
    $mail->Body = nl2br($mensagem);
    $mail->AltBody = nl2br(strip_tags($mensagem));

    if (!$mail->send()) {
        echo 'Não foi possivel enviar a mensagem.<br>';
        echo 'Erro: ' . $mail->ErrorInfo;
    }

}else{
    $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Solicitação não foi cadastrada com sucesso!!'.$dados['title'].'</div>'];
}


header('Content-Type: application/json');

echo json_encode($retorna);