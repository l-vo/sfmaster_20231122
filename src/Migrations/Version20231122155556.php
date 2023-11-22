<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20231122155556 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Complete database';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE genre (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE movie_genre (movie_id INTEGER NOT NULL, genre_id INTEGER NOT NULL, PRIMARY KEY(movie_id, genre_id), CONSTRAINT FK_FD1229648F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_FD1229644296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_FD1229648F93B6FC ON movie_genre (movie_id)');
        $this->addSql('CREATE INDEX IDX_FD1229644296D31F ON movie_genre (genre_id)');
        $this->addSql('ALTER TABLE movie ADD COLUMN rated VARCHAR(5) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE movie_genre');
        $this->addSql('CREATE TEMPORARY TABLE __temp__movie AS SELECT id, title, author, description, duration, released_at, country, rating, price, poster_url FROM movie');
        $this->addSql('DROP TABLE movie');
        $this->addSql('CREATE TABLE movie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, description CLOB NOT NULL, duration INTEGER NOT NULL, released_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        , country VARCHAR(255) DEFAULT NULL, rating VARCHAR(255) DEFAULT NULL, price INTEGER DEFAULT NULL, poster_url VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO movie (id, title, author, description, duration, released_at, country, rating, price, poster_url) SELECT id, title, author, description, duration, released_at, country, rating, price, poster_url FROM __temp__movie');
        $this->addSql('DROP TABLE __temp__movie');
    }
}
