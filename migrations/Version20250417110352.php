<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250417110352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE competitors (id INT AUTO_INCREMENT NOT NULL, lasrname VARCHAR(30) NOT NULL, firstname VARCHAR(30) NOT NULL, ffa_licence VARCHAR(15) NOT NULL, date_birth DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', flyingclub VARCHAR(30) DEFAULT NULL, email VARCHAR(128) NOT NULL, phone VARCHAR(30) DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, committee VARCHAR(255) NOT NULL, polo_size VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_2DED50C648C7D41B (ffa_licence), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE crew_competitors (crew_id INT NOT NULL, competitors_id INT NOT NULL, INDEX IDX_9594A6D25FE259F6 (crew_id), INDEX IDX_9594A6D29763EC7E (competitors_id), PRIMARY KEY(crew_id, competitors_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE type_competition (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crew_competitors ADD CONSTRAINT FK_9594A6D25FE259F6 FOREIGN KEY (crew_id) REFERENCES crew (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crew_competitors ADD CONSTRAINT FK_9594A6D29763EC7E FOREIGN KEY (competitors_id) REFERENCES competitors (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crew ADD category VARCHAR(255) NOT NULL, ADD callsign VARCHAR(8) NOT NULL, ADD aircraft_speed VARCHAR(255) NOT NULL, ADD aircraft_type VARCHAR(20) DEFAULT NULL, ADD aircraft_flyingclub VARCHAR(30) DEFAULT NULL, ADD aircraft_sharing TINYINT(1) NOT NULL, ADD pilot_shared VARCHAR(30) DEFAULT NULL, ADD payment LONGTEXT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD is_verfied TINYINT(1) NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE crew_competitors DROP FOREIGN KEY FK_9594A6D25FE259F6
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crew_competitors DROP FOREIGN KEY FK_9594A6D29763EC7E
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE competitors
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE crew_competitors
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE type_competition
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crew DROP category, DROP callsign, DROP aircraft_speed, DROP aircraft_type, DROP aircraft_flyingclub, DROP aircraft_sharing, DROP pilot_shared, DROP payment
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP is_verfied
        SQL);
    }
}
