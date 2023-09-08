<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230908111457 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car_type (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE drive_system (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(10) NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fuel (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(10) NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_th ADD transmission_type_id INT DEFAULT NULL, ADD drive_system_id INT DEFAULT NULL, ADD fuel_id INT DEFAULT NULL, ADD transmission VARCHAR(255) DEFAULT NULL, ADD city_fuel DOUBLE PRECISION NOT NULL, ADD highway_fuel DOUBLE PRECISION NOT NULL, ADD combined_fuel DOUBLE PRECISION NOT NULL, ADD has_guzzler TINYINT(1) DEFAULT NULL, ADD gears INT NOT NULL, ADD max_bio_fuel INT DEFAULT NULL, ADD annual_fuel_cost INT NOT NULL, ADD spend_on_five_years INT NOT NULL, ADD has_start_and_stop TINYINT(1) NOT NULL, ADD fe_rating SMALLINT NOT NULL, ADD ghg_rating SMALLINT NOT NULL, ADD smog_rating SMALLINT NOT NULL, ADD city_carbon DOUBLE PRECISION NOT NULL, ADD highway_carbon DOUBLE PRECISION NOT NULL, ADD combined_carbon DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE car_th ADD CONSTRAINT FK_351CD6A8CDD541D0 FOREIGN KEY (transmission_type_id) REFERENCES transmission (id)');
        $this->addSql('ALTER TABLE car_th ADD CONSTRAINT FK_351CD6A89817C99 FOREIGN KEY (drive_system_id) REFERENCES drive_system (id)');
        $this->addSql('ALTER TABLE car_th ADD CONSTRAINT FK_351CD6A897C79677 FOREIGN KEY (fuel_id) REFERENCES fuel (id)');
        $this->addSql('CREATE INDEX IDX_351CD6A8CDD541D0 ON car_th (transmission_type_id)');
        $this->addSql('CREATE INDEX IDX_351CD6A89817C99 ON car_th (drive_system_id)');
        $this->addSql('CREATE INDEX IDX_351CD6A897C79677 ON car_th (fuel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_th DROP FOREIGN KEY FK_351CD6A89817C99');
        $this->addSql('ALTER TABLE car_th DROP FOREIGN KEY FK_351CD6A897C79677');
        $this->addSql('DROP TABLE car_type');
        $this->addSql('DROP TABLE drive_system');
        $this->addSql('DROP TABLE fuel');
        $this->addSql('ALTER TABLE car_th DROP FOREIGN KEY FK_351CD6A8CDD541D0');
        $this->addSql('DROP INDEX IDX_351CD6A8CDD541D0 ON car_th');
        $this->addSql('DROP INDEX IDX_351CD6A89817C99 ON car_th');
        $this->addSql('DROP INDEX IDX_351CD6A897C79677 ON car_th');
        $this->addSql('ALTER TABLE car_th DROP transmission_type_id, DROP drive_system_id, DROP fuel_id, DROP transmission, DROP city_fuel, DROP highway_fuel, DROP combined_fuel, DROP has_guzzler, DROP gears, DROP max_bio_fuel, DROP annual_fuel_cost, DROP spend_on_five_years, DROP has_start_and_stop, DROP fe_rating, DROP ghg_rating, DROP smog_rating, DROP city_carbon, DROP highway_carbon, DROP combined_carbon');
    }
}
