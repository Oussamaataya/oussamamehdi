<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240223143617 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, id_pub_id INT DEFAULT NULL, contenu VARCHAR(255) DEFAULT NULL, INDEX IDX_67F068BC79F37AE5 (id_user_id), INDEX IDX_67F068BCA5CA559A (id_pub_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publication (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(3000) NOT NULL, video VARCHAR(255) DEFAULT NULL, INDEX IDX_AF3C677979F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE react (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, id_pub_id INT DEFAULT NULL, like_count INT NOT NULL, dislike_count INT NOT NULL, INDEX IDX_19656FD579F37AE5 (id_user_id), INDEX IDX_19656FD5A5CA559A (id_pub_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, status TINYINT(1) NOT NULL, tel VARCHAR(255) NOT NULL, num_cnam VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC79F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA5CA559A FOREIGN KEY (id_pub_id) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C677979F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE react ADD CONSTRAINT FK_19656FD579F37AE5 FOREIGN KEY (id_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE react ADD CONSTRAINT FK_19656FD5A5CA559A FOREIGN KEY (id_pub_id) REFERENCES publication (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC79F37AE5');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCA5CA559A');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C677979F37AE5');
        $this->addSql('ALTER TABLE react DROP FOREIGN KEY FK_19656FD579F37AE5');
        $this->addSql('ALTER TABLE react DROP FOREIGN KEY FK_19656FD5A5CA559A');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE publication');
        $this->addSql('DROP TABLE react');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
