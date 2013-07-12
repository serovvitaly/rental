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
    
    
    protected function _receivers()
    {
        return $this->belongsToMany('User', 'pf_contacts', 'user_id', 'receiver_id');
    }
    
    
    /**
    * Возвращает полное ФИО текущего пользователя
    * 
    */
    public function full_name()
    {
        return trim($this->surname . ' ' . $this->name . ' ' . $this->patronymic);
    }
    
    
    /**
    * Возвращает список контактов
    * 
    */
    public function contacts()
    {        
        $receivers = $this->_receivers()->orderBy('surname')->get();
        
        $mix = array();
        foreach ($receivers as $receiver)
        {
            $mix[] = array(
                'id'   => $receiver->id,
                'name' => $receiver->full_name()
            );
        }
        return $mix;
    }
    
    
    /**
    * Возвращает входящие сообщения пользователя
    * 
    */
    public function messages_inbox()
    {
        return $this->belongsToMany('Message', 'pf_messages_users', 'user_id', 'message_id')->orderBy('updated_at', 'DESC');
    }
    
    
    /**
    * Возвращает исходящие сообщения пользователя
    * 
    */
    public function messages_outbox()
    {
        return $this->hasMany('Message')->orderBy('updated_at', 'DESC');
    }
    

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
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
    
    
    /**
    * Отправляет письмо подтверждения регистрации
    * 
    */
    public function sendConfirmEmail()
    {
        $self = $this;
        
        Mail::send('emails.auth.confirm', array('user', $this), function($message) use ($self)
        {
            $message->to($self->email)->subject('Добро пожаловать на наш сайт!');
        });
    }

}