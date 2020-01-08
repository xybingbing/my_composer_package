<?php

/*
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace BingBing\Pdd\ddk;

use BingBing\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * pdd.ddk.goods.search（多多进宝商品查询）
     * @line https://open.pinduoduo.com/#/apidocument/port?portId=pdd.ddk.goods.search
     * @param array $params
     * @return array|mixed|\SimpleXMLElement|string
     */
    public function get(array $params)
    {
        $res = $this->httpPost('pdd.ddk.goods.search', $params);
        return $res;
    }

}
