<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240314173913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'changement table commune et province';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE region_ville_codepostal');
        $this->addSql('ALTER TABLE commune DROP FOREIGN KEY FK_E2E2D1EEB2B59251');
        $this->addSql('ALTER TABLE commune DROP FOREIGN KEY FK_E2E2D1EEE946114A');
        $this->addSql('DROP INDEX IDX_E2E2D1EEB2B59251 ON commune');
        $this->addSql('DROP INDEX IDX_E2E2D1EEE946114A ON commune');
        $this->addSql('ALTER TABLE commune DROP code_postal_id, DROP province_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE region_ville_codepostal (region VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, codePostal VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, ville VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commune ADD code_postal_id INT DEFAULT NULL, ADD province_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commune ADD CONSTRAINT FK_E2E2D1EEB2B59251 FOREIGN KEY (code_postal_id) REFERENCES code_postal (id)');
        $this->addSql('ALTER TABLE commune ADD CONSTRAINT FK_E2E2D1EEE946114A FOREIGN KEY (province_id) REFERENCES province (id)');
        $this->addSql('CREATE INDEX IDX_E2E2D1EEB2B59251 ON commune (code_postal_id)');
        $this->addSql('CREATE INDEX IDX_E2E2D1EEE946114A ON commune (province_id)');
    }
}
