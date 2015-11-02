<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2015 Patryk Makowski
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:

 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.

 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @category    MPower
 * @package     MPower_ProductBlockFormKey
 * @author      Patryk Makowski <makowski.pat+mppbfkf@gmail.com>
 * @license     http://opensource.org/licenses/MIT The MIT License (MIT)
 */

/**
 * Class St_ProductListBlockCache_Block_Catalog_Product_List
 *
 * Extends standard product list block and adds cache details to enable product list block caching
 *
 * @see Mage_Catalog_Block_Product_List
 */
class MPower_ProductBlockFormKey_Block_Catalog_Product_New extends Mage_Catalog_Block_Product_New
{
    /** @var MPower_ProductBlockFormKey_Helper_Dispatcher */
    protected $_helperDispatcher = null;

    /**
     * @return MPower_ProductBlockFormKey_Helper_Dispatcher
     */
    protected function _getDispatcherHelper()
    {
        if (is_null($this->_helperDispatcher)) {
            $this->_helperDispatcher = Mage::helper('mpower_productblockformkey/dispatcher');
        }

        return $this->_helperDispatcher;
    }

    /**
     * Returns array that uniquely identifies this product list in cache storage
     *
     * @return array Cache key info
     * @throws Mage_Core_Exception
     */
    public function getCacheKeyInfo()
    {
        /* get Magento's standard cache key info */
        $cacheKeyInfo = parent::getCacheKeyInfo();

        return $this->_getDispatcherHelper()->dispatchEvent(
            'catalog_product_new_get_cache_key_info', $cacheKeyInfo, 'cache_key_info'
        );
    }

    /**
     * Returns cache lifetime in seconds
     *
     * @return int Longevity of cache key in seconds
     */
    public function getCacheLifetime()
    {
        /* get Magento's standard cache key info */
        $cacheKeyLifetime = parent::getCacheLifetime();

        return $this->_getDispatcherHelper()->dispatchEvent(
            'catalog_product_new_get_cache_lifetime', $cacheKeyLifetime, 'cache_lifetime'
        );
    }

    /**
     * Get tags array for saving cache
     *
     * @return array
     */
    public function getCacheTags()
    {
        /* get Magento's standard cache key info */
        $cacheTags = parent::getCacheTags();

        return array_unique(
            $this->_getDispatcherHelper()->dispatchEvent(
                'catalog_product_new_get_cache_tags', $cacheTags, 'cache_tags'
            )
        );
    }
}
