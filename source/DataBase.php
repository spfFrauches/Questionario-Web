<?php

namespace Source;

use Source\Conexao;


class DataBase {
    
    public function nextID() {
        
        $tabela = "A001QST";
        $pdo = Conexao::getConn();
        $sql = "SELECT max(CodQst) as lastid FROM $tabela";
        $stmt = $pdo->query($sql);
               
        while ($row = $stmt->fetch()) {
            $lastid = $row['lastid'] + 1;
        }
        $nextid = $lastid + 1;
        return $nextid;
        
    }
    
    public function nextIDPeg() {
        
        $tabela = "A002PEG";
        $pdo = Conexao::getConn();
        $sql = "SELECT max(CodPeg) as lastid FROM $tabela";
        $stmt = $pdo->query($sql);
               
        while ($row = $stmt->fetch()) {
            $lastid = $row['lastid'] + 1;
        }
        $nextid = $lastid + 1;
        return $nextid;
        
    }
    
    public function listTableA001Qst() {
        
        $tabela = "A001QST";                   
        $pdo = Conexao::getConn();
        
        $sql = "SELECT * FROM  $tabela";

        $sql = $pdo->prepare($sql);
        $sql->execute(); 
      
        $resultado = [];
        
        while ($row = $sql->fetchObject()) { $resultado[] = $row; }
        
        return $resultado;  
        
    }
    
    public function listQst($codqst) {
        
        $tabela = "A001QST";                   
        $pdo = Conexao::getConn();
        
        $sql = "SELECT * FROM  $tabela WHERE CodQst = $codqst";

        $sql = $pdo->prepare($sql);
        $sql->execute(); 
      
        $resultado = [];
        
        while ($row = $sql->fetchObject()) { $resultado[] = $row; }
        
        return $resultado;  
        
    }
    
    public function listPeg($codqst) {
        
        $tabela = "A002PEG";                   
        $pdo = Conexao::getConn();
        
        $sql = "SELECT * FROM  $tabela WHERE CodQst = $codqst";

        $sql = $pdo->prepare($sql);
        $sql->execute(); 
      
        $resultado = [];
        
        while ($row = $sql->fetchObject()) { $resultado[] = $row; }
        
        return $resultado;  
        
    }
    
    public function listPegOp($codpeg) {
        
        $tabela = "A003PEG";                   
        $pdo = Conexao::getConn();
        
        $sql = "SELECT * FROM  $tabela WHERE CodPeg = $codpeg";

        $sql = $pdo->prepare($sql);
        $sql->execute(); 
      
        $resultado = [];
        
        while ($row = $sql->fetchObject()) { $resultado[] = $row; }   
        return $resultado;  
        
    }
    
    
    public function inputTabelaA001Qst($id, $nomqst, $status) {
        
        $tabela = "A001QST";                   
        $pdo = Conexao::getConn();

        $stmt = $pdo->prepare("INSERT INTO $tabela (CodQst, NomQst, StatusQst)"
                . "VALUES "
                . "(:codqst, :nomqst, :statusqst)");

        $stmt = $stmt->execute(array(
            ':codqst'  => "$id",
            ':nomqst' => "$nomqst",
            ':statusqst' => "$status"
        ));

        return $stmt;
        
    }
    
    public function inputTabelaA002Peg($codpeg, $codqst , $seqpeg, $pegqst, $pegtip) {
        
        $tabela = "A002PEG";                   
        $pdo = Conexao::getConn();
        
        $stmt = $pdo->prepare("INSERT INTO $tabela (CodPeg, CodQst, SeqPeg, PegQst, PegTip)"
                . "VALUES "
                . "(:codpeg, :codqst, :seqpeg, :pegqst, :pegtip)");
        
        $stmt = $stmt->execute(array(
            ':codpeg'  => "$codpeg",
            ':codqst' => "$codqst",
            ':seqpeg' => "$seqpeg",
            ':pegqst' => "$pegqst",
            ':pegtip' => "$pegtip"
        ));

        return $stmt;
        
    }
    
    public function inputTabelaA003Peg ($codqst, $codpeg, $desop, $seqop) {
        
        $tabela = "A003PEG";                   
        $pdo = Conexao::getConn();
        
        $stmt = $pdo->prepare("INSERT INTO $tabela (CodQst, CodPeg, DesOpc, SeqOpc)"
                . "VALUES "
                . "(:codqst, :codpeg, :desopc, :seqopc)");
        
        $stmt = $stmt->execute(array(
            ':codqst' => "$codqst",
            ':codpeg' => "$codpeg",
            ':desopc' => "$desop",
            ':seqopc' => "$seqop"
        ));
        
        return $stmt;
              
    }
    
    public function deleteAllQuestionario($codQst) {
               
        $tabela1 = "A001QST";      
        $tabela2 = "A002PEG"; 
        $tabela3 = "A003PEG";   
        $tabela4 = "A004ENVRES";
        $tabela5 = "A004RES";
               
        $pdo = Conexao::getConn();
        
        $sql1 = "delete FROM  $tabela1 where CodQst = $codQst";
        $sql2 = "delete FROM  $tabela2 where CodQst = $codQst";
        $sql3 = "delete FROM  $tabela3 where CodQst = $codQst";
        $sql4 = "delete FROM  $tabela4 where CodQst = $codQst";
        $sql5 = "delete FROM  $tabela5 where CodQst = $codQst";
        
        $sql1 = $pdo->prepare($sql1);
        $sql2 = $pdo->prepare($sql2);
        $sql3 = $pdo->prepare($sql3);
        $sql4 = $pdo->prepare($sql4);
        $sql5 = $pdo->prepare($sql5);
        
        if ($sql1->execute() && $sql2->execute() && $sql3->execute() && $sql4->execute() && $sql5->execute()) {
            return true;
        }
        else {
            return false;
        }
               
    }
    
