<?php

namespace App\tests\Entity;

use App\Entity\Console;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ConsoleTest extends KernelTestCase
{
    public function testCreation(): void
    {
        $console = new Console();
        $this->assertTrue($console instanceof Console);
    }
}
