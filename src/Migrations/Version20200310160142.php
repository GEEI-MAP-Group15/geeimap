<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200310160142 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE academic_data (id INT AUTO_INCREMENT NOT NULL, college_id INT NOT NULL, academic_level_id INT NOT NULL, INDEX IDX_312B6775770124B2 (college_id), INDEX IDX_312B67756081C3B0 (academic_level_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE academic_data_module (academic_data_id INT NOT NULL, module_id INT NOT NULL, INDEX IDX_A0308014B27B6B9A (academic_data_id), INDEX IDX_A0308014AFC2B591 (module_id), PRIMARY KEY(academic_data_id, module_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE academic_level (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE application (id INT AUTO_INCREMENT NOT NULL, staffuser_id INT DEFAULT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_A45BDDC15B2086AD (staffuser_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE background (id INT AUTO_INCREMENT NOT NULL, previous_university VARCHAR(255) NOT NULL, previous_city VARCHAR(255) NOT NULL, security_reason VARCHAR(255) NOT NULL, is_validated TINYINT(1) NOT NULL, period_type VARCHAR(255) NOT NULL, period_value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE college (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE degree (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, capacity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE degree_module (degree_id INT NOT NULL, module_id INT NOT NULL, INDEX IDX_1C184FADB35C5756 (degree_id), INDEX IDX_1C184FADAFC2B591 (module_id), PRIMARY KEY(degree_id, module_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, student_id INT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_D8698A76CB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, academicdata_id INT NOT NULL, application_id INT NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, date_of_birth DATE NOT NULL, home_address VARCHAR(255) NOT NULL, national_id_number INT NOT NULL, UNIQUE INDEX UNIQ_B723AF33A76ED395 (user_id), UNIQUE INDEX UNIQ_B723AF33253C38ED (academicdata_id), UNIQUE INDEX UNIQ_B723AF333E030ACD (application_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE academic_data ADD CONSTRAINT FK_312B6775770124B2 FOREIGN KEY (college_id) REFERENCES college (id)');
        $this->addSql('ALTER TABLE academic_data ADD CONSTRAINT FK_312B67756081C3B0 FOREIGN KEY (academic_level_id) REFERENCES academic_level (id)');
        $this->addSql('ALTER TABLE academic_data_module ADD CONSTRAINT FK_A0308014B27B6B9A FOREIGN KEY (academic_data_id) REFERENCES academic_data (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE academic_data_module ADD CONSTRAINT FK_A0308014AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC15B2086AD FOREIGN KEY (staffuser_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE degree_module ADD CONSTRAINT FK_1C184FADB35C5756 FOREIGN KEY (degree_id) REFERENCES degree (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE degree_module ADD CONSTRAINT FK_1C184FADAFC2B591 FOREIGN KEY (module_id) REFERENCES module (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A76CB944F1A FOREIGN KEY (student_id) REFERENCES student (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33253C38ED FOREIGN KEY (academicdata_id) REFERENCES academic_data (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF333E030ACD FOREIGN KEY (application_id) REFERENCES application (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE academic_data_module DROP FOREIGN KEY FK_A0308014B27B6B9A');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33253C38ED');
        $this->addSql('ALTER TABLE academic_data DROP FOREIGN KEY FK_312B67756081C3B0');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF333E030ACD');
        $this->addSql('ALTER TABLE academic_data DROP FOREIGN KEY FK_312B6775770124B2');
        $this->addSql('ALTER TABLE degree_module DROP FOREIGN KEY FK_1C184FADB35C5756');
        $this->addSql('ALTER TABLE academic_data_module DROP FOREIGN KEY FK_A0308014AFC2B591');
        $this->addSql('ALTER TABLE degree_module DROP FOREIGN KEY FK_1C184FADAFC2B591');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A76CB944F1A');
        $this->addSql('DROP TABLE academic_data');
        $this->addSql('DROP TABLE academic_data_module');
        $this->addSql('DROP TABLE academic_level');
        $this->addSql('DROP TABLE application');
        $this->addSql('DROP TABLE background');
        $this->addSql('DROP TABLE college');
        $this->addSql('DROP TABLE degree');
        $this->addSql('DROP TABLE degree_module');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE student');
    }
}
