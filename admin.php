<html lang="en">
        <?php
        try{$connection = new PDO("mysql:host=localhost",
                                "root",
                                "pass",
                                    array(
                                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                                    )
            );

        $sql = file_get_contents("./test.sql");
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();

        $connection->exec($sql);

    }catch(PDOException $error){
        echo $sql . "<br>" . $error->getMessage();
    }

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
    </body>
</html>