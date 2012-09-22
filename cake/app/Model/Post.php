<?php
class Post extends AppModel {

    var $name = 'Post';
    var $displayField = 'title';

    //Validaciones para las noticias
    public $validate = array(
	//validando title
        'title' => array(
		'length' => array(
		    'rule' => array('maxLength', 50),
		    'message' => "The post's title must be no larger than 50 characters long."
		),
		'required' => array(
			'rule' => array('notEmpty'),
                	'message' => "The post's title is required."
		)
        ),
	//validando website
	'website' => array(
		'length' => array(
		    'rule' => array('maxLength', 300),
		    'message' => "The post's website must be no larger than 300 characters long."
		),
		'website' => array(
		    'rule' => 'url',
		)
	),
	//validando description
	'description' => array(
		'length' => array(
		    'rule' => array('maxLength', 300),
		    'message' => "The post's description must be no larger than 300 characters long."
		),
		'required' => array(
			'rule' => array('notEmpty'),
                	'message' => "The post's description is required."
		)
        ));

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>
