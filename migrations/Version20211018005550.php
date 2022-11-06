<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211018005550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE world_record_solo DROP FOREIGN KEY FK_33058D9D29C1004E');
        $this->addSql('DROP INDEX UNIQ_33058D9D29C1004E ON world_record_solo');
        $this->addSql('ALTER TABLE world_record_solo DROP video_id, CHANGE v video VARCHAR(300) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE world_record_solo ADD video_id INT DEFAULT NULL, CHANGE video v VARCHAR(300) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE world_record_solo ADD CONSTRAINT FK_33058D9D29C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_33058D9D29C1004E ON world_record_solo (video_id)');
    }
}
