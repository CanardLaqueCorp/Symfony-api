<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231003110637 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_th ADD price_used_euro INT DEFAULT NULL, ADD annual_fuel_cost_euro INT DEFAULT NULL, ADD spend_on_five_year_euro INT DEFAULT NULL, ADD city_fuel_metric DOUBLE PRECISION DEFAULT NULL, ADD highway_fuel_metric DOUBLE PRECISION DEFAULT NULL, ADD combined_fuel_metric DOUBLE PRECISION DEFAULT NULL, ADD city_carbon_metric INT DEFAULT NULL, ADD highway_carbon_metric INT DEFAULT NULL, ADD combined_carbon_metric INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_th DROP price_used_euro, DROP annual_fuel_cost_euro, DROP spend_on_five_year_euro, DROP city_fuel_metric, DROP highway_fuel_metric, DROP combined_fuel_metric, DROP city_carbon_metric, DROP highway_carbon_metric, DROP combined_carbon_metric');
    }
}
