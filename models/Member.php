<?php
class Member{
	//ATTRIBUTES
	public $memberID;
	public $memberUsername;
	public $memberPassword;
	public $memberEmail;

	//DISPLAY DETAILS
	public function displayMember(){
		echo "<br>MEMBER";
		echo "<br>ID: " . $this->memberID;
		echo "<br>Username: " . $this->memberUsername();
		echo "<br>Password: " . $this->memberPassword();
		echo "<br>Email: " . $this->memberEmail();
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
		];

		
	
		$columnNames = [];
		$placeholders = [];
		foreach (array_keys($dataToInsert) as $key) {
			$columnNames[] = "member_" . $key;
			$placeholders[] = ":" . $key;
		}

		$sql = sprintf(
            "INSERT INTO Member (%s) VALUES (%s)",
            implode(", ", $columnNames),
            implode(", ", $placeholders)
        );

        try {
            $statement = $connection->prepare($sql);
            return $statement->execute($dataToInsert); 

        } catch (PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return false;
        }
	}
}