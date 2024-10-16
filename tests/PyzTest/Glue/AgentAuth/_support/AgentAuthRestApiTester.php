<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Glue\AgentAuth;

use SprykerTest\Glue\Testify\Tester\ApiEndToEndTester;

/**
 * Inherited Methods
 *
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
 */
class AgentAuthRestApiTester extends ApiEndToEndTester
{
    use _generated\AgentAuthRestApiTesterActions;

    /**
     * @var string
     */
    protected const ACCESS_TOKEN_JSON_PATH = '$.data.attributes.accessToken';

    /**
     * @var string
     */
    protected const REFRESH_TOKEN_JSON_PATH = '$.data.attributes.refreshToken';

    /**
     * @return void
     */
    public function seeResponseHasAccessToken(): void
    {
        $this->assertNotEmpty($this->grabDataFromResponseByJsonPath(static::ACCESS_TOKEN_JSON_PATH));
    }

    /**
     * @return void
     */
    public function seeResponseHasRefreshToken(): void
    {
        $this->assertNotEmpty($this->grabDataFromResponseByJsonPath(static::REFRESH_TOKEN_JSON_PATH));
    }

    /**
     * @return void
     */
    public function seeResponseDoesNotHaveAccessToken(): void
    {
        $this->assertFalse($this->grabDataFromResponseByJsonPath(static::ACCESS_TOKEN_JSON_PATH));
    }

    /**
     * @return void
     */
    public function seeResponseDoesNotHaveRefreshToken(): void
    {
        $this->assertFalse($this->grabDataFromResponseByJsonPath(static::REFRESH_TOKEN_JSON_PATH));
    }
}
