<?php

use Source\WebApp;
use Source\Questionario;
use Source\Conexao;
use Source\DataBase;

function maiorValorID(){
    
     /* Pegar os ID das perguntas dos questionarios e joga no vetor */
    foreach ($_POST["idPergunta"] as $key => $valueID) { 
        $vlrIDgerados[$key] = $valueID;
    } 

    /* verifica o maior no vetor */
    for ($i=0; $i<=count($vlrIDgerados); $i++) {      
       if ($vlrIDgerados[$i] >= $vlrIDgerados[$i-1]) {
           $maiorIDgerado = $vlrIDgerados[$i];
       }                
    }
    
    return $maiorIDgerado;
    
}

function salvarQuestionario() {
      
    $maiorValorIDGerado = maiorValorID();      
    $qstDataBase = new DataBase();
    $CodQst = $qstDataBase->nextID();

    $salvarQuestionario = $qstDataBase->inputTabelaA001Qst($CodQst, $_POST['nome_questionario'], 'em_criacao');

    if ($salvarQuestionario) {  
        
        for ($seq = 1; $seq <= $maiorValorIDGerado ; $seq++) {  
            
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
        
        $_SESSION['criar_questionario'] = 'em_criacao'; 
        $_SESSION['CodQst'] = $CodQst;
        return true;  
        
    } 
    else { return false; }

}

function verificarSeExisteQuestionario($nomeQuestionario) {
    
    return verifyExistsQuestionario($nomeQuestionario);
    
}

function apagarQuestionário() {
    
    
    
}

