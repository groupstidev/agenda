<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='./css/core/main.min.css' rel='stylesheet' />
<link href='./css/daygrid/main.min.css' rel='stylesheet' />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="./css/personalizado.css">

<script src='./js/core/main.min.js'></script>
<script src='./js/interaction/main.min.js'></script>
<script src='./js/daygrid/main.min.js'></script>
<script src="./js/core/locales/pt-br.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
<script src="./js/personalizado.js"></script>

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

                        <dt class="col-sm-3">Início do evento</dt>
                        <dd class="col-sm-9" id="start"></dd>

                        <dt class="col-sm-3">Fim do evento</dt>
                        <dd class="col-sm-9" id="end"></dd>
                    </dl>
                    <button class="btn btn-warning btn-canc-vis">Editar</button>
                </div>
                <div class="formedit">
                    <!-- Formulario Edit -->

                    <span id="msg-edit"></span>

                    <form id="editevent" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Solicitante</label>
                            <div class="col-sm-10">
                                <input type="text" name="solicitante" class="form-control" id="Solicitante" placeholder="Nome do solicitante" required="required">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Título</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Título do evento" required="required">
                            </div>
                        </div>
                 
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Conexão</label>
                            <div class="col-sm-10">
                              <select name="conexao" class="form-control" id="conexao" required="required" >
                                    <option value="">Selecione</option>			
                                    <option value="Meet">Meet</option>
                                    <option value="Scopia">Scopia</option>
                                </select>
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Color</label>
                            <div class="col-sm-10">
                                <select name="color" class="form-control" id="color" required="required">
                                    <option value="">Selecione</option>			
                                    <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                    <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                    <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                    <option style="color:#8B4513;" value="#8B4513">Marrom</option>	
                                    <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                    <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                    <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                    <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                    <option style="color:#228B22;" value="#228B22">Verde</option>
                                    <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Início do evento</label>
                            <div class="col-sm-10">
                                <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Final do evento</label>
                            <div class="col-sm-10">
                                <input type="text" name="end" class="form-control" id="end"  onkeypress="DataHora(event, this)" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="button" class="btn btn-primary btn-canc-edit">Cancelar</button>
                                <button type="submit" name="editEvent" id="editEvent" value="editEvent" class="btn btn-success">Cadastrar</button>                                    
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de solicitação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span id="msg-cad"></span>
                <form id="addevent" method="POST" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Solicitante</label>
                        <div class="col-sm-10">
                            <input type="text" name="solicitante" class="form-control" id="Solicitante" placeholder="Nome do solicitante" required="required">
                        </div>
                    </div>    

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Título</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title" placeholder="Título do evento" required="required">
                        </div>
                    </div>
                     
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Conexão</label>

                        <div class="col-sm-10">
                            <!-- <select name="conexao" class="form-control" id="conexao" required="required" onChange="resConexao(this)"> -->
                            <select name="conexao" class="form-control" id="conexao1" required="required">
                                <option value="">Selecione</option>			
                                <option value="Meet">Meet</option>
                                <option value="Scopia">Scopia</option>
                            </select>
                        </div>
                    </div>
                    <div id="respConexao">
                        <div id="meet" id="meet">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Link da sala</label>
                                <div class="col-sm-10">
                                    <input type="text" name="link" class="form-control" id="link" placeholder="Link da sala">
                                </div>
                            </div>
                        </div>

                        <div id="scopia" id="scopia">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Gate Keeper</label>
                                <div class="col-sm-10">
                                    <input type="text" name="gatekeeper" class="form-control" id="gatekeeper" placeholder="Gate Keeper">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Sala</label>
                                <div class="col-sm-10">
                                    <input type="text" name="sala" class="form-control" id="sala" placeholder="Sala">
                                </div>
                            </div>
                        </div> 
                    </div>    

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Color</label>
                        <div class="col-sm-10">
                            <select name="color" class="form-control" id="color" required="required">
                                <option value="">Selecione</option>			
                                <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                <option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
                                <option style="color:#FF4500;" value="#FF4500">Laranja</option>
                                <option style="color:#8B4513;" value="#8B4513">Marrom</option>	
                                <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                <option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
                                <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                <option style="color:#228B22;" value="#228B22">Verde</option>
                                <option style="color:#8B0000;" value="#8B0000">Vermelho</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Início do evento</label>
                        <div class="col-sm-10">
                            <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Final do evento</label>
                        <div class="col-sm-10">
                            <input type="text" name="end" class="form-control" id="end"  onkeypress="DataHora(event, this)" required="required">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Cadastrar</button>                                    
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
