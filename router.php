<?php

require './vendor/autoload.php';

use CoffeeCode\Router\Router;
use Source\WebApp;
use Source\Questionario;

/* PHP route component da coffecode */
/* composer require coffeecode/router */

$router = new Router(URL_BASE);
$router->namespace("Source");

/* index do site */
$router->group(null);
$router->get("/", "WebApp:home");
$router->get("/sair", "WebApp:sair");
$router->get("/sobre", "WebApp:sobre");

/* /questionario/ do site */
$router->group("questionario");
$router->get ("/meus-questionarios", "Questionario:meusQuestionarios");
$router->get ("/criar",  "Questionario:criar");
$router->post("/salvar", "Questionario:salvar");
$router->get ("/visualizar/{cod}", "Questionario:visualizar");
$router->post("/visualizar/{cod}", "Questionario:visualizar");
$router->get ("/excluir/{cod}", "Questionario:excluir");
$router->post("/excluir/{cod}", "Questionario:excluir");
$router->post("/resposta", "Questionario:resposta");
$router->post("/listar-respostas/{cod}", "Questionario:listarRespostas");
$router->get("/listar-respostas/{cod}", "Questionario:listarRespostas");
$router->get ("/respostas/excluir/{cod}", "Questionario:excluirRespostas");
$router->post("/respostas/excluir/{cod}", "Questionario:excluirRespostas");


/* executar rota */
$router->dispatch();
if ($router->error()){ var_dump($router->error()); }

