<?php
/**
 * Created by PhpStorm.
 * User: HTMC
 * Date: 2017/4/11
 * Time: 11:49
 */

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class CorporationScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {

        if (\XXH::check()) {
            $builder->where($model->getTable() . '.corp_id', \XXH::id());
        }

    }
}