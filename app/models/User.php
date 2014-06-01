<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

    
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
        
        public static function isAdmin(){
            if(Auth::user()->fonction_id == 1){
                return true;
            }
            return false;
        }
        
        public static function isComptable(){
            if(Auth::user()->fonction_id == 2){
                return true;
            }
            return false;
        }
        
        public static function isVisiteur(){
            if(Auth::user()->fonction_id == 3){
                return true;
            }
            return false;
        }
        
        public static function getWithId($id){
            return self::where('id', '=', $id)->first();
        }
        
        public static function ajouter($data){
	    return self::insert(
		array(
		    'nom' => $data['nom'],
		    'prenom' => $data['prenom'],
		    'email' => $data['email'],
		    'login' => $data['login'],
		    'password' => Hash::make($data['password']),
		    'adresse' => $data['adresse'],
		    'cp' => $data['cp'],
		    'ville' => $data['ville'],
		    'date_embauche' => $data['date_embauche'],
		    'fonction_id' => $data['fonction']
		)
	    );
        }
        
        public static function getWithLogin($login){
	    return self::where('login', '=', $login)->first();
        }

}
