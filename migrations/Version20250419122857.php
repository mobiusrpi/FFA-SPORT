<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250419122857 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions_type_competition DROP FOREIGN KEY FK_16BB426014B3F5BE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions_type_competition DROP FOREIGN KEY FK_16BB42602DFAFA86
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE competitions_type_competition
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE competitions_type_competition (competitions_id INT NOT NULL, type_competition_id INT NOT NULL, INDEX IDX_16BB426014B3F5BE (competitions_id), INDEX IDX_16BB42602DFAFA86 (type_competition_id), PRIMARY KEY(competitions_id, type_competition_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions_type_competition ADD CONSTRAINT FK_16BB426014B3F5BE FOREIGN KEY (competitions_id) REFERENCES competitions (id) ON UPDATE NO ACTION ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions_type_competition ADD CONSTRAINT FK_16BB42602DFAFA86 FOREIGN KEY (type_competition_id) REFERENCES type_competition (id) ON UPDATE NO ACTION ON DELETE CASCADE
        SQL);
    }
}
