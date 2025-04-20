<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250418172301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE competitors (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(30) NOT NULL, firstname VARCHAR(30) NOT NULL, ffa_licence VARCHAR(15) NOT NULL, date_birth DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', flyingclub VARCHAR(30) DEFAULT NULL, email VARCHAR(128) NOT NULL, phone VARCHAR(30) DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, committee VARCHAR(255) NOT NULL, polo_size VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_2DED50C648C7D41B (ffa_licence), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE competitors_position (competitors_id INT NOT NULL, position_id INT NOT NULL, INDEX IDX_2F52F9AE9763EC7E (competitors_id), INDEX IDX_2F52F9AEDD842E46 (position_id), PRIMARY KEY(competitors_id, position_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE type_competition (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors_position ADD CONSTRAINT FK_2F52F9AE9763EC7E FOREIGN KEY (competitors_id) REFERENCES competitors (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors_position ADD CONSTRAINT FK_2F52F9AEDD842E46 FOREIGN KEY (position_id) REFERENCES position (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors_position DROP FOREIGN KEY FK_2F52F9AE9763EC7E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors_position DROP FOREIGN KEY FK_2F52F9AEDD842E46
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE competitors
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE competitors_position
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE type_competition
        SQL);
    }
}
