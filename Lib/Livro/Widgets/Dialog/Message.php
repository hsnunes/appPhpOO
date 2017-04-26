<?php

namespace Livro\Widgets\Dialog;

use Livro\Widgets\Base\Element;
/**
 * classe TMessage
 * exibe mensagens ao usu�rio
 */
class Message
{
    /**
     * m�todo construtor
     * instancia objeto TMessage
     * @param $type      = tipo de mensagem (info, error)
     * @param $message = mensagem ao usu�rio
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