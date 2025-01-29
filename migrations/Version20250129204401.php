<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250129204401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, duration INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activity_monitors (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activities_monitors ADD activity_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activities_monitors ADD CONSTRAINT FK_233F6A7281C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('CREATE INDEX IDX_233F6A7281C06096 ON activities_monitors (activity_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activities_monitors DROP FOREIGN KEY FK_233F6A7281C06096');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE activity_monitors');
        $this->addSql('DROP INDEX IDX_233F6A7281C06096 ON activities_monitors');
        $this->addSql('ALTER TABLE activities_monitors DROP activity_id');
    }
}
