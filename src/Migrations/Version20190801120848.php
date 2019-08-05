<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190801120848 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE depot ADD compte_partenaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE depot ADD CONSTRAINT FK_47948BBC4B64CDD3 FOREIGN KEY (compte_partenaire_id) REFERENCES compte_partenaire (id)');
        $this->addSql('CREATE INDEX IDX_47948BBC4B64CDD3 ON depot (compte_partenaire_id)');
        $this->addSql('ALTER TABLE user ADD partenaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64998DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64998DE13AC ON user (partenaire_id)');
        $this->addSql('ALTER TABLE compte_partenaire ADD partenaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte_partenaire ADD CONSTRAINT FK_FAEB7CCD98DE13AC FOREIGN KEY (partenaire_id) REFERENCES partenaire (id)');
        $this->addSql('CREATE INDEX IDX_FAEB7CCD98DE13AC ON compte_partenaire (partenaire_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compte_partenaire DROP FOREIGN KEY FK_FAEB7CCD98DE13AC');
        $this->addSql('DROP INDEX IDX_FAEB7CCD98DE13AC ON compte_partenaire');
        $this->addSql('ALTER TABLE compte_partenaire DROP partenaire_id');
        $this->addSql('ALTER TABLE depot DROP FOREIGN KEY FK_47948BBC4B64CDD3');
        $this->addSql('DROP INDEX IDX_47948BBC4B64CDD3 ON depot');
        $this->addSql('ALTER TABLE depot DROP compte_partenaire_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64998DE13AC');
        $this->addSql('DROP INDEX IDX_8D93D64998DE13AC ON user');
        $this->addSql('ALTER TABLE user DROP partenaire_id');
    }
}
