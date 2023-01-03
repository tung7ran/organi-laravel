<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\ProductRepository;
use App\Validators\ProductValidator;
use App\Models\Product;

/**
 * Class ProductsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductsController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $repository;

    /**
     * @var ProductValidator
     */
    protected $validator;

    /**
     * ProductsController constructor.
     *
     * @param ProductRepository $repository
     * @param ProductValidator $validator
     */
    public function __construct(ProductRepository $repository, ProductValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->partView   = 'backend.product';
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
     * @param  ProductCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProductCreateRequest $request) {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $product = $this->repository->create($request->all());
            $input               = $request->all();
            $input['name'] = $request->input('name');
            $input['slug'] = $request->input('slug');
            $input['price'] = $request->input('price');
            $input['sale_price'] = $request->input('sale_price');
            $input['desc'] = $request->DESC;
            $input['content'] =$request->CONTENT;

            if($request->hasfile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $file_image = time().'.'.$extension;
                $file->move('uploads/images/', $file_image);
                $product->image = $file_image;
            }
            if($request->hasfile('image_content')){
                $file = $request->file('image_content');
                $extension = $file->getClientOriginalExtension();
                $file_image = time().'.'.$extension;
                $file->move('uploads/image-content/', $file_image);
                $product->image_content = $file_image;
            }
            if($request->hasfile('image_ingredient')){
                $file = $request->file('image_ingredient');
                $extension = $file->getClientOriginalExtension();
                $file_image = time().'.'.$extension;
                $file->move('uploads/image-ingredient/', $file_image);
                $product->image_ingredient = $file_image;
            }
            if($request->hasfile('image_use')){
                $file = $request->file('image_use');
                $extension = $file->getClientOriginalExtension();
                $file_image = time().'.'.$extension;
                $file->move('uploads/image-use/', $file_image);
                $product->image_use = $file_image;
            }
            if($request->hasfile('more_image')){
                $file = $request->file('more_image');
                $extension = $file->getClientOriginalExtension();
                $file_image = time().'.'.$extension;
                $file->move('uploads/image-more/', $file_image);
                $product->more_image = $file_image;
            }

           $product = $this->repository->create($input);

            $response = [
                'message' => trans('messages.create_success'),
                'data'    => $product->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('product.index')->with('message', trans('messages.create_success'));
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
    public function show($id) {
        $product = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $product,
            ]);
        }

        return view($this->partView . '.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $product = $this->repository->find($id);

        return view($this->partView . '.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProductUpdateRequest $request, $id) {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $product = $this->repository->update($request->all(), $id);

            $response = [
                'message' => trans('messages.update_success'),
                'data'    => $product->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('product.index')->with('message',  trans('messages.update_success'));
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
    public function destroy($id) {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => trans('messages.delete_success'),
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', trans('messages.delete_success'));
    }

}
