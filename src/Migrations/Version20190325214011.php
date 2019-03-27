<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190325214011 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pages DROP FOREIGN KEY FK_2074E575727ACA70');
        $this->addSql('ALTER TABLE pages_translations DROP FOREIGN KEY FK_EAA721E0C4663E4');
        $this->addSql('CREATE TABLE block (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE block_translation (id INT AUTO_INCREMENT NOT NULL, block_id INT NOT NULL, label VARCHAR(255) NOT NULL, lang VARCHAR(2) NOT NULL, INDEX IDX_6E6410B4E9ED820C (block_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE instance (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE block_translation ADD CONSTRAINT FK_6E6410B4E9ED820C FOREIGN KEY (block_id) REFERENCES block (id)');
        $this->addSql('DROP TABLE pages');
        $this->addSql('DROP TABLE pages_translations');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE block_translation DROP FOREIGN KEY FK_6E6410B4E9ED820C');
        $this->addSql('CREATE TABLE pages (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_2074E575727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE pages_translations (id INT AUTO_INCREMENT NOT NULL, page_id INT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, h1 VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, slug VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, lang VARCHAR(2) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_EAA721E0C4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pages ADD CONSTRAINT FK_2074E575727ACA70 FOREIGN KEY (parent_id) REFERENCES pages (id)');
        $this->addSql('ALTER TABLE pages_translations ADD CONSTRAINT FK_EAA721E0C4663E4 FOREIGN KEY (page_id) REFERENCES pages (id)');
        $this->addSql('DROP TABLE block');
        $this->addSql('DROP TABLE block_translation');
        $this->addSql('DROP TABLE instance');
    }
}
