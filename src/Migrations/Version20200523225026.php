<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200523225026 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE engine (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(63) NOT NULL, work_principe VARCHAR(255) NOT NULL, power INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE base_entity_transport (id INT AUTO_INCREMENT NOT NULL, model VARCHAR(63) NOT NULL, type VARCHAR(63) NOT NULL, seats_qty INT NOT NULL, size VARCHAR(63) NOT NULL, weight NUMERIC(5, 2) NOT NULL, carrying_capacity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE base_entity_transport_engine (base_entity_transport_id INT NOT NULL, engine_id INT NOT NULL, INDEX IDX_37DF54CEF7008EE3 (base_entity_transport_id), INDEX IDX_37DF54CEE78C9C0A (engine_id), PRIMARY KEY(base_entity_transport_id, engine_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE base_entity_transport_material (base_entity_transport_id INT NOT NULL, material_id INT NOT NULL, INDEX IDX_368EDAB3F7008EE3 (base_entity_transport_id), INDEX IDX_368EDAB3E308AC6F (material_id), PRIMARY KEY(base_entity_transport_id, material_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE water_transport (id INT AUTO_INCREMENT NOT NULL, model VARCHAR(63) NOT NULL, type VARCHAR(63) NOT NULL, seats_qty INT NOT NULL, size VARCHAR(63) NOT NULL, weight NUMERIC(5, 2) NOT NULL, carrying_capacity INT NOT NULL, lifeboard INT DEFAULT NULL, mast_qty INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE material (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(63) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(63) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE base_entity_transport_engine ADD CONSTRAINT FK_37DF54CEF7008EE3 FOREIGN KEY (base_entity_transport_id) REFERENCES base_entity_transport (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE base_entity_transport_engine ADD CONSTRAINT FK_37DF54CEE78C9C0A FOREIGN KEY (engine_id) REFERENCES engine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE base_entity_transport_material ADD CONSTRAINT FK_368EDAB3F7008EE3 FOREIGN KEY (base_entity_transport_id) REFERENCES base_entity_transport (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE base_entity_transport_material ADD CONSTRAINT FK_368EDAB3E308AC6F FOREIGN KEY (material_id) REFERENCES material (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE base_entity_transport_engine DROP FOREIGN KEY FK_37DF54CEE78C9C0A');
        $this->addSql('ALTER TABLE base_entity_transport_engine DROP FOREIGN KEY FK_37DF54CEF7008EE3');
        $this->addSql('ALTER TABLE base_entity_transport_material DROP FOREIGN KEY FK_368EDAB3F7008EE3');
        $this->addSql('ALTER TABLE base_entity_transport_material DROP FOREIGN KEY FK_368EDAB3E308AC6F');
        $this->addSql('DROP TABLE engine');
        $this->addSql('DROP TABLE base_entity_transport');
        $this->addSql('DROP TABLE base_entity_transport_engine');
        $this->addSql('DROP TABLE base_entity_transport_material');
        $this->addSql('DROP TABLE water_transport');
        $this->addSql('DROP TABLE material');
        $this->addSql('DROP TABLE brand');
    }
}
