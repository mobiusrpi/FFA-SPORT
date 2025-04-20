<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250418173504 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE crews_competitions (crews_id INT NOT NULL, competitions_id INT NOT NULL, INDEX IDX_6067F564B3F00855 (crews_id), INDEX IDX_6067F56414B3F5BE (competitions_id), PRIMARY KEY(crews_id, competitions_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews_competitions ADD CONSTRAINT FK_6067F564B3F00855 FOREIGN KEY (crews_id) REFERENCES crews (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews_competitions ADD CONSTRAINT FK_6067F56414B3F5BE FOREIGN KEY (competitions_id) REFERENCES competitions (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE crews_competitions DROP FOREIGN KEY FK_6067F564B3F00855
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews_competitions DROP FOREIGN KEY FK_6067F56414B3F5BE
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE crews_competitions
        SQL);
    }
}
