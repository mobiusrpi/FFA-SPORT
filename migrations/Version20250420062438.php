<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250420062438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions ADD competition_type_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions ADD CONSTRAINT FK_A7DD463DDAF94C3D FOREIGN KEY (competition_type_id) REFERENCES type_competition (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A7DD463DDAF94C3D ON competitions (competition_type_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions DROP FOREIGN KEY FK_A7DD463DDAF94C3D
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_A7DD463DDAF94C3D ON competitions
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions DROP competition_type_id
        SQL);
    }
}
