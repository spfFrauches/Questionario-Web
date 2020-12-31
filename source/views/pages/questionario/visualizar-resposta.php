<div class="container">
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= URL_BASE ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= URL_BASE ?>/questionario/meus-questionarios">Meus questionários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Minhas respostas</li>
        </ol>
    </nav>
    
    <br/>
    <p class="text-muted">Respostas do questionário</p>
    <h1 class="h2" style="margin-top: -12px">  <?= $dadosQst[0]->NomQst ?> </h1>
    <hr/>
    
   <table class="table">
    
        <thead>
            <tr>
                <th scope="col">Data de envio</th>
                <th scope="col">Detalhes</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($listarEnvioRespostas as $key => $value): ?>
            <tr>
                <td scope="row"><?= date("d/m/Y", strtotime($value->DataEnv)) ?></td>
                <td scope="row"> <a href="#">Ver resposta </a> </td>
               
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
   
</div>

<br/><br/><br/>

