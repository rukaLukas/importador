<?php

// phpinfo();
use App\Importador;

require __DIR__ . '/vendor/autoload.php';

$importador = new Importador();
$importador->exec();

// echo "LOADED!!!!!!!!!";