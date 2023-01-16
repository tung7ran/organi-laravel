<?php

namespace App\Presenters;

use App\Transformers\PolicyTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PolicyPresenter.
 *
 * @package namespace App\Presenters;
 */
class PolicyPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PolicyTransformer();
    }
}
