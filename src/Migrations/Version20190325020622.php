<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190325020622 extends AbstractMigration
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
        $this->addSql('ALTER TABLE blocks_instances DROP FOREIGN KEY FK_D6D0B70FB346828');
        $this->addSql('DROP INDEX IDX_D6D0B70FB346828 ON blocks_instances');
        $this->addSql('ALTER TABLE blocks_instances CHANGE block_name_id block_id INT NOT NULL');
        $this->addSql('ALTER TABLE blocks_instances ADD CONSTRAINT FK_D6D0B70FE9ED820C FOREIGN KEY (block_id) REFERENCES blocks (id)');
        $this->addSql('CREATE INDEX IDX_D6D0B70FE9ED820C ON blocks_instances (block_id)');
        $this->addSql('ALTER TABLE blocks_instances_images ADD lang VARCHAR(2) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE blocks_fields DROP FOREIGN KEY FK_532C87ECE9ED820C');
        $this->addSql('DROP INDEX IDX_532C87ECE9ED820C ON blocks_fields');
        $this->addSql('ALTER TABLE blocks_fields DROP block_id');
        $this->addSql('ALTER TABLE blocks_instances DROP FOREIGN KEY FK_D6D0B70FE9ED820C');
        $this->addSql('DROP INDEX IDX_D6D0B70FE9ED820C ON blocks_instances');
        $this->addSql('ALTER TABLE blocks_instances CHANGE block_id block_name_id INT NOT NULL');
        $this->addSql('ALTER TABLE blocks_instances ADD CONSTRAINT FK_D6D0B70FB346828 FOREIGN KEY (block_name_id) REFERENCES blocks (id)');
        $this->addSql('CREATE INDEX IDX_D6D0B70FB346828 ON blocks_instances (block_name_id)');
        $this->addSql('ALTER TABLE blocks_instances_images DROP lang');
    }
}
