<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DecentralizationRepository;
use App\Models\Decentralization;
use App\Validators\DecentralizationValidator;

/**
 * Class DecentralizationRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DecentralizationRepositoryEloquent extends BaseRepository implements DecentralizationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Decentralization::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DecentralizationValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
