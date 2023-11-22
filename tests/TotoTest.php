<?php

namespace App\Tests;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class TotoTest extends KernelTestCase
{
    public function testSomething(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $repo = $container->get(MovieRepository::class);

        try {
            $repo->findAll();
        } catch (\Throwable) {
            $this->assertTrue(false);
        }

        $this->assertTrue(true);
    }
}
