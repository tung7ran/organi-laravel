<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\OrdersCreateRequest;
use App\Http\Requests\OrdersUpdateRequest;
use App\Repositories\OrdersRepository;
use App\Validators\OrdersValidator;
use App\Models\User;

/**
 * Class OrdersController.
 *
 * @package namespace App\Http\Controllers;
 */
class OrdersController extends Controller
{
    /**
     * @var OrdersRepository
     */
    protected $repository;

    /**
     * @var OrdersValidator
     */
    protected $validator;

    /**
     * OrdersController constructor.
     *
     * @param OrdersRepository $repository
     * @param OrdersValidator $validator
     */
    public function __construct(OrdersRepository $repository, OrdersValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->partView   = 'backend.orders';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('show order');
        $data  = $this->repository->paginate(request()->all());
        return view($this->partView . '.index', compact('data'));
        // return view($this->partView . '.index');
    }
    public function create()
    {
        $user = User::all();
        return view($this->partView . '.create', compact('user'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  OrdersCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(OrdersCreateRequest $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $input = $request->all();
            $input['id_customer'] = $request->id_customer;
            $input['type'] = $request->type;
            $input['total_price'] = $request->input('total_price');
            $input['status'] = $request->input('status');
            $input['note'] = $request->input('note');

            $order = $this->repository->create($input);

            $response = [
                'message' => trans('messages.create_success'),
                'data'    => $order->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('orders.index')->with('message', trans('messages.create_success'));
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
        $order = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $order,
            ]);
        }

        return view('orders.show', compact('order'));
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
        $order = $this->repository->find($id);
        $user = User::all();
        return view($this->partView . '.edit', compact('order', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  OrdersUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(OrdersUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $order = $this->repository->update($request->all(), $id);

            $response = [
                'message' => trans('messages.update_success'),
                'data'    => $order->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('orders.index')->with('message', trans('messages.update_success'));
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
                'message' => 'Orders deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Orders deleted.');
    }
}
