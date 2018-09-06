<?php
/**
 * Created by PhpStorm.
 * User: JHC
 * Date: 2018-07-24
 * Time: 15:53
 */

namespace App\Services;


use XinXiHua\SDK\AccessToken;

class BaseService
{
    protected $client;

    function __construct(AccessToken $accessToken)
    {
        $this->client = $accessToken->getIsvCorpClient();
    }
}