<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Decentralization;

/**
 * Class DecentralizationTransformer.
 *
 * @package namespace App\Transformers;
 */
class DecentralizationTransformer extends TransformerAbstract
{
    /**
     * Transform the Decentralization entity.
     *
     * @param \App\Models\Decentralization $model
     *
     * @return array
     */
    public function transform(Decentralization $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
