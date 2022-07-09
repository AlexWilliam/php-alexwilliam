<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Services\UsuariosService;

class UsuariosController {

    private $usuariosService;

    public function __construct(UsuariosService $usuariosService) {
        $this->usuariosService = $usuariosService;
    }

    public function getUsuarios(Request $params): Response {

        $nome = $params->query->get("nome") ?? "";
        $email = $params->query->get("email") ?? "";

        $response = new Response($this->usuariosService->getUsuarios($nome, $email));

        return $response;
    }

    public function insertUsuarios(Request $params): Response {

        $dados = json_decode($params->getContent());

        $data = [
            "nome" => $dados->nome,
            "email" => $dados->email,
            "dataNascimento" => $dados->dataNascimento,
            "listaTelefones" => $dados->listaTelefones,
            "dataCriacao" => $dados->dataCriacao,
            "dataAtualizacao" => $dados->dataAtualizacao
        ];

        if(!$this->usuariosService->insertUsuarios($data)){
            return new Response(json_encode(["message"=>"Erro ao cadastrar"]), 400);
        }

        return new Response(json_encode(["message"=>"Usuário cadastrado com sucesso!"]), 201);        
    }

    public function updateUsuarios(Request $params): Response {

        $dados = json_decode($params->getContent());

        $data = [
            "nome" => $dados->nome,
            "email" => $dados->email,
            "dataNascimento" => $dados->dataNascimento,
            "listaTelefones" => $dados->listaTelefones,
            "dataCriacao" => $dados->dataCriacao,
            "dataAtualizacao" => $dados->dataAtualizacao
        ];

        if(!$this->usuariosService->updateUsuarios($data, $dados->id)){
            return new Response(json_encode(["message"=>"Erro ao cadastrar"]), 400);
        }

        return new Response(json_encode(["message"=>"Usuário cadastrado com sucesso!"]), 204);
    }
}
