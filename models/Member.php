<?php
class Member{
	//ATTRIBUTES
	public $memberID;
	public $memberUsername;
	public $memberPassword;
	public $memberEmail;

	//CONSTRUCTOR
	public function __construct($memberID, $memberUsername, $memberPassword, $memberEmail, $memberDOB){
		$this->memberID = $memberID;
		$this->memberUsername = $memberUsername;
		$this->memberPassword = $memberPassword;
		$this->memberEmail = $memberEmail;
	}
	
	//SETTERS
	public function setMemberID($memberID){
		$this->memberID = $memberID;
	}
	
	public function setMemberUsername($memberUsername){
		$this->memberUsername = $memberUsername;
	}
	
	public function setMemberPassword($memberPassword){
		$this->memberPassword = $memberPassword;
	}
	
	public function setMemberEmail($memberEmail){
		$this->memberEmail = $memberEmail;
	}
	
	//GETTERS
	public function getMemberID(){
		return $this->memberID;
	}
	
	public function getMemberUsername(){
		return $this->memberUsername;
	}
	
	public function getMemberPassword(){
		return $this->memberPassword;
	}
	
	public function getMemberEmail(){
		return $this->memberEmail;
	}
	
	//DISPLAY DETAILS
	public function displayMember(){
		echo "<br>MEMBER";
		echo "<br>ID: " . $this->getMemberID();
		echo "<br>Username: " . $this->getMemberUsername();
		echo "<br>Password: " . $this->getMemberPassword();
		echo "<br>Email: " . $this->getMemberEmail();
	}

	public static function authenticate(PDO $connection, $username, $password) {
        $sql = "SELECT * FROM Member WHERE member_username = :username";
        $statement = $connection->prepare($sql);
        $statement->bindParam(":username", $username); 
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

		return $user && $user["member_password"] == $password ? $user : false;
    }
	
	//checks username against db
	public static function usernameExists(PDO $connection, $username) {
        $sql = "SELECT 1 FROM Member WHERE member_username = :username LIMIT 1";
        $statement = $connection->prepare($sql);
        $statement->bindParam(':username', $username);
        $statement->execute();
        return $statement->fetchColumn() !== false;
    }

	public static function createMember(PDO $connection, $username, $password, $email,) {
		$dataToInsert = [
			'username' => $username,
			'password' => $password,
			'email'    => $email,
			'type'     => 'Member',
			'dob'      => null
		];
	
		$columnNames = [];
		$placeholders = [];
		foreach (array_keys($dataToInsert) as $key) {
			$columnNames[] = "member_" . $key;
			$placeholders[] = ":" . $key;
		}
	
		$sql = sprintf(
			"INSERT INTO %s (%s) VALUES (%s)",
			"Member",
			implode(", ", $columnNames),
			implode(", ", $placeholders)
		);
	}
}
?>