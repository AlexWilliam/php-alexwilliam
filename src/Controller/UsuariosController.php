<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Services\UsuariosService;

class UsuariosController {

    private $usuariosService;

    /*public function __construct(UsuariosService $usuariosService) {
        $this->usuariosService = $usuariosService;
    }*/

    public function getUsuarios(Request $params): Response {

        $nome = $params->query->get("nome") ?? "";
        $email = $params->query->get("email") ?? "";

        $response = new Response(json_encode(["nome"=>$nome, "email"=>$email]), 200, ["Content-Type"=>"application/json"]);

        return $response;
    }
}
