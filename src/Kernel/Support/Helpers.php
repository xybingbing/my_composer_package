<?php

/*
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace BingBing\Kernel\Support;

/*
 * helpers.
 */

/**
 * Generate a signature.
 * @param array  $attributes
 * @param string $key
 * @param string $encryptMethod
 * @return string
 */
function generate_sign(array $attributes, $key, $encryptMethod = 'md5')
{
    ksort($attributes);

    $attributes['key'] = $key;

    return strtoupper(call_user_func_array($encryptMethod, [urldecode(http_build_query($attributes))]));
}

function generateSign(array $attributes,$secretKey)
{
    ksort($attributes);

    $stringToBeSigned = $secretKey;
    foreach ($attributes as $k => $v)
    {
        if(!is_array($v) && "@" != substr($v, 0, 1))
        {
            $stringToBeSigned .= "$k$v";
        }
    }
    unset($k, $v);
    $stringToBeSigned .= $secretKey;

    return strtoupper(md5($stringToBeSigned));
}

/**
 * Get client ip.
 * @return string
 */
function get_client_ip()
{
    if (!empty($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    } else {
        // for php-cli(phpunit etc.)
        $ip = defined('PHPUNIT_RUNNING') ? '127.0.0.1' : gethostbyname(gethostname());
    }

    return filter_var($ip, FILTER_VALIDATE_IP) ?: '127.0.0.1';
}

/**
 * Get current server ip.
 * @return string
 */
function get_server_ip()
{
    if (!empty($_SERVER['SERVER_ADDR'])) {
        $ip = $_SERVER['SERVER_ADDR'];
    } elseif (!empty($_SERVER['SERVER_NAME'])) {
        $ip = gethostbyname($_SERVER['SERVER_NAME']);
    } else {
        // for php-cli(phpunit etc.)
        $ip = defined('PHPUNIT_RUNNING') ? '127.0.0.1' : gethostbyname(gethostname());
    }

    return filter_var($ip, FILTER_VALIDATE_IP) ?: '127.0.0.1';
}

/**
 * Return current url.
 * @return string
 */
function current_url()
{
    $protocol = 'http://';

    if ((!empty($_SERVER['HTTPS']) && 'off' !== $_SERVER['HTTPS']) || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) ? $_SERVER['HTTP_X_FORWARDED_PROTO'] : 'http') === 'https') {
        $protocol = 'https://';
    }

    return $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}

/**
 * Return random string.
 * @param string $length
 * @return string
 * @throws \BingBing\Kernel\Exceptions\RuntimeException
 */
function str_random($length)
{
    return Str::random($length);
}

/**
 * @param string $content
 * @param string $publicKey
 * @return string
 */
function rsa_public_encrypt($content, $publicKey)
{
    $encrypted = '';
    openssl_public_encrypt($content, $encrypted, openssl_pkey_get_public($publicKey), OPENSSL_PKCS1_OAEP_PADDING);

    return base64_encode($encrypted);
}

function getPddSign(array $params, $client_secret)
{
    //把boolean转为true 和 false
    foreach ($params as $key=>$val){
        if(is_bool($val)){
            $params[$key] = $val?"true":"false";
        }
    }

    //签名步骤一：按字典序排序参数
    ksort($params);
    $string = $this->toUrlParams($params);

    //签名步骤二：在string首尾加上client_secret
    $string = $client_secret . $string . $client_secret;

    //签名步骤三：MD5加密
    $string = md5($string);

    //签名步骤四：所有字符转为大写
    $result = strtoupper($string);

    return $result;
}