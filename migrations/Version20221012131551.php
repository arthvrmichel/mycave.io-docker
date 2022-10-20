<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221012131551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE console (id SERIAL NOT NULL, platform_id INT NOT NULL, name VARCHAR(255) NOT NULL, release_date DATE NOT NULL, buying_price INT DEFAULT NULL, buying_date DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3603CFB6FFE6496F ON console (platform_id)');
        $this->addSql('CREATE TABLE edition (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE game (id SERIAL NOT NULL, preservation_state_id INT NOT NULL, platform_id INT NOT NULL, edition_id INT NOT NULL, version_id INT NOT NULL, name VARCHAR(255) NOT NULL, buying_price INT DEFAULT NULL, buying_date DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_232B318CFE71FA16 ON game (preservation_state_id)');
        $this->addSql('CREATE INDEX IDX_232B318CFFE6496F ON game (platform_id)');
        $this->addSql('CREATE INDEX IDX_232B318C74281A5E ON game (edition_id)');
        $this->addSql('CREATE INDEX IDX_232B318C4BBC2705 ON game (version_id)');
        $this->addSql('CREATE TABLE platform (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, abbreviation VARCHAR(20) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE preservation_state (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('CREATE TABLE version (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6FFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CFE71FA16 FOREIGN KEY (preservation_state_id) REFERENCES preservation_state (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CFFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C74281A5E FOREIGN KEY (edition_id) REFERENCES edition (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C4BBC2705 FOREIGN KEY (version_id) REFERENCES version (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('ALTER TABLE console DROP CONSTRAINT FK_3603CFB6FFE6496F');
        $this->addSql('ALTER TABLE game DROP CONSTRAINT FK_232B318CFE71FA16');
        $this->addSql('ALTER TABLE game DROP CONSTRAINT FK_232B318CFFE6496F');
        $this->addSql('ALTER TABLE game DROP CONSTRAINT FK_232B318C74281A5E');
        $this->addSql('ALTER TABLE game DROP CONSTRAINT FK_232B318C4BBC2705');
        $this->addSql('DROP TABLE console');
        $this->addSql('DROP TABLE edition');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE platform');
        $this->addSql('DROP TABLE preservation_state');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE version');
    }
}
