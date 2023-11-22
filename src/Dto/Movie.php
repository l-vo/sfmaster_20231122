<?php

namespace App\Dto;

final class Movie
{
    public function __construct(
        public readonly string $title,
        public readonly int $year,
        public readonly string $rating,
        public readonly string $poster,
    ) {}
}
