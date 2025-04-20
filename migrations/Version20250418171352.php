<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250418171352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE position (id INT AUTO_INCREMENT NOT NULL, item VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE type_compet (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions DROP FOREIGN KEY FK_A7DD463D97E9B770
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions_crews DROP FOREIGN KEY FK_D38E2B4C14B3F5BE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions_crews DROP FOREIGN KEY FK_D38E2B4CB3F00855
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors DROP FOREIGN KEY FK_2DED50C6B3F00855
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE competitions
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE competitions_crews
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE competitors
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE crews
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE competitions (id INT AUTO_INCREMENT NOT NULL, typecomp_id INT NOT NULL, name VARCHAR(50) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, start_date DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', end_date DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', start_registration DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', end_registration DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', location VARCHAR(50) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_A7DD463D97E9B770 (typecomp_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE competitions_crews (competitions_id INT NOT NULL, crews_id INT NOT NULL, INDEX IDX_D38E2B4C14B3F5BE (competitions_id), INDEX IDX_D38E2B4CB3F00855 (crews_id), PRIMARY KEY(competitions_id, crews_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE competitors (id INT AUTO_INCREMENT NOT NULL, crews_id INT DEFAULT NULL, lastname VARCHAR(30) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, firstname VARCHAR(30) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, ffa_licence VARCHAR(15) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, date_birth DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', flyingclub VARCHAR(30) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, email VARCHAR(128) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, phone VARCHAR(30) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, gender VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, committee VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, polo_size VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, UNIQUE INDEX UNIQ_2DED50C648C7D41B (ffa_licence), INDEX IDX_2DED50C6B3F00855 (crews_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE crews (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, callsign VARCHAR(8) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, aircraft_speed VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, aircraft_type VARCHAR(20) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, aircraft_flyingclub VARCHAR(30) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, aircraft_sharing TINYINT(1) NOT NULL, pilot_shared VARCHAR(30) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, payment LONGTEXT CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions ADD CONSTRAINT FK_A7DD463D97E9B770 FOREIGN KEY (typecomp_id) REFERENCES type_competition (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions_crews ADD CONSTRAINT FK_D38E2B4C14B3F5BE FOREIGN KEY (competitions_id) REFERENCES competitions (id) ON UPDATE NO ACTION ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions_crews ADD CONSTRAINT FK_D38E2B4CB3F00855 FOREIGN KEY (crews_id) REFERENCES crews (id) ON UPDATE NO ACTION ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors ADD CONSTRAINT FK_2DED50C6B3F00855 FOREIGN KEY (crews_id) REFERENCES crews (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE position
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE type_compet
        SQL);
    }
}
