<?php
namespace App\Http\Controllers;

use App\Libs\Tadika;
use App\Models;
use Jenssegers\Agent\Agent;
use Ramsey\Uuid\Uuid;


class UserController extends Controller
{

    use Tadika;

    public function login()
    {
        $data = array(
            'title' => 'Log In'
        );

        if (\Auth::user()) {
            return \Redirect::to('/');
        }
        else {
            return \View::make('auth.login', $data);
        }
    }

    public function doLogin()
    {
        $input = \Input::all();

        if (!isset($input['password'])) {
            $input['password'] = null;
        }

        $user = Models\Login::where('username', '=', $input['username'])->first();

        if ($user) {

            if (!$user->enable) {
                return \Redirect::action('UserController@login')
                                ->withInput(\Input::except('password'))
                                ->with('error', 'Katanama atau katalaluan salah!');

            }

            //$rememberMe = isset($input['rememberme']) && $input['rememberme'] == 'on' ? true : false;
            if (\Auth::attempt(array('username' => $input['username'], 'password' => $input['password']), false, true)) {

                $agent = new Agent();

                $log                  = new Models\LoginLog();
                $log->id              = Uuid::uuid4()->getHex();
                $log->user_id         = \Auth::user()->user_id;
                $log->login_dtm       = date('Y-m-d H:i:s');
                $log->ip_address      = $_SERVER['REMOTE_ADDR'];
                $log->browser         = $agent->browser();
                $log->browser_version = $agent->version($log->browser);
                $log->os              = $agent->platform();
                $log->os_version      = $agent->version($log->os);
                $log->save();

                return redirect()->intended('/');
            }
            else {
                return \Redirect::action('UserController@login')
                                ->withInput(\Input::except('password'))
                                ->with('error', 'Gagal mendaftar masuk!');
            }
        }
        else {
            return \Redirect::action('UserController@login')
                            ->withInput(\Input::except('password'))
                            ->with('error', 'Gagal mendaftar masuk!');
        }
    }

    public function dashboard()
    {
        $view = null;

        $data = array(
            'title'      => ['title' => 'Utama', 'subTitle' => 'Halaman Utama'],
            'menu'       => 'Utama',
            'breadcrumb' => '<li><i class="fa fa-home"></i><a href="' . \URL::to('/') . '">Utama</a></li>',
        );

        if (\Auth::user()->role == 'admin') {
            $view = 'super_admin.dashboard';
        }
        elseif (\Auth::user()->role == 'owner') {
            $view = 'owner.dashboard';
        }
        elseif (\Auth::user()->role == 'clerk') {
            $view = 'clerk.dashboard';
        }
        elseif (\Auth::user()->role == 'teacher') {
            $view = 'teacher.dashboard';
        }
        elseif (\Auth::user()->role == 'parents') {
            $view = 'parents.dashboard';
        }
        elseif (\Auth::user()->role == 'admin') {
            $view = 'parents.dashboard';
        }

        return \View::make($view, $data);
    }

    public function resendActivation($id)
    {
        $user  = Models\PBTStaff::where('id', $id)->first();
        $login = Models\USRLogin::where('user_id', $id)->first();
        if (!$login->enable && $login->password == 'Not Active Yet!') {
            $client['from_email']      = $this->getDbConfig('emel_daripada');
            $client['from_name']       = $this->getDbConfig('emel_nama');
            $client['staff_name']      = $user->staff_name;
            $client['email']           = $user->email;
            $client['activation_link'] = \URL::to('activate/' . $user->id);
            \Mail::send('email.activation', $client, function ($message) use ($client) {
                $message->from($client['from_email'], $client['from_email']);
                $message->to($client['email'], $client['staff_name']);
                $message->subject('i-SP3 : Aktifkan Akaun Anda');
            });

            return \Redirect::to('staff')->with('success', 'Email pengaktifan akaun telah dihantar.');
        }
        else {

            return \Redirect::to('staff')->with('error', 'Pengguna ini telah aktif. Email pengaktifan dibatalkan!');
        }
    }

    public function activation($id)
    {
        $data = array(
            'title' => 'Aktifkan Akaun',
            'id'    => $id
        );

        $login = Models\USRLogin::find($id);
        if ($login == null) {
            exit ('Maklumat pengguna tidak dijumpai.');
        }
        elseif ($login->password != 'Not Active Yet!') {
            exit ('Akaun ini telahpun aktif.');
        }

        return \View::make('before_auth.activate', $data);
    }

    public function doActivation($id)
    {
        $input    = \Input::all();
        $rules    = [
            'ac_username'        => 'required',
            'ac_password'        => 'required|min:8',
            'ac_retype_password' => 'required|same:ac_password'
        ];
        $att      = [
            'ac_username'        => 'katanama',
            'ac_password'        => 'katalaluan',
            'ac_retype_password' => 'ulang katalaluan'
        ];
        $messages = array(
            'required' => 'Ruangan :attribute adalah mandatori',
            'same'     => 'Sila pastikan katalaluan dan ulangannya sama',
            'min'      => 'Katalaluan mestilah minimum 8 aksara'
        );

        $validator = \Validator::make($input, $rules, $messages, $att);
        if ($validator->fails()) {
            return \Redirect::to('activate/' . $id)
                            ->withErrors($validator->messages())
                            ->withInput();
        }
        else {
            $login = Models\USRLogin::where('username', array_get($input, 'ac_username'));
            if ($login != null && $login->count() > 0) {
                return \Redirect::to('activate/' . $id)
                                ->with('error', 'Katanama telah dipilih oleh orang lain. Sila pilih katalaluan yang lain.')
                                ->withInput();
            }
            else {
                $login           = Models\USRLogin::find($id);
                $login->username = array_get($input, 'ac_username');
                $login->password = \Hash::make(array_get($input, 'ac_password'));
                $login->enable   = true;
                $login->save();

                return \Redirect::to('login');
            }
        }
    }

