![Alt text](https://travis-ci.org/emmb14/CMessage.svg?branch=master)

CMessage
========

Module for session-based Flash Messages that handels messages for error, success and information.
If you are using Anax/MVC use the class CMessageAnax.



License 
------------------

This software is free software and carries a MIT license.



How to use
------------------
Session must be started before including CMessage.

Include CMessage by adding this lines:
	
	$di->set('message', function() {
		$message = new \Isa\CMessage\CMessage();
		return $message;
	});

If you are using Anax/MVC include CMessage with this lines:
	
	$di->set('message', function() use ($di) {
		$message = new \Isa\CMessage\CMessageAnax($di);
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


The messages are using icons from Font Awesome.
If you want to include icons in your messages just download Font Awesome from http://fortawesome.github.io/Font-Awesome/ and place it in your project. Then make the project use the css-file, for example like this:

	$app->theme->addStylesheet('css/font-awesome/css/font-awesome.css');

If you dont want to use the icons the messages will look fine even without them.