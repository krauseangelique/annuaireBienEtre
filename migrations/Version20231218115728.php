<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231218115728 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'creation de la table Prestataire et des relations qui la touche ainsi que mise d\'un nouvel attribut pour l\'entité Bloc c\'est à revoir';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prestataire (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, site_internet VARCHAR(255) DEFAULT NULL, num_tel VARCHAR(255) DEFAULT NULL, num_tva VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_60A26480FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire_categorie_services (prestataire_id INT NOT NULL, categorie_services_id INT NOT NULL, INDEX IDX_E453C499BE3DB2B7 (prestataire_id), INDEX IDX_E453C499710B80C8 (categorie_services_id), PRIMARY KEY(prestataire_id, categorie_services_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire_internaute (prestataire_id INT NOT NULL, internaute_id INT NOT NULL, INDEX IDX_BA91FCF0BE3DB2B7 (prestataire_id), INDEX IDX_BA91FCF0CAF41882 (internaute_id), PRIMARY KEY(prestataire_id, internaute_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prestataire_categorie_services ADD CONSTRAINT FK_E453C499BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_categorie_services ADD CONSTRAINT FK_E453C499710B80C8 FOREIGN KEY (categorie_services_id) REFERENCES categorie_services (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_internaute ADD CONSTRAINT FK_BA91FCF0BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestataire_internaute ADD CONSTRAINT FK_BA91FCF0CAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bloc ADD position INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD prestataire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCBE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE INDEX IDX_67F068BCBE3DB2B7 ON commentaire (prestataire_id)');
        $this->addSql('ALTER TABLE image ADD prestataire_id INT DEFAULT NULL, ADD prestataire_photo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FBE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FBA6A6AFF FOREIGN KEY (prestataire_photo_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE INDEX IDX_C53D045FBE3DB2B7 ON image (prestataire_id)');
        $this->addSql('CREATE INDEX IDX_C53D045FBA6A6AFF ON image (prestataire_photo_id)');
        $this->addSql('ALTER TABLE promotion ADD prestataire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD1BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE INDEX IDX_C11D7DD1BE3DB2B7 ON promotion (prestataire_id)');
        $this->addSql('ALTER TABLE stage ADD prestataire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C9369BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('CREATE INDEX IDX_C27C9369BE3DB2B7 ON stage (prestataire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCBE3DB2B7');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FBE3DB2B7');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FBA6A6AFF');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD1BE3DB2B7');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C9369BE3DB2B7');
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480FB88E14F');
        $this->addSql('ALTER TABLE prestataire_categorie_services DROP FOREIGN KEY FK_E453C499BE3DB2B7');
        $this->addSql('ALTER TABLE prestataire_categorie_services DROP FOREIGN KEY FK_E453C499710B80C8');
        $this->addSql('ALTER TABLE prestataire_internaute DROP FOREIGN KEY FK_BA91FCF0BE3DB2B7');
        $this->addSql('ALTER TABLE prestataire_internaute DROP FOREIGN KEY FK_BA91FCF0CAF41882');
        $this->addSql('DROP TABLE prestataire');
        $this->addSql('DROP TABLE prestataire_categorie_services');
        $this->addSql('DROP TABLE prestataire_internaute');
        $this->addSql('ALTER TABLE bloc DROP position');
        $this->addSql('DROP INDEX IDX_67F068BCBE3DB2B7 ON commentaire');
        $this->addSql('ALTER TABLE commentaire DROP prestataire_id');
        $this->addSql('DROP INDEX IDX_C53D045FBE3DB2B7 ON image');
        $this->addSql('DROP INDEX IDX_C53D045FBA6A6AFF ON image');
        $this->addSql('ALTER TABLE image DROP prestataire_id, DROP prestataire_photo_id');
        $this->addSql('DROP INDEX IDX_C11D7DD1BE3DB2B7 ON promotion');
        $this->addSql('ALTER TABLE promotion DROP prestataire_id');
        $this->addSql('DROP INDEX IDX_C27C9369BE3DB2B7 ON stage');
        $this->addSql('ALTER TABLE stage DROP prestataire_id');
    }
}
