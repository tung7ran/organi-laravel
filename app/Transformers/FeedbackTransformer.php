<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Feedback;

/**
 * Class FeedbackTransformer.
 *
 * @package namespace App\Transformers;
 */
class FeedbackTransformer extends TransformerAbstract
{
    /**
     * Transform the Feedback entity.
     *
     * @param \App\Models\Feedback $model
     *
     * @return array
     */
    public function transform(Feedback $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
