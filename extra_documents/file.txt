<?php

namespace Laravel\Fortify\Http\Controllers;

use App\Models\JobRequest as JobRequestModel;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Pipeline;
use Laravel\Fortify\Actions\AttemptToAuthenticate;
use Laravel\Fortify\Actions\CanonicalizeUsername;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Show the login view.
     */
    public function create(Request $request): LoginViewResponse
    {
        return app(LoginViewResponse::class);
    }

    /**
     * Attempt to authenticate a new session.
     *
     * @return mixed
     */
    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            $response = app(LoginResponse::class);

            // Verifica si hay datos de Job Request en la sesión
            $jobRequestData = $request->session()->get('job_request_data');

            if ($jobRequestData) {
                $jobRequest = new JobRequestModel([
                    'user_id' => auth()->user()->id,
                    'category_id' => $jobRequestData['category'],
                    'skill_id' => $jobRequestData['skill'],
                    'description' => $jobRequestData['description'],
                    'location' => $jobRequestData['location'],
                    'place' => $jobRequestData['place'],
                    'has_tools' => $jobRequestData['hasTools'],
                    'has_image' => $jobRequestData['hasImage'],
                    'date' => $jobRequestData['date'],
                    'address' => $jobRequestData['address'],
                ]);
                $jobRequest->save();

                // Limpia los datos almacenados en la sesión
                $request->session()->forget('job_request_data');
            }

            return redirect()->route('list-job-request');
        });
    }

    /**
     * Get the authentication pipeline instance.
     *
     * @return \Illuminate\Pipeline\Pipeline
     */
    protected function loginPipeline(LoginRequest $request)
    {
        if (Fortify::$authenticateThroughCallback) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                call_user_func(Fortify::$authenticateThroughCallback, $request)
            ));
        }

        if (is_array(config('fortify.pipelines.login'))) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                config('fortify.pipelines.login')
            ));
        }

        return (new Pipeline(app()))->send($request)->through(array_filter([
            config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
            config('fortify.lowercase_usernames') ? CanonicalizeUsername::class : null,
            Features::enabled(Features::twoFactorAuthentication()) ? RedirectIfTwoFactorAuthenticatable::class : null,
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
        ]));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): LogoutResponse
    {
        $this->guard->logout();

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return app(LogoutResponse::class);
    }
}