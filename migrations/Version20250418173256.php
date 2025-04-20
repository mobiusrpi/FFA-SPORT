<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250418173256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE competitions (id INT AUTO_INCREMENT NOT NULL, type_compet_id INT NOT NULL, name VARCHAR(50) NOT NULL, start_date DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', end_date DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', start_registration DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', end_registration DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', location VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_A7DD463DF326A9F8 (type_compet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE competitions_crews (competitions_id INT NOT NULL, crews_id INT NOT NULL, INDEX IDX_D38E2B4C14B3F5BE (competitions_id), INDEX IDX_D38E2B4CB3F00855 (crews_id), PRIMARY KEY(competitions_id, crews_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions ADD CONSTRAINT FK_A7DD463DF326A9F8 FOREIGN KEY (type_compet_id) REFERENCES type_compet (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions_crews ADD CONSTRAINT FK_D38E2B4C14B3F5BE FOREIGN KEY (competitions_id) REFERENCES competitions (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions_crews ADD CONSTRAINT FK_D38E2B4CB3F00855 FOREIGN KEY (crews_id) REFERENCES crews (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions DROP FOREIGN KEY FK_A7DD463DF326A9F8
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions_crews DROP FOREIGN KEY FK_D38E2B4C14B3F5BE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions_crews DROP FOREIGN KEY FK_D38E2B4CB3F00855
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE competitions
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE competitions_crews
        SQL);
    }
}
