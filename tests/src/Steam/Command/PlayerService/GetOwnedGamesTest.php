<?php

namespace SquegTech\Steam\Tests\Command\PlayerService;

use PHPUnit\Framework\TestCase;
use SquegTech\Steam\Command\CommandInterface;
use SquegTech\Steam\Command\PlayerService\GetOwnedGames;

class GetOwnedGamesTest extends TestCase
{
    /**
     * @var GetOwnedGames
     */
    private GetOwnedGames $instance;

    public function setUp(): void
    {
        $this->instance = new GetOwnedGames(123);
    }

    public function testImplementsInterface()
    {
        $this->assertInstanceOf(CommandInterface::class, $this->instance);
    }

    public function testValues()
    {
        $this->assertEquals('IPlayerService', $this->instance->getInterface());
        $this->assertEquals('GetOwnedGames', $this->instance->getMethod());
        $this->assertEquals('v1', $this->instance->getVersion());
        $this->assertEquals('GET', $this->instance->getRequestMethod());
    }

    public function testParamValues()
    {
        $this->assertEquals([
            'steamid' => 123,
        ], $this->instance->getParams());
    }

    public function testIncludingAppInfoToTrue()
    {
        $this->instance->setIncludeAppInfo(true);

        $this->assertEquals([
            'steamid' => 123,
            'include_appinfo' => 1,
        ], $this->instance->getParams());
    }

    public function testIncludingAppInfoToYesString()
    {
        $this->instance->setIncludeAppInfo('yes');

        $this->assertEquals([
            'steamid' => 123,
            'include_appinfo' => true,
        ], $this->instance->getParams());
    }

    public function testIncludingAppInfoToFalse()
    {
        $this->instance->setIncludeAppInfo(false);

        $this->assertEquals([
            'steamid' => 123,
            'include_appinfo' => false,
        ], $this->instance->getParams());
    }

    public function testIncludingFreeGamesToTrue()
    {
        $this->instance->setIncludeFreeGames(true);

        $this->assertEquals([
            'steamid' => 123,
            'include_played_free_games' => 1,
        ], $this->instance->getParams());
    }

    public function testIncludingFreeGamesToYesString()
    {
        $this->instance->setIncludeFreeGames('yes');

        $this->assertEquals([
            'steamid' => 123,
            'include_played_free_games' => true,
        ], $this->instance->getParams());
    }

    public function testIncludingFreeGamesToFalse()
    {
        $this->instance->setIncludeFreeGames(false);

        $this->assertEquals([
            'steamid' => 123,
            'include_played_free_games' => false,
        ], $this->instance->getParams());
    }

    public function testSettingAppIdFilter()
    {
        $filter = [570];

        $this->instance->setAppIdsFilter($filter);

        $this->assertEquals([
            'steamid' => 123,
            'appids_filter' => $filter,
        ], $this->instance->getParams());
    }
}
