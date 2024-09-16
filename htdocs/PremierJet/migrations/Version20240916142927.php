<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240916142927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, useraddress_id INT DEFAULT NULL, locality VARCHAR(150) DEFAULT NULL, street VARCHAR(255) NOT NULL, number VARCHAR(50) NOT NULL, city VARCHAR(150) NOT NULL, postal_code INT NOT NULL, country VARCHAR(150) NOT NULL, UNIQUE INDEX UNIQ_D4E6F81B8CB838C (useraddress_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boardgame (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, address_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, game_type VARCHAR(255) NOT NULL, phone_number VARCHAR(50) DEFAULT NULL, email VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_B8EE3872F5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club_game_library (id INT AUTO_INCREMENT NOT NULL, club_id INT DEFAULT NULL, INDEX IDX_4EF64F6361190A32 (club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club_subscription (id INT AUTO_INCREMENT NOT NULL, user_subscriptor_id INT DEFAULT NULL, club_subscripted_id INT DEFAULT NULL, subscription_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_contribution_ok TINYINT(1) NOT NULL, INDEX IDX_D972CC233CECDD17 (user_subscriptor_id), INDEX IDX_D972CC23A41AA27F (club_subscripted_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, user_organisator_id INT DEFAULT NULL, title VARCHAR(150) NOT NULL, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, date_occurency INT DEFAULT NULL, type VARCHAR(150) DEFAULT NULL, fee NUMERIC(10, 2) NOT NULL, INDEX IDX_3BAE0AA794589191 (user_organisator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_subscription (id INT AUTO_INCREMENT NOT NULL, user_subscriptor_id INT DEFAULT NULL, event_subscripted_id INT DEFAULT NULL, date_subscription DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_4ED56E203CECDD17 (user_subscriptor_id), INDEX IDX_4ED56E20B7EFA4DF (event_subscripted_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_artwork (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(150) NOT NULL, min_players INT NOT NULL, max_players INT NOT NULL, age_min INT NOT NULL, description LONGTEXT NOT NULL, picture LONGTEXT NOT NULL, editor VARCHAR(150) NOT NULL, edition VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_library_historic (id INT AUTO_INCREMENT NOT NULL, club_game_library_id INT DEFAULT NULL, boardgame_id INT DEFAULT NULL, INDEX IDX_B5E0D95EFEFB4E4 (club_game_library_id), INDEX IDX_B5E0D95EB1A27A21 (boardgame_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game_management (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, game_artwork_id INT DEFAULT NULL, INDEX IDX_E59252A2A76ED395 (user_id), INDEX IDX_E59252A2E3643849 (game_artwork_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gaming_place (id INT AUTO_INCREMENT NOT NULL, event_id INT DEFAULT NULL, address_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, type VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_A60B6C3F71F7E88B (event_id), UNIQUE INDEX UNIQ_A60B6C3FF5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(150) NOT NULL, lastname VARCHAR(150) NOT NULL, pseudo VARCHAR(50) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81B8CB838C FOREIGN KEY (useraddress_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE club_game_library ADD CONSTRAINT FK_4EF64F6361190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE club_subscription ADD CONSTRAINT FK_D972CC233CECDD17 FOREIGN KEY (user_subscriptor_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE club_subscription ADD CONSTRAINT FK_D972CC23A41AA27F FOREIGN KEY (club_subscripted_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA794589191 FOREIGN KEY (user_organisator_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE event_subscription ADD CONSTRAINT FK_4ED56E203CECDD17 FOREIGN KEY (user_subscriptor_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE event_subscription ADD CONSTRAINT FK_4ED56E20B7EFA4DF FOREIGN KEY (event_subscripted_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE game_library_historic ADD CONSTRAINT FK_B5E0D95EFEFB4E4 FOREIGN KEY (club_game_library_id) REFERENCES club_game_library (id)');
        $this->addSql('ALTER TABLE game_library_historic ADD CONSTRAINT FK_B5E0D95EB1A27A21 FOREIGN KEY (boardgame_id) REFERENCES boardgame (id)');
        $this->addSql('ALTER TABLE game_management ADD CONSTRAINT FK_E59252A2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE game_management ADD CONSTRAINT FK_E59252A2E3643849 FOREIGN KEY (game_artwork_id) REFERENCES game_artwork (id)');
        $this->addSql('ALTER TABLE gaming_place ADD CONSTRAINT FK_A60B6C3F71F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE gaming_place ADD CONSTRAINT FK_A60B6C3FF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81B8CB838C');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE3872F5B7AF75');
        $this->addSql('ALTER TABLE club_game_library DROP FOREIGN KEY FK_4EF64F6361190A32');
        $this->addSql('ALTER TABLE club_subscription DROP FOREIGN KEY FK_D972CC233CECDD17');
        $this->addSql('ALTER TABLE club_subscription DROP FOREIGN KEY FK_D972CC23A41AA27F');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA794589191');
        $this->addSql('ALTER TABLE event_subscription DROP FOREIGN KEY FK_4ED56E203CECDD17');
        $this->addSql('ALTER TABLE event_subscription DROP FOREIGN KEY FK_4ED56E20B7EFA4DF');
        $this->addSql('ALTER TABLE game_library_historic DROP FOREIGN KEY FK_B5E0D95EFEFB4E4');
        $this->addSql('ALTER TABLE game_library_historic DROP FOREIGN KEY FK_B5E0D95EB1A27A21');
        $this->addSql('ALTER TABLE game_management DROP FOREIGN KEY FK_E59252A2A76ED395');
        $this->addSql('ALTER TABLE game_management DROP FOREIGN KEY FK_E59252A2E3643849');
        $this->addSql('ALTER TABLE gaming_place DROP FOREIGN KEY FK_A60B6C3F71F7E88B');
        $this->addSql('ALTER TABLE gaming_place DROP FOREIGN KEY FK_A60B6C3FF5B7AF75');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE boardgame');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE club_game_library');
        $this->addSql('DROP TABLE club_subscription');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_subscription');
        $this->addSql('DROP TABLE game_artwork');
        $this->addSql('DROP TABLE game_library_historic');
        $this->addSql('DROP TABLE game_management');
        $this->addSql('DROP TABLE gaming_place');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
