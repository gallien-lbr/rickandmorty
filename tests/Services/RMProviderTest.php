<?php

namespace App\Tests\Services;

use App\Model\Character;
use App\Services\RMProvider;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RMProviderTest extends KernelTestCase
{
    private RMProvider $rmProvider;

    public function setUp(): void
    {
        parent::setUp();
        self::bootKernel();
        $this->rmProvider = static::getContainer()->get(RMProvider::class);
    }

    public function testRetrievingSingleCharacterSuccess(): void
    {
        $character = $this->rmProvider->getCharacter(21);
        $this->assertInstanceOf(Character::class, $character);

        $character = $this->rmProvider->getCharacter(999);
        $this->assertNull($character);
    }

}
