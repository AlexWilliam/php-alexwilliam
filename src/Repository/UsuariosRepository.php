<?php

namespace App\Repository;

use App\Entity\Usuarios;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Usuarios|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usuarios|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usuarios[]    findAll()
 * @method Usuarios[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuariosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usuarios::class);
    }

    // /**
    //  * @return Usuarios[] Returns an array of Usuarios objects
    //  */
    public function findByNome(string $nome) {

        return $this->createQueryBuilder('u')
            ->where("u.nome LIKE '%:nome%'")
            ->setParameter('nome', $nome)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    public function findByEmail(string $email) {

        return $this->createQueryBuilder('u')
            ->where("u.email LIKE '%:email%'")
            ->setParameter('email', $email)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    public function findByNomeEmail(string $nome, string $email) {

        return $this->createQueryBuilder('u')
            ->andWhere("u.nome LIKE '%:nome%'")
            ->andWhere("u.email LIKE '%:email%'")
            ->setParameter('nome', $nome)
            ->setParameter('email', $email)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    public function findAll() {

        return $this->createQueryBuilder('u')
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }
}
