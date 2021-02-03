<?php

/* driver do banco de dados */

namespace Source;
use PDO;

class Conexao {
    
    private static $conn;
    
    public static function getConn(){
        if ( self::$conn == null) {      
            /* self para atributo estatico senao seria this */
            self::$conn = new PDO('mysql: host=localhost; dbname=qst10;','root','102030');          
        }
        return self::$conn;
    }
    
}
