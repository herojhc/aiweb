<?php
/**
 * Created by PhpStorm.
 * User: JHC
 * Date: 2018-08-21
 * Time: 17:28
 */

namespace App\Models;


use App\Scopes\CorporationScope;
use Kalnoy\Nestedset\NodeTrait;

class WebsiteSellCategory extends BaseModel
{

    use NodeTrait;

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CorporationScope());

    }

}