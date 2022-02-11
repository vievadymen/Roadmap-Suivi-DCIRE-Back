<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220210091617 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE difficulte ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE difficulte ADD CONSTRAINT FK_AF6A33A0A76ED395 FOREIGN KEY (user_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_AF6A33A0A76ED395 ON difficulte (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE difficulte DROP FOREIGN KEY FK_AF6A33A0A76ED395');
        $this->addSql('DROP INDEX IDX_AF6A33A0A76ED395 ON difficulte');
        $this->addSql('ALTER TABLE difficulte DROP user_id');
    }
}
