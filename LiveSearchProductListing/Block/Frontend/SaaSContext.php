<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\LiveSearchProductListing\Block\Frontend;

use Magento\Framework\App\ProductMetadata;
use Magento\Framework\Locale\CurrencyInterface;
use Magento\Framework\View\Element\Template\Context;
use Magento\ServicesId\Model\ServicesConfigInterface;
use Magento\LiveSearch\Api\ServiceClientInterface;
use Magento\LiveSearch\Block\BaseSaaSContext;
use Magento\LiveSearch\Model\ModuleVersionReader;
use Magento\Store\Model\ScopeInterface;

/**
 * @api
 */
class SaaSContext extends BaseSaaSContext
{
    /**
     * Config path to frontend url
     *
     * @var string
     */
    private const FRONTEND_URL = 'live_search_product_listing/frontend_url';

    /**
     * Returns config for frontend url
     *
     * @return string
     */
    public function getFrontendUrl(): string
    {
        return (string) $this->_scopeConfig->getValue(
            self::FRONTEND_URL,
            ScopeInterface::SCOPE_WEBSITE
        );
    }
}
