<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190325221608 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE block_field_translation ADD block_field_id INT NOT NULL');
        $this->addSql('ALTER TABLE block_field_translation ADD CONSTRAINT FK_8BA032D41E48FB5F FOREIGN KEY (block_field_id) REFERENCES block_field (id)');
        $this->addSql('CREATE INDEX IDX_8BA032D41E48FB5F ON block_field_translation (block_field_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE block_field_translation DROP FOREIGN KEY FK_8BA032D41E48FB5F');
        $this->addSql('DROP INDEX IDX_8BA032D41E48FB5F ON block_field_translation');
        $this->addSql('ALTER TABLE block_field_translation DROP block_field_id');
    }
}
