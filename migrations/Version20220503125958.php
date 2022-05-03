<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220503125958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etat_note (id INT AUTO_INCREMENT NOT NULL, valeur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat_projet (id INT AUTO_INCREMENT NOT NULL, valeur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, projet_id_id INT DEFAULT NULL, etat_note_id_id INT DEFAULT NULL, note VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_CFBDFA14D4E271E1 (projet_id_id), INDEX IDX_CFBDFA14B3180195 (etat_note_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, user_id_id INT DEFAULT NULL, etat_projet_id_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', description VARCHAR(255) NOT NULL, validated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_50159CA99D86650F (user_id_id), INDEX IDX_50159CA9CC38423E (etat_projet_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14D4E271E1 FOREIGN KEY (projet_id_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14B3180195 FOREIGN KEY (etat_note_id_id) REFERENCES etat_note (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA99D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9CC38423E FOREIGN KEY (etat_projet_id_id) REFERENCES etat_projet (id)');
        $this->addSql('ALTER TABLE user ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD adresse VARCHAR(255) NOT NULL, ADD cp VARCHAR(255) NOT NULL, ADD ville VARCHAR(255) NOT NULL, ADD telephone VARCHAR(255) NOT NULL, ADD type VARCHAR(255) NOT NULL, ADD civilite VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14B3180195');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9CC38423E');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14D4E271E1');
        $this->addSql('DROP TABLE etat_note');
        $this->addSql('DROP TABLE etat_projet');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE projet');
        $this->addSql('ALTER TABLE user DROP nom, DROP prenom, DROP adresse, DROP cp, DROP ville, DROP telephone, DROP type, DROP civilite');
    }
}
