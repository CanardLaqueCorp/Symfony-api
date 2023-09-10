<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230910130011 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_th ADD car_brand_id INT DEFAULT NULL, DROP brand');
        $this->addSql('ALTER TABLE car_th ADD CONSTRAINT FK_351CD6A8CBC3E50C FOREIGN KEY (car_brand_id) REFERENCES brand (id)');
        $this->addSql('CREATE INDEX IDX_351CD6A8CBC3E50C ON car_th (car_brand_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_th DROP FOREIGN KEY FK_351CD6A8CBC3E50C');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP INDEX IDX_351CD6A8CBC3E50C ON car_th');
        $this->addSql('ALTER TABLE car_th ADD brand VARCHAR(255) NOT NULL, DROP car_brand_id');
    }
}
