<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230908210008 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_th DROP FOREIGN KEY FK_351CD6A8CDD541D0');
        $this->addSql('DROP INDEX IDX_351CD6A8CDD541D0 ON car_th');
        $this->addSql('ALTER TABLE car_th CHANGE transmission_type_id car_transmission_type_id INT DEFAULT NULL, CHANGE transmission car_transmission VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE car_th ADD CONSTRAINT FK_351CD6A84BEFA010 FOREIGN KEY (car_transmission_type_id) REFERENCES transmission (id)');
        $this->addSql('CREATE INDEX IDX_351CD6A84BEFA010 ON car_th (car_transmission_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_th DROP FOREIGN KEY FK_351CD6A84BEFA010');
        $this->addSql('DROP INDEX IDX_351CD6A84BEFA010 ON car_th');
        $this->addSql('ALTER TABLE car_th CHANGE car_transmission_type_id transmission_type_id INT DEFAULT NULL, CHANGE car_transmission transmission VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE car_th ADD CONSTRAINT FK_351CD6A8CDD541D0 FOREIGN KEY (transmission_type_id) REFERENCES transmission (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_351CD6A8CDD541D0 ON car_th (transmission_type_id)');
    }
}
