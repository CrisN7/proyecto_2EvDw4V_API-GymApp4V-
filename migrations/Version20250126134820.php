<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250126134820 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activities (id INT AUTO_INCREMENT NOT NULL, activity_type_id_id INT NOT NULL, date_time_activity DATETIME NOT NULL, INDEX IDX_B5F1AFE524AA27A8 (activity_type_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activities_monitors (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activities_monitors_activities (activities_monitors_id INT NOT NULL, activities_id INT NOT NULL, INDEX IDX_30404AA01840D73D (activities_monitors_id), INDEX IDX_30404AA02A4DB562 (activities_id), PRIMARY KEY(activities_monitors_id, activities_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activities_monitors_monitor (activities_monitors_id INT NOT NULL, monitor_id INT NOT NULL, INDEX IDX_27A31D121840D73D (activities_monitors_id), INDEX IDX_27A31D124CE1C902 (monitor_id), PRIMARY KEY(activities_monitors_id, monitor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activities ADD CONSTRAINT FK_B5F1AFE524AA27A8 FOREIGN KEY (activity_type_id_id) REFERENCES activity_type (id)');
        $this->addSql('ALTER TABLE activities_monitors_activities ADD CONSTRAINT FK_30404AA01840D73D FOREIGN KEY (activities_monitors_id) REFERENCES activities_monitors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activities_monitors_activities ADD CONSTRAINT FK_30404AA02A4DB562 FOREIGN KEY (activities_id) REFERENCES activities (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activities_monitors_monitor ADD CONSTRAINT FK_27A31D121840D73D FOREIGN KEY (activities_monitors_id) REFERENCES activities_monitors (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activities_monitors_monitor ADD CONSTRAINT FK_27A31D124CE1C902 FOREIGN KEY (monitor_id) REFERENCES monitor (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activities DROP FOREIGN KEY FK_B5F1AFE524AA27A8');
        $this->addSql('ALTER TABLE activities_monitors_activities DROP FOREIGN KEY FK_30404AA01840D73D');
        $this->addSql('ALTER TABLE activities_monitors_activities DROP FOREIGN KEY FK_30404AA02A4DB562');
        $this->addSql('ALTER TABLE activities_monitors_monitor DROP FOREIGN KEY FK_27A31D121840D73D');
        $this->addSql('ALTER TABLE activities_monitors_monitor DROP FOREIGN KEY FK_27A31D124CE1C902');
        $this->addSql('DROP TABLE activities');
        $this->addSql('DROP TABLE activities_monitors');
        $this->addSql('DROP TABLE activities_monitors_activities');
        $this->addSql('DROP TABLE activities_monitors_monitor');
    }
}
