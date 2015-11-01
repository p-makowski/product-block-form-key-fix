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
 * Class MPower_ProductBlockFormKey_Model_Observer
 */
class MPower_ProductBlockFormKey_Model_Observer
{
    /**
     * Add form key to cache key info of block
     *
     * @param Varien_Event_Observer $observer
     *
     * @return $this
     */
    public function addFormKeyToCacheKeyInfo(Varien_Event_Observer $observer)
    {
        /** @var string[] $cacheKeyInfo */
        $cacheKeyInfo = $observer->getEvent()->getCacheKeyInfo();

        /** @var string $formKey */
        $formKey = Mage::getSingleton('core/session')->getFormKey();
        $cacheKeyInfo['form_key'] = $formKey;

        $observer->getEvent()->setCacheKeyInfo($cacheKeyInfo);

        return $this;
    }
}