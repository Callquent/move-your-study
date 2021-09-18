<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210905093520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE eleve (id INT AUTO_INCREMENT NOT NULL, id_eleve INT NOT NULL, groupe_eleve VARCHAR(255) NOT NULL, prenom_eleve VARCHAR(255) NOT NULL, nom_eleve VARCHAR(255) NOT NULL, mail_eleve VARCHAR(255) NOT NULL, numero_eleve VARCHAR(255) NOT NULL, login_eleve VARCHAR(255) NOT NULL, password_eleve VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE absence ADD id_eleve_absence_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C9CC4F990C FOREIGN KEY (id_eleve_absence_id) REFERENCES eleve (id)');
        $this->addSql('CREATE INDEX IDX_765AE0C9CC4F990C ON absence (id_eleve_absence_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C9CC4F990C');
        $this->addSql('DROP TABLE eleve');
        $this->addSql('DROP INDEX IDX_765AE0C9CC4F990C ON absence');
        $this->addSql('ALTER TABLE absence DROP id_eleve_absence_id');
    }
}
