<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250418172901 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE crews (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, callsign VARCHAR(8) NOT NULL, aircraft_speed VARCHAR(255) NOT NULL, aircraft_type VARCHAR(20) DEFAULT NULL, aircraft_flyingclub VARCHAR(30) DEFAULT NULL, aircraft_sharing TINYINT(1) NOT NULL, pilot_shared VARCHAR(30) DEFAULT NULL, payment LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE crews_competitors (crews_id INT NOT NULL, competitors_id INT NOT NULL, INDEX IDX_40F6BDBDB3F00855 (crews_id), INDEX IDX_40F6BDBD9763EC7E (competitors_id), PRIMARY KEY(crews_id, competitors_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews_competitors ADD CONSTRAINT FK_40F6BDBDB3F00855 FOREIGN KEY (crews_id) REFERENCES crews (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews_competitors ADD CONSTRAINT FK_40F6BDBD9763EC7E FOREIGN KEY (competitors_id) REFERENCES competitors (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE crews_competitors DROP FOREIGN KEY FK_40F6BDBDB3F00855
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews_competitors DROP FOREIGN KEY FK_40F6BDBD9763EC7E
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE crews
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE crews_competitors
        SQL);
    }
}
