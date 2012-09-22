<?php
class Area extends AppModel {
    
    public $name = 'Area';
    var $displayField = 'name';
    //Validaciones para que el nombre de la area no este vacío
    public $validate = array(
        'name' => array(
		'length' => array(
		    'rule' => array('maxLength', 30),
		    'message' => "The area's name must be no larger than 30 characters long."
		),
		'required' => array(
			'rule' => array('notEmpty'),
                	'message' => "The areas's name is required"
		)
	)
    );

    //Manera en que se agrega las foreign keys a la vista
    var $hasMany = array(
        'Course' => array(
            'className'    => 'Course',
            'foreignKey'    => 'area_id'
         )
    );
}
