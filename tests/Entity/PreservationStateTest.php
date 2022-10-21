<?php

namespace App\tests\Entity;

use App\Entity\PreservationState;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PreservationStateTest extends KernelTestCase
{
    public function testCreation(): void
    {
        $preservationState = new PreservationState();
        $this->assertTrue($preservationState instanceof PreservationState);
    }
}
