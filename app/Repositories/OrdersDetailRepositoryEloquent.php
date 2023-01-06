<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\orders_detailRepository;
use App\Models\OrdersDetail;
use App\Validators\OrdersDetailValidator;

/**
 * Class OrdersDetailRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OrdersDetailRepositoryEloquent extends BaseRepository implements OrdersDetailRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrdersDetail::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return OrdersDetailValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
