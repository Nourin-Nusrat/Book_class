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
    // public function getTitle(): string {
    //     return $this->title;
    // }
    // public function getAuthor(): string {
    //     return $this->author;
    // }
    // public function getIsbn(): int {
    //     return $this->isbn;
    // }
    // public function isAvailable(): bool {
    //     return $this->available;
    // }
    public function __call($method, $args) {
        $property = lcfirst(substr($method, 3)); // Extract the property name from the method
        if (strncasecmp($method, 'get', 3) === 0) {
            if (property_exists($this, $property)) {
                return $this->$property;
            } else {
                throw new \Exception("Undefined property: $property");
            }
        } elseif (strncasecmp($method, 'set', 3) === 0) {
            if (property_exists($this, $property)) {
                $this->$property = $args[0];
            } else {
                throw new \Exception("Undefined property: $property");
            }
        }
    }

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