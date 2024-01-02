<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231130120609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE klant (id INT AUTO_INCREMENT NOT NULL, voornaam VARCHAR(50) NOT NULL, achternaam VARCHAR(255) NOT NULL, straat VARCHAR(255) NOT NULL, huisnummer VARCHAR(5) NOT NULL, postcode VARCHAR(10) NOT NULL, woonplaats VARCHAR(255) NOT NULL, telefoonnummer VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taak (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(255) NOT NULL, tijd INT DEFAULT NULL, omschrijving VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE klant');
        $this->addSql('DROP TABLE taak');
    }
}
