<?php
class Customer {
    private $id;
    private $firstname;
    private $surname;
    private $email;
    public function __construct( int $id, string $firstname, string $surname, string $email  ) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
    }
    
    // public function getId(): int {
    //     return $this->id;
    // }
    // public function getFirstname(): string {
    //     return $this->firstname;
    // }
    // public function getSurname(): string {
    //     return $this->surname;
    // }
    // public function getEmail(): string {
    //     return $this->email;
    // }
    // public function setEmail(string $email) {
    //     $this->email = $email;
    // }

    public function __call($method, $args) {
        $property = lcfirst(substr($method, 3));
        
        if (strncasecmp($method, 'get', 3) === 0) {
            return $this->$property;
        } elseif (strncasecmp($method, 'set', 3) === 0) {
            if (count($args) === 1) {
                $this->$property = $args[0];
                return $this;
            }
        }
        return null;
    }

    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }

    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }
}