<?php

/*
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace BingBing\Tbk\Content;

use BingBing\Kernel\BaseClient;

/**
 * Class Client.
 */
class Client extends BaseClient
{
    /**
     * taobao.tbk.content.get (淘宝客-推广者-图文内容输出)
     * @line https://open.taobao.com/api.htm?docId=31137&docType=2
     * @param array $params
     * @return array|mixed|\SimpleXMLElement|string
     */
    public function get(array $params)
    {
        $res = $this->httpPost('taobao.tbk.content.get', $params);
        return $res;
    }

    /**
     * taobao.tbk.activitylink.get (淘宝客-推广者-官方活动转链)
     * @line https://open.taobao.com/api.htm?docId=41918&docType=2
     * @param array $params
     * @return array|mixed|\SimpleXMLElement|string
     */
    public function getActivityLink(array $params)
    {
        $res = $this->httpPost('taobao.tbk.activitylink.get', $params);
        return $res;
    }

    /**
     * taobao.tbk.content.effect.get (淘宝客-推广者-图文内容效果数据)
     * @link https://open.taobao.com/api.htm?docId=37130&docType=2
     * @param array $params
     * @return array|mixed|\SimpleXMLElement|string
     */
    public function getEffect(array $params)
    {
        if (isset($params['option']) && is_array($params['option'])) {
            $data['option'] = json_encode($params['option']);
        } elseif (is_array($params)) {
            $data['option'] = json_encode($params);
        } else {
            $data['option'] = $params;
        }
        $res = $this->httpPost('taobao.tbk.content.effect.get', $data);
        return $res;
    }
}
