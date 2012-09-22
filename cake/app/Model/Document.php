<?php
App::uses('AppModel', 'Model');
/**
 * Document Model
 *
 * @property Course $Course
 */
class Document extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	var $name = 'Document';
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
		    'message' => "The document's title must be no larger than 50 characters long."
		),
		'required' => array(
			'rule' => array('notEmpty'),
                	'message' => "The document's title is required."
		)
	),
	'description' => array(
		'length' => array(
		    'rule' => array('maxLength', 300),
		    'message' => "The document's description must be no larger than 300 characters long."
		),
		'required' => array(
			'rule' => array('notEmpty'),
                	'message' => "The document's descrption is required."
		)
	),
	'course_id' => array(
		'numeric' => array(
		'rule' => array('numeric'),
			'message' => 'Choose a course',
			'allowEmpty' => false,
			'required' => true,
			),
		),
	);


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
			'order' => 'Course.name DESC',
			'dependent' => 'true'
		)
	);
}

