<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241118142632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE thanks ADD tks_by_id INT NOT NULL, ADD tks_for_id INT NOT NULL, DROP tks_by, DROP tks_for, CHANGE text text LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE thanks ADD CONSTRAINT FK_6E5365E8A5A9D17 FOREIGN KEY (tks_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE thanks ADD CONSTRAINT FK_6E5365EA8A5252E FOREIGN KEY (tks_for_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6E5365E8A5A9D17 ON thanks (tks_by_id)');
        $this->addSql('CREATE INDEX IDX_6E5365EA8A5252E ON thanks (tks_for_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE thanks DROP FOREIGN KEY FK_6E5365E8A5A9D17');
        $this->addSql('ALTER TABLE thanks DROP FOREIGN KEY FK_6E5365EA8A5252E');
        $this->addSql('DROP INDEX IDX_6E5365E8A5A9D17 ON thanks');
        $this->addSql('DROP INDEX IDX_6E5365EA8A5252E ON thanks');
        $this->addSql('ALTER TABLE thanks ADD tks_by INT NOT NULL, ADD tks_for INT NOT NULL, DROP tks_by_id, DROP tks_for_id, CHANGE text text LONGTEXT NOT NULL');
    }
}
