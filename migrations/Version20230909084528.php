<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230909084528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_th DROP FOREIGN KEY FK_351CD6A8439797B1');
        $this->addSql('DROP INDEX IDX_351CD6A8439797B1 ON car_th');
        $this->addSql('ALTER TABLE car_th CHANGE car_type_id_id car_line_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE car_th ADD CONSTRAINT FK_351CD6A82931B21C FOREIGN KEY (car_line_type_id) REFERENCES car_type (id)');
        $this->addSql('CREATE INDEX IDX_351CD6A82931B21C ON car_th (car_line_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car_th DROP FOREIGN KEY FK_351CD6A82931B21C');
        $this->addSql('DROP INDEX IDX_351CD6A82931B21C ON car_th');
        $this->addSql('ALTER TABLE car_th CHANGE car_line_type_id car_type_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE car_th ADD CONSTRAINT FK_351CD6A8439797B1 FOREIGN KEY (car_type_id_id) REFERENCES car_type (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_351CD6A8439797B1 ON car_th (car_type_id_id)');
    }
}
