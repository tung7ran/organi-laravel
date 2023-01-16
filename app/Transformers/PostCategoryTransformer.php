<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\PostCategory;

/**
 * Class PostCategoryTransformer.
 *
 * @package namespace App\Transformers;
 */
class PostCategoryTransformer extends TransformerAbstract
{
    /**
     * Transform the PostCategory entity.
     *
     * @param \App\Models\PostCategory $model
     *
     * @return array
     */
    public function transform(PostCategory $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
