<?php

/*
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace BingBing\Tbk\Rebate;

use BingBing\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{
    /**
     * taobao.tbk.rebate.auth.get (淘宝客-推广者-返利商家授权查询)
     * @line https://open.taobao.com/api.htm?docId=24525&docType=2
     * @param array $params
     * @return array|mixed|\SimpleXMLElement|string
     */
    public function getAuth(array $params)
    {
        $res = $this->httpPost('taobao.tbk.rebate.auth.get', $params);
        return $res;
    }

    /**
     * taobao.tbk.rebate.order.get (淘宝客-推广者-返利订单查询)
     * @line https://open.taobao.com/api.htm?docId=24526&docType=2
     * @param array $params
     * @return array|mixed|\SimpleXMLElement|string
     */
    public function getOrder(array $params)
    {
        $res = $this->httpPost('taobao.tbk.rebate.order.get', $params);
        return $res;
    }
}
