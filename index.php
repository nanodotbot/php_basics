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


</body>
</html>
