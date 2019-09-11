<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190911020018 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE transaction ADD retrait_user_id INT DEFAULT NULL, CHANGE comm_recept comm_recept INT NOT NULL');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D164A899FD FOREIGN KEY (retrait_user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_723705D164A899FD ON transaction (retrait_user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D164A899FD');
        $this->addSql('DROP INDEX IDX_723705D164A899FD ON transaction');
        $this->addSql('ALTER TABLE transaction DROP retrait_user_id, CHANGE comm_recept comm_recept INT DEFAULT NULL');
    }
}
