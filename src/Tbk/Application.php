<?php

/*
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace BingBing\Tbk;

use BingBing\Kernel\ServiceContainer;

/**
 * Class Application.
 *
 * @property \BingBing\Tbk\Item\Client               $item
 * @property \BingBing\Tbk\Shop\Client               $shop
 * @property \BingBing\Tbk\Rebate\Client             $rebate
 * @property \BingBing\Tbk\Uatm\Client               $uatm
 * @property \BingBing\Tbk\Ju\Client                 $ju
 * @property \BingBing\Tbk\Spread\Client             $spread
 * @property \BingBing\Tbk\Dg\Client                 $dg
 * @property \BingBing\Tbk\Coupon\Client             $coupon
 * @property \BingBing\Tbk\Tpwd\Client               $tpwd
 * @property \BingBing\Tbk\Content\Client            $content
 * @property \BingBing\Tbk\Sc\Client                 $sc
 * @property \BingBing\Tbk\Order\Client              $order
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Item\ServiceProvider::class,
        Shop\ServiceProvider::class,
        Rebate\ServiceProvider::class,
        Uatm\ServiceProvider::class,
        Ju\ServiceProvider::class,
        Spread\ServiceProvider::class,
        Dg\ServiceProvider::class,
        Coupon\ServiceProvider::class,
        Tpwd\ServiceProvider::class,
        Content\ServiceProvider::class,
        Sc\ServiceProvider::class,
        Order\ServiceProvider::class,
    ];
}
