<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200409144805 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE degree ADD enrolledstudent INT NOT NULL');
        $this->addSql('ALTER TABLE academic_level ADD enrolledstudent INT NOT NULL');
        $this->addSql('ALTER TABLE college ADD enrolledstudent INT NOT NULL');
        $this->addSql('ALTER TABLE module ADD enrolledstudent INT NOT NULL');
        $this->addSql('ALTER TABLE document DROP updated_at, CHANGE filename name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE academic_level DROP enrolledstudent');
        $this->addSql('ALTER TABLE college DROP enrolledstudent');
        $this->addSql('ALTER TABLE degree DROP enrolledstudent');
        $this->addSql('ALTER TABLE document ADD updated_at DATETIME NOT NULL, CHANGE name filename VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE module DROP enrolledstudent');
    }
}
