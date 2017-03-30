<?php
/**
* classe TLoggerXML
* implementa o algoritimo de LOG em XML
*/
class TLoggerXML extends Tlogger
{
	/**
	 * método write()
	 * escreve uma mensagem no arquivo de LOG
	 * @param $message = mensagem a ser escrita
	 */
	public function write()
	{
		$time = date( "Y-m-d H:i:s" );
		// monta a string
		$text = "<log>\n";
		$text .= "\t<time>{$time}</time>\n";
		$text .= "\t<message>{$message}</message>\n";
		$text .= "</log>\n";
		// adiciona ao final do arquivo
		$handler = fopen( $this->filename, 'a' );
		fwrite( $handler, $text );
		fclose( $handler );
	}
}