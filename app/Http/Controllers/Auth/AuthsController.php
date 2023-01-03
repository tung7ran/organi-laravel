<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Validators\AuthValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Class AuthsController.
 *
 * @package namespace App\Http\Controllers;
 */
class AuthsController extends Controller
{
    protected $repository;

    const EMAIL                = 'email';
    const PASSWORD             = 'password';
    const DEACTIVE             = 0;
    /**
     * AuthsController constructor.
     *
     * @param AuthValidator $validator
     */
    public function __construct(Request $request, User $model)
    {
        $this->request    = $request;
        $this->model      = $model;
        $this->middleware('auth', ['except' => ['postLogin', 'getLogin', 'getActiveUser', 'postForgot', 'getResetPassword', 'postResetPassword']]);
    }

    public function getLogin() {
        if (Auth::check()) {
            return redirect()->route('backend.home');
        }
        return view('backend.auth.login_form');
    }

    public function postLogin() {
        $data = $this->request->all();
        $validator = $this->validator($data, self::$loginRules);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput($data);
        }
        $user = $this->model->where(self::EMAIL, $this->request->input(self::EMAIL))->first();
        if (!$user) {
            return redirect()
                ->back()
                ->withInput($data)
                ->with('error', true)
                ->with('message', 'Tài khoản không tồn tại');
        }
//        Làm sau khi đã hoàn thiện login logout
//        if ($user->active == self::DEACTIVE) {
//            $this->activationService->sendActivationMail($user);
//            return redirect()
//                ->back()
//                ->with('error', true)
//                ->with('message', 'Hãy kiểm tra và làm lại theo hướng dẫn');
//        }

        if (Auth::attempt(
            [
                self::EMAIL    => $this->request->input(self::EMAIL),
                self::PASSWORD => $this->request->input(self::PASSWORD),
            ], $this->request->input('remember'))) {
            return redirect()->action('Admin\HomeController@index');
        } else {
            return redirect()
                ->back()
                ->withInput($data)
                ->with('error', true)
                ->with('message', 'Lỗi không đăng nhập được');
        }
        return redirect()->route('login');
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('login');
    }
    public function getRegister() {
        return view('backend.auth.register');
    }
    public function getForgot() {
        return view('backend.auth.password.forgot');
    }
    public function postForgot() {

    }
    public function getResetPassword() {

    }
    public function postResetPassword() {

    }
    public function getActiveUser() {

    }

    public static $loginRules = [
        self::EMAIL    => 'required',
        self::PASSWORD => 'required|min:6',
    ];

    private function validator(array $data, array $loginRules) {
        $messages = [
            'required' => trans('validation.required'),
            'max'      => trans('validation.max.string'),
        ];
        return Validator::make($data, $loginRules, $messages);
    }
}
