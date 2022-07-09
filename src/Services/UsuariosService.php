<?php

namespace App\Services;

use App\Repository\UsuariosRepository;
use Symfony\Component\Validator\Constraints as Asserts;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Usuarios;

class UsuariosService {

    private $repository;
    private $emi;

    public function __construct(UsuariosRepository $usuariosRepository, EntityManagerInterface $emi) {
        $this->repository = $usuariosRepository;
        $this->emi = $emi;
    }

    public function getUsuarios(string $nome = null, string $email = null): string {

        if(!empty($nome) && !empty($email)){
            $dados = $this->repository->findByNomeEmail($nome, $email);
        }else if(!empty($nome)){
            $dados = $this->repository->findByNome($nome);
        }else if(!empty($email)){
            $dados = $this->repository->findByEmail($email);
        }else{
            $dados = $this->repository->findAll();
        }

        $retorno = [];
        foreach($dados as $usuario){
            array_push($retorno, [
                'id' => $usuario->getId(),
                'nome' =>  $usuario->getNome(),
                'email' =>  $usuario->getEmail(),
                'dataNascimento' =>  $usuario->getDataNascimento(),
                'listaTelefones' =>  $usuario->getListaTelefones(),
                'dataCriacao' =>  $usuario->getDataCriacao(),
                'dataAtualizacao' => $usuario->getDataAtualizacao() 
            ]);
        }

        return json_encode($retorno);
    }

    public function insertUsuarios(Array $usuario){

        $cadastro = new Usuarios();

        $cadastro->setNome($usuario['nome']);
        $cadastro->setEmail($usuario['email']);
        $cadastro->setDataNascimento(new \DateTime($usuario['dataNascimento']));
        $cadastro->setListaTelefones('{}');
        $cadastro->setDataCriacao(new \DateTime());
        $cadastro->setDataAtualizacao(new \DateTime());

        $this->emi->persist($cadastro);
        $this->emi->flush();

        return true;
    }

    public function updateUsuarios(Array $usuario, int $id){

        $cadastro = $this->repository->find($id);

        $cadastro->setNome($usuario['nome']);
        $cadastro->setEmail($usuario['email']);
        $cadastro->setDataNascimento(new \DateTime($usuario['dataNascimento']));
        $cadastro->setListaTelefones('{}');
        $cadastro->setDataCriacao(new \DateTime($usuario['dataCriacao']));
        $cadastro->setDataAtualizacao(new \DateTime());

        $this->emi->flush();

        return true;
    }
}