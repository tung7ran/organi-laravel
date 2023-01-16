<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PostCategoryCreateRequest;
use App\Http\Requests\PostCategoryUpdateRequest;
use App\Repositories\PostCategoryRepository;
use App\Validators\PostCategoryValidator;

/**
 * Class PostCategoriesController.
 *
 * @package namespace App\Http\Controllers;
 */
class PostCategoriesController extends Controller
{
    /**
     * @var PostCategoryRepository
     */
    protected $repository;

    /**
     * @var PostCategoryValidator
     */
    protected $validator;

    /**
     * PostCategoriesController constructor.
     *
     * @param PostCategoryRepository $repository
     * @param PostCategoryValidator $validator
     */
    public function __construct(PostCategoryRepository $repository, PostCategoryValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->partView   = 'backend.post-category';
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
     * @param  PostCategoryCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PostCategoryCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $postCategory = $this->repository->create($request->all());

            $response = [
                'message' => 'PostCategory created.',
                'data'    => $postCategory->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
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
        $postCategory = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $postCategory,
            ]);
        }

        return view('postCategories.show', compact('postCategory'));
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
        $postCategory = $this->repository->find($id);

        return view($this->partView. '.edit', compact('postCategory')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostCategoryUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PostCategoryUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $postCategory = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'PostCategory updated.',
                'data'    => $postCategory->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
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
                'message' => 'PostCategory deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'PostCategory deleted.');
    }
}
