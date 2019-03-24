<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190324141736 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE blocks (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, INDEX IDX_CEED9578727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blocks_fields (id INT AUTO_INCREMENT NOT NULL, field_order INT NOT NULL, label VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blocks_instances (id INT AUTO_INCREMENT NOT NULL, block_name_id INT NOT NULL, INDEX IDX_D6D0B70FB346828 (block_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blocks_instances_images (id INT AUTO_INCREMENT NOT NULL, block_instance_id INT NOT NULL, block_field_id INT NOT NULL, INDEX IDX_626193D1E05C27C6 (block_instance_id), INDEX IDX_626193D11E48FB5F (block_field_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pages (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_2074E575727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pages_blocks (pages_id INT NOT NULL, blocks_id INT NOT NULL, INDEX IDX_6367EE77401ADD27 (pages_id), INDEX IDX_6367EE77EE2E1C8C (blocks_id), PRIMARY KEY(pages_id, blocks_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pages_translations (id INT AUTO_INCREMENT NOT NULL, page_id INT NOT NULL, title VARCHAR(255) NOT NULL, h1 VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, lang VARCHAR(2) NOT NULL, INDEX IDX_EAA721E0C4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blocks ADD CONSTRAINT FK_CEED9578727ACA70 FOREIGN KEY (parent_id) REFERENCES blocks (id)');
        $this->addSql('ALTER TABLE blocks_instances ADD CONSTRAINT FK_D6D0B70FB346828 FOREIGN KEY (block_name_id) REFERENCES blocks (id)');
        $this->addSql('ALTER TABLE blocks_instances_images ADD CONSTRAINT FK_626193D1E05C27C6 FOREIGN KEY (block_instance_id) REFERENCES blocks_instances (id)');
        $this->addSql('ALTER TABLE blocks_instances_images ADD CONSTRAINT FK_626193D11E48FB5F FOREIGN KEY (block_field_id) REFERENCES blocks_fields (id)');
        $this->addSql('ALTER TABLE pages ADD CONSTRAINT FK_2074E575727ACA70 FOREIGN KEY (parent_id) REFERENCES pages (id)');
        $this->addSql('ALTER TABLE pages_blocks ADD CONSTRAINT FK_6367EE77401ADD27 FOREIGN KEY (pages_id) REFERENCES pages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pages_blocks ADD CONSTRAINT FK_6367EE77EE2E1C8C FOREIGN KEY (blocks_id) REFERENCES blocks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pages_translations ADD CONSTRAINT FK_EAA721E0C4663E4 FOREIGN KEY (page_id) REFERENCES pages (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blocks DROP FOREIGN KEY FK_CEED9578727ACA70');
        $this->addSql('ALTER TABLE blocks_instances DROP FOREIGN KEY FK_D6D0B70FB346828');
        $this->addSql('ALTER TABLE pages_blocks DROP FOREIGN KEY FK_6367EE77EE2E1C8C');
        $this->addSql('ALTER TABLE blocks_instances_images DROP FOREIGN KEY FK_626193D11E48FB5F');
        $this->addSql('ALTER TABLE blocks_instances_images DROP FOREIGN KEY FK_626193D1E05C27C6');
        $this->addSql('ALTER TABLE pages DROP FOREIGN KEY FK_2074E575727ACA70');
        $this->addSql('ALTER TABLE pages_blocks DROP FOREIGN KEY FK_6367EE77401ADD27');
        $this->addSql('ALTER TABLE pages_translations DROP FOREIGN KEY FK_EAA721E0C4663E4');
        $this->addSql('DROP TABLE blocks');
        $this->addSql('DROP TABLE blocks_fields');
        $this->addSql('DROP TABLE blocks_instances');
        $this->addSql('DROP TABLE blocks_instances_images');
        $this->addSql('DROP TABLE pages');
        $this->addSql('DROP TABLE pages_blocks');
        $this->addSql('DROP TABLE pages_translations');
    }
}
