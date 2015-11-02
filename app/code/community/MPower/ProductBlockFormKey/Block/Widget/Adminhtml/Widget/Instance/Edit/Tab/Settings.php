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
 * Class MPower_ProductBlockFormKey_Block_Widget_Adminhtml_Widget_Instance_Edit_Tab_Settings
 */
class MPower_ProductBlockFormKey_Block_Widget_Adminhtml_Widget_Instance_Edit_Tab_Settings
    extends Mage_Widget_Block_Adminhtml_Widget_Instance_Edit_Tab_Settings
{
    /** @var string */
    protected $_overwrittenBlockAlias = 'catalog/product_widget_new';
    /** @var string */
    protected $_newBlockAlias         = 'mpower_productblockformkey/product_widget_new';


    /**
     * Retrieve array (widget_type => widget_name) of available widgets
     *
     * Replaces occurrence of core product widget block with alias of new block implementing form keys correctly
     *
     * @see     MPower_ProductBlockFormKey_Block_Catalog_Product_Widget_New
     * @return  array
     */
    public function getTypesOptionsArray()
    {
        $widgets = parent::getTypesOptionsArray();

        foreach ($widgets as &$widget) {
            /** @var string[] $widget */
            if (is_array($widget) && array_key_exists('value', $widget) && $widget['value'] == $this->_overwrittenBlockAlias) {
                $widget['value'] = $this->_newBlockAlias;

                break;
            }
        }

        return $widgets;
    }
}
