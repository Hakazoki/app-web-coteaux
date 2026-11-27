<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261127094241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "order" ALTER status TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE "order" ALTER pickup_location TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE producter ADD first�_name VARCHAR(15) NOT NULL');
        $this->addSql('ALTER TABLE producter ADD last_name VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE producter DROP full_name');
        $this->addSql('ALTER TABLE producter ALTER activity TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE products ALTER status TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE products ALTER pricing_type TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE sub_order ALTER status TYPE VARCHAR(255)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "order" ALTER status TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE "order" ALTER pickup_location TYPE VARCHAR(20)');
        $this->addSql('ALTER TABLE producter ADD full_name VARCHAR(80) NOT NULL');
        $this->addSql('ALTER TABLE producter DROP first�_name');
        $this->addSql('ALTER TABLE producter DROP last_name');
        $this->addSql('ALTER TABLE producter ALTER activity TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE products ALTER status TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE products ALTER pricing_type TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE sub_order ALTER status TYPE VARCHAR(50)');
    }
}
