<?php

namespace Env;

class Env
{
	private static $instance = null;

	/**
	 * Env constructor.
	 * @param $envFile
	 */
	private function __construct( $envFile )
	{
		$this->loadEnvFile( $envFile );
	}

	/**
	 * @param null $envFile
	 * @return Env|null
	 */
	public static function getInstance( $envFile = null )
	{
		if ( is_null( self::$instance ) )
		{
			self::$instance = new self( $envFile );
		}

		return self::$instance;
	}

	/**
	 * @param $envFile
	 */
	public function loadEnvFile( $envFile )
	{
		if ( is_null( $envFile ) )
		{
			$envFile = "{$_SERVER['DOCUMENT_ROOT']}/.env";
		}

		$envConfigsArr = file( $envFile );

		foreach ( $envConfigsArr as $config )
		{
			$confir = str_replace( "\n", "", $config );

			$this->put( $config );
		}
	}

	/**
	 * @param $config
	 */
	public function put( $config )
	{
		if( $config{0} != '#' )
		{
			putenv( $config );
		}
	}

	/**
	 * @param $key
	 * @return array|false|string
	 */
	public function get( $key )
	{
		return trim( getenv( $key ) );
	}
}
