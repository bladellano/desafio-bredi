<?php

ob_start();

session_start();

require __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$app = new Router(site());
$app->namespace("Source\Controllers");

/**
 * WEB
 */

$app->group(null);
$app->get("/","Web:home","web.home");
$app->get("/cadastro","Web:create","web.create");
$app->get("/produtos","Web:products","web.products");
$app->get("/editar/{id}","Web:edit","web.edit");

$app->group(null);
$app->post("/register","Product:register","product.register");
$app->get("/deletar/{id}","Product:delete","product.delete");
$app->post("/update/{id}","Product:update","product.update");

/**
 * ERRORS
 */
$app->group("ops");
$app->get("/{errcode}","Web:error","web.error");

/**
 * ROUTE PROCESS
 */

$app->dispatch();
/**
 * ERRORS PROCESS
 */

if($app->error()){
    $app->redirect("web.error",['errcode'=>$app->error()]);
}

ob_end_flush();


