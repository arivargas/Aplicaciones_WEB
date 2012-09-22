<?php
/**
 * CourseUserFixture
 *
 */
class CourseUserFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'course_user';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'course_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'indexes' => array(
			'course_user_users_FK' => array('column' => 'user_id', 'unique' => 0),
			'course_user_courses_FK' => array('column' => 'course_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'course_id' => 1,
			'user_id' => 1
		),
	);

}
