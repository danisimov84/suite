<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\SecurityGui;

use Spryker\Zed\SecurityGui\SecurityGuiConfig as SprykerSecurityGuiConfig;

class SecurityGuiConfig extends SprykerSecurityGuiConfig
{
    /**
     * @var string
     */
    protected const IGNORABLE_ROUTE_PATTERN = '^/(security-gui|health-check|_profiler/wdt|api/rest/.+)';

    /**
     * @var bool
     */
    protected const IS_BACKOFFICE_USER_SECURITY_BLOCKER_ENABLED = true;
}
