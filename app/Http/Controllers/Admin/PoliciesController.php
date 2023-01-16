<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PolicyCreateRequest;
use App\Http\Requests\PolicyUpdateRequest;
use App\Repositories\PolicyRepository;
use App\Validators\PolicyValidator;

/**
 * Class PoliciesController.
 *
 * @package namespace App\Http\Controllers;
 */
class PoliciesController extends Controller
{
    /**
     * @var PolicyRepository
     */
    protected $repository;

    /**
     * @var PolicyValidator
     */
    protected $validator;

    /**
     * PoliciesController constructor.
     *
     * @param PolicyRepository $repository
     * @param PolicyValidator $validator
     */
    public function __construct(PolicyRepository $repository, PolicyValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->partView   = 'backend.policy';
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
     * @param  PolicyCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PolicyCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
           
            $input     = $request->all();
            $input['name'] = $request->input('name');
            $input['slug'] = $request->input('slug');
            $input['content'] = $request->input('content');
            $input['status'] = $request->input('status');
            $input['meta_title'] = $request->input('meta_title');
            $input['meta_description'] = $request->input('meta_description');
            $input['meta_keyword'] = $request->input('meta_keyword');

            if ($request->hasfile('banner')) {
                $file = $request->file('banner');
                $extension = $file->getClientOriginalExtension();
                $file_image = time() . '.' . $extension;
                $file->move('uploads/pages/banners/', $file_image);
                $input['banner'] = $file_image;
            }

            $policy = $this->repository->create($input);

            $response = [
                'message' => 'Policy created.',
                'data'    => $policy->toArray(),
            ];


           return redirect()->route('policy.index')->with('message', $response['message']);
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
        $policy = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $policy,
            ]);
        }

        return view($this->partView . '.show', compact('policy'));
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
        $policy = $this->repository->find($id);

        return view($this->partView . '.edit', compact('policy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PolicyUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PolicyUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $policy = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Policy updated.',
                'data'    => $policy->toArray(),
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
                'message' => 'Policy deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Policy deleted.');
    }
}
