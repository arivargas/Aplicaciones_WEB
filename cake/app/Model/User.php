<?php
// app/Model/User.php

//Para password hashing: encriptación.
//http://book.cakephp.org/2.0/en/tutorials-and-examples/simple-acl-controlled-application/simple-acl-controlled-application.html
App::uses('AuthComponent', 'Controller/Component');
App::uses('CakeEmail', 'Network/Email');
class User extends AppModel {

	public $name = 'User';
	public $displayField = 'username';
    
    //Validaciones para usuario
    public $validate = array(
	//validando username
        'username' => array(
		'length' => array(
		    'rule' => array('maxLength', 30),
		    'message' => 'Usernames must be no larger than 30 characters long.'
		),
		'unico' => array(
			'rule' => 'isUnique',
			'message' => 'This username has already been taken.'
		),
		'required' => array(
			'rule' => array('notEmpty'),
                	'message' => 'A username is required'
		)
        ),
	//validando password
        'password' => array(
		'required' => array(
			'rule' => array('notEmpty'),
                	'message' => 'A password is required'
		),
		'range' => array(
			'rule' => array('between', 8, 30),
			'message' => 'Passwords must be between 8 and 30 characters long.'
		)
        ),
	//validando rol
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('administrador', 'profesor', 'estudiante')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        ),
	//Validando email
	'email' => array(
		'required' => array(
			'rule' => array('notEmpty'),
			'message' => 'The email is required'
		),
		'unico' => array(
			'rule' => 'isUnique',
			'message' => 'This email has already been taken.'
		),
		'valid' => array(
			'rule' => 'email',
			'message' => 'The email is not valid'
		)
	),
    );

	//hash
    public function beforeSave($options = array()) {
	if (isset($this->data[$this->alias]['password'])) {
	    $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	}
	return true;
    }
    
    //isUserHisOwn: si el usuario es el mismo para poder modificarse.   
    public function isUserHisOwn ($userURL, $user){
        return $userURL === $user;
    }

//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'CourseUser' => array(
			'className' => 'CourseUser',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>
