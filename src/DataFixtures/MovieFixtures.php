<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('Super Mario Bros, le film');
        $movie->setReleasedAt(new \DateTimeImmutable('2023-04-05'));
        $movie->addGenre($this->getReference('genre_action'));
        $movie->addGenre($this->getReference('genre_adventure'));
        $movie->setCountry('US');
        $movie->setPrice(1500);
        $movie->setRated('N/A');
        $movie->setAuthor('unknown');
        $movie->setDescription('');
        $movie->setDuration(90);
        $manager->persist($movie);

        $movie = new Movie();
        $movie->setTitle('Mon chat et moi, la grande aventure de Rroû');
        $movie->setReleasedAt(new \DateTimeImmutable('2023-04-05'));
        $movie->addGenre($this->getReference('genre_family'));
        $movie->addGenre($this->getReference('genre_adventure'));
        $movie->setCountry('FR');
        $movie->setPrice(2099);
        $movie->setRated('PG-13');
        $movie->setAuthor('unknown');
        $movie->setDescription('');
        $movie->setDuration(90);
        $manager->persist($movie);

        $movie = new Movie();
        $movie->setTitle('Miracles');
        $movie->setReleasedAt(new \DateTimeImmutable('2023-04-10'));
        $movie->addGenre($this->getReference('genre_documentary'));
        $movie->setCountry('GB');
        $movie->setPrice(2350);
        $movie->setRated('R');
        $movie->setAuthor('unknown');
        $movie->setDescription('');
        $movie->setDuration(90);
        $manager->persist($movie);

        $movie = new Movie();
        $movie->setTitle('Les Ames soeurs');
        $movie->setReleasedAt(new \DateTimeImmutable('2023-04-12'));
        $movie->addGenre($this->getReference('genre_drama'));
        $movie->setCountry('FR');
        $movie->setPrice(1950);
        $movie->setRated('G');
        $movie->setAuthor('unknown');
        $movie->setDescription('');
        $movie->setDuration(90);
        $manager->persist($movie);

        $manager->flush();
    }
}
