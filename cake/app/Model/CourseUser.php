<?php
App::uses('AppModel', 'Model');
/**
 * CourseUser Model
 *
 * @property Course $Course
 * @property User $User
 */
class CourseUser extends AppModel {
	var $name = 'CourseUser';

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'course_users';

/**
 * Primary key field
 *
 * @var string
 */
	//public $primaryKey = 'course_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'user_id';

//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>
