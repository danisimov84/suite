<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Security;

use Spryker\Yves\Security\Plugin\Security\RememberMeSecurityPlugin;
use Spryker\Yves\Security\SecurityDependencyProvider as SprykerSecurityDependencyProvider;
use Spryker\Yves\SessionCustomerValidation\Plugin\Security\SaveSessionCustomerSecurityPlugin;
use Spryker\Yves\SessionCustomerValidation\Plugin\Security\ValidateSessionCustomerSecurityPlugin;
use SprykerShop\Yves\AgentPage\Plugin\Security\AgentPageSecurityPlugin;
use SprykerShop\Yves\CustomerPage\Plugin\Security\CustomerPageSecurityPlugin;

class SecurityDependencyProvider extends SprykerSecurityDependencyProvider
{
    /**
     * @return array<\Spryker\Shared\SecurityExtension\Dependency\Plugin\SecurityPluginInterface>
     */
    protected function getSecurityPlugins(): array
    {
        return [
            new RememberMeSecurityPlugin(),
            new AgentPageSecurityPlugin(),
            new CustomerPageSecurityPlugin(),
            new ValidateSessionCustomerSecurityPlugin(),
            new SaveSessionCustomerSecurityPlugin(),
        ];
    }
}
