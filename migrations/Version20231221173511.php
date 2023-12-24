<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231221173511 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'deleted Internaute position';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE internaute_bloc DROP FOREIGN KEY FK_B4CC2BA75582E9C0');
        $this->addSql('ALTER TABLE internaute_bloc DROP FOREIGN KEY FK_B4CC2BA7CAF41882');
        $this->addSql('DROP TABLE internaute_bloc');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE internaute_bloc (internaute_id INT NOT NULL, bloc_id INT NOT NULL, INDEX IDX_B4CC2BA7CAF41882 (internaute_id), INDEX IDX_B4CC2BA75582E9C0 (bloc_id), PRIMARY KEY(internaute_id, bloc_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE internaute_bloc ADD CONSTRAINT FK_B4CC2BA75582E9C0 FOREIGN KEY (bloc_id) REFERENCES bloc (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE internaute_bloc ADD CONSTRAINT FK_B4CC2BA7CAF41882 FOREIGN KEY (internaute_id) REFERENCES internaute (id) ON DELETE CASCADE');
    }
}
