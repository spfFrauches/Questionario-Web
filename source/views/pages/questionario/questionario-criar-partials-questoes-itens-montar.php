<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="background-color: #e9ecef">

    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
            <i class="fa fa-cogs" aria-hidden="true"></i>
            <font size="2" >Configurações</font>
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
            <i class="fa fa-pencil" aria-hidden="true"></i> 
            <font size="2" >Questões</font>
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
            Avançado
        </a>
    </li>

</ul>

<div class="tab-content" id="pills-tabContent">

    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

        <div class="form-group">         
            <label>Nome do Questionário</label>
            <input type="text" class="form-control" id="nome_questionario" name="nome_questionario">
            <small id="emailHelp" class="form-text text-muted">Nome que seu questionário/pesquisa irá ter</small>
        </div>

    </div>


    <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

        <div class="row cx-questoes-geral">
            
            <div class="card item-lx-1 col itens-estilo-form cx-questoes" id="item-cx-1">
                <div class="card-body">      
                    <p class="card-text"><i class="fa fa-font" aria-hidden="true"></i><i class="fa fa-bold" aria-hidden="true"></i> <i class="fa fa-ellipsis-h" aria-hidden="true"></i> <i class="fa fa-pencil" aria-hidden="true"></i></p>
                    <p style="margin-top: -12px">Texto Simples</p>
                </div>
            </div>

            <div class="card item-lx-2 col itens-estilo-form cx-questoes" id="item-cx-2">
                <div class="card-body">      
                    <p class="card-text"><i class="fa fa-align-justify" aria-hidden="true"></i></p>
                    <p style="margin-top: -12px">Lista de opções</p>
                </div>
            </div>
            
        </div>  
        
        <!--
        <div class="row cx-questoes-geral" >
            <div class="card item-lx-3 col itens-estilo-form" id="item-lx-3">
                <div class="card-body">      
                    <p class="card-text"><i class="fa fa-toggle-on" aria-hidden="true"></i> Botões Toggle</p>
                </div>
            </div>
            <div class="card item-lx-4 col" id="item-lx-4" style="width: 13rem; z-index: 1; margin: 2px">
                <div class="card-body">      
                    <p class="card-text"><i class="fa fa-camera" aria-hidden="true"></i> Foto</p>
                </div>
            </div>
        </div>

        -->

        <div class="caixas-ocultas-forms-itens" id="caixas-ocultas-forms-itens">

            <div class="alert alert-light alert-dismissible fade show itemForm-input" id="item-cx-form-1" role="alert">  
                <div class="form-group" style="border: 1px solid #ccc; padding: 20px" >        
                    <small class="form-text text-muted">Título da pergunta</small>
                    <p></p>
                    <input type="text" class="form-control" readonly>
                    <small id="emailHelp" class="form-text text-muted">input da resposta</small>
                </div>   
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>  
            </div>
            
            <!-- inputs montado dinamicamente no arquivo js -->
            
            <div class="alert alert-light alert-dismissible fade show itemForm" id="item-cx-2-form" role="alert">   
                <div class="form-group">   
                    <div class="row">
                        <div class="col-8 camposelect">
                            <small id="tituloHelp" class="form-text text-muted">Titulo da pergunta</small>
                        </div>  
                        <div class="col-4" style="margin-top: 20px;">
                            <a href="#" class="float-right addOpcoes" onclick="addOptionSelectHTML(this)" > <i class="fa fa-plus-circle fa-1x" aria-hidden="true"></i> Adicionar opções </a>
                        </div>       
                    </div>
                    <p></p>
                    <div class="row">
                        <div class="col">
                             <select class="form-control" id="opcoes1">
                                <option></option>
                            </select>
                            <small id="emailHelp" class="form-text text-muted">Lista de opções disponiveis</small>
                        </div>       
                    </div>
                </div>
                <button type="button" class="close retirarPertunta" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>  
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    </div>   
</div>

