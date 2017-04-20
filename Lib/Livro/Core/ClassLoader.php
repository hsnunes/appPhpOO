<?php

namespace Livro\Core;

/**
* Class ClassLoader
*/
class ClassLoader
{
	protected $prefixes = [];
	public function register()
	{
		spl_autoload_register( [ $this, 'loadClass'] );
	}
	public function addNamespace( $value, $base_dir, $prepend = FALSE )
	{
		$prefix = trim( $prefix, '\\' ) . '\\';
		$base_dir = rtrim( $base_dir, DIRECTORY_SEPARATOR ) . '/';
		if ( isset( $this->prefixes[$prefix] ) === FALSE )
		{
			$this->prefixes[$prefix] = [];
		}
		if ( $prepend )
		{
			array_unshift( $this->prefixes[$prefix], $base_dir );
		} else
		{
			array_push( $this->prefixes[$prefix], $base_dir );
		}
	}
	public function loadClass( $class )
	{
		$prefix = $class;
		while ( FALSE !== $pos = strrpos( $prefix, '\\' ) )
		{
			$prefix = substr( $class, 0, $pos + 1 );
			$relative_class = substr( $class, $pos + 1 );
			$mapped_file = $this->loadMappedFile( $prefix, $relative_class );
			if ( $mapped_file )
			{
				return $mapped_file;
			}
			$prefix = rtrim( $prefix, '\\' );
		}
		return FALSE;
	}
	protected function loadMappedFile( $prefix, $relative_class )
	{
		if ( isset( $this->prefixes[$prefix] ) === FALSE )
		{
			return FALSE;
		}
		foreach ( $this->prefixes[$prefix] as $base_dir )
		{
			$file = $base_dir
					. str_replace( '\\', '/', $relative_class )
					. '.php';
			if ( $this->requireFile( $file ) )
			{
				return $file;
			}
		}
		return FALSE;
	}
	protected function requireFile( $file )
	{
		if ( file_exists($file) )
		{
			require $file;
			return TRUE;
		}
		return FALSE;
	}
}