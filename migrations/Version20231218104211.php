<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231218104211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD profiel_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BCE23F43 FOREIGN KEY (profiel_id) REFERENCES medewerker (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649BCE23F43 ON user (profiel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BCE23F43');
        $this->addSql('DROP INDEX UNIQ_8D93D649BCE23F43 ON user');
        $this->addSql('ALTER TABLE user DROP profiel_id');
    }
}
