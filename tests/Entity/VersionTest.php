<?php

namespace App\tests\Entity;

use App\Entity\Version;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class VersionTest extends KernelTestCase
{
    public function testCreation(): void
    {
        $version = new Version();
        $this->assertTrue($version instanceof Version);
    }
}
