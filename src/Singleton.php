<?php
# NOTICE OF LICENSE
#
# This source file is subject to the Open Software License (OSL 3.0)
# that is available through the world-wide-web at this URL:
# http://opensource.org/licenses/osl-3.0.php
#
# -----------------------
# @author: Iván Miranda @deivanmiranda
# @version: 1.0.0
# -----------------------
# Simplifies the use of singleton pattern
# -----------------------

namespace Sincco\Tools;

final class Singleton extends \stdClass {
	/**
	 * An array of instances
	 * @var array
	 */
	protected static $instances = [];
	
	/**
	 * Gets an instance for a
	 * @param  string $class Class required
	 * @param  mixed  $params Params for constructor
	 * @param  string $name  Identifier
	 * @return object        Class required
	 */
	public static function get( $class, $params = null, $name = "Global" ) {
		if( ! isset( self::$instances[ $name . "::" . $class ] ) )
			self::$instances[ $name . "::" . $class ] = new $class( $params );
		return self::$instances[ $name . "::" . $class ];
	}

	/**
	 * Destroy an instance
	 * @param  string $class Class to be destroyed
	 * @param  string $name  Identifier
	 * @return none
	 */
	public static function destroy( $class, $name = "Global" ) {
		unset( self::$instances[ $name . "::" . $class ] );
	}

	/**
	 * Destroy all instances
	 * @return none
	 */
	public static function destroyAll() {
		foreach (self::$instances as $key => $value) {
			unset( self::$instances[ $key ] );
		}
	}

	/**
	 * Return indentifiers for all the instances
	 * @return array
	 */
	public static function instances() {
		return array_keys( self::$instances );
	}
}