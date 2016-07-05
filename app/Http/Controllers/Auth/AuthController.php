<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\client;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Mail;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    /*protected $redirectTo = '/';*/

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }



    public function postRegister(Request $request){
        $rules = [
            'name' => 'required|min:3|max:255|regex:/^[a-záéíóúÁÉÍÓÚñàéìòùÀÈÌÒÙÑ1234567890]+$/i',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'edad' => 'Integer|Min:18',
            'terms_of_service' => 'accepted',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect("register")->withErrors($validator)->withInput();
        }else{
            $user = new User;
            $data['name'] = $user->name=$request->name;
            $data['email'] = $user->email=$request->email;
            $user->password=bcrypt($request->password);
            $user->status=0;
            $user->is_Admin=0;
            $data['comfirm_token'] = $user->comfirm_token=str_random(255);
            $user->save();
            $the_user = $user->select()->where('email', '=', $data['email'])->first();
            $user->email = $the_user->email;
            $user->id = $the_user->id;
            $user->name = $the_user->name;            
            /*dd($user->name);*/

            $client = client::create(['name'=>$user->name,'email'=>$user->email,'users_id'=>$user->id,'fechanacimiento'=>$request->datetimepicker1]);
            /*$data['nombre'] = $client->name=$request->name;
            $client = new client;*/


            Mail::send('auth.active', ['data' => $data ], function($mail) use($data){
                $mail->subject('Comfirmacion de cuenta');
                $mail->to($data['email'], $data['name']);
            });

            return redirect("register")->with("flash_message", "Hemos enviado en enlace. Por favor, verifica tu bandeja de entrada y confirma tu dirección de correo electrónico.");
        }
    }




    public function confregister($comfirm_token, $email){
        //dd($email);
        $user = new User;
        $the_user = $user->select()->where('email', '=' , $email)
                ->where('comfirm_token', '=', $comfirm_token)->get();

                if(count($the_user) > 0){
                    $status = 1;
                    $comfirm_token = str_random(255);
                    $user->where('email', '=', $email)
                        ->update(['status' => $status, 'comfirm_token' => $comfirm_token]);
                        //return redirect('register')->with("flash_message","Enhorabuena ". $the_user[0]['name']. ' ya puedes iniciar session, te recomendamos completar la información de tu perfíl');
                        return redirect()->guest('login')->with("flash_message","Enhorabuena ". $the_user[0]['name']. ' ya puedes iniciar session, te recomendamos completar la información de tu perfíl');

                }else{
                    return redirect('register')->with("flash_message","La cuenta que pertenece a ya fue activada anteriormente");
                }
    }


    public function activar(Request $request, User $user){
            $email=$request->email;
            $the_user = $user->select()->where('email', '=' , $email)->get();

            if (count($the_user) > 0) {    
                $token = $user->comfirm_token=str_random(255);
                $user->where('email', $email)->update(['comfirm_token' => $token]);

                $data['email'] = $email;
                $data['comfirm_token'] = $token;

                Mail::send('auth.activacioncuenta', ['data' => $data], function($mail) use($data){
                $mail->subject('Activación de cuenta');
                $mail->to( $data['email']);
                });
                return redirect("register")->with("flash_message", "Hemos enviado en enlace. Por favor, verifica tu bandeja de entrada y confirma tu dirección de correo electrónico.");
            }else{
                return redirect("register")->with("flash_message", "Correo electrónico proporcionado no pertenece a nuestras cuentas afiliadas.");
            }            
            
    }




    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */



    /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|min:3|max:255|regex:/^[a-záéíóúÁÉÍÓÚñàéìòùÀÈÌÒÙÑ1234567890]+$/i',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'edad' => 'Integer|Min:18',
            'terms_of_service' => 'accepted',
        ]);
    }*/

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    /*protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'status'=>0,
            'is_Admin'=>0,
            'comfirm_token'=>str_random(255),
        ]);
        Session::flash('flash_message','Bienvenido a StoreLine. Por favor, comprueba tu bandeja de entrada y confirma tu dirección de correo electrónico.');
        return redirect('home')->with('flash_message','Registrado');
    }*/
}
