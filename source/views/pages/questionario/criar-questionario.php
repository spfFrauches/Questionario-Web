<div class="container">
     
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Criar questionário</li>
        </ol>
    </nav>
    
    <form id="qst_form" action="<?= URL_BASE ?>/questionario/salvar" method="post">
     
        <p id="msgSalvar"></p>
        
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  
            <h1 class="h2">Criar questionário</h1><br/>
            
            <div class="btn-toolbar mb-2 mb-md-0">
                                
                <div class="btn-group mr-2">
                    <!-- botão acionado pelo js -->
                    <button class="btn btn-sm btn-outline-primary">Salvar</button>
                    <button type="button" class="btn btn-sm btn-outline-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                </div>
                
                
                <div class="btn-group mr-2">
                    <a class="btn btn-sm btn-outline-warning" id="btnReiniciarQuestionario" href="<?= URL_BASE ?>/questionario/criar">Reiniciar e Limpar</a>
                    <button type="button" class="btn btn-sm btn-outline-warning"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </div>
                
            </div>
            
        </div>
    
        <br/>
    
        <div class="row" id="areaquestionario">

            <div class="col-lg-4" id="itens">
                <!-- extensão html dos itens do formulário -->
                <?php require './source/views/pages/questionario/questionario-criar-partials-questoes-itens-montar.php'; ?>           
            </div>
            
                      
            <div class="col-lg-8" id="questionario">
                
                <ul class="nav nav-tabs" id="myTab" role="tablist">                
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                            Visualização rápida
                        </a>
                    </li>
                </ul>
                <p></p>

                <div class="tab-content" id="myTabContent" style="padding: 10px;"> 
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">    
                        <div class="card" id="caixa-formulario" style="z-index: 0">
                            <div class="card-body corpo-edit-form" id="formulario-body" style="min-height: 500px"></div>  
                        </div> 
                    </div>
                </div>
                
                <button type="button" class="btn btn-primary btn-lg btn-block" id="btnFinalizarQuestionario">Finalizar Questionário</button>
                
                <br/>
                
            </div>
            
        </div>
    
        <div class="row" id="load">
            <div class="col-lg-12 text-center">
                <div class="spinner-border text-info" style="width: 3rem; height: 3rem; margin-top: 50px" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <br/><br/><br/><br/><br/><br/><br/><br/>
            <br/><br/><br/><br/><br/><br/><br/><br/>
        </div>
        
    </form>
    
</div>
    
