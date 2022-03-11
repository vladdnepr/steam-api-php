<?php

namespace SquegTech\Steam\Tests\Command\EconItems;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\EconItems\GetSchemaItems;

class GetSchemaItemsTest extends TestCase
{
    /**
     * @var GetSchemaItems
     */
    private GetSchemaItems $instance;

    public function setUp(): void
    {
        $this->instance = new GetSchemaItems(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IEconItems_123', $this->instance->getInterface());
        $this->assertEquals('GetSchemaItems', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
        $this->assertEquals([], $this->instance->getParams());
    }

    public function testSettingLanguageAppearsInParams()
    {
        $this->instance->setLanguage('en');

        $this->assertEquals(['language' => 'en'], $this->instance->getParams());
    }

    public function testSettingStartUpdatesInParams()
    {
        $this->instance->setStart(50);

        $this->assertEquals(['start' => 50], $this->instance->getParams());
    }
}
