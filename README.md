# MPower_ProductBlockFormKey

## Description

A simple module that adds form key to cache information of `Mage_Catalog_Block_Product_New` and `Mage_Catalog_Block_Product?Widget_New` - 
thereby handling block caching on new product lists correctly.

## Usage

In this module two blocks are rewritten. Therefore please remember to change all occurrences of "catalog/product_widget_new" in static pages, e.g.:

{{widget type="mpower_productblockformkey/catalog_product_widget_new" display_type="all_products" products_count="4" template="catalog/product/widget/new/content/new_grid.phtml"}}