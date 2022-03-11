<?php

namespace SquegTech\Steam\Tests\Command\User;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\User\ResolveVanityUrl;
use SquegTech\Steam\Enums\UrlType;

class ResolveVanityUrlTest extends TestCase
{
    /**
     * @var ResolveVanityUrl
     */
    private ResolveVanityUrl $instance;

    public function setUp(): void
    {
        $this->instance = new ResolveVanityUrl('http://vanity.url');
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('ISteamUser', $this->instance->getInterface());
        $this->assertEquals('ResolveVanityURL', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'vanityurl' => 'http://vanity.url',
            'url_type' => UrlType::INDIVIDUAL_PROFILE->value,
        ], $this->instance->getParams());
    }

    public function testSettingUrlTypeChangesParamValues()
    {
        $instance = new ResolveVanityUrl('http://vanity.url', UrlType::GROUP);

        $this->assertEquals([
            'vanityurl' => 'http://vanity.url',
            'url_type' => UrlType::GROUP->value,
        ], $instance->getParams());
    }
}
