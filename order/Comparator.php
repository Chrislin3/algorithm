<?php
header("content-type:text/html;charset=utf-8");
/* 比较器
 * */

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

function IdAscendingComparator(Student $student1,Student $student2){  //id升序排序
    return $student1->id - $student2->id;
}

function IdDescendingComparator(Student $student1,Student $student2){  //id降序排序
    return $student2->id - $student1->id;
}

function AgeAscendingComparator(Student $student1,Student $student2){ //年龄升序排序
    return $student1->age - $student2->age;
}

function AgeDescendingComparator(Student $student1,Student $student2){ //年龄降序排序
    return $student2->age - $student1->age;
}

$arr = array(new Student("xiao",2,5),new Student("lin",1,10),new Student("zi",3,16));

echo "id升序排序";
echo "<br>";
uasort($arr,"IdAscendingComparator");
foreach($arr as $key=>$value)
{
    print_r($value) ;
    echo "<br>";
}
echo "<br>";
echo "<br>";

echo "id降序排序";
echo "<br>";
uasort($arr,"IdDescendingComparator");
foreach($arr as $key=>$value)
{
    print_r($value) ;
    echo "<br>";
}
echo "<br>";
echo "<br>";

echo "age升序排序";
echo "<br>";
uasort($arr,"AgeAscendingComparator");
foreach($arr as $key=>$value)
{
    print_r($value) ;
    echo "<br>";
}
echo "<br>";
echo "<br>";

echo "age降序排序";
echo "<br>";
uasort($arr,"AgeDescendingComparator");
foreach($arr as $key=>$value)
{
    print_r($value) ;
    echo "<br>";
}
echo "<br>";
echo "<br>";
//print_r($arr);