<div class="container">
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= URL_BASE ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= URL_BASE ?>/questionario/meus-questionarios">Meus questionários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Visualizando questionário</li>
        </ol>
    </nav>
    <br/>
    <h1 class="h2">Visualizando questionários</h1>
    <hr/>
    
    <div class="card m-1 p-3">
        <br/>
        <?php foreach ($listQuestionario as $key => $value): ?>   
        <h2> <?= $value->NomQst ?> </h2>
        <?php endforeach; ?>
        <hr/>
        
        <div class="row">
            
            <div class="col-8">
                
                
                <?php foreach ($listPerguntas as $key => $value): ?>   
                
                    <?php if ($value->PegTip == 'inputHTML'): ?>
                        <div class="form-group">
                            <label><?= $value->PegQst ?></label>
                            <input type="text" class="form-control" />
                        </div>
                        <br/>
                    <?php endif; ?>
                
                    
                    
                    <?php if ($value->PegTip == 'selectHTML'): ?>
                        <div class="form-group">
                            <label><?= $value->PegQst ?></label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Selecione</option>                               
                                <?php $listPerguntasOption = $bancoQst->listPegOp($value->CodPeg) ?>
                                <?php foreach ($listPerguntasOption as $key1 => $value1): ?>   
                                    <option><?= $value1->DesOpc ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <br/>
                    <?php endif; ?>

                <?php endforeach; ?>

            </div>
            
        </div>
                
    </div>
   
</div>

<br/><br/><br/>

