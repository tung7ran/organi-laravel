<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\OrdersDetail;

/**
 * Class OrdersDetailTransformer.
 *
 * @package namespace App\Transformers;
 */
class OrdersDetailTransformer extends TransformerAbstract
{
    /**
     * Transform the OrdersDetail entity.
     *
     * @param \App\Models\OrdersDetail $model
     *
     * @return array
     */
    public function transform(OrdersDetail $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
