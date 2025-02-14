<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231218155132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'refactoring class Prestataire et class Internaute qui hérite des propriétés de class User';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE prestataire_internaute DROP FOREIGN KEY FK_BA91FCF0CAF41882');
        $this->addSql('ALTER TABLE prestataire_internaute DROP FOREIGN KEY FK_BA91FCF0BE3DB2B7');
        $this->addSql('DROP TABLE prestataire_internaute');
        $this->addSql('ALTER TABLE image ADD photo_prestataire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FA60EC4EA FOREIGN KEY (photo_prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE INDEX IDX_C53D045FA60EC4EA ON image (photo_prestataire_id)');
        $this->addSql('ALTER TABLE internaute CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE internaute ADD CONSTRAINT FK_6C8E97CCBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480BF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prestataire_internaute (prestataire_id INT NOT NULL, internaute_id INT NOT NULL, INDEX IDX_BA91FCF0BE3DB2B7 (prestataire_id), INDEX IDX_BA91FCF0CAF41882 (internaute_id), PRIMARY KEY(prestataire_id, internaute_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE prestataire_internaute ADD CONSTRAINT FK_BA91FCF0CAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_internaute ADD CONSTRAINT FK_BA91FCF0BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FA60EC4EA');
        $this->addSql('DROP INDEX IDX_C53D045FA60EC4EA ON image');
        $this->addSql('ALTER TABLE image DROP photo_prestataire_id');
        $this->addSql('ALTER TABLE internaute DROP FOREIGN KEY FK_6C8E97CCBF396750');
        $this->addSql('ALTER TABLE internaute CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480BF396750');
        $this->addSql('ALTER TABLE prestataire CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }
}
