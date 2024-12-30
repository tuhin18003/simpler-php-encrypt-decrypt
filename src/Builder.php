<?php

namespace Tuhin18003\SimPhpEnDecrypt;


class Builder{

	private static $encrypt_method = "AES-256-CBC";
	private static $hash_algorithm = "sha256";
	private static $randomCharacters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ~!@#$%^&*";

	/**
	 * Generate Random String
	 *
	 * @param integer $length
	 * @return void
	 */
	public static function randomString($length = 10){
		$characters = self::$randomCharacters;
		$charactersLength = \strlen($characters);
		$randomString = "";
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[ \rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	/**
	 * Encrypt
	 *
	 * @param [type] $string
	 * @return void
	 */
	public static  function encrypt( $string ){
		$secret_key = self::randomString( 16 );
		$secret_iv = self::randomString( 16 );
		$key = \hash( self::$hash_algorithm, $secret_key );    
		$iv = \substr( \hash( self::$hash_algorithm, $secret_iv ), 0, 16);
		$output = \base64_encode( \openssl_encrypt($string, self::$encrypt_method, $key, 0, $iv) );

		return array(
			'cipher' => $output,
			'key' => \base64_encode( $key .'___'. $iv )
		);
	}

	/**
	 * Decrypt
	 *
	 * @param [type] $cipher
	 * @param [type] $key
	 * @return void
	 */
	public static function decrypt( $cipher, $key ){
		$key = explode( '___', \base64_decode( $key ) );
		return \openssl_decrypt( \base64_decode($cipher), self::$encrypt_method, $key[0], 0, $key[1]);
	}


	/**
	 * Get encrypted token
	 *
	 * @param [type] $string
	 * @param string $token_joiner
	 * @return void
	 */
	public static function getEncryptedToken( $string, $token_joiner = "__" ){
		if( empty( $string ) ) return "Please provide the string to be encrypted!";
		$tokenArr = self::encrypt( $string );

		if( empty($tokenArr) || ! is_array($tokenArr) ){
			return "An unexpected error occurred!";
		}
		return $tokenArr['cipher'] . $token_joiner . $tokenArr['key'];
	}

	/**
	 * Get decrypted token
	 *
	 * @param [type] $token
	 * @param string $token_joiner
	 * @return void
	 */
	public static function getDecryptedToken( $encryptedToken, $token_joiner = "__" ){
		if( empty( $encryptedToken ) ) return "Please provide the string to be decrypted!";
		//get the cypher and key
		$cipherKey = \explode( $token_joiner, $encryptedToken );
		return self::decrypt( $cipherKey[0], $cipherKey[1] );
	}

}