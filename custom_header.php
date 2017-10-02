<?php

/**
  * Plugin to add a Sender Header if the user does not send from his default identity.
  * 
  *
  * @version 0.1
  * @since 0.1
  * @author Marcus Proest
  * @author Martin Porcheron
  */
class custom_header extends rcube_plugin
{
    function init()
    {
        $this->add_hook('message_before_send', array($this, 'add_sender_header'));
    }
    function add_sender_header($args)
    {
        $rcmail   = rcmail::get_instance();
        $user     = $rcmail->user;
        $identity = $user->get_identity();

        $sender = $identity['email'];
        $from = $args['from'];

        if($sender != $from) {
                $new_headers = array('Sender' => $identity['email']);
        }

        $args['message']->headers($new_headers, true);
        return $args;
      }
}
