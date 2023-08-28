<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230828163423 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE files ADD gift_id INT NOT NULL');
        $this->addSql('ALTER TABLE files ADD CONSTRAINT FK_635405997A95A83 FOREIGN KEY (gift_id) REFERENCES gifts (id)');
        $this->addSql('CREATE INDEX IDX_635405997A95A83 ON files (gift_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE files DROP FOREIGN KEY FK_635405997A95A83');
        $this->addSql('DROP INDEX IDX_635405997A95A83 ON files');
        $this->addSql('ALTER TABLE files DROP gift_id');
    }
}
