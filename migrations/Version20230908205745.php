<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230908205745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car_th (id INT AUTO_INCREMENT NOT NULL, transmission_type_id INT DEFAULT NULL, car_drive_system_id INT DEFAULT NULL, car_fuel_id INT DEFAULT NULL, car_type_id_id INT DEFAULT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, cylinder SMALLINT NOT NULL, transmission VARCHAR(255) DEFAULT NULL, city_fuel DOUBLE PRECISION NOT NULL, highway_fuel DOUBLE PRECISION NOT NULL, combined_fuel DOUBLE PRECISION NOT NULL, has_guzzler TINYINT(1) DEFAULT NULL, gears INT NOT NULL, max_bio_fuel INT DEFAULT NULL, annual_fuel_cost INT NOT NULL, spend_on_five_years INT NOT NULL, has_start_and_stop TINYINT(1) NOT NULL, fe_rating SMALLINT NOT NULL, ghg_rating SMALLINT NOT NULL, smog_rating SMALLINT NOT NULL, city_carbon DOUBLE PRECISION NOT NULL, highway_carbon DOUBLE PRECISION NOT NULL, combined_carbon DOUBLE PRECISION NOT NULL, price_new INT NOT NULL, price_used INT NOT NULL, INDEX IDX_351CD6A8CDD541D0 (transmission_type_id), INDEX IDX_351CD6A8322225DF (car_drive_system_id), INDEX IDX_351CD6A8C46C6DAB (car_fuel_id), INDEX IDX_351CD6A8439797B1 (car_type_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE drive_system (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(10) NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fuel (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(10) NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transmission (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(10) NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_th ADD CONSTRAINT FK_351CD6A8CDD541D0 FOREIGN KEY (transmission_type_id) REFERENCES transmission (id)');
        $this->addSql('ALTER TABLE car_th ADD CONSTRAINT FK_351CD6A8322225DF FOREIGN KEY (car_drive_system_id) REFERENCES drive_system (id)');
        $this->addSql('ALTER TABLE car_th ADD CONSTRAINT FK_351CD6A8C46C6DAB FOREIGN KEY (car_fuel_id) REFERENCES fuel (id)');
        $this->addSql('ALTER TABLE car_th ADD CONSTRAINT FK_351CD6A8439797B1 FOREIGN KEY (car_type_id_id) REFERENCES car_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_th DROP FOREIGN KEY FK_351CD6A8CDD541D0');
        $this->addSql('ALTER TABLE car_th DROP FOREIGN KEY FK_351CD6A8322225DF');
        $this->addSql('ALTER TABLE car_th DROP FOREIGN KEY FK_351CD6A8C46C6DAB');
        $this->addSql('ALTER TABLE car_th DROP FOREIGN KEY FK_351CD6A8439797B1');
        $this->addSql('DROP TABLE car_th');
        $this->addSql('DROP TABLE car_type');
        $this->addSql('DROP TABLE drive_system');
        $this->addSql('DROP TABLE fuel');
        $this->addSql('DROP TABLE transmission');
    }
}
