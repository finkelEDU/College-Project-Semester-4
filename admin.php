<html>
<?php
    $con = mysqli_connect("localhost","root","pass","two_guys_database");
    $result = mysqli_query($con, 'SELECT * FROM Member;');
    $data = $result->fetch_all(MYSQLI_ASSOC);
?>

	<head>
		<title>Admin Control Panel</title>
	</head>

	<body>
	<img src="Images/banner.png" alt="banner">

	<h1>ADMIN PLACEHOLDER</h1>
	<p>
		There should be functions here which allow for easy modification to the database. For example, the admin could decide to delete or ban a user.
        CRUD - Create, read, update, delete. All such functions should be available to the admin here. They could read the list of users and passwords (non-encrypted for this project, not when in production) for instance.
	</p>

    <p>
        A function to obtain a json file of data should also be created here.
    </p>

    <table>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Date of Birth</th>
        </tr>
        <?php foreach($data as $row): ?>
        <tr>
            <td><? = htmlspecialchars($row['username']) ?></td>
            <td><? = htmlspecialchars($row['password']) ?></td>
            <td><? = htmlspecialchars($row['date_of_birth']) ?></td>
        </tr>
        <?php endforeach ?>
    </table>
	</body>
</html>