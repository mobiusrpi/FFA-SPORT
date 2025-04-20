<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250419113232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE crews ADD competition_crew_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews ADD CONSTRAINT FK_3EE854EB40579958 FOREIGN KEY (competition_crew_id) REFERENCES competitions (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_3EE854EB40579958 ON crews (competition_crew_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE crews DROP FOREIGN KEY FK_3EE854EB40579958
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_3EE854EB40579958 ON crews
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews DROP competition_crew_id
        SQL);
    }
}
