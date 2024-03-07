<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Repositories\ProductRepository;
use App\Validators\ProductValidator;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\File as File2;
use App\Models\Product;


/**
 * Class ProductsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ProductsController extends Controller {
    /**
     * @var ProductRepository
     */
    protected $repository;

    /**
     * @var ProductValidator
     */
    protected $validator;

    protected $product;

    /**
     * ProductsController constructor.
     *
     * @param ProductRepository $repository
     * @param ProductValidator $validator
     */

    public function __construct(ProductRepository $repository, ProductValidator $validator, Product $product)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->product    = $product;
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
        return view($this->partView . '.index', compact('data'));
    }
    public function create() {
        $category = ProductCategory::all();
        return view($this->partView . '.create', compact('category'));
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
            // dd($request);
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $input['name']          = $request->input('name');
            $input['slug']          = $request->input('slug');
            $input['price']         = $request->input('price');
            $input['sale_price']    = $request->input('sale_price');
            $input['desc']          = $request->desc;
            $input['content']       = $request->content;
            $input['productCat_id'] = $request->productCat_id;

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $file_image = time() . '.' . $extension;
                $file->move('uploads/images/', $file_image);
                $input['image'] = $file_image;
            }
            $input['more_image'] = !empty($request->input('gallery')) ? json_encode($request->input('gallery')) : null;
            // dd($input);
           $product = $this->repository->create($input);

            $response = [
                'message' => trans( trans('messages.create_success')),
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
        $category = ProductCategory::all();
        $list_images = $this->product->all('more_image');
        return view($this->partView . '.edit', compact('product', 'list_images', 'category'));
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

            $more_image = [];
            $more_image_remove = [];
            if($request->hasfile('more_image'))
            {
                foreach($request->file('more_image') as $file)
                {
                    $extension = $file->getClientOriginalExtension();
                    $file_image = time().'.'.$extension;
                    $more_image[] = $file_image;
                }
            }
            if (isset($request['images_uploaded'])) {
                $more_image_remove = array_diff(json_decode($request['images_uploaded_origin']), $request['images_uploaded']);
                $more_image = array_merge($request['images_uploaded'], $more_image);
            } else {
                $more_image_remove = json_decode($request['images_uploaded_origin']);
            }

            $file = $this->product->findOrFail($id);
            $more_image = $file['more_image'];
            if($file->update()) {
                // dd($file);
//                foreach ($more_image_remove as $file_name) {
//                    File2::delete("uploads/image-more/" . $file_name);
//                }
            }
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
                'message' => trans( trans('messages.delete_success')),
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', trans('messages.delete_success'));
    }
}
