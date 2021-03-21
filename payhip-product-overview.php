<?php
/**
 * Plugin Name:       Payhip Product Overview
 * Plugin URI:        https://github.com/martijnvdb87/wp-plugin-payhip-product-overview
 * Description:       Generates an overview page of your Payhip products.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.0
 * Author:            Martijn van den Bosch
 * Author URI:        https://martijnvandenbosch.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       payhip-product-overview
 * Domain Path:       /languages
 */

namespace Martijnvdb\PayhipProductOverview;

use Martijnvdb\PayhipProductOverview\Models\Setting;
use Martijnvdb\PayhipProductOverview\Models\PostType;
use Martijnvdb\PayhipProductOverview\Models\MetaBox;
use Martijnvdb\PayhipProductOverview\Models\CustomField;
use Martijnvdb\PayhipProductOverview\Models\Translation;

require_once __DIR__ . '/vendor/autoload.php';

$payhip_products_posttype = PostType::create('payhip-products')
    ->setSlug('shop')
    ->setPublic()
    ->addSupport(['thumbnail', 'gutenberg'])
    ->setLabels([
        'singular_name' => 'Product',
        'add_new_item' => 'Add new Product',
        'add_new' => 'New Product',
        'edit_item' => 'Edit Product',
    ])
    ->addShowInRest()
    ->build();

$customfield_testing = CustomField::create('just-testing')
    ->setType('text')
    ->setLabel(Translation::get('Hello'));

$customfield_testing1 = CustomField::create('just-testing1')
    ->setType('text')
    ->setLabel(Translation::get('Hello'));

$customfield_testing2 = CustomField::create('just-testing2')
    ->setType('textarea')
    ->setLabel(Translation::get('Hello'));

$metabox_testing = MetaBox::create('just-testing')
    //->addItem([$customfield_testing1])
    ->addList([$customfield_testing, $customfield_testing1, $customfield_testing2])
    ->build();