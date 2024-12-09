<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241205204951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Adds pages table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE pages (id SERIAL NOT NULL, url VARCHAR(255) NOT NULL, traffic INT NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE pages');
    }
}
