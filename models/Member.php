<?php
class Member{

	private $connection;
    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }
	// authentication
	public function authenticate($username, $password) {
		// selelect all data where username matches
        $sql = "SELECT * FROM Member WHERE member_username = :username";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(":username", $username); 
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
		// check if user exists and password matches
		return $user && $user["member_password"] == $password ? $user : false;
    }
	
	//checks username against db
	public function usernameExists($username) {
		//select 1 where username matches
        $sql = "SELECT 1 FROM Member WHERE member_username = :username LIMIT 1";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':username', $username);
        $statement->execute();
        return $statement->fetchColumn() !== false;
    }

	public function createMember($username, $password, $email,) {
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
            $statement = $this->connection->prepare($sql);
            return $statement->execute($dataToInsert); 
	}
}