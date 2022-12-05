<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\LiveSearchProductListing\Block\Frontend\Category;

use Magento\Catalog\Model\Layer\Resolver;
use Magento\Framework\App\ProductMetadata;
use Magento\Framework\Locale\CurrencyInterface;
use Magento\Framework\View\Element\Template\Context;
use Magento\LiveSearch\Api\ServiceClientInterface;
use Magento\LiveSearch\Model\ModuleVersionReader;
use Magento\ServicesId\Model\ServicesConfigInterface;

/**
 * SaasContext block for Category.
 *
 * @api
 */
class SaaSContext extends \Magento\LiveSearchProductListing\Block\Frontend\SaaSContext
{
    /**
     * @var Resolver
     */
    private $layerResolver;

    /**
     * @param Context $context
     * @param ServicesConfigInterface $servicesConfig
     * @param ProductMetadata $productMetadata
     * @param ModuleVersionReader $moduleVersionReader
     * @param ServiceClientInterface $serviceClient
     * @param CurrencyInterface $localeCurrency
     * @param Resolver $layerResolver
     */
    public function __construct(
        Context $context,
        ServicesConfigInterface $servicesConfig,
        ProductMetadata $productMetadata,
        ModuleVersionReader $moduleVersionReader,
        ServiceClientInterface $serviceClient,
        CurrencyInterface $localeCurrency,
        Resolver $layerResolver
    ) {
        $this->layerResolver = $layerResolver;
        parent::__construct(
            $context,
            $servicesConfig,
            $productMetadata,
            $moduleVersionReader,
            $serviceClient,
            $localeCurrency
        );
    }

    /**
     * Returns current category id
     *
     * @return int
     */
    public function getCategoryId(): int
    {
        return (int) $this->layerResolver->get()->getCurrentCategory()->getId();
    }
}
