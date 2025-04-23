<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250421063318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE crews ADD pilot_id INT DEFAULT NULL, ADD navigator_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews ADD CONSTRAINT FK_3EE854EBCE55439B FOREIGN KEY (pilot_id) REFERENCES competitors (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews ADD CONSTRAINT FK_3EE854EB473C72C FOREIGN KEY (navigator_id) REFERENCES competitors (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_3EE854EBCE55439B ON crews (pilot_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_3EE854EB473C72C ON crews (navigator_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE crews DROP FOREIGN KEY FK_3EE854EBCE55439B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews DROP FOREIGN KEY FK_3EE854EB473C72C
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_3EE854EBCE55439B ON crews
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_3EE854EB473C72C ON crews
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews DROP pilot_id, DROP navigator_id
        SQL);
    }
}
