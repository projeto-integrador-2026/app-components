<?php
//----------------------------------------------
// Configuração de ambiente
//----------------------------------------------

define('DEV_ENVIRONMENT', true);

if (defined('DEV_ENVIRONMENT') && DEV_ENVIRONMENT) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

//----------------------------------------------
// Configuração da aplicação
//----------------------------------------------

define('APP_NAME', 'Meu Sistema');

//TODO PARA APACHE
define('BASE_URL', getenv('BASE_URL') !== false ? getenv('BASE_URL') : 'http://localhost/projetointegrador-lab');

//----------------------------------------------
// Configuração do banco de dados
//----------------------------------------------
define('DB_HOST', 'localhost');
define('DB_NAME',  getenv('DB_NAME') !== false ? getenv('DB_NAME') : 'bd_projeto_integrador');
define('DB_USER',  getenv('DB_USER') !== false ? getenv('DB_USER') : 'root');
define('DB_PASS',  getenv('DB_PASS') !== false ? getenv('DB_PASS') : 'bancodedados');
