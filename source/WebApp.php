<?php

/* Controller da Aplicação */

namespace Source;

class WebApp {
      
    public function home($data)
    {        
        require './source/views/basicHTMLHeader.php';   
        require './source/views/pages/home.php';
        require './source/views/basicHTMLFooter.php';       
    }
    
    public function sair()
    {        
        session_unset();
        session_destroy();
        $url = URL_BASE;
        header("Location: $url");
    }
    
    public function sobre() 
    {
        require './source/views/basicHTMLHeader.php'; 
        require './source/views/pages/sobre.php';
        require './source/views/basicHTMLFooter.php';   
        
    }
       
    
}
