<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250419131746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE crews ADD competion_crew_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews ADD CONSTRAINT FK_3EE854EBEFA88A72 FOREIGN KEY (competion_crew_id) REFERENCES competitions (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_3EE854EBEFA88A72 ON crews (competion_crew_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE crews DROP FOREIGN KEY FK_3EE854EBEFA88A72
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_3EE854EBEFA88A72 ON crews
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews DROP competion_crew_id
        SQL);
    }
}
