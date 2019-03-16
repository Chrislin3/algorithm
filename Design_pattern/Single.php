<?php
//懒汉式
class Single {
    public static  $instance = null;//声明一个静态变量（保存在类中唯一的一个实例）
    private function __construct(){//声明私有构造方法为了防止外部代码使用new来创建对象。

    }

    static public function getInstance(){//声明一个getInstance()静态方法，用于检测是否有实例对象
        if(self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}

$instance = Single::getInstance();//得到实例

class Single2{

    private function __construct(){

    }
    private static  $instance;
    static public function getInstance(){

        return self::$instance;
    }
}


?>