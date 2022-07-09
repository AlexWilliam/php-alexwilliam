<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220709121114 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $sqlUsuarios = "CREATE TABLE usuarios (
                id SERIAL primary key,
                nome varchar(30) NOT NULL,
                email varchar(20) NOT NULL,
                dataNascimento timestamp NOT NULL,
                listaTelefones int[] NULL,
                dataCriacao timestamp NULL,
                dataAtualizacao timestamp NULL
            )";

        $this->addSql($sqlUsuarios);

        $sqlTelefones = "CREATE TABLE telefones (
            id SERIAL primary key,
            ddd char(2) NOT NULL,
            numero varchar(10) NOT NULL,
            dataCriacao timestamp,
            dataAtualizacao timestamp
        )";

        $this->addSql($sqlTelefones);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
