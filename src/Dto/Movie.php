<?php

namespace App\Dto;

final class Movie
{
    public function __construct(
        public readonly string $omdbId,
        public readonly string $title,
        public readonly int $year,
        public readonly string $rating,
        public readonly string $poster,
        public readonly string $genre,
        public readonly string $rated,
        public readonly string $releasedAt,
        public readonly string $country,
        public readonly string $duration,
        public readonly string $author,
        public readonly string $description,
    ) {}
}
