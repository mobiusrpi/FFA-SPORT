<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250420132027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions DROP FOREIGN KEY FK_A7DD463DDAF94C3D
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_A7DD463DDAF94C3D ON competitions
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions DROP competitiontype_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews DROP FOREIGN KEY FK_3EE854EB1A544A35
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_3EE854EB1A544A35 ON crews
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews DROP competition_id
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE type_competition CHANGE type_comp typecomp VARCHAR(30) NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions ADD competitiontype_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions ADD CONSTRAINT FK_A7DD463DDAF94C3D FOREIGN KEY (competitiontype_id) REFERENCES type_competition (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A7DD463DDAF94C3D ON competitions (competitiontype_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE type_competition CHANGE typecomp type_comp VARCHAR(30) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews ADD competition_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews ADD CONSTRAINT FK_3EE854EB1A544A35 FOREIGN KEY (competition_id) REFERENCES competitions (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_3EE854EB1A544A35 ON crews (competition_id)
        SQL);
    }
}
