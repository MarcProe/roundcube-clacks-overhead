<?php

/**
  * Plugin to add `X-Clacks-Overhead: GNU Terry Pratchett` as a header to 
  * outgoing mail.
  *
  * @version 0.1
  * @since 0.1
  * @see http://www.gnuterrypratchett.com/
  * @author Martin Porcheron
  */

class clacks_overhead extends rcube_plugin
{
    function init()
    {
        $this->add_hook('message_before_send',
            array($this, 'add_clacks_overhead'));
    }

    function add_clacks_overhead($args)
    {
        $new_headers = array('X-Clacks-Overhead' => 'GNU Terry Pratchett');
        $args['message']->headers($new_headers, true);
        return $args;
      }
}

