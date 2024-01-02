<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231130121133 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bezoek (id INT AUTO_INCREMENT NOT NULL, medewerker_id INT NOT NULL, klant_id INT NOT NULL, datum DATE NOT NULL, tijd TIME NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_20CF1C183D707F64 (medewerker_id), INDEX IDX_20CF1C183C427B2F (klant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bezoek ADD CONSTRAINT FK_20CF1C183D707F64 FOREIGN KEY (medewerker_id) REFERENCES medewerker (id)');
        $this->addSql('ALTER TABLE bezoek ADD CONSTRAINT FK_20CF1C183C427B2F FOREIGN KEY (klant_id) REFERENCES klant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bezoek DROP FOREIGN KEY FK_20CF1C183D707F64');
        $this->addSql('ALTER TABLE bezoek DROP FOREIGN KEY FK_20CF1C183C427B2F');
        $this->addSql('DROP TABLE bezoek');
    }
}
