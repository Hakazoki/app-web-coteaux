<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261123112555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ADD id_producter_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E93CCA5CDD FOREIGN KEY (id_producter_id) REFERENCES producter (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E93CCA5CDD ON users (id_producter_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E93CCA5CDD');
        $this->addSql('DROP INDEX UNIQ_1483A5E93CCA5CDD');
        $this->addSql('ALTER TABLE users DROP id_producter_id');
    }
}
