<?php

namespace Modules\My\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Modules\My\Entities\User;
use Modules\My\Data\User\UserData;
use Modules\My\Http\Requests\Auth\RegisterUserRequest;
use Modules\My\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Modules\My\Events\UserRegisteredEvent;
use Modules\My\Helpers\UserHelper;
use Modules\My\Repositories\UserRepository;
use Symfony\Component\HttpFoundation\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request
    ): \Illuminate\Contracts\View\View|Factory|Redirector|Application|RedirectResponse {
        $data = UserService::registerByHashedLink($request);
        if ($data instanceof Response) {
            return $data;
        }

        return view('my::auth.register', compact('data'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Exception
     */
    public function store(RegisterUserRequest $request): RedirectResponse
    {

        $dto = UserData::from($request->toArray());
        $user = UserRepository::createUser($dto, $request->file('avatar'));

        Auth::guard('my')->login($user);

        UserService::createUserAttributes($user);

        if ($user->bx_id)
            @event(new UserRegisteredEvent($user->bx_id, $user->country_code));



        return redirect()->route('my.home');
    }
}
