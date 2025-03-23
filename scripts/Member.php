<?php
class Member{
	//ATTRIBUTES
	public $memberID;
	public $memberUsername;
	public $memberPassword;
	public $memberEmail;
	public $memberDOB;
	
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
	
	public function setMemberDOB($memberDOB){
		$this->memberDOB = $memberDOB;
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
	
	public function getMemberDOB(){
		return $this->memberDOB;
	}
	
	//DISPLAY DETAILS
	public function displayMember(){
		echo "<br>MEMBER";
		echo "<br>ID: " . $this->getMemberID();
		echo "<br>Username: " . $this->getMemberUsername();
		echo "<br>Password: " . $this->getMemberPassword();
		echo "<br>Email: " . $this->getMemberEmail();
		echo "<br>Date of Birth: " . $this->getMemberDOB();
	}
}
?>