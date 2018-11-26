<?php
/*
 * 利用堆结构排序
 */
header("content-type:text/html;charset=utf-8");

class Student {
    public $name;
    public $id;
    public $age;

    public function __construct($name, $id, $age) {
        $this->name = $name;
        $this->id = $id;
        $this->age = $age;
    }
}


class Heap_IdDescending extends SplHeap {            //id降序排序

    public function compare($student1 ,$student2)
    {
        return $student1->id - $student2->id;
    }
}

class Heap_IdAscending extends SplHeap {           //id升序排序

    public function compare($student1 ,$student2)
    {
        return $student2->id - $student1->id;
    }
}

class Heap_AgeDescending extends SplHeap {      //年龄降序排序

    public function compare($student1 ,$student2)
    {
        return $student1->age - $student2->age;
    }
}

class Heap_AgeAscending extends SplHeap {       //年龄升序排序

    public function compare($student1 ,$student2)
    {
        return $student2->age - $student1->age;
    }
}

echo "id降序排序:";
echo "<br>";
$heap = new Heap_IdDescending();
$heap->insert(new Student("xiao",2,5));
$heap->insert(new Student("lin",1,10));
$heap->insert(new Student("zi",3,16));

while ($heap->valid()) {
   print_r($heap->top());
    echo "</br>";
    $heap->next();
}
echo "<br>";
echo "<br>";

echo "id升序排序:";
echo "<br>";
$heap = new Heap_IdAscending();
$heap->insert(new Student("xiao",2,5));
$heap->insert(new Student("lin",1,10));
$heap->insert(new Student("zi",3,16));

while ($heap->valid()) {
    print_r($heap->top());
    echo "</br>";
    $heap->next();
}
echo "<br>";
echo "<br>";

echo "age降序排序:";
echo "<br>";
$heap = new Heap_AgeDescending();
$heap->insert(new Student("xiao",2,5));
$heap->insert(new Student("lin",1,10));
$heap->insert(new Student("zi",3,16));

while ($heap->valid()) {
    print_r($heap->top());
    echo "</br>";
    $heap->next();
}
echo "<br>";
echo "<br>";

echo "age升序排序:";
echo "<br>";
$heap = new Heap_AgeAscending();
$heap->insert(new Student("xiao",2,5));
$heap->insert(new Student("lin",1,10));
$heap->insert(new Student("zi",3,16));

while ($heap->valid()) {
    print_r($heap->top());
    echo "</br>";
    $heap->next();
}
echo "<br>";
echo "<br>";