<div class="container">
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= URL_BASE ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Meus questionários</li>
        </ol>
    </nav>
    <br/>
    <h1 class="h2">Meus questionários</h1><br/>
    
    <table class="table">
    
        <thead>
            <tr>
                <th scope="col">Cód.</th>
                <th scope="col">Questionário</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($listarQst as $key => $value): ?>
            <tr>
                <th scope="row"><?= $value->CodQst ?></th>
                <td><?= $value->NomQst ?></td>
                <td>
                    <a data-toggle="tooltip" data-placement="top" title="Excluir Questionário" href="<?= URL_BASE ?>/questionario/excluir/<?= $value->CodQst ?>">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    &nbsp; 
                    <a data-toggle="tooltip" data-placement="top" title="Ir para o Questionário" href="<?= URL_BASE ?>/questionario/visualizar/<?= $value->CodQst ?>">
                        <i class="fa fa-chrome" aria-hidden="true"></i>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Acessar as respostas" href="<?= URL_BASE ?>/questionario/listar-respostas/<?= $value->CodQst ?>">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                </td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    
</div>

<br/><br/><br/>

