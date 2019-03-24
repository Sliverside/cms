<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190324142513 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pages_blocks (pages_id INT NOT NULL, blocks_id INT NOT NULL, INDEX IDX_6367EE77401ADD27 (pages_id), INDEX IDX_6367EE77EE2E1C8C (blocks_id), PRIMARY KEY(pages_id, blocks_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pages_blocks ADD CONSTRAINT FK_6367EE77401ADD27 FOREIGN KEY (pages_id) REFERENCES pages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pages_blocks ADD CONSTRAINT FK_6367EE77EE2E1C8C FOREIGN KEY (blocks_id) REFERENCES blocks (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blocks_instances DROP FOREIGN KEY FK_D6D0B70FB346828');
        $this->addSql('DROP INDEX IDX_D6D0B70FB346828 ON blocks_instances');
        $this->addSql('ALTER TABLE blocks_instances CHANGE block_name_id block_id INT NOT NULL');
        $this->addSql('ALTER TABLE blocks_instances ADD CONSTRAINT FK_D6D0B70FE9ED820C FOREIGN KEY (block_id) REFERENCES blocks (id)');
        $this->addSql('CREATE INDEX IDX_D6D0B70FE9ED820C ON blocks_instances (block_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE pages_blocks');
        $this->addSql('ALTER TABLE blocks_instances DROP FOREIGN KEY FK_D6D0B70FE9ED820C');
        $this->addSql('DROP INDEX IDX_D6D0B70FE9ED820C ON blocks_instances');
        $this->addSql('ALTER TABLE blocks_instances CHANGE block_id block_name_id INT NOT NULL');
        $this->addSql('ALTER TABLE blocks_instances ADD CONSTRAINT FK_D6D0B70FB346828 FOREIGN KEY (block_name_id) REFERENCES blocks (id)');
        $this->addSql('CREATE INDEX IDX_D6D0B70FB346828 ON blocks_instances (block_name_id)');
    }
}
