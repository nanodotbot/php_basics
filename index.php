<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basics</title>
    <link rel="stylesheet" href="./main.css">
</head>
<body>
    
    <h1>PHP Basics</h1>

    <h2>Arrays</h2>
    <a href="https://www.w3schools.com/php/php_arrays.asp" target="_blank" rel="noopener noreferrer">https://www.w3schools.com/php/php_arrays.asp</a>
    <?php
        // arrays
        $rabbits = [
            'Algernon',
            'Floppy',
            'Niemand'
        ];
        foreach($rabbits as $rabbit) {
    ?>
        <p><?php echo $rabbit ?></p>
        <p><?= $rabbit ?></p>
    <?php
        }
    ?>

    <h2>Classes/Objects</h2>
    <a href="https://www.w3schools.com/php/php_oop_classes_objects.asp" target="_blank" rel="noopener noreferrer">https://www.w3schools.com/php/php_oop_classes_objects.asp</a>
    <?php
        // class
        class Rabbit {
            public function __construct($name) {
                $this->name = $name;
            }
            private $name;
            
            public function getName() {
                return $this->name;
            }
        }

        $algernon = new Rabbit('Algernon');
    ?>
    <p><?= $algernon->getName() ?></p>

    <h3>Static variables/methods</h3>
    <a href="https://www.w3schools.com/php/php_oop_static_methods.asp" target="_blank" rel="noopener noreferrer">https://www.w3schools.com/php/php_oop_static_methods.asp</a>
    <?php
        class Cat {
            public static $animal = 'Cat';

            public static function getAnimal() {
                return self::$animal;
            }
        }
    ?>
    <p><?= Cat::$animal ?></p>
    <p><?= Cat::getAnimal() ?></p>


    <h2>Data Types</h2>
    <?php
        $number = 10; // Integer
        $price = 10.99; // Float
        $isAvailable = true; // Boolean
        $product = "Book"; // String
        
        // Type casting example
        $number = (string) $number;
    ?>
    <p>Integer to String: <?= gettype($number) ?></p>

    <h2>Conditionals and Loops</h2>
    <?php
        $age = 20;

        // if-else statement
        if ($age >= 18) {
            echo "<p>Adult</p>";
        } else {
            echo "<p>Minor</p>";
        }

        // switch statement
        $day = 'Monday';
        switch ($day) {
            case 'Monday':
                echo "<p>It's Monday!</p>";
                break;
            default:
                echo "<p>It's not Monday.</p>";
        }
    ?>

    <h2>Functions and Scope</h2>
    <?php
        function greet($name) {
            return "Hello, $name!";
        }

        // Variable scope
        $name = "Alice";
        function sayName() {
            global $name;
            echo "<p>$name</p>";
        }

        sayName();
    ?>
    <p><?= greet('Alice') ?></p>

    <h2>Error Handling</h2>
    <?php
        try {
            $value = 10 / 0; // This will throw an error
        } catch (DivisionByZeroError $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>";
        }
    ?>

    <h2>Superglobals</h2>
    <?php
        // $_GET example
        echo "<p>Server Name: " . $_SERVER['SERVER_NAME'] . "</p>";

        // $_POST and $_GET examples are better in forms, so maybe explain their basics here
    ?>

    <h2>Shorthand Operators</h2>
    <?php
        // Null coalescing
        $name = $_GET['name'] ?? 'Default Name';

        // Ternary operator
        $age = 20;
        $status = $age >= 18 ? "Adult" : "Minor";
    ?>
    <p>Name: <?= $name ?></p>
    <p>Status: <?= $status ?></p>

    <h2>PDO</h2>
    <h3>SQL injection</h3>
    <?php
        $id = '1';
        // $id = '1; DELETE FROM tbl_countries WHERE id_countries = 2';

        $pdo = new PDO('mysql:host=localhost;dbname=kursverwaltung', $username = 'root', $password = '');

        $statement = $pdo->query("SELECT * FROM tbl_countries WHERE id_countries =" . $id);

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $result) {
    ?>
        <p><?= $result['country'] ?></p>
    <?php
        }
    ?>

    <h3>Prepared statements and cross-site scripting attack</h3>
    <?php
        // Prepare the SQL query with a placeholder for the ID
        $statement = $pdo->prepare("SELECT * FROM tbl_countries WHERE id_countries = :id");

        // Bind the actual value of $id to the placeholder
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute the query
        $statement->execute();

        // Fetch all the results
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        $results = [
            ['country' => '<script>alert("Hacked!");</script>']
        ];

        // Iterate over the results and display them
        foreach ($results as $result) {
    ?>
            <p><?= htmlspecialchars($result['country']) ?></p>
    <?php
        }
    ?>

    <h2>When to Use htmlspecialchars()</h2>
    <p>When Outputting Data to the Browser: Always use htmlspecialchars() when you're outputting user data (or data that could potentially contain user input) to the browser. This ensures any special characters are safely encoded so they can't be interpreted as HTML or JavaScript. This is essential to prevent XSS attacks.</p>

    <p>When Inserting Data Into the Database: In general, you do not need to use htmlspecialchars() when writing data to the database. The database is not concerned with how the data will be rendered in the browser, so it's best to store the raw data (e.g., user_input or country_name) without encoding it for HTML output.</p>

    <p>However, data sanitization and validation should always be done before inserting into the database. For example, you should ensure the data is safe, well-formed, and matches the expected format (e.g., text, numbers, dates) using proper validation techniques (like using prepared statements with bound parameters, which you're already doing!).</p>

</body>
</html>
