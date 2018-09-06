<?php
/**
 * Created by PhpStorm.
 * User: JHC
 * Date: 2017-11-21
 * Time: 10:50
 */

namespace App\Services;


use XinXiHua\SDK\Exceptions\ApiException;

class FileService extends BaseService
{

    public function upload($file, $type, $name = '')
    {

        // 调用存储API
        $url = 'files';
        if (!empty($type)) {
            $url .= '?type=' . $type;
        }

        $response = $this->client->postMultipartSimple($url, [
            'name' => $name,
            'attachment' => $file
        ]);


        if ($response->isResponseSuccess()) {
            return $response->getResponseData()['data'];
        }

        throw new ApiException($response->getResponseMessage());
    }
}