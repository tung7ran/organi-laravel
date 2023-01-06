<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Orders;

/**
 * Class OrdersTransformer.
 *
 * @package namespace App\Transformers;
 */
class OrdersTransformer extends TransformerAbstract
{
    /**
     * Transform the Orders entity.
     *
     * @param \App\Models\Orders $model
     *
     * @return array
     */
    public function transform(Orders $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
