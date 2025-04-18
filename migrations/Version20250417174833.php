<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250417174833 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }
 
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
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
            DROP INDEX IDX_A7DD463D97E9B770 ON competitions
        SQL);
    }
}
