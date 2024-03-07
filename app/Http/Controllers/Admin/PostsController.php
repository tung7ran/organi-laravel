<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Repositories\PostRepository;
use App\Validators\PostValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Models\PostCategory;
/**
 * Class PostsController.
 *
 * @package namespace App\Http\Controllers;
 */
class PostsController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $repository;

    /**
     * @var PostValidator
     */
    protected $validator;

    /**
     * PostsController constructor.
     *
     * @param PostRepository $repository
     * @param PostValidator $validator
     */
    public function __construct(PostRepository $repository, PostValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->partView   = 'backend.post';
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

    public function create()
    {

        $catePost = PostCategory::all();
        return view($this->partView . '.create', compact('catePost'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  PostCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PostCreateRequest $request) {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $input     = $request->all();
            $input['name'] = $request->input('name');
            $input['slug'] = $request->input('slug');
            $input['type'] = $request->NAME;
            $input['desc'] = $request->DESC;
            $input['content'] = $request->CONTENT;
            $input['category_id'] = $request->category_id;
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $file_image = time() . '.' . $extension;
                $file->move('uploads/posts/', $file_image);
                $input['image'] = $file_image;
            }
            $post     = $this->repository->create($input);
            $response = [
                'message' => trans('messages.create_success'),
                'data'    => $post->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('post.index')->with('message', trans('messages.create_success'));
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
        $post = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $post,
            ]);
        }

        return view($this->partView . '.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $post = $this->repository->find($id);
        $types = $post->type;
        $catePost = PostCategory::all();

        return view($this->partView . '.edit', compact('post', 'types', 'catePost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PostUpdateRequest $request, $id) {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $post = $this->repository->update($request->all(), $id);

            $response = [
                'message' => trans('messages.update_success'),
                'data'    => $post->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('post.index')->with('message',  trans('messages.update_success'));
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
