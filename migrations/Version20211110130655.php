<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211110130655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite DROP start_time, DROP end_time');
        $this->addSql('ALTER TABLE difficulte DROP FOREIGN KEY FK_AF6A33A09B0F88B1');
        $this->addSql('DROP INDEX IDX_AF6A33A09B0F88B1 ON difficulte');
        $this->addSql('ALTER TABLE difficulte DROP activite_id, DROP cause');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite ADD start_time TIME DEFAULT NULL, ADD end_time TIME DEFAULT NULL');
        $this->addSql('ALTER TABLE difficulte ADD activite_id INT DEFAULT NULL, ADD cause VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE difficulte ADD CONSTRAINT FK_AF6A33A09B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id)');
        $this->addSql('CREATE INDEX IDX_AF6A33A09B0F88B1 ON difficulte (activite_id)');
    }
}
