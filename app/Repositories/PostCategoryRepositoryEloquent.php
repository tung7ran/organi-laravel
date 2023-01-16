<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PostCategoryRepository;
use App\Models\PostCategory;
use App\Validators\PostCategoryValidator;

/**
 * Class PostCategoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PostCategoryRepositoryEloquent extends BaseRepository implements PostCategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PostCategory::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PostCategoryValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
