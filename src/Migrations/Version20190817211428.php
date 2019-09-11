<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190817211428 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE transaction ADD comm_etat INT NOT NULL, ADD comm_sys INT NOT NULL, ADD comm_exp INT NOT NULL, ADD comm_recept INT NOT NULL, DROP commission_etat, DROP commission_system, DROP commission_expedit, DROP commission_recept, CHANGE status_transaction status_transaction VARCHAR(25) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE transaction ADD commission_etat INT NOT NULL, ADD commission_system INT NOT NULL, ADD commission_expedit INT NOT NULL, ADD commission_recept INT NOT NULL, DROP comm_etat, DROP comm_sys, DROP comm_exp, DROP comm_recept, CHANGE status_transaction status_transaction VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
