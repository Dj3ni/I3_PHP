<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240903142745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abstract_game_artwork (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(150) NOT NULL, min_players INT NOT NULL, max_players INT NOT NULL, age_min INT NOT NULL, description LONGTEXT NOT NULL, picture LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, street VARCHAR(255) NOT NULL, number VARCHAR(20) NOT NULL, city VARCHAR(150) NOT NULL, postal_code INT NOT NULL, country VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boardgame (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, is_placed_id INT NOT NULL, name VARCHAR(255) NOT NULL, phone_number VARCHAR(20) DEFAULT NULL, email VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_B8EE38724921B10E (is_placed_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club_game_library (id INT AUTO_INCREMENT NOT NULL, space VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club_subscription (id INT AUTO_INCREMENT NOT NULL, subscripted_user_id INT DEFAULT NULL, subscripted_club_id INT DEFAULT NULL, subscription_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_contribution_ok TINYINT(1) NOT NULL, INDEX IDX_D972CC2346A50121 (subscripted_user_id), INDEX IDX_D972CC2380D2D886 (subscripted_club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, date_occurency INT DEFAULT NULL, type VARCHAR(150) DEFAULT NULL, description LONGTEXT NOT NULL, fee NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_subscription (id INT AUTO_INCREMENT NOT NULL, subscription_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (id INT AUTO_INCREMENT NOT NULL, event_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, type VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_741D53CD71F7E88B (event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, firstname VARCHAR(150) NOT NULL, phone_number VARCHAR(15) DEFAULT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38724921B10E FOREIGN KEY (is_placed_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE club_subscription ADD CONSTRAINT FK_D972CC2346A50121 FOREIGN KEY (subscripted_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE club_subscription ADD CONSTRAINT FK_D972CC2380D2D886 FOREIGN KEY (subscripted_club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CD71F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE38724921B10E');
        $this->addSql('ALTER TABLE club_subscription DROP FOREIGN KEY FK_D972CC2346A50121');
        $this->addSql('ALTER TABLE club_subscription DROP FOREIGN KEY FK_D972CC2380D2D886');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CD71F7E88B');
        $this->addSql('DROP TABLE abstract_game_artwork');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE boardgame');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE club_game_library');
        $this->addSql('DROP TABLE club_subscription');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_subscription');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
