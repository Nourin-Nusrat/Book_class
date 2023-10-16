<?php
class Book {
    
    public $title;
    public $author;
    public $isbn;
    public $available;

    public function __construct(  string $title,  string $author, int $isbn, int $available = 0 ) {
        
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->available = $available;
    }
    public function getTitle(): string {
        return $this->title;
    }
    public function getAuthor(): string {
        return $this->author;
    }
    public function getIsbn(): int {
        return $this->isbn;
    }
    public function isAvailable(): bool {
        return $this->available;
    }
    // public function __call($method, $args) {
    //     if (strpos($method, 'get') === 0) {
    //         $property = lcfirst(substr($method, 3));
    //         if (array_key_exists($property, $this->data)) {
    //             return $this->data[$property];
    //         }
    //     }
    //     throw new BadMethodCallException("Method $method does not exist.");
    // }

    // public function getPrintableTitle(): string {
    //     $result = '<i>' . $this->title
    //     . '</i> - ' . $this->author;
    //     if (!$this->available) {
    //         $result .= ' <b>Not available</b>';
    //     }
    //     return $result;
    // }
    public function __toString() {
        $result = '<i>' . $this->title . '</i> - ' . $this->author;
        if (!$this->available) {
            $result .= ' <b>Not available</b>';
        }
        return $result;
    }

    public function getCopy(): bool {
        if ($this->available < 1) {
            return false;
        } 
        else {
            $this->available--;
            return true;
        }
    }
    public function addCopy() {
        $this->available++;
    }
}

    
?>