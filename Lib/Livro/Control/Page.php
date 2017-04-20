<?php

namespace Livro\Control;

/**
* Class Page
*/
class Page
{
	public function show()
	{
		if ( $_GET )
		{
			$class = isset( $_GET['class'] ) ? $_GET['class'] : NULL;
			$method = isset( $_GET['method'] ) ? $_GET['method']: NULL;
			if ( $class )
			{
				$object = $class == get_class( $this ) ? $this : new $class;
				if ( method_exists( $object, $method ) )
				{
					call_user_func( [ $object, $method ], $_GET );
				}
			}
		}
	}
}