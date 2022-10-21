<?php

namespace App\tests\Entity;

use App\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class GameTest extends KernelTestCase
{
    public function testCreation(): void
    {
        $game = new Game();
        $this->assertTrue($game instanceof Game);
    }
}
