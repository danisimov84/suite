<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Glue\Carts\RestApi;

use Codeception\Util\HttpCode;
use PyzTest\Glue\Carts\CartsApiTester;
use PyzTest\Glue\Carts\RestApi\Fixtures\ConvertGuestCartToCustomerCartRestApiFixtures;
use Spryker\Glue\CartsRestApi\CartsRestApiConfig;

/**
 * Auto-generated group annotations
 *
 * @group PyzTest
 * @group Glue
 * @group Carts
 * @group RestApi
 * @group ConvertGuestCartToCustomerCartRestApiCest
 * Add your own group annotations below this line
 * @group EndToEnd
 */
class ConvertGuestCartToCustomerCartRestApiCest
{
    /**
     * @var \PyzTest\Glue\Carts\RestApi\Fixtures\ConvertGuestCartToCustomerCartRestApiFixtures
     */
    protected $fixtures;

    /**
     * @param \PyzTest\Glue\Carts\CartsApiTester $I
     *
     * @return void
     */
    public function loadFixtures(CartsApiTester $I): void
    {
        $this->fixtures = $I->loadFixtures(ConvertGuestCartToCustomerCartRestApiFixtures::class);
    }

    /**
     * @depends loadFixtures
     *
     * @param \PyzTest\Glue\Carts\CartsApiTester $I
     *
     * @return void
     */
    public function requestGuestCartBecomesCustomerCartAfterCustomerLogin(CartsApiTester $I): void
    {
        // Arrange
        $this->requestCustomerLoginWithXAnonymousCustomerUniqueIdHeader($I);
        $quoteUuid = $this->fixtures->getGuestQuoteTransfer()->getUuid();
        $productConcreteSku = $this->fixtures->getProductConcreteTransfer()->getSku();
        $url = $I->buildCartUrl($quoteUuid, [CartsRestApiConfig::RESOURCE_CART_ITEMS]);

        // Act
        $I->sendGET($url);

        // Assert
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesOpenApiSchema();

        $I->amSure('The returned resource is of correct type')
            ->whenI()
            ->seeResponseDataContainsSingleResourceOfType(CartsRestApiConfig::RESOURCE_CARTS);

        $I->amSure('The returned resource has correct id')
            ->whenI()
            ->seeSingleResourceIdEqualTo($quoteUuid);

        $I->amSure('The returned resource has relationship')
            ->whenI()
            ->seeSingleResourceHasRelationshipByTypeAndId(
                CartsRestApiConfig::RESOURCE_CART_ITEMS,
                $productConcreteSku
            );
    }

    /**
     * @depends loadFixtures
     *
     * @param \PyzTest\Glue\Carts\CartsApiTester $I
     *
     * @return void
     */
    public function requestGuestCartCollectionIsEmpty(CartsApiTester $I): void
    {
        // Arrange
        $I->haveHttpHeader(CartsRestApiConfig::HEADER_ANONYMOUS_CUSTOMER_UNIQUE_ID, $this->fixtures->getGuestCustomerReference());

        // Act
        $I->sendGET($I->buildGuestCartsUrl());

        // Assert
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesOpenApiSchema();
        $I->seeResponseDataContainsEmptyCollection();
    }

    /**
     * @depends loadFixtures
     *
     * @param \PyzTest\Glue\Carts\CartsApiTester $I
     *
     * @return void
     */
    protected function requestCustomerLoginWithXAnonymousCustomerUniqueIdHeader(CartsApiTester $I): void
    {
        $I->haveHttpHeader(CartsRestApiConfig::HEADER_ANONYMOUS_CUSTOMER_UNIQUE_ID, $this->fixtures->getGuestCustomerReference());
        $token = $I->haveAuthorizationToGlue(
            $this->fixtures->getCustomerTransfer(),
            $I::ANONYMOUS_PREFIX . $this->fixtures->getGuestCustomerReference()
        )->getAccessToken();

        $I->amBearerAuthenticated($token);
    }
}
