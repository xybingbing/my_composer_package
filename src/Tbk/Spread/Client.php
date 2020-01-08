<?php

/*
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace BingBing\Tbk\Spread;

use BingBing\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{
    /**
     * taobao.tbk.spread.get (淘宝客-公用-长链转短链)
     * @line https://open.taobao.com/api.htm?docId=27832&docType=2
     * @param array $params
     * @return array|mixed|\SimpleXMLElement|string
     */
    public function getSpread(array $params)
    {
        if (isset($params['requests']) && is_array($params['requests'])) {
            $data['requests'] = json_encode($params['requests']);
        } elseif (is_array($params)) {
            $data['requests'] = json_encode($params);
        } else {
            $data['requests'] = $params;
        }
        $res = $this->httpPost('taobao.tbk.spread.get', $params);
        return $res;
    }
}
