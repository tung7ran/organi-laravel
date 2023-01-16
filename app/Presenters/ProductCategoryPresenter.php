<?php

namespace App\Presenters;

use App\Transformers\ProductCategoryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductCategoryPresenter.
 *
 * @package namespace App\Presenters;
 */
class ProductCategoryPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductCategoryTransformer();
    }
}
