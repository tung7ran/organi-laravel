<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductCategoryCreateRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;
use App\Repositories\ProductCategoryRepository;
use App\Validators\ProductCategoryValidator;
use App\Models\ProductCategory;
/**
 * Class ProductCategoriesController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductCategoriesController extends Controller
{
    /**
     * @var ProductCategoryRepository
     */
    protected $repository;

    /**
     * @var ProductCategoryValidator
     */
    protected $validator;

    /**
     * ProductCategoriesController constructor.
     *
     * @param ProductCategoryRepository $repository
     * @param ProductCategoryValidator $validator
     */
    public function __construct(ProductCategoryRepository $repository, ProductCategoryValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->partView   = 'backend.category';

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = $this->repository->paginate(request()->all());
        return view($this->partView. '.index', compact('data'));
    }
    public function create()
    {
        return view($this->partView . '.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductCategoryCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProductCategoryCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $input = $request->all();
            $input['name'] = $request->input('name');
            $input['slug'] = $request->input('slug');

            $productCategory     = $this->repository->create($input);

            $response = [
                'message' => trans('messages.create_success'),
                'data'    => $productCategory->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('category.index')->with('message', trans('messages.create_success'));
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productCategory = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $productCategory,
            ]);
        }

        return view('productCategories.show', compact('productCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCategory = $this->repository->find($id);
        return view($this->partView . '.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductCategoryUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProductCategoryUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $productCategory = $this->repository->update($request->all(), $id);

            $response = [
                'message' => trans('messages.update_success'),
                'data'    => $productCategory->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('category.index')->with('message', trans('messages.update_success'));
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'ProductCategory deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProductCategory deleted.');
    }
}
