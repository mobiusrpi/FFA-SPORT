<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250419111941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors ADD crew_competitor_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors ADD CONSTRAINT FK_2DED50C62D5EC00 FOREIGN KEY (crew_competitor_id) REFERENCES crews (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_2DED50C62D5EC00 ON competitors (crew_competitor_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors DROP FOREIGN KEY FK_2DED50C62D5EC00
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_2DED50C62D5EC00 ON competitors
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors DROP crew_competitor_id
        SQL);
    }
}
