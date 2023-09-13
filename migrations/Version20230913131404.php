<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230913131404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car_price (id INT AUTO_INCREMENT NOT NULL, relation_id INT DEFAULT NULL, price INT NOT NULL, mileage INT NOT NULL, year VARCHAR(255) NOT NULL, INDEX IDX_1563A70E3256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_price ADD CONSTRAINT FK_1563A70E3256915B FOREIGN KEY (relation_id) REFERENCES car_th (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_price DROP FOREIGN KEY FK_1563A70E3256915B');
        $this->addSql('DROP TABLE car_price');
    }
}
