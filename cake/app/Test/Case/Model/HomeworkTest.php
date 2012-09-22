<?php
App::uses('Homework', 'Model');

/**
 * Homework Test Case
 *
 */
class HomeworkTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.homework',
		'app.course',
		'app.area'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Homework = ClassRegistry::init('Homework');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Homework);

		parent::tearDown();
	}

}
