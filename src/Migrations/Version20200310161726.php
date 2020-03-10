<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200310161726 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE academic_data ADD degree_id INT NOT NULL');
        $this->addSql('ALTER TABLE academic_data ADD CONSTRAINT FK_312B6775B35C5756 FOREIGN KEY (degree_id) REFERENCES degree (id)');
        $this->addSql('CREATE INDEX IDX_312B6775B35C5756 ON academic_data (degree_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE academic_data DROP FOREIGN KEY FK_312B6775B35C5756');
        $this->addSql('DROP INDEX IDX_312B6775B35C5756 ON academic_data');
        $this->addSql('ALTER TABLE academic_data DROP degree_id');
    }
}
