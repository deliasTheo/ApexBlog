<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210927235831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, citation VARCHAR(255) NOT NULL, title_desc VARCHAR(255) NOT NULL, description VARCHAR(1500) NOT NULL, nom_reel VARCHAR(255) DEFAULT NULL, age INT DEFAULT NULL, monde_origine VARCHAR(255) DEFAULT NULL, cap_tactique VARCHAR(255) NOT NULL, cap_passive VARCHAR(255) NOT NULL, cap_ultime VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE character');
    }
}
