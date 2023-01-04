<?php

namespace App\Presenters;

use App\Transformers\PostCategoryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PostCategoryPresenter.
 *
 * @package namespace App\Presenters;
 */
class PostCategoryPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PostCategoryTransformer();
    }
}
