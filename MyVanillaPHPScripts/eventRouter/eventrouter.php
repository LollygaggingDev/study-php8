<?php

require "EventListener.php";

class EventRouter
{

    private $_listeners;

    function __construct()
    {
        $this->_listeners = array();
    }

    public function addListener(EventListener $listener)
    {
        array_push($this->_listeners, $listener);
    }

    public function fireEvent($event)
    {
            foreach ($this->_listeners as $current_listener) {
                    $current_listener->update($event);
            }
    }
}