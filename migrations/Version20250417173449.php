<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250417173449 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE type_competition (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE typt_competition
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions ADD typecomp_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions ADD CONSTRAINT FK_A7DD463D97E9B770 FOREIGN KEY (typecomp_id) REFERENCES type_competition (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A7DD463D97E9B770 ON competitions (typecomp_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions DROP FOREIGN KEY FK_A7DD463D97E9B770
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE typt_competition (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(30) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE type_competition
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_A7DD463D97E9B770 ON competitions
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions DROP typecomp_id
        SQL);
    }
}
