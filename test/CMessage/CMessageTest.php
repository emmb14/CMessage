<?php

namespace Isa\CMessage;

class CMessageTest extends \PHPUnit_Framework_TestCase
{

/**
 * Test 
 *
 * @return void
 *
 */
/*public function testCreateElement() 
{
	//make an instance of CMessage
	$el = new \Isa\CMessage\CMessage();
	
	//Assertion 1. Do the object have the the correct name?
	/*$res = $el['name'];
    $exp = 'test';
    $this->assertEquals($res, $exp, "Created element name missmatch.");
 
	//Assertion 2. Do the object have UTF-8 as character encoding?
    $res = $el->characterEncoding;
    $exp = 'UTF-8';
    $this->assertEquals($res, $exp, "Character encoding missmatch.");
}*/


public function testAddMessage()
{
	$test = new \Isa\CMessage\CMessage();
	
	$messages[] = [
		'message' => 'test',
		'type' =>  'error',
	];
		
	$_SESSION['messages'] = $messages;
	
	$test->addMessage('test', 'error');
	
	$exp = '<div id="message" class="error"><p>test</p></div><div id="message" class="error"><p>test</p></div>';
	
	$res = $test->printMessage();
	
	$this->assertEquals($res, $exp, "Message does not match");
}


public function testAddErrorMessage()
{
	$test = new \Isa\CMessage\CMessage();
	
	$test->addErrorMessage('test');
	
	$exp = '<div id="message" class="error"><p><i class="fa fa-times"></i> test</p></div>';
	
	$res = $test->printMessage();
	
	$this->assertEquals($res, $exp, "Message does not match");
}


public function testAddSuccessMessage()
{
	$test = new \Isa\CMessage\CMessage();
	
	$test->addSuccessMessage('test');
	
	$exp = '<div id="message" class="success"><p><i class="fa fa-check"></i> test</p></div>';
	
	$res = $test->printMessage();
	
	$this->assertEquals($res, $exp, "Message does not match");
}


public function testAddInfoMessage()
{
	$test = new \Isa\CMessage\CMessage();
	
	$test->addInfoMessage('test');
	
	$exp = '<div id="message" class="info"><p><i class="fa fa-info"></i> test</p></div>';
	
	$res = $test->printMessage();
	
	$this->assertEquals($res, $exp, "Message does not match");
}

public function testClearSession()
{
		$test = new \Isa\CMessage\CMessage();
		
		$_SESSION['messages'] = 'test';
		$test->clearSession();
		$this->assertNull($_SESSION['messages'], 'SESSION is not cleared');
		
		
}

}