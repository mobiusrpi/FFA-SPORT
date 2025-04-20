<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250420132646 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions ADD typecompetition_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions ADD CONSTRAINT FK_A7DD463DA4842409 FOREIGN KEY (typecompetition_id) REFERENCES type_competition (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A7DD463DA4842409 ON competitions (typecompetition_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews ADD crew_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews ADD CONSTRAINT FK_3EE854EB5FE259F6 FOREIGN KEY (crew_id) REFERENCES competitions (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_3EE854EB5FE259F6 ON crews (crew_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions DROP FOREIGN KEY FK_A7DD463DA4842409
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_A7DD463DA4842409 ON competitions
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions DROP typecompetition_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews DROP FOREIGN KEY FK_3EE854EB5FE259F6
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_3EE854EB5FE259F6 ON crews
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews DROP crew_id
        SQL);
    }
}
