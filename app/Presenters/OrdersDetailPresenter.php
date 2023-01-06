<?php

namespace App\Presenters;

use App\Transformers\OrdersDetailTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OrdersDetailPresenter.
 *
 * @package namespace App\Presenters;
 */
class OrdersDetailPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OrdersDetailTransformer();
    }
}
