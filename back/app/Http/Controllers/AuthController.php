<?php

namespace App\Http\Controllers;

use App\Source\IMailerService;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Input;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator, DB, Hash, Mail, Illuminate\Support\Facades\Password;
use Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;

class AuthController extends Controller
{
    use ResetsPasswords;

    private $mailerService;

    public function __construct(
        IMailerService $mailerService
    )
    {
        $this->mailerService = $mailerService;
    }

    /**
     * API Register
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $credentials = $request->only('name', 'email', 'password');
        $rules = [
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> ['code'=> 404, 'message' => $validator->messages()]], 400);
        }
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $user = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password)]);
        $verification_code = str_random(30); //Generate verification code
        DB::table('user_verifications')->insert(['user_id'=>$user->id,'token'=>$verification_code]);
        $subject = "Пожалуйста подтвердите Ваш электронный адрес";

//        $t = $this->mailerService->EmailConfirmRegistration($email, $name, $verification_code, null);

        Mail::send('email.verify', ['name' => $name, 'verification_code' => $verification_code],
            function($mail) use ($email, $name, $subject){
                $mail->from(getenv('FROM_EMAIL_ADDRESS'), getenv('FROM_SEO'));
                $mail->to($email);
                $mail->subject($subject);
            });
//        return response()->json(['success'=> true, 'message'=> $t]);
        return response()->json(['success'=> true, 'message'=> 'Thanks for signing up! Please check your email to complete your registration.']);
//        return $this->login($request);
    }

    /**
     * API Register
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resetSendToken(Request $request)
    {
        $credentials = $request->only('email');
        $rules = [
            'email' => 'required|email'
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> ['code'=> 404, 'message' => $validator->messages()]], 404);
        }

        $user = User::where('email', Input::get('email'))->first();
        if ($user == null) {
            return response()->json(['success' => false, 'error' => ['code'=> 404, 'message'=>'Пользователь с данным E-mail не найден' ]], 404);
        }
        $name = $user->name;
        $email = $user->email;
        $reset_code = str_random(30); //Generate reset code
        DB::table('user_reset')->insert(['user_id'=>$user->id,'token'=>$reset_code]);
        $subject = "Ссылка для восстановления пароля";
        Mail::send('email.reset', ['name' => $name, 'reset_code' => $reset_code],
            function($mail) use ($email, $name, $subject){
                $mail->from(getenv('FROM_EMAIL_ADDRESS'), getenv('FROM_SEO'));
                $mail->to($email);
                $mail->subject($subject);
            });
        return response()->json(['success'=> true, 'message'=> 'На Ваш почтовый ящик отправлена ссылка для восстановления пароля.']);
    }

    /**
     * API Reset
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        $code = Input::get('code');
        if (is_null($code)) return response()->json(['success'=> false, 'error'=> ['code'=>1, 'message'=> 'Ссылка для восстановления не действительна.']]);
        $check = DB::table('user_reset')->where('token',$code)->first();
        if(!is_null($check)){
            $user = User::find($check->user_id);
            $user->password = Hash::make(Input::get('password'));
            $user->save();
            DB::table('user_reset')->where('token',$code)->delete();
            return response()->json([
                'success'=> true,
                'message'=> 'You password changed.'
            ]);
        }
        return response()->json(['success'=> false, 'error'=> ['code'=>2, 'message'=> 'Ссылка для восстановления не действительна.']]);
    }

    public function resetLk()
    {
        $user = User::find(Input::get('user'));
        if (!$user) {
            return response()->json(['success' => false, 'error' =>['code'=>1, 'message'=> 'User was not found.']], 404);
        }
        $user->password = Hash::make(Input::get('password'));
        $user->save();
        return response()->json([
            'success'=> true,
            'message'=> 'You password changed.'
        ]);
    }

    /**
     * API Login, on success return JWT Auth token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }

        $user = User::where('email', Input::get('email'))->first();
        if ($user !== null && $user->is_verified === 0) {
            return response()->json(['success' => false, 'error' => ['code'=> 401, 'message'=>'Ваша учетная запись не подтверждена' ]], 401);
        }

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['success' => false, 'error' => ['code'=> 401, 'message'=>'We cant find an account with this credentials.' ]], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        }
        // all good so return the token

        return response()->json(['success' => true, 'access_token' => $token, 'id'=> Auth::user()->id, 'expires_in'=>864000, 'role'=>Auth::user()->role, 'name'=> Auth::user()->name ]);
    }

    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request) {
        $this->validate($request, ['token' => 'required']);
        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
    }

    /**
     * API Recover Password
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function recover(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $error_message = "Your email address was not found.";
            return response()->json(['success' => false, 'error' => ['email'=> $error_message]], 401);
        }
        try {
            Password::sendResetLink($request->only('email'), function (Message $message) {
                $message->subject('Your Password Reset Link');
            });
        } catch (\Exception $e) {
            //Return with error
            $error_message = $e->getMessage();
            return response()->json(['success' => false, 'error' => $error_message], 401);
        }
        return response()->json([
            'success' => true, 'data'=> ['message'=> 'A reset email has been sent! Please check your email.']
        ]);
    }

    public function verifyUser($verification_code)
    {
        $check = DB::table('user_verifications')->where('token',$verification_code)->first();
        if(!is_null($check)){
            $user = User::find($check->user_id);
            if($user->is_verified == 1){
                return response()->json([
                    'success'=> true,
                    'message'=> 'Account already verified..'
                ]);
            }
            $user->is_verified = 1;
            $user->save();
//            $user->update(['is_verified' => 1]);
            DB::table('user_verifications')->where('token',$verification_code)->delete();
            return response()->json([
                'success'=> true,
                'message'=> 'You have successfully verified your email address.'
            ]);
        }
        return response()->json(['success'=> false, 'error'=> ['code'=>1, 'message'=> 'Verification code is invalid.']]);
    }
}
