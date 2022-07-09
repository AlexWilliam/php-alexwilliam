<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

use App\Repository\UsuariosRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;


/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass=UsuariosRepository::class)
 * @ORM\Table(name="usuarios")
 */
class Usuarios {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length="30")
     * 
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length="20")
     * 
     */
    private $email;

    /**
     * @Assert\DateTime()
     * @ORM\Column(name="datanascimento", type="datetime")
     * 
     */
    private $dataNascimento;

    /**
     * @ORM\Column(name="listatelefones", type="string", nullable=true)
     * 
     */
    private $listaTelefones;

    /**
     * @ORM\Column(name="datacriacao", type="datetime")
     * 
     */
    private $dataCriacao;

    /**
     * @ORM\Column(name="dataatualizacao", type="datetime")
     * 
     */
    private $dataAtualizacao;

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setEmail(string $email):void {
        $this->email = $email;
    }

    public function getEmail(): string {
        return $this->email;
    }
    
    public function setDataNascimento(\DateTime $dataNascimento):void {
        $this->dataNascimento = $dataNascimento;
    }

    public function getDataNascimento(): \DateTime {
        return $this->dataNascimento;
    }

    public function setListaTelefones(string $listaTelefones):void {
        $this->listaTelefones = $listaTelefones;
    }

    public function getListaTelefones(): string {
        return $this->listaTelefones ?? [];
    }

    public function setDataCriacao(\DateTime $dataCriacao):void {
        $this->dataCriacao = $dataCriacao;
    }

    public function getDataCriacao(): \DateTime {
        return $this->dataCriacao;
    }

    public function setDataAtualizacao(\DateTime $dataAtualizacao):void {
        $this->dataAtualizacao = $dataAtualizacao;
    }

    public function getDataAtualizacao(): \DateTime {
        return $this->dataAtualizacao;
    }
}
