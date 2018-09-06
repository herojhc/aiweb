<?php namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

/**
 * Class SellRepository
 * @package App\Repositories
 */
class SellRepository extends Repository
{

    /**
     * @return string
     */
    public function model()
    {
        return 'App\Models\Sell';
    }
}