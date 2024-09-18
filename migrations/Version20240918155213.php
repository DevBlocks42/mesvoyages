<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240918155213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE environnement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE myTable');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE myTable (id INT UNSIGNED AUTO_INCREMENT NOT NULL, pays VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, datecreation VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, ville VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, note INT DEFAULT NULL, avis TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, tempmin INT DEFAULT NULL, tempmax INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE environnement');
    }
}
