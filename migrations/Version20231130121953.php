<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231130121953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE handeling (id INT AUTO_INCREMENT NOT NULL, bezoek_id INT NOT NULL, INDEX IDX_1A931F3899D8B5A4 (bezoek_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE handeling_taak (handeling_id INT NOT NULL, taak_id INT NOT NULL, INDEX IDX_A1FC9311E865BD62 (handeling_id), INDEX IDX_A1FC93119796C564 (taak_id), PRIMARY KEY(handeling_id, taak_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE handeling ADD CONSTRAINT FK_1A931F3899D8B5A4 FOREIGN KEY (bezoek_id) REFERENCES bezoek (id)');
        $this->addSql('ALTER TABLE handeling_taak ADD CONSTRAINT FK_A1FC9311E865BD62 FOREIGN KEY (handeling_id) REFERENCES handeling (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE handeling_taak ADD CONSTRAINT FK_A1FC93119796C564 FOREIGN KEY (taak_id) REFERENCES taak (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE handeling DROP FOREIGN KEY FK_1A931F3899D8B5A4');
        $this->addSql('ALTER TABLE handeling_taak DROP FOREIGN KEY FK_A1FC9311E865BD62');
        $this->addSql('ALTER TABLE handeling_taak DROP FOREIGN KEY FK_A1FC93119796C564');
        $this->addSql('DROP TABLE handeling');
        $this->addSql('DROP TABLE handeling_taak');
    }
}
