<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190324143057 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blocks_fields ADD block_id INT NOT NULL');
        $this->addSql('ALTER TABLE blocks_fields ADD CONSTRAINT FK_532C87ECE9ED820C FOREIGN KEY (block_id) REFERENCES blocks (id)');
        $this->addSql('CREATE INDEX IDX_532C87ECE9ED820C ON blocks_fields (block_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blocks_fields DROP FOREIGN KEY FK_532C87ECE9ED820C');
        $this->addSql('DROP INDEX IDX_532C87ECE9ED820C ON blocks_fields');
        $this->addSql('ALTER TABLE blocks_fields DROP block_id');
    }
}
