<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250419111018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors ADD competitor_position_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors ADD CONSTRAINT FK_2DED50C699BDC97F FOREIGN KEY (competitor_position_id) REFERENCES positions (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_2DED50C699BDC97F ON competitors (competitor_position_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors DROP FOREIGN KEY FK_2DED50C699BDC97F
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_2DED50C699BDC97F ON competitors
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors DROP competitor_position_id
        SQL);
    }
}
