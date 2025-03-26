<?php

require "Member.php";

$testMember = new Member();

$testMember->memberID = 1;
$testMember->memberUsername = "testUser";
$testMember->memberPassword = "asdf";
$testMember->memberEmail = asdf@mail.com
$testMember->memberDOB = "2025-03-26";

$testMember->displayMember();

?>