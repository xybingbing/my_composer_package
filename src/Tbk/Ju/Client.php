<?php

/*
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace BingBing\Tbk\Ju;

use BingBing\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{

    /**
     * taobao.tbk.ju.tqg.get (淘抢购api)
     * @line https://open.taobao.com/api.htm?docId=27543&docType=2
     * @param array $params
     * @return array|mixed|\SimpleXMLElement|string
     */
    public function getTqg(array $params)
    {
        $res = $this->httpPost('taobao.tbk.ju.tqg.get', $params);
        return $res;
    }

}
