<?php

namespace app\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Renderable;
use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Handle account login request
     *
     * @param loginRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    //Вход в аккаут
    public function login(loginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */

    //Аутентификация,проверка пользователя на админа или пользователя
    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        else {
            return redirect()->intended();
        }
    }
}
