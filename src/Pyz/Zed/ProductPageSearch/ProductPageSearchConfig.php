<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductPageSearch;

use Spryker\Shared\ProductPageSearch\ProductPageSearchConfig as SprykerSharedProductPageSearchConfig;
use Spryker\Zed\ProductPageSearch\ProductPageSearchConfig as SprykerProductPageSearchConfig;

class ProductPageSearchConfig extends SprykerProductPageSearchConfig
{
    /**
     * @return string|null
     */
    public function getProductPageEventQueueName(): ?string
    {
        return SprykerSharedProductPageSearchConfig::PUBLISH_PRODUCT_ABSTRACT_PAGE;
    }

    /**
     * @return string|null
     */
    public function getProductConcretePageEventQueueName(): ?string
    {
        return SprykerSharedProductPageSearchConfig::PUBLISH_PRODUCT_CONCRETE_PAGE;
    }
}
