<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231221182153 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'favoris internaute prestataire';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE internaute_prestataire (internaute_id INT NOT NULL, prestataire_id INT NOT NULL, INDEX IDX_D906EC3ACAF41882 (internaute_id), INDEX IDX_D906EC3ABE3DB2B7 (prestataire_id), PRIMARY KEY(internaute_id, prestataire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE internaute_prestataire ADD CONSTRAINT FK_D906EC3ACAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE internaute_prestataire ADD CONSTRAINT FK_D906EC3ABE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE internaute_prestataire DROP FOREIGN KEY FK_D906EC3ACAF41882');
        $this->addSql('ALTER TABLE internaute_prestataire DROP FOREIGN KEY FK_D906EC3ABE3DB2B7');
        $this->addSql('DROP TABLE internaute_prestataire');
    }
}
