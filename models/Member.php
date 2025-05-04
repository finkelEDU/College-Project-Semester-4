<?php
class Member{
	// authentication
	public static function authenticate(PDO $connection, $username, $password) {
		// selelect all data where username matches
        $sql = "SELECT * FROM Member WHERE member_username = :username";
        $statement = $connection->prepare($sql);
        $statement->bindParam(":username", $username); 
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
		// check if user exists and password matches
		return $user && $user["member_password"] == $password ? $user : false;
    }
	
	//checks username against db
	public static function usernameExists(PDO $connection, $username) {
		//select 1 where username matches
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
		//sprintf to create the sql statement
		$sql = sprintf(
            "INSERT INTO Member (%s) VALUES (%s)",
            implode(", ", $columnNames),
            implode(", ", $placeholders)
        );
            $statement = $connection->prepare($sql);
            return $statement->execute($dataToInsert); 
	}
}