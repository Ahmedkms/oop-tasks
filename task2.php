<?php 
class Product {
    public $name  ;
    public $price ; 
    public $description; 
    public $image;

    public function __construct($name,$price,$description,$image){
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;

    }
    function uploadImage($image){
        $this->image = $image;
    }
    function calcPrice($price){
        return $this->price;
    }
}

class Book extends Product{
    private array $publishers = [];
    public $writer ;
    public $color;
    public $supplier;

    public function __construct($name,$price,$description,$image,$publishers,$Writer,$color,$supplier){
        parent::__construct($name,$price,$description,$image);
        $this->publishers= [
            "ahmed mohamed",
            "mourad hassaN",
            "hossam ahmed",
            "shimaa",
            "mohamed"
        ];
        $this->writer = $Writer;
        $this->color = $color;
        $this->supplier = $supplier;
    }

    public function setPublisher($publisher) {
        if (!in_array($publisher, $this->publishers)) {
            $this->publishers[] = $publisher;
        }
    }
    function getRandomPublisher(){
         return $this->publishers[array_rand($this->publishers)];
    }

    function showAllPublishers(){
        // $publishers = [];
        // foreach($this->publishers as $publisher){
        //     $publishers [] = $publisher;
        // }
        return $this->publishers;
    }
}

class BabyCar extends Product {
    public $age;
    public $weight;
    private array $materials = [];
    private float $specialTax = .10;

    public function __construct($name, $price, $description, $image, $age, $weight, $materials, $specialTax) {
        parent::__construct($name, $price, $description, $image);
        $this->age = $age;
        $this->weight = $weight;
        $this->materials = [
            "Steel",
            "Aluminum",
            "Carbon Fiber",
            "Fiberglass",
            "Foam",
            "Rubber"
        ];
        $this->specialTax = $specialTax;
    }

    public function displayMaterials() {
        return $this->materials;
    }

    public function calcFinalPrice() {
        return $this->price + ($this->specialTax * $this->price);
    }
}


$book = new Book("Sample Book", 29.99, "A great book", "book.jpg", 
"new publisher", "Author X", "Red", "Supplier Y");
echo $book->calcPrice($book->price) . "<br>";
echo $book->name ."<br>";
$book->setPublisher("new Publisher");
$allPublishers = $book->showAllPublishers();
echo "<br> "."all publishers are:";
foreach($allPublishers as $publisher){
    echo   $publisher . "<br>";
}

$babyCar1 = new BabyCar("Baby Car", 199.99, "A safe car for babies",
 "babycar.jpg", "1+", "10kg", "Plastic", .10);
echo "<hr>";
 echo $babyCar1->name ."<br>";
 echo $babyCar1->calcFinalPrice();


