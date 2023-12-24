<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231221175822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'add relation between bloc and position';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE position ADD bloc_position_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE position ADD CONSTRAINT FK_462CE4F5C40DD82E FOREIGN KEY (bloc_position_id) REFERENCES bloc (id)');
        $this->addSql('CREATE INDEX IDX_462CE4F5C40DD82E ON position (bloc_position_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE position DROP FOREIGN KEY FK_462CE4F5C40DD82E');
        $this->addSql('DROP INDEX IDX_462CE4F5C40DD82E ON position');
        $this->addSql('ALTER TABLE position DROP bloc_position_id');
    }
}