    public function resetPassword($id)
    {
        $user  = Models\PBTStaff::where('id', $id)->first();
        $login = Models\USRLogin::where('user_id', $id)->first();

        if ($login->enable && $login->password != 'Not Active Yet!') {
            $client['from_email'] = $this->getDbConfig('emel_daripada');
            $client['from_name']  = $this->getDbConfig('emel_nama');
            $client['staff_name'] = $user->staff_name;
            $client['email']      = $user->email;
            $login->token         = Uuid::uuid4()->getHex();
            $client['reset_link'] = \URL::to('password/reset/' . $login->token);
            \Mail::send('email.reset_password', $client, function ($message) use ($client) {
                $message->from($client['from_email'], $client['from_email']);
                $message->to($client['email'], $client['staff_name']);
                $message->subject('i-SP3 : Reset Katalaluan Anda');
            });
            $login->save();

            return \Redirect::to('staff')->with('success', 'Email reset katalaluan telah dihantar.');
        }
        else {

            return \Redirect::to('staff')->with('error', 'Pengguna ini belum aktif. Email reset katalaluan dibatalkan!');
        }
    }

    public function newPassword($token)
    {
        if (\Request::isMethod('get')) {
            $login = Models\USRLogin::where('token', $token)->first();
            $data  = array(
                'title' => 'Reset Katalaluan',
                'token' => $token
            );
            if ($login) {
                return \View::make('before_auth.reset_password', $data);
            }
            else {
                return \Redirect::to('login')->with('error', 'Token reset katalaluan tidak sah. Sila hubungi administrator');
            }
        }
        else {
            $input     = \Input::all();
            $rules     = [
                'ac_password'        => 'required|min:8',
                'ac_retype_password' => 'required|same:ac_password'
            ];
            $att       = [
                'ac_password'        => 'katalaluan',
                'ac_retype_password' => 'ulang katalaluan'
            ];
            $messages  = array(
                'required' => 'Ruangan :attribute adalah mandatori',
                'same'     => 'Sila pastikan katalaluan dan ulangannya sama',
                'min'      => 'Katalaluan mestilah minimum 8 aksara'
            );
            $validator = \Validator::make($input, $rules, $messages, $att);
            if ($validator->fails()) {
                return \Redirect::to('password/reset/' . $token)->withErrors($validator->messages());
            }
            else {
                $login           = Models\USRLogin::where('token', $token)->first();
                $login->token    = null;
                $login->password = \Hash::make(array_get($input, 'ac_password'));
                $login->save();

                return \Redirect::to('login')->with('success', 'Reset katalaluan berjaya. Sila login');
            }
        }
    }

    public function lostPassword($token = null)
    {
        if (\Request::isMethod('get')) {
            $data = array(
                'title' => 'Reset Katalaluan'
            );

            return \View::make('before_auth.lost_password', $data);
        }
        else {
            if (\Input::get('email') == '') {
                return \Redirect::to('password/lost')->with('error', 'Sila masukkan email anda!');
            }
            else {
                $user  = Models\PBTStaff::where('email', \Input::get('email'))->first();
                $login = Models\USRLogin::where('user_id', $user->id)->first();

                if ($login->enable && $login->password != 'Not Active Yet!') {
                    $client['from_email'] = $this->getDbConfig('emel_daripada');
                    $client['from_name']  = $this->getDbConfig('emel_nama');
                    $client['staff_name'] = $user->staff_name;
                    $client['email']      = $user->email;
                    $login->token         = Uuid::uuid4()->getHex();
                    $client['reset_link'] = \URL::to('password/reset/' . $login->token);
                    \Mail::send('email.reset_password', $client, function ($message) use ($client) {
                        $message->from($client['from_email'], $client['from_email']);
                        $message->to($client['email'], $client['staff_name']);
                        $message->subject('i-SP3 : Reset Katalaluan Anda');
                    });
                    $login->save();

                    return \Redirect::to('login')->with('success', 'Email reset katalaluan telah dihantar.');
                }
                else {
                    return \Redirect::to('password/lost')->with('error', 'Akaun anda belum diaktifkan! Sila hubungi pentadbir sistem.');
                }
            }
        }
    }

    public function logout()
    {
        \Auth::logout();
        \Session::clear();

        return \Redirect::to('/');
    }

    //check if user already registered
    public function alreadyRegistered()
    {
        $validator = \Validator::make(array('email' => \Input::get('email')), array('email' => 'required|email'),
                                      array('email' => 'Email yang dimasukkan tidak sah'));
        if ($validator->fails()) {
            return \Response::json($validator->errors()->first());
        }
        else {
            $pengguna = Models\APengguna::where('emel', \Input::get('email'))->get();
            if ($pengguna->count() > 0) {
                return \Response::json('Email pengguna telah wujud. Pengguna yang sama tidak boleh didaftarkan dua kali. Sila masukkan email yang betul');
            }
            else {
                return \Response::json($pengguna->count());
            }
        }
    }
}
