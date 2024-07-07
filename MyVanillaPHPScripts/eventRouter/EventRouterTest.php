<?php

require 'EventRouter.php';

class MyListener implements EventListener {
	/**
	 * @param mixed $event_arg
	 * @return mixed
	 */

	 private $_id;

	 public function __construct($id) {
		$this->_id = $id;
	 }

	public function update($event_arg) {
        echo "Received $event_arg from" . $this . "\n";
	}

	public function __toString() {
		return "<listener " . $this->_id .  ">";
	}
}


$router = new EventRouter();

$router->addListener(new MyListener("listener-1"));
$router->addListener(new MyListener("listener-2"));
$router->addListener(new MyListener("listener-3"));
$router->addListener(new MyListener("listener-4"));
$router->fireEvent("test_event");