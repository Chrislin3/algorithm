<?php
header("content-type:text/html;charset=utf-8");
/*
 *猫狗队列 P10
 */
class Pet {
    public $type;

    public function __construct($type) {
        $this->type = $type;
    }

    public function getPetType() {
			return $this->type;
    }
}

class Dog extends Pet{
    public function __construct()
    {
        parent::__construct("dog");
    }
}
class Cat extends Pet {
    public function __construct()
    {
        parent::__construct("cat");
    }
}

class PetEnter{
    private $pet;
    private $count;

    public function __construct($pet,$count){
        $this->pet = $pet;
        $this->count = $count;
    }

    public function getPet(){
        return $this->pet;
    }

    public function getCount(){
        return $this->count;
    }

    public function getEnterPetType(){
        return $this->pet->type;
    }
}

class DogCatQueue{
    private $dogQ;
    private $catQ;
    private $count;

    public function __construct()
    {
        $this->catQ = new SplQueue();
        $this->dogQ = new SplQueue();
        $this->count = 0;
    }

    public function add(Pet $pet){
        if($pet->getPetType() == "dog"){
            $this->dogQ->push(new PetEnter($pet,$this->count++));
        }
        elseif ($pet->getPetType() == "cat"){
            $this->catQ->push(new PetEnter($pet,$this->count++));
        }
        else{
            echo "请加入cat或者dog";
        }
    }

    public function pollAll(){
        if(!empty($this->dogQ) && !empty($this->catQ)){
            print_r($this->dogQ->current());
            if($this->dogQ->bottom()->getCount() < $this->catQ->bottom()->getCount()){
                return $this->dogQ->pop()->getPet();
            }
            else{
                return $this->catQ->pop()->getPet();
            }
        }
    }


}

echo "入队顺序：猫，狗，猫";
echo "</br>";
$DogCatQueue = new DogCatQueue();
$pet = new Cat();
$DogCatQueue->add($pet);
$pet = new Dog();
$DogCatQueue->add($pet);
$pet = new Cat();
$DogCatQueue->add($pet);
print_r($DogCatQueue);
echo "</br>";
echo "</br>";
echo "出队列：";
$DogCatQueue->pollAll();
print_r($DogCatQueue);