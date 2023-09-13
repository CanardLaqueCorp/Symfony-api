<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230913131614 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_price DROP FOREIGN KEY FK_1563A70E3256915B');
        $this->addSql('DROP INDEX IDX_1563A70E3256915B ON car_price');
        $this->addSql('ALTER TABLE car_price CHANGE relation_id car_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE car_price ADD CONSTRAINT FK_1563A70EC3C6F69F FOREIGN KEY (car_id) REFERENCES car_th (id)');
        $this->addSql('CREATE INDEX IDX_1563A70EC3C6F69F ON car_price (car_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_price DROP FOREIGN KEY FK_1563A70EC3C6F69F');
        $this->addSql('DROP INDEX IDX_1563A70EC3C6F69F ON car_price');
        $this->addSql('ALTER TABLE car_price CHANGE car_id relation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE car_price ADD CONSTRAINT FK_1563A70E3256915B FOREIGN KEY (relation_id) REFERENCES car_th (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1563A70E3256915B ON car_price (relation_id)');
    }
}