    public function deleteRespostas($codenv) {
        
        $tabela1 = "A004ENVRES"; 
        $tabela2 = "A004RES"; 
        $pdo = Conexao::getConn();
        
        $sql1 = "delete FROM  $tabela1 where CodEnv = $codenv";
        $sql2 = "delete FROM  $tabela2 where CodEnv = $codenv";
        
        $sql1 = $pdo->prepare($sql1);
        $sql2 = $pdo->prepare($sql2);

        if ($sql1->execute() && $sql2->execute()) {
            return true;
        }
        else {
            return false;
        }
               
    }
    
    public function verifyExistsQuestionario($titulo) {
        
        $tabela = "A001QST";                   
        $pdo = Conexao::getConn();
        
        $sql = "SELECT * FROM  $tabela WHERE NomQst = '$titulo' ";

        $sql = $pdo->prepare($sql);
        $sql->execute(); 
     
        $resultado = [];
        
        while ($row = $sql->fetchObject()) { $resultado[] = $row; }   
        return $resultado;  
        
        
    }
    
    public function insertResposta($codenv , $codqst, $codpeg, $despeg, $resposta) {
        
        $tabela = "A004RES"; 
        $pdo = Conexao::getConn();
                         
        $stmt = $pdo->prepare("INSERT INTO $tabela (CodEnv, CodQst, CodPeg, DesPeg, Resposta)"
                . "VALUES "
                . "(:codenv, :codqst, :codpeg, :despeg, :resposta)");
        
        $stmt = $stmt->execute(array(
            ':codenv' => "$codenv",
            ':codqst' => "$codqst",
            ':codpeg' => "$codpeg",
            ':despeg' => "$despeg",
            ':resposta' => "$resposta"
        ));
        
        return $stmt;
        
    }
    
    
    public function nextCodRes() {
        
        $tabela = "A004RES";
        $pdo = Conexao::getConn();
        $sql = "SELECT max(CodRes) as lastid FROM $tabela";
        $stmt = $pdo->query($sql);
               
        while ($row = $stmt->fetch()) {
            $lastid = $row['lastid'] + 1;
        }
        $nextid = $lastid + 1;
        return $nextid;
        
    }  
    
    public function nextEnvRes() {
        
        $tabela = "A004ENVRES";
        $pdo = Conexao::getConn();
        $sql = "SELECT max(CodEnv) as lastid FROM $tabela";
        $stmt = $pdo->query($sql);
               
        while ($row = $stmt->fetch()) {
            $lastid = $row['lastid'] + 1;
        }
        
        $nextid = $lastid + 1;
        return $nextid;
        
    }  
    
    public function envioResposta($codenv, $dataenv, $codqst) {
        
        $tabela = "A004ENVRES";
        $pdo = Conexao::getConn();
        
        $stmt = $pdo->prepare("INSERT INTO $tabela (CodEnv, DataEnv, CodQst)"
                . "VALUES "
                . "(:codenv, :dataenv, :codqst)");
        
        $stmt = $stmt->execute(array(
            ':codenv' =>  "$codenv",
            ':dataenv' => "$dataenv",
            ':codqst' =>  "$codqst"
        ));
        
        return $stmt;
        
    }
    
    
    public function totalRespostas($codqst) {
        
        $tabela = "A004ENVRES";
        $pdo = Conexao::getConn();
        
        $sql = "select count(CodEnv) as qtdResp from  $tabela where CodQst = $codqst";
        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch()) {
            $qtdResp = $row['qtdResp'];
        }
        return $qtdResp;
        
    }
    
    public function listarRespostas($codqst){
        
        $tabela = "A004RES";                   
        $pdo = Conexao::getConn();
        
        $sql = "SELECT * FROM  $tabela WHERE CodQst = '$codqst' ";

        $sql = $pdo->prepare($sql);
        $sql->execute(); 
     
        $resultado = [];
        
        while ($row = $sql->fetchObject()) { $resultado[] = $row; }   
        return $resultado;  
               
    }
    
    public function listarEnvioRespostas($codqst) {
        
        $tabela = "A004ENVRES";                   
        $pdo = Conexao::getConn();
        
        $sql = "SELECT * FROM  $tabela WHERE CodQst = '$codqst' ";

        $sql = $pdo->prepare($sql);
        $sql->execute(); 
     
        $resultado = [];
        
        while ($row = $sql->fetchObject()) { $resultado[] = $row; }   
        return $resultado;  
               
    }
    
    public function listarRespostasQuestionario($codEnvRes) {
        
        $tabela = "A004RES";                   
        $pdo = Conexao::getConn();
        
        $sql = "SELECT * FROM  $tabela WHERE Codenv = '$codEnvRes' ";
         
        $sql = $pdo->prepare($sql);
        $sql->execute(); 
     
        $resultado = [];
        
        while ($row = $sql->fetchObject()) { $resultado[] = $row; }   
        return $resultado;  
               
    }
    
}
