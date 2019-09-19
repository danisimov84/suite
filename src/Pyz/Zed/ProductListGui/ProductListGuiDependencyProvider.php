<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductListGui;

use Spryker\Zed\ConfigurableBundle\Communication\Plugin\ProductListGuiExtension\ConfigurableBundleTemplateProductListUsedByTableDataExpanderPlugin;
use Spryker\Zed\ConfigurableBundleGui\Communication\Plugin\ProductListGuiExtension\ConfigurableBundleTemplateListProductListTopButtonsExpanderPlugin;
use Spryker\Zed\MerchantRelationship\Communication\Plugin\ProductListGuiExtension\MerchantRelationshipProductListUsedByTableDataExpanderPlugin;
use Spryker\Zed\MerchantRelationshipGui\Communication\Plugin\ProductListGuiExtension\MerchantRelationListProductListTopButtonsExpanderPlugin;
use Spryker\Zed\ProductListGui\ProductListGuiDependencyProvider as SprykerProductListGuiDependencyProvider;

class ProductListGuiDependencyProvider extends SprykerProductListGuiDependencyProvider
{
    /**
     * @return \Spryker\Zed\ProductListGuiExtension\Dependency\Plugin\ProductListTableConfigExpanderPluginInterface[]
     */
    protected function getProductListTableConfigExpanderPlugins(): array
    {
        return [];
    }

    /**
     * @return \Spryker\Zed\ProductListGuiExtension\Dependency\Plugin\ProductListTableQueryCriteriaExpanderPluginInterface[]
     */
    protected function getProductListTableQueryCriteriaExpanderPlugins(): array
    {
        return [];
    }

    /**
     * @return \Spryker\Zed\ProductListGuiExtension\Dependency\Plugin\ProductListTableDataExpanderPluginInterface[]
     */
    protected function getProductListTableDataExpanderPlugins(): array
    {
        return [];
    }

    /**
     * @return \Spryker\Zed\ProductListGuiExtension\Dependency\Plugin\ProductListTableDataExpanderPluginInterface[]
     */
    protected function getProductListTableHeaderExpanderPlugins(): array
    {
        return [];
    }

    /**
     * @return \Spryker\Zed\ProductListGuiExtension\Dependency\Plugin\ProductListTopButtonsExpanderPluginInterface[]
     */
    protected function getProductListTopButtonsExpanderPlugins(): array
    {
        return [
            new ConfigurableBundleTemplateListProductListTopButtonsExpanderPlugin(),
            new MerchantRelationListProductListTopButtonsExpanderPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\ProductListGuiExtension\Dependency\Plugin\ProductListUsedByTableDataExpanderPluginInterface[]
     */
    protected function getProductListUsedByTableDataExpanderPlugins(): array
    {
        return [
            new ConfigurableBundleTemplateProductListUsedByTableDataExpanderPlugin(),
            new MerchantRelationshipProductListUsedByTableDataExpanderPlugin(),
        ];
    }
}
