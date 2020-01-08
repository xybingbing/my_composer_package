<?php

/*
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace BingBing\Tbk\Coupon;

use BingBing\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{
    /**
     * taobao.tbk.coupon.get (淘宝客-公用-阿里妈妈推广券详情查询)
     * @line https://open.taobao.com/api.htm?docId=31106&docType=2
     * @param array $params
     * @return array|mixed|\SimpleXMLElement|string
     */
    public function get(array $params)
    {
        $res = $this->httpPost('taobao.tbk.coupon.get', $params);
        return $res;
    }
}
