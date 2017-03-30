<?php
/**
* classe Tlogger
* esta classe provê uma interface abastrata para definição de algoritimos de LOG
*/
abstract class Tlogger
{
	protected $filename;	// local do arquivo de LOG
	/**
	 * método __construct()
	 * instancia um logger
	 * @param $filename = local do arquivo de LOG
	 */
	public function __construct( $filename )
	{
		$this->filename = $filename;
		// reseta o conteudo do arquivo
		file_put_contents( $filename, '' );
	}
	// define o método write como obrigatório
	abstract function write( $message );
}