<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250421062930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors DROP FOREIGN KEY FK_2DED50C62D5EC00
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors DROP FOREIGN KEY FK_2DED50C699BDC97F
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_2DED50C62D5EC00 ON competitors
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_2DED50C699BDC97F ON competitors
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors DROP competitor_position_id, DROP crew_competitor_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews RENAME INDEX idx_3ee854eb5fe259f6 TO IDX_3EE854EB7B39D312
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors ADD competitor_position_id INT NOT NULL, ADD crew_competitor_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors ADD CONSTRAINT FK_2DED50C62D5EC00 FOREIGN KEY (crew_competitor_id) REFERENCES crews (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors ADD CONSTRAINT FK_2DED50C699BDC97F FOREIGN KEY (competitor_position_id) REFERENCES positions (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_2DED50C62D5EC00 ON competitors (crew_competitor_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_2DED50C699BDC97F ON competitors (competitor_position_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews RENAME INDEX idx_3ee854eb7b39d312 TO IDX_3EE854EB5FE259F6
        SQL);
    }
}
