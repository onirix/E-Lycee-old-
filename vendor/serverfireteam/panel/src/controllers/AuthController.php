<?php

namespace Serverfireteam\Panel;

class AuthController extends \Controller {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
    public function postLogin()
    {
        \Config::set('auth.model', 'Serverfireteam\Panel\Admin');

        $userdata = array(
                'email' 	=> \Input::get('email'),
                'password' 	=> \Input::get('password')
        );
        // attempt to do the login
        if (\Auth::attempt($userdata,filter_var(\Input::get('remember'), FILTER_VALIDATE_BOOLEAN))) {                   
            return \Redirect::to('panel');
        } else {	 	
            // validation not successful, send back to form	
            return \Redirect::to('panel/login')->with('message', 'Either Password or username is not correct!!')->with('mesType','error');
        }        
    }
    
    public function getLogin(){
        
        $message = (\Session::has('message') ? \Session::get('message') : 'Please Sign In');
        $mesType = (\Session::has('mesType') ? \Session::get('mesType') : 'message');
        return \View::make('panelViews::login')->with('message', $message)->with('mesType', $mesType);     
    }
    
    public function doLogout(){
        
        \Auth::logout();     
        return \Redirect::to('panel/login');
    }                
}