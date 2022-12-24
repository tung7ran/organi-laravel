<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\DecentralizationCreateRequest;
use App\Http\Requests\DecentralizationUpdateRequest;
use App\Repositories\DecentralizationRepository;
use App\Validators\DecentralizationValidator;

/**
 * Class DecentralizationsController.
 *
 * @package namespace App\Http\Controllers;
 */
class DecentralizationsController extends Controller
{
    /**
     * @var DecentralizationRepository
     */
    protected $repository;

    /**
     * @var DecentralizationValidator
     */
    protected $validator;

    /**
     * DecentralizationsController constructor.
     *
     * @param DecentralizationRepository $repository
     * @param DecentralizationValidator $validator
     */
    public function __construct(DecentralizationRepository $repository, DecentralizationValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->partView   = 'backend.decentralization';

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        // $decentralizations = $this->repository->all();

        // if (request()->wantsJson()) {

        //     return response()->json([
        //         'data' => $decentralizations,
        //     ]);
        // }

        return view($this->partView. '.index');
    }
    public function create() {
        return view($this->partView . '.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  DecentralizationCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(DecentralizationCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $decentralization = $this->repository->create($request->all());

            $response = [
                'message' => 'Decentralization created.',
                'data'    => $decentralization->toArray(),
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
        $decentralization = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $decentralization,
            ]);
        }

        return view('decentralizations.show', compact('decentralization'));
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
        $decentralization = $this->repository->find($id);

        return view('decentralizations.edit', compact('decentralization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DecentralizationUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(DecentralizationUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $decentralization = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Decentralization updated.',
                'data'    => $decentralization->toArray(),
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
                'message' => 'Decentralization deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Decentralization deleted.');
    }
}
