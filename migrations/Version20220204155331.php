<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220204155331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin_pp ADD status TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE interim ADD status TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD status TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin_pp DROP status');
        $this->addSql('ALTER TABLE interim DROP status');
        $this->addSql('ALTER TABLE utilisateur DROP status');
    }
}
