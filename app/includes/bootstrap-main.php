<?php
//functs
require_once __DIR__ . '/functions.php';

//SourceQuery
require_once __DIR__ . '/SourceQuery/bootstrap.php';

//Minecraft Ping/Query
require_once __DIR__ . '/MinecraftQuery-4.0.0/MinecraftQuery.php';
require_once __DIR__ . '/MinecraftQuery-4.0.0/MinecraftQueryException.php';
require_once __DIR__ . '/MinecraftQuery-4.0.0/MinecraftPing.php';
require_once __DIR__ . '/MinecraftQuery-4.0.0/MinecraftPingException.php';

//Parsedown
//require_once __DIR__ . '/Parsedown.php';

//Minify
require_once __DIR__ . '/minify-1.3.63/Minify.php';
require_once __DIR__ . '/minify-1.3.63/CSS.php';
require_once __DIR__ . '/minify-1.3.63/JS.php';
require_once __DIR__ . '/minify-1.3.63/Exception.php';
require_once __DIR__ . '/minify-1.3.63/Exceptions/BasicException.php';
require_once __DIR__ . '/minify-1.3.63/Exceptions/FileImportException.php';
require_once __DIR__ . '/minify-1.3.63/Exceptions/IOException.php';
require_once __DIR__ . '/path-converter-1.1.3/ConverterInterface.php';
require_once __DIR__ . '/path-converter-1.1.3/Converter.php';
?>