<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class AliApiController extends Controller
{
    public function aliKeysToProducts($keys)
    {
        $arrayKeys = preg_split("/\\r\\n|\\r|\\n/", $keys);
        $arrayKeys = array_filter($arrayKeys, function ($value) {
            return $value !== '';
        });

        try {
            return $result = array_map(array($this, 'postRequestToAliApi'), $arrayKeys);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function postRequestToAliApi($arrayKeys)
    {
        $fields = 'productUrl,imageUrl,localPrice,productId';
        $client = new Client([
            'base_uri' => 'http://gw.api.alibaba.com/',
        ]);
        $response = $client->request('POST', 'openapi/param2/2/portals.open/api.listPromotionProduct/73815', [
            'query' => [
                'fields' => $fields,
                'keywords' => $arrayKeys,
                'language' => 'ru',
                'localCurrency' => 'RUB',
//                'sort' => 'volumeDown',
            ]
        ]);
        $body = $response->getBody();

        $result = json_decode($body, true);
        $result = $result['result']['products'];
        array_unshift($result, $arrayKeys);

        return $result;
    }
}
