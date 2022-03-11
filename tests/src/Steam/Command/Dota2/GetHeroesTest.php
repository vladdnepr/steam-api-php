<?php

namespace SquegTech\Steam\Tests\Command\Dota2;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\Dota2\GetHeroes;

class GetHeroesTest extends TestCase
{
    /**
     * @var GetHeroes
     */
    private GetHeroes $instance;

    public function setUp(): void
    {
        $this->instance = new GetHeroes();
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('GetHeroes', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals(['itemizedonly' => false], $this->instance->getParams());
    }

    public function testInterfaceForDota2TestClient()
    {
        $this->instance->isForTestClient(true);
        $this->assertEquals('IEconDOTA2_205790', $this->instance->getInterface());
    }

    public function testInterfaceForDota2Client()
    {
        $this->instance->isForTestClient(false);
        $this->assertEquals('IEconDOTA2_570', $this->instance->getInterface());
    }

    public function testSettingLanguageAppearsInParams()
    {
        $this->instance->setLanguage('en');

        $this->assertEquals([
            'language' => 'en',
            'itemizedonly' => false,
            ], $this->instance->getParams());
    }

    public function testSettingItemizedHeroesOnlyToTrue()
    {
        $this->instance->setItemizedHeroesOnly(true);

        $this->assertEquals([
            'itemizedonly' => true,
        ], $this->instance->getParams());
    }

    public function testSettingItemizedHeroesOnlyToStringYes()
    {
        $this->instance->setItemizedHeroesOnly('yes');

        $this->assertEquals([
            'itemizedonly' => true,
        ], $this->instance->getParams());
    }

    public function testSettingItemizedHeroesOnlyToFalse()
    {
        $this->instance->setItemizedHeroesOnly(false);

        $this->assertEquals([
            'itemizedonly' => false,
        ], $this->instance->getParams());
    }

    public function testSettingItemizedHeroesOnlyToZero()
    {
        $this->instance->setItemizedHeroesOnly(0);

        $this->assertEquals([
            'itemizedonly' => false,
        ], $this->instance->getParams());
    }
}
