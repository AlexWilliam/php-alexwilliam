<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class UsuariosController {

    public function getUsuarios(): Response {

        $response = new Response(json_encode(["nome"=>"Teste"]), 200, ["Content-Type"=>"application/json"]);

        return $response;
    }
}