<?php

namespace Isa\CMessage;

/**
 * Store a message in session and print it out.
 *
 */
class CMessage 
{

	public $sessionKey=null;
	
	
    
	public function __construct(){
		$this->sessionKey = 'messages';
	}
	
	
	/**
	 * Add errormessage in the session
	 *
	 */
	public function addMessage($message, $type) {
		if (isset($_SESSION[$this->sessionKey]))
		{
			$messages = $_SESSION[$this->sessionKey];
		}
		
		$messages[] = [
			'message' => $message,
			'type' => $type,
		];
		
		$_SESSION[$this->sessionKey] = $messages;
	}
	
	
	/**
	 * Add errormessage in the session
	 *
	 */
	public function addErrorMessage($message) {
		$message = '<i class="fa fa-times"></i> ' . $message;
		$this->addMessage($message, 'error');
	}
	
	
	/**
	 * Add successmessage in the session
	 *
	 */
	public function addSuccessMessage($message) {
		$message = '<i class="fa fa-check"></i> ' . $message;
		$this->addMessage($message, 'success');
	}
	
	
	/**
	 * Add infomessage in the session
	 *
	 */
	public function addInfoMessage($message) {
		$message = '<i class="fa fa-info"></i> ' . $message;
		$this->addMessage($message, 'info');
	}

	
	/**
	 * Print out message
	 *
	 */
	public function printMessage() {
		$messages = $_SESSION[$this->sessionKey];
		$html = '';
		
		foreach ($messages as $message){
			$html .='<div id="message" class="' . $message['type'] . '"><p>' . $message['message'] . '</p></div>';
		}
		
		$this->clearSession();
		
		return $html;
	}
	
	
	/**
	 * Clear the session
	 *
	 */
	public function clearSession() {
		$_SESSION[$this->sessionKey] = NULL;
	} 
	 
}