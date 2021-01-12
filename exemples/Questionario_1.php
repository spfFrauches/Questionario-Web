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
        require './source/views/basicHTMLHeader.php';   
        require './source/views/pages/questionario/criar-questionario.php';
        require './source/views/basicHTMLFooter.php';     
    }
    
    public function meusQuestionarios() {
        
        $bancoQst = new DataBase();       
        $listarQst = $bancoQst->listTableA001Qst();
        
        require './source/views/basicHTMLHeader.php';          
        require './source/views/pages/questionario/meus-questionarios.php';
        require './source/views/basicHTMLFooter.php';   
        
    }
    
    public function excluir($data) {
         

        if (isset($data['cod'])) {
            
            $bancoQst = new DataBase(); 
            $delete = $bancoQst->deleteAllQuestionario($data['cod']);
            $listarQst = $bancoQst->listTableA001Qst();
            require './source/views/basicHTMLHeader.php';          
            require './source/views/pages/questionario/meus-questionarios.php';
            require './source/views/basicHTMLFooter.php';  
            
        }

        
    }
    
    
    public function visualizar($data) {
        
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
            
            /* Pegar os ID das perguntas dos questionarios */
            foreach ($_POST["idPergunta"] as $key => $valueID) { 
                $vlrIDgerados[$key] = $valueID;
            } 
            
            /* verifica o maior no vetor */
            for ($i=0; $i<=count($vlrIDgerados); $i++) {      
               if ($vlrIDgerados[$i] >= $vlrIDgerados[$i-1]) {
                   $maiorIDgerado = $vlrIDgerados[$i];
               }                
            }
            
            /* Objeto para salvar no banco  */
            $qstDataBase = new DataBase();
            $CodQst = $qstDataBase->nextID();
            
            if ($_SESSION['criar_questionario'] == 'em criacao') {  
                
                echo "<br/>";
                echo "Formulario em criação, salvado de novo né...vamos lá...";
                
                $delete = $qstDataBase->deleteAllQuestionario($CodQst);
                
                $salvarQuestionario = $qstDataBase->inputTabelaA001Qst($CodQst, $_POST['nome_questionario']);
                
                /* gravando as perguntas */
                for ($seq = 1; $seq <= $maiorIDgerado ; $seq++) {  
                    
                    $CodPeg = $qstDataBase->nextIDPeg(); 
                    $pergunta = $_POST["descricaoPergunta-id-$seq"][0]; 
                    $tipo = $_POST["campoHTML-id-$seq"][0];
                    
                    $salvarPerguntaQuestionario = $qstDataBase->inputTabelaA002Peg($CodPeg, $CodQst, $seq, $pergunta, $tipo); 
                    
                    if ($_POST["campoHTML-id-$seq"][0] == 'selectHTML') {
                        foreach ($_POST["opcaoSelect-id-pergunta-$seq"] as $key => $value) {                             
                            $salvarPerguntaSelectHTMLOptions = $qstDataBase->inputTabelaA003Peg($CodQst, $CodPeg, $value, $key);
                        }   
                    }
                    
                }
                
            } else {
                
                $salvarQuestionario = $qstDataBase->inputTabelaA001Qst($CodQst, $_POST['nome_questionario']);
                
                /* gravando as perguntas */
                for ($seq = 1; $seq <= $maiorIDgerado ; $seq++) {  
                    
                    $CodPeg = $qstDataBase->nextIDPeg(); 
                    $pergunta = $_POST["descricaoPergunta-id-$seq"][0]; 
                    $tipo = $_POST["campoHTML-id-$seq"][0];
                    
                    $salvarPerguntaQuestionario = $qstDataBase->inputTabelaA002Peg($CodPeg, $CodQst, $seq, $pergunta, $tipo); 
                    
                    if ($_POST["campoHTML-id-$seq"][0] == 'selectHTML') {
                        foreach ($_POST["opcaoSelect-id-pergunta-$seq"] as $key => $value) {                             
                            $salvarPerguntaSelectHTMLOptions = $qstDataBase->inputTabelaA003Peg($CodQst, $CodPeg, $value, $key);
                        }   
                    }
                    
                }
                       
                if ($salvarQuestionario) {
                    
                   $_SESSION['criar_questionario'] = 'em criacao'; 
                   $_SESSION['CodQst'] = $CodQst;
                   var_dump($_SESSION);
                   echo "<p>Questionário Salvo, continue editando ou finalize publicando.</p>";
                   
                } else {
                    $_SESSION['criar_questionario'] = false;
                    echo "<p>Não foi possivel salvar</p>";
                }
                
            }                         
        }
    }
    
}
