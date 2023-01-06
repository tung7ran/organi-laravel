<?php

namespace App\Presenters;

use App\Transformers\OrdersTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OrdersPresenter.
 *
 * @package namespace App\Presenters;
 */
class OrdersPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OrdersTransformer();
    }
}
