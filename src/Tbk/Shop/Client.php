<?php

/*
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace BingBing\Tbk\Shop;

use BingBing\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{
    /**
     * taobao.tbk.shop.get (淘宝客-推广者-店铺搜索)
     * @line https://open.taobao.com/api.htm?docId=24521&docType=2
     * @param array $params
     * @return array|mixed|\SimpleXMLElement|string
     */
    public function get(array $params)
    {
        $res = $this->httpPost('taobao.tbk.shop.get', $params);
        return $res;
    }

    /**
     * taobao.tbk.shop.recommend.get (淘宝客-公用-店铺关联推荐)
     * @line https://open.taobao.com/api.htm?docId=24522&docType=2
     * @param array $params
     * @return array|mixed|\SimpleXMLElement|string
     */
    public function getRecommend(array $params)
    {
        $res = $this->httpPost('taobao.tbk.shop.recommend.get', $params);
        return $res;
    }
}
