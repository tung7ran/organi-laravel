<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\ProductCategory;

/**
 * Class ProductCategoryTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProductCategoryTransformer extends TransformerAbstract
{
    /**
     * Transform the ProductCategory entity.
     *
     * @param \App\Models\ProductCategory $model
     *
     * @return array
     */
    public function transform(ProductCategory $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
