<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='./css/core/main.min.css' rel='stylesheet' />
<link href='./css/timegrid/main.min.css' rel='stylesheet'/>
<link href='./css/list/main.min.css' rel='stylesheet'/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="./css/personalizado.css">

<script src='./js/core/main.min.js'></script>
<script src='./js/interaction/main.min.js'></script>
<script src='./js/list/main.min.js'></script>
<script src='./js/timegrid/main.min.js'></script>
<script src="./js/core/locales/pt-br.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
<script src="./js/personalizadoAdm.js"></script>

</head>
<body>

<?php
  if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
?>

<div id='calendar'></div>

<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes da solicitação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="visevent">
                    <dl class="row">
                        <dt class="col-sm-3">ID do evento</dt>
                        <dd class="col-sm-9" id="id"></dd>

                        <dt class="col-sm-3">Solicitante</dt>
                        <dd class="col-sm-9" id="solicitante"></dd>        

                        <dt class="col-sm-3">Título do evento</dt>
                        <dd class="col-sm-9" id="title"></dd>

                        <dt class="col-sm-3">Conexão</dt>
                        <dd class="col-sm-9" id="conexao"></dd>

                        <dt class="col-sm-3">Gatekeep</dt>
                        <dd class="col-sm-9" id="gatekeeper"></dd>

                        <dt class="col-sm-3">Link</dt>
                        <dd class="col-sm-9" id="link"></dd>

                        <dt class="col-sm-3">Sala</dt>
                        <dd class="col-sm-9" id="sala"></dd>
                        
                        <dt class="col-sm-3">Início do evento</dt>
                        <dd class="col-sm-9" id="start"></dd>

                        <dt class="col-sm-3">Fim do evento</dt>
                        <dd class="col-sm-9" id="end"></dd>
                    </dl>         
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
