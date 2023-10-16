<?php
    require_once __DIR__ . '/Book.php';
    require_once __DIR__ . '/Customer.php';

    // Create instances of Book and Customer classes
    $book1 = new Book("A new book", "ABCDEFG", 978526742362, 0);
    $book2 = new Book("To Kill a Mockingbird", "Harper Lee", 9780061120084, 2);
    $book = new Book("1984", "George Orwell", 9785267006323, 12);
    $customer1 = new Customer(1, 'John', 'Doe', 'johndoe@mail.com');
    $customer2 = new Customer(2, 'Mary', 'Poppins', 'mp@mail.com');

    echo '<h3> All objects of book using __toString method </h3>';
    $string = (string) $book;
    $string2 = (string) $book1;
    $string3 = (string) $book2;
    echo $string ."<br>";
    echo $string2 ."<br>";
    echo $string3 ."<br";
    // echo "<pre>";
    // print_r($book1);
    // echo "</pre>";
    // echo "<pre>";
    // print_r($book2);
    // echo "</pre>";
    echo "<br>";
    echo "<br>";
    if ($book->getCopy()) {
        echo 'Here, your copy of book:';
        echo $string ."<br>";
    } 
    else {
        echo 'I am afraid that book is not available.';
    }
    $book->addCopy() ;
    echo $book->isAvailable(); 
    // echo "books copy number : " . $book->isAvailable(); . "<br>";  
    echo "<br>";
    echo "<br>";
    echo "ID: " . $customer1->getId() . "<br>";
    echo "First Name: " . $customer1->getFirstname() . "<br>";
    echo "Last Name: " . $customer1->getSurname() . "<br>";
    echo "Email: " . $customer1->getEmail() . "<br>";

    // Get the initial email for customer1
    $initialEmail = $customer1->getEmail();
    echo "Initial Email for customer1: $initialEmail<br>";

    // Set a new email using the setEmail method for customer1
    $newEmail = 'newemail@mail.com';
    $customer1->setEmail($newEmail);

    // Get the updated email for customer1
    $updatedEmail = $customer1->getEmail();
    echo "Updated Email for customer1: $updatedEmail<br>";
?>
