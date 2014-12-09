CMessage
========

Module for session-based Flash Messages. It handels messages for error, success and information.
The module is build´t to fit with Anax/MVC but can be used outside of Anax too.



License 
------------------

This software is free software and carries a MIT license.



How to use in Anax/MVC
------------------
Session must be started before including CMessage.

Include CMessage in Anax by adding this lines:
	$di->setShared('message', function() {
		$message = new \Isa\CMessage\CMessage();
		return $message;
	});
	
	
Simply add the desired messages by adding these lines:

For error-messages:

	$app->message->addErrorMessage('This is a error-message');
	
For success-messages:

	$app->message->addSuccessMessage('This is a success-message');

For information-messages:

	$app->message->addInfoMessage('Detta är ett infomeddelande');
	

This lines will save the message/messages in the session and when you want to print out the messages call the method printMessage:
	
	$app->message->printMessage();
	

For example you could place the messages in a variable like this:
	
	$messages = $app->message->printMessage();
	
and then use this line to print it out on a page:
	$app->views->addString($messages); 

