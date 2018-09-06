<?php
/**
 * Created by PhpStorm.
 * User: JHC
 * Date: 2017-11-18
 * Time: 9:34
 */

namespace App\Services;


class RegionService extends BaseService
{


    public function getProvinces()
    {

        $response = $this->client->get('provinces');

        \Log::info($response->getResponse());
        if ($response->isResponseSuccess()) {

            return $response->getResponseData();

        }
        return null;
    }

    public function getCities($province_id)
    {

        $response = $this->client->get('provinces/' . $province_id . '/cities');

        \Log::info($response->getResponse());
        if ($response->isResponseSuccess()) {

            return $response->getResponseData();

        }
        return null;
    }


}