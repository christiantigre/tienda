<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Lang;
use Cache;
use Mail;
use App\seguridad;
use App\intentos;

trait ThrottlesLogins
{
    /**
     * Determine if the user has too many failed login attempts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function hasTooManyLoginAttempts(Request $request)
    {
        return app(RateLimiter::class)->tooManyAttempts(
            $this->getThrottleKey($request),
            $this->maxLoginAttempts(), $this->lockoutTime() / 60
        );
    }

    /**
     * Increment the login attempts for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int
     */
    protected function incrementLoginAttempts(Request $request)
    {
        // Se controla el numero de intentos de login que realiza el usuario con la cache.
        Cache::increment('key');
        $val = Cache::get('key');
        $intenpermitidos = 5;
        $seg = new seguridad;
        $int = new intentos;
        $cc = $seg->select()->where('id', '=', 1)->first();
        $intentos = $int->select()->where('id', '=', $cc->intentos_id)->first();
        $valcc = $intentos->intentos;
        if ($valcc == 0) {
            $intenpermitidos = 5;
        }else{
            $intenpermitidos = $valcc;
        }


        $aux = $intenpermitidos + 1;
        if ($val == $aux) {
            $status = 0;
            $user = new User;
            $comfirm_token = str_random(255);
            $data['email'] = $email = $request->email;
            $the_user = $user->select()->where('email', '=', $email)->get();
            $user->where('email', '=', $email)
                        ->update(['status' => $status,'comfirm_token' => $comfirm_token]);
            $data['name'] = $user->name;
            $data['comfirm_token'] = $user->comfirm_token=str_random(255);
            Mail::send('auth.recuperacuenta', ['data' => $data], function($mail) use($data) {
                $mail->subject('Comfirmacion de cuenta');
                $mail->to($data['email'], $data['name']);
            });
            $message = 'Se exedió el numero de intentos permitidos, Se desactivo la cuenta vinculada al correo ingresado, para que puedas seguir utilizando tu cuenta se ha enviado un enlace al propietario de la cuenta';
            \Session::flash('flash_message', $message);
            Cache::flush();
            return redirect()->guest('login');
            //Cache::forget('key');
        } elseif ($val > $intenpermitidos) {
            $message = $val . '/' . $intenpermitidos;
            \Session::flash('flash_message', $message);
            Cache::flush();
            return redirect()->guest('login');
        } else {
            $email = $request->email;
            $message = '!Uups..' . $val . '/' . $intenpermitidos . ' intentos' . ' ' . $email;
            \Session::flash('flash_message_info', $message);
            return redirect()->guest('login');
        }


        app(RateLimiter::class)->hit(
            $this->getThrottleKey($request)
        );
    }

    /**
     * Determine how many retries are left for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int
     */
    protected function retriesLeft(Request $request)
    {
        return app(RateLimiter::class)->retriesLeft(
            $this->getThrottleKey($request),
            $this->maxLoginAttempts()
        );
    }

    /**
     * Redirect the user after determining they are locked out.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->secondsRemainingOnLockout($request);

        return redirect()->back()
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getLockoutErrorMessage($seconds),
            ]);
    }

    /**
     * Get the login lockout error message.
     *
     * @param  int  $seconds
     * @return string
     */
    protected function getLockoutErrorMessage($seconds)
    {
        return Lang::has('auth.throttle')
            ? Lang::get('auth.throttle', ['seconds' => $seconds])
            : 'Too many login attempts. Please try again in '.$seconds.' seconds.';
    }

    /**
     * Get the lockout seconds.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int
     */
    protected function secondsRemainingOnLockout(Request $request)
    {
        return app(RateLimiter::class)->availableIn(
            $this->getThrottleKey($request)
        );
    }

    /**
     * Clear the login locks for the given user credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function clearLoginAttempts(Request $request)
    {
        app(RateLimiter::class)->clear(
            $this->getThrottleKey($request)
        );
    }

    /**
     * Get the throttle key for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function getThrottleKey(Request $request)
    {
        return mb_strtolower($request->input($this->loginUsername())).'|'.$request->ip();
    }

    /**
     * Get the maximum number of login attempts for delaying further attempts.
     *
     * @return int
     */
    protected function maxLoginAttempts()
    {
        return property_exists($this, 'maxLoginAttempts') ? $this->maxLoginAttempts : 5;
    }

    /**
     * The number of seconds to delay further login attempts.
     *
     * @return int
     */
    protected function lockoutTime()
    {
        return property_exists($this, 'lockoutTime') ? $this->lockoutTime : 60;
    }

    /**
     * Fire an event when a lockout occurs.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function fireLockoutEvent(Request $request)
    {
        event(new Lockout($request));
    }
}
