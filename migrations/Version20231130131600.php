<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231130131600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE handeling ADD taak_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE handeling ADD CONSTRAINT FK_1A931F389796C564 FOREIGN KEY (taak_id) REFERENCES taak (id)');
        $this->addSql('CREATE INDEX IDX_1A931F389796C564 ON handeling (taak_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE handeling DROP FOREIGN KEY FK_1A931F389796C564');
        $this->addSql('DROP INDEX IDX_1A931F389796C564 ON handeling');
        $this->addSql('ALTER TABLE handeling DROP taak_id');
    }
}
