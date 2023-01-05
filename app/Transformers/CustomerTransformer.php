<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Customer;

/**
 * Class CustomerTransformer.
 *
 * @package namespace App\Transformers;
 */
class CustomerTransformer extends TransformerAbstract
{
    /**
     * Transform the Customer entity.
     *
     * @param \App\Models\Customer $model
     *
     * @return array
     */
    public function transform(Customer $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
