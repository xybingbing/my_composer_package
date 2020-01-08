<?php

/*
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace BingBing\Kernel;

use BingBing\Kernel\Support;

class PddClient extends BaseClient
{

    public function __construct(ServiceContainer $app)
    {
        parent::__construct($app);



        if ($this->globalConfig['sandbox']) {
            $this->baseUri = 'http://gw-api.pinduoduo.com/api/router';
        } else {
            $this->baseUri = 'https://gw-api.pinduoduo.com/api/router';
        }
    }

    /**
     * POST request.
     * @param $method 接口名称
     * @param array $data 请求参数
     * @param bool $auth 是否需要授权
     * @return array|mixed|\SimpleXMLElement|string
     */
    public function httpPost($method, array $data = [], $auth = false)
    {
        //组装系统参数
        $sysParams["type"] = $method;
        $sysParams["client_id"] = $this->globalConfig['client_id'];
        $sysParams["data_type"] = $this->globalConfig['format'];
        $sysParams["sign_method"] = $this->globalConfig['signMethod'];
        $sysParams["timestamp"] = time();
        if ($auth){
            if (isset($this->globalConfig['access_token']) && !empty($this->globalConfig['access_token'])){
                $sysParams["access_token"] = $this->globalConfig['access_token'];
            }else{
                $result['code'] = 0;
                $result['msg'] = "NEED TO SET SESSION";
                return $result;
            }
        }
        $sysParams["sign"] = Support\getPddSign(array_merge($data, $sysParams), $this->globalConfig['client_secret']);
        $requestUrl = $this->baseUri . '?';
        foreach ($sysParams as $sysParamKey => $sysParamValue) {
            $requestUrl .= "$sysParamKey=" . urlencode($sysParamValue) . "&";
        }
        $requestUrl = substr($requestUrl, 0, -1);
        try {
            $resp = $this->curl($requestUrl, $data);
        } catch (\Exception $e) {
            $result['code'] = $e->getCode();
            $result['msg'] = $e->getMessage();
            return json_encode($result);
        }

        unset($data);

        // 解析返回
        return $this->parseRep($resp);
    }

}