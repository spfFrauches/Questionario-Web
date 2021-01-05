<?php

namespace Source;

use Source\Conexao;
use Source\DataBase;

class Questionario {
    
    public function publicar($data)
    {        
        require './source/views/basicHTMLHeader.php';           
        require './source/views/basicHTMLFooter.php';       
    }
    
    public function criar($data)
    {  
        $_SESSION['criar_questionario'] = false;
        unset($_SESSION['criar_questionario']);
        require './source/views/basicHTMLHeader.php';   
        require './source/views/pages/questionario/criar-questionario.php';
        require './source/views/basicHTMLFooter.php';     
    }
    
    public function meusQuestionarios() 
    {
        
        $bancoQst = new DataBase();       
        $listarQst = $bancoQst->listTableA001Qst();          
        
        require './source/views/basicHTMLHeader.php';          
        require './source/views/pages/questionario/meus-questionarios.php';
        require './source/views/basicHTMLFooter.php';   
        
    }
    
    public function excluir($data) 
    {
        if (isset($data['cod'])) {                   
            $bancoQst = new DataBase(); 
            $delete = $bancoQst->deleteAllQuestionario($data['cod']);
            $listarQst = $bancoQst->listTableA001Qst();
            require './source/views/basicHTMLHeader.php';          
            require './source/views/pages/questionario/meus-questionarios.php';
            require './source/views/basicHTMLFooter.php';  
        }
    }
    
    public function excluirRespostas($data) 
    {
        if (isset($data['codenv'])) {                   
            $bancoQst = new DataBase(); 
            $delete = $bancoQst->deleteRespostas($data['codenv']);
            $listarEnvioRespostas = $bancoQst->listarEnvioRespostas($data['codqst']);
            $dadosQst = $bancoQst->listQst($data['codqst']);            
            require './source/views/basicHTMLHeader.php';   
            require './source/views/pages/questionario/visualizar-resposta.php';
            require './source/views/basicHTMLFooter.php';  
        }
    }
    
    
    public function visualizar($data) 
    {  
        if (isset($data['cod'])) {        
            $bancoQst = new DataBase(); 
            $listQuestionario   = $bancoQst->listQst($data['cod']);
            $listPerguntas      = $bancoQst->listPeg($data['cod']);  
            
            require './source/views/basicHTMLHeader.php';          
            require './source/views/pages/questionario/visualizar-questionario.php';
            require './source/views/basicHTMLFooter.php'; 
        }   
    }
    
    public function salvar()
    {                 
        if (isset($_POST['nome_questionario'])) {  
            
            $bancoQst = new DataBase();     
                
            if ($_SESSION['criar_questionario'] == 'em_criacao') {
                                
                $codQst = $_SESSION['CodQst']; 
                $deletarX = $bancoQst->deleteAllQuestionario($codQst);
                
                $salvarQuestionarioEmCriacao = salvarQuestionario();

                if ($salvarQuestionarioEmCriacao) { 
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
                    echo "<b>Salvando </b> ... continue editando ou finalize publicando.";
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    echo '<span aria-hidden="true">&times;</span>';
                    echo '</button>';
                    echo '</div>';   
                    $_SESSION['criar_questionario'] = 'em_criacao';
                }
                
            } else {
                   
                $verificaSeExisteTituloQst = $bancoQst->verifyExistsQuestionario($_POST['nome_questionario']);
                
                if (!$verificaSeExisteTituloQst) {
                    $salvarQuestionario = salvarQuestionario();
                    if ($salvarQuestionario) {
                       
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                        echo "<b>Questionário Criado...</b> Continue editando ou finalize publicando.";
                        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                        echo '<span aria-hidden="true">&times;</span>';
                        echo '</button>';
                        echo '</div>'; 
                       $_SESSION['criar_questionario'] = 'em_criacao';
                    }
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                    echo "Já existe um questionário com este <b>Nome / Titulo</b>";
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                    echo '<span aria-hidden="true">&times;</span>';
                    echo '</button>';
                    echo '</div>';                   
                }
            }            
          
        }
    }
    
    public function resposta() 
    {
        $bancoQst = new DataBase(); 
        $idEnvio = $bancoQst->nextEnvRes();
        
        date_default_timezone_set('America/Bahia');
        $dataenv =  date('Y-m-d');
                  
        foreach ($_POST['pergunta'] as $pergunta => $value) {
            $codqst = $_POST['Codquestionario'][$pergunta];
        }
        
        $envio = $bancoQst->envioResposta($idEnvio, $dataenv, $codqst);
        
        if ($envio) {
            
            foreach ($_POST['pergunta'] as $pergunta => $value) {
                $codpeg = $_POST['Codpergunta'][$pergunta];
                $despeg = $value;
                $resposta = $_POST['resposta'][$pergunta];
                $bancoQst->insertResposta($idEnvio , $codqst, $codpeg, $despeg, $resposta);
            } 
            
            require './source/views/basicHTMLHeader.php';          
            require './source/views/pages/questionario/visualizar-questionario-finalizar.php';
            require './source/views/basicHTMLFooter.php';  
            
        }
                    
    }
    
    public function listarRespostas($data) {
        
        if (isset($data['cod'])) {
                       
            $bancoQst = new DataBase();  
            $listarEnvioRespostas = $bancoQst->listarEnvioRespostas($data['cod']);
            
            $dadosQst = $bancoQst->listQst($data['cod']);

            //var_dump($listarEnvioRespostas);
            
            require './source/views/basicHTMLHeader.php';   
            require './source/views/pages/questionario/visualizar-resposta.php';
            require './source/views/basicHTMLFooter.php';   
            
        }
               
        
    }
    
}
