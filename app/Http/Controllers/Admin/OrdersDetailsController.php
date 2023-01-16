<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\orders_detailUpdateRequest;
use App\Http\Requests\orders_detailCreateRequest;
use App\Repositories\OrdersDetailRepository;
use App\Validators\OrdersDetailValidator;

/**
 * Class OrdersDetailsController.
 *
 * @package namespace App\Http\Controllers;
 */
class OrdersDetailsController extends Controller
{
    /**
     * @var OrdersDetailRepository
     */
    protected $repository;

    /**
     * @var OrdersDetailValidator
     */
    protected $validator;

    /**
     * OrdersDetailsController constructor.
     *
     * @param OrdersDetailRepository $repository
     * @param OrdersDetailValidator $validator
     */
    public function __construct(OrdersDetailRepository $repository, OrdersDetailValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->partView   = 'backend.orders-detail';
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  orders_detailCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(orders_detailCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $input     = $request->all();
            $input['id_order'] = $request->input('id_order');
            $input['id_product'] = $request->input('id_product');
            $input['id_product'] = $request->input('id_product');
            $input['qty'] = $request->input('qty');
            $input['total'] = $request->input('total');

            $ordersDetail = $this->repository->create($request->all());

            $response = [
                'message' => 'OrdersDetail created.',
                'data'    => $ordersDetail->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('orders-detail.index')->with('message', trans('messages.create_success'));

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
        $ordersDetail = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ordersDetail,
            ]);
        }
        return view($this->partView . '.show', compact('ordersDetail'));
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
        $ordersDetail = $this->repository->find($id);

        return view($this->partView . '.edit', compact('ordersDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  orders_detailUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(orders_detailUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $ordersDetail = $this->repository->update($request->all(), $id);

            $response = [
                'message' => trans('messages.update_success'),
                'data'    => $ordersDetail->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('orders-detail.index')->with('message', $response['message']);
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
                'message' => trans('messages.delete_success'),
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'OrdersDetail deleted.');
    }

    public function create() {
        return view($this->partView . '.create');
    }
}
