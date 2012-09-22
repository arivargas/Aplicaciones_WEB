<?php
App::uses('AppModel', 'Model');
/**
 * Homework Model
 *
 * @property Course $Course
 */
class Homework extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	var $name = 'Homework';
	var $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
		'length' => array(
		    'rule' => array('maxLength', 50),
		    'message' => "Assignment's title must be no larger than 50 characters long."
		),
		'required' => array(
			'rule' => array('notEmpty'),
                	'message' => "The assignment's title is required"
		)
        ),
	'description' => array(
		'length' => array(
		    'rule' => array('maxLength', 255),
		    'message' => "Assignment's description must be no larger than 255 characters long."
		),
		'required' => array(
			'rule' => array('notEmpty'),
                	'message' => "The assignment's description is required"
		)
	));

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
