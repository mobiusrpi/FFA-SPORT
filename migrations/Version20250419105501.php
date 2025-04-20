<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250419105501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions DROP FOREIGN KEY FK_A7DD463DF326A9F8
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews_competitions DROP FOREIGN KEY FK_6067F56414B3F5BE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews_competitions DROP FOREIGN KEY FK_6067F564B3F00855
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions_crews DROP FOREIGN KEY FK_D38E2B4C14B3F5BE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions_crews DROP FOREIGN KEY FK_D38E2B4CB3F00855
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors_position DROP FOREIGN KEY FK_2F52F9AE9763EC7E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors_position DROP FOREIGN KEY FK_2F52F9AEDD842E46
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews_competitors DROP FOREIGN KEY FK_40F6BDBD9763EC7E
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews_competitors DROP FOREIGN KEY FK_40F6BDBDB3F00855
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE crews_competitions
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE competitions_crews
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE competitors_position
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE crews_competitors
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE type_compet
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_A7DD463DF326A9F8 ON competitions
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions DROP type_compet_id
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE crews_competitions (crews_id INT NOT NULL, competitions_id INT NOT NULL, INDEX IDX_6067F564B3F00855 (crews_id), INDEX IDX_6067F56414B3F5BE (competitions_id), PRIMARY KEY(crews_id, competitions_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE competitions_crews (competitions_id INT NOT NULL, crews_id INT NOT NULL, INDEX IDX_D38E2B4C14B3F5BE (competitions_id), INDEX IDX_D38E2B4CB3F00855 (crews_id), PRIMARY KEY(competitions_id, crews_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE competitors_position (competitors_id INT NOT NULL, position_id INT NOT NULL, INDEX IDX_2F52F9AE9763EC7E (competitors_id), INDEX IDX_2F52F9AEDD842E46 (position_id), PRIMARY KEY(competitors_id, position_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE crews_competitors (crews_id INT NOT NULL, competitors_id INT NOT NULL, INDEX IDX_40F6BDBDB3F00855 (crews_id), INDEX IDX_40F6BDBD9763EC7E (competitors_id), PRIMARY KEY(crews_id, competitors_id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE type_compet (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(30) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb3 COLLATE `utf8mb3_unicode_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews_competitions ADD CONSTRAINT FK_6067F56414B3F5BE FOREIGN KEY (competitions_id) REFERENCES competitions (id) ON UPDATE NO ACTION ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews_competitions ADD CONSTRAINT FK_6067F564B3F00855 FOREIGN KEY (crews_id) REFERENCES crews (id) ON UPDATE NO ACTION ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions_crews ADD CONSTRAINT FK_D38E2B4C14B3F5BE FOREIGN KEY (competitions_id) REFERENCES competitions (id) ON UPDATE NO ACTION ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions_crews ADD CONSTRAINT FK_D38E2B4CB3F00855 FOREIGN KEY (crews_id) REFERENCES crews (id) ON UPDATE NO ACTION ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors_position ADD CONSTRAINT FK_2F52F9AE9763EC7E FOREIGN KEY (competitors_id) REFERENCES competitors (id) ON UPDATE NO ACTION ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitors_position ADD CONSTRAINT FK_2F52F9AEDD842E46 FOREIGN KEY (position_id) REFERENCES position (id) ON UPDATE NO ACTION ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews_competitors ADD CONSTRAINT FK_40F6BDBD9763EC7E FOREIGN KEY (competitors_id) REFERENCES competitors (id) ON UPDATE NO ACTION ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE crews_competitors ADD CONSTRAINT FK_40F6BDBDB3F00855 FOREIGN KEY (crews_id) REFERENCES crews (id) ON UPDATE NO ACTION ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions ADD type_compet_id INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE competitions ADD CONSTRAINT FK_A7DD463DF326A9F8 FOREIGN KEY (type_compet_id) REFERENCES type_compet (id) ON UPDATE NO ACTION ON DELETE NO ACTION
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_A7DD463DF326A9F8 ON competitions (type_compet_id)
        SQL);
    }
}
