<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231221174939 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'set bloc and position ';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bloc DROP position');
        $this->addSql('ALTER TABLE position DROP FOREIGN KEY FK_462CE4F57BE4F98C');
        $this->addSql('ALTER TABLE position DROP FOREIGN KEY FK_462CE4F5BC3BA448');
        $this->addSql('DROP INDEX UNIQ_462CE4F5BC3BA448 ON position');
        $this->addSql('DROP INDEX UNIQ_462CE4F57BE4F98C ON position');
        // $this->addSql('ALTER TABLE position ADD internaute_id INT DEFAULT NULL, DROP internaute_id_id, DROP bloc_id_id');
        // $this->addSql('ALTER TABLE position ADD CONSTRAINT FK_462CE4F5CAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id)');
        // $this->addSql('CREATE INDEX IDX_462CE4F5CAF41882 ON position (internaute_id)');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bloc ADD position INT DEFAULT NULL');
        $this->addSql('ALTER TABLE position DROP FOREIGN KEY FK_462CE4F5CAF41882');
        $this->addSql('DROP INDEX IDX_462CE4F5CAF41882 ON position');
        $this->addSql('ALTER TABLE position ADD bloc_id_id INT DEFAULT NULL, CHANGE internaute_id internaute_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE position ADD CONSTRAINT FK_462CE4F57BE4F98C FOREIGN KEY (bloc_id_id) REFERENCES bloc (id)');
        $this->addSql('ALTER TABLE position ADD CONSTRAINT FK_462CE4F5BC3BA448 FOREIGN KEY (internaute_id_id) REFERENCES internaute (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_462CE4F5BC3BA448 ON position (internaute_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_462CE4F57BE4F98C ON position (bloc_id_id)');
    }
}
