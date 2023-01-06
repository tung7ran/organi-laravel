<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PagesCreateRequest;
use App\Http\Requests\PagesUpdateRequest;
use App\Repositories\PagesRepository;
use App\Validators\PagesValidator;

/**
 * Class PagesController.
 *
 * @package namespace App\Http\Controllers;
 */
class PagesController extends Controller
{
    /**
     * @var PagesRepository
     */
    protected $repository;

    /**
     * @var PagesValidator
     */
    protected $validator;

    /**
     * PagesController constructor.
     *
     * @param PagesRepository $repository
     * @param PagesValidator $validator
     */
    public function __construct(PagesRepository $repository, PagesValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->partView   = 'backend.pages';
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
        return view($this->partView . '.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  PagesCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PagesCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $input     = $request->all();
            $input['type'] = $request->type;
            $input['name_page'] = $request->input('name_page');
            $input['title_h1'] = $request->input('title_h1');
            $input['route'] = $request->input('route');
            $input['content'] = $request->content;
            $input['meta_title'] = $request->input('meta_title');
            $input['meta_description'] = $request->input('meta_description');
            $input['meta_keyword'] = $request->input('meta_keyword');

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $file_image = time() . '.' . $extension;
                $file->move('uploads/pages/images/', $file_image);
                $input['image'] = $file_image;
            }
            if ($request->hasfile('banner')) {
                $file = $request->file('banner');
                $extension = $file->getClientOriginalExtension();
                $file_image = time() . '.' . $extension;
                $file->move('uploads/pages/banners/', $file_image);
                $input['banner'] = $file_image;
            }

            $page = $this->repository->create($input);

            $response = [
                'message' => trans('messages.create_success'),
                'data'    => $page->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('pages.index')->with('message', $response['message']);
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
        $page = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $page,
            ]);
        }

        return view('pages.show', compact('page'));
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
        // dd('edit');
        $pages = $this->repository->find($id);

        return view($this->partView . '.edit', compact('pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PagesUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PagesUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $page = $this->repository->update($request->all(), $id);

            $response = [
                'message' => trans('messages.update_success'),
                'data'    => $page->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', trans('messages.update_success'));
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
                'message' => 'Pages deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Pages deleted.');
    }
}
