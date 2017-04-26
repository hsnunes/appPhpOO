<?php

namespace Livro\Widgets\Dialog;

use Livro\Widgets\Base\Element;
/**
 * classe TMessage
 * exibe mensagens ao usuário
 */
class Message
{
    /**
     * método construtor
     * instancia objeto TMessage
     * @param $type      = tipo de mensagem (info, error)
     * @param $message = mensagem ao usuário
     */
    public function __construct( $type, $message )
    {
        $div = new Element( 'div' );
        if ( $tyle == 'info' )
        {
            $div->class = 'alert alert-info';
        }
        else if ( $type == 'error' )
        {
            $div->class = 'alert alert-danger';
        }
        $div->add( $message );
        $div->show();
    }
}
?>