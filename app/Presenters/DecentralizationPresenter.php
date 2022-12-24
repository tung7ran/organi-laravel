<?php

namespace App\Presenters;

use App\Transformers\DecentralizationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DecentralizationPresenter.
 *
 * @package namespace App\Presenters;
 */
class DecentralizationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DecentralizationTransformer();
    }
}
