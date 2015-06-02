<?php
/**
 * Created by PhpStorm.
 * User: marko
 * Date: 17/05/2015
 * Time: 20:08
 */

namespace Mapomvc\Comment;


class ValidationMessageComment implements \Anax\DI\IInjectionAware {

    use \Anax\DI\TInjectable;


    public function set($message){
        $this->session->set('validation-message-comments', $message);
    }

    public function get(){
        return $this->session->get('validation-message-comments');
    }

    public function clear() {
        $this->session->set('validation-message-comments', '');
    }



} 