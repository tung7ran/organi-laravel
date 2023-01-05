<?php

namespace App\Presenters;

use App\Transformers\PagesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PagesPresenter.
 *
 * @package namespace App\Presenters;
 */
class PagesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PagesTransformer();
    }
}
