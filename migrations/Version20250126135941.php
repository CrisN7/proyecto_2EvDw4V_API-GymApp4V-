<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250126135941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activities_monitors (id INT AUTO_INCREMENT NOT NULL, activity_id_id INT NOT NULL, monitor_id_id INT NOT NULL, INDEX IDX_233F6A726146A8E4 (activity_id_id), INDEX IDX_233F6A72A8F0AFFB (monitor_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activities_monitors ADD CONSTRAINT FK_233F6A726146A8E4 FOREIGN KEY (activity_id_id) REFERENCES activities (id)');
        $this->addSql('ALTER TABLE activities_monitors ADD CONSTRAINT FK_233F6A72A8F0AFFB FOREIGN KEY (monitor_id_id) REFERENCES monitor (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activities_monitors DROP FOREIGN KEY FK_233F6A726146A8E4');
        $this->addSql('ALTER TABLE activities_monitors DROP FOREIGN KEY FK_233F6A72A8F0AFFB');
        $this->addSql('DROP TABLE activities_monitors');
    }
}
