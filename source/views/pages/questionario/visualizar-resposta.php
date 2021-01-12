<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= URL_BASE ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= URL_BASE ?>/questionario/meus-questionarios">Meus questionários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Minhas respostas</li>
        </ol>
    </nav>
    <br/>
    <p class="text-muted">Questionário </p>
    <h1 class="h2" style="margin-top: -12px">  <?= $dadosQst[0]->NomQst ?> </h1>
    <br/>
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          Total de respostas
          <span class="badge badge-primary badge-pill"><?= $bancoQst->totalRespostas($dadosQst[0]->CodQst); ?></span>
        </li>  
    </ul>
    
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h5 class="border-bottom border-gray pb-2 mb-0">Listando respostas</h5>
        <?php foreach ($listarEnvioRespostas as $key => $value): ?> 
        <div class="media text-muted pt-3"> 
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">Repondido em: <?= date("d/m/Y", strtotime($value->DataEnv)) ?></strong>
                    <a href="#" data-toggle="modal" data-target="#exampleModal-<?= $value->CodEnv ?>">Ver respostas</a>
                    <a href="#" data-toggle="modal" data-target="#exampleModalExcluir-<?= $value->CodEnv ?>">Excluir resposta</a>
                </div>
              <span class="d-block">Cod. Resp .: <?= $value->CodEnv ?></span>
            </div>
        </div>
        <div class="modal fade" id="exampleModal-<?= $value->CodEnv ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Visualizando respostas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <br/><br/>
                        <?php $itensRespostas = $bancoQst->listarRespostasQuestionario($value->CodEnv);  ?>       
                        <ul class="list-group list-group-flush">
                            <?php foreach ($itensRespostas as $keyR1 => $valR1) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?= $valR1->DesPeg ?>
                                    <span class="badge badge-primary badge-pill" style="font-size: 10px; padding: 5px">Pergunta</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 12px;">
                                    <?= $valR1->Resposta ?>
                                    <span class="badge badge-warning badge-pill" style="font-size: 10px; padding: 5px">Resposta</span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                   </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalExcluir-<?= $value->CodEnv ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="<?= URL_BASE ?>/questionario/respostas/excluir/<?= $value->CodEnv ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Excluindo Resposta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php $itensRespostas = $bancoQst->listarRespostasQuestionario($value->CodEnv);  ?>       
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Tem certeza que deseja excluir ? </h4>
                                <p>
                                    O registro de resposta será excluido e não poderá ser recuperado.
                                </p>
                                <hr>
                            </div>
                            <ul class="list-group list-group-flush">
                                <?php foreach ($itensRespostas as $keyR1 => $valR1) : ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <?= $valR1->DesPeg ?>
                                        <span class="badge badge-primary badge-pill" style="font-size: 10px; padding: 5px">Pergunta</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 12px;">
                                        <?= $valR1->Resposta ?>
                                        <span class="badge badge-warning badge-pill" style="font-size: 10px; padding: 5px">Resposta</span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <input type="hidden" name="codenv" value="<?= $value->CodEnv ?>">
                        <input type="hidden" name="codqst" value="<?= $dadosQst[0]->CodQst?>">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Sim, quero excluir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <small class="d-block text-right mt-3">
            <a href="#">Carregar todos</a>
        </small>
    </div>
          
</div>

<br/><br/><br/>

