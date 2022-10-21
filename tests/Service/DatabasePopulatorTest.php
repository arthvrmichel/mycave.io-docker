<?php

namespace App\tests\Service;

use App\Service\DatabasePopulator;
use PHPUnit\Framework\TestCase;

class DatabasePopulatorTest extends TestCase
{
    public function testVoidResponse(): void
    {
        $databasePopulator = $this->createMock(DatabasePopulator::class);
        $this->assertEmpty($databasePopulator->populate());
    }
}
