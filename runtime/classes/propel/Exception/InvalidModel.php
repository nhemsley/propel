<?php

require_once 'propel/PropelException.php';

class Propel_Exception_InvalidModel extends PropelException
{
	public $object;

	public function __construct(BaseObject $object)
	{
		$this->object = $object;

		parent::__construct($this->generateMessage());
	}

	private function generateMessage()
	{
		$message = '';
		$message .= 'Model validation failed in class '.get_class($this->object).chr(10);
		$message .= 'Errors:'.chr(10);
		foreach ($this->object->getValidationFailures() as $error) {
			$message .= $error->getMessage().chr(10);
		}

		return $message;
	}
}