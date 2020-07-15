<?php 

use CoffeeCode\Router\Router;

$router = new Router("http://localhost/projeto-crud-contatos");

$router->namespace('Src\App\Controllers');

$router->group('contact');
$router->get("/", 'ContactController:getContacts');
$router->get("/{page}", 'ContactController:getContacts');
$router->post("/", 'ContactController:createContact');
$router->put("/{id}", 'ContactController:updateContact');
$router->delete("/{id}", 'ContactController:deleteContact');

$router->group('phone');
$router->get("/", 'PhoneController:getPhones');
$router->get("/{contact_id}", 'PhoneController:getPhones');
$router->post("/", 'PhoneController:createPhone');
$router->put("/{id}", 'PhoneController:updatePhone');
$router->delete("/{id}", 'PhoneController:deletePhone');


$router->dispatch();

if ($router->error()) {
    echo $router->error();
}

