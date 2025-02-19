<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231221150457 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'add Position Entity';
    }

    public function up(Schema $schema): void
    {
        //this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE position (id INT AUTO_INCREMENT NOT NULL, internaute_id_id INT DEFAULT NULL, bloc_id_id INT DEFAULT NULL, ordre INT DEFAULT NULL, UNIQUE INDEX UNIQ_462CE4F5BC3BA448 (internaute_id_id), UNIQUE INDEX UNIQ_462CE4F57BE4F98C (bloc_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE position ADD CONSTRAINT FK_462CE4F5BC3BA448 FOREIGN KEY (internaute_id_id) REFERENCES internaute (id)');
        $this->addSql('ALTER TABLE position ADD CONSTRAINT FK_462CE4F57BE4F98C FOREIGN KEY (bloc_id_id) REFERENCES bloc (id)');
        $this->addSql('ALTER TABLE internaute DROP FOREIGN KEY FK_6C8E97CCFB88E14F');
        $this->addSql('DROP INDEX UNIQ_6C8E97CCFB88E14F ON internaute');
        $this->addSql('ALTER TABLE internaute DROP utilisateur_id');
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480FB88E14F');
        $this->addSql('DROP INDEX UNIQ_60A26480FB88E14F ON prestataire');
        $this->addSql('ALTER TABLE prestataire DROP utilisateur_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE position DROP FOREIGN KEY FK_462CE4F5BC3BA448');
        $this->addSql('ALTER TABLE position DROP FOREIGN KEY FK_462CE4F57BE4F98C');
        $this->addSql('DROP TABLE position');
        $this->addSql('ALTER TABLE internaute ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE internaute ADD CONSTRAINT FK_6C8E97CCFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6C8E97CCFB88E14F ON internaute (utilisateur_id)');
        $this->addSql('ALTER TABLE prestataire ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_60A26480FB88E14F ON prestataire (utilisateur_id)');
    }
}
