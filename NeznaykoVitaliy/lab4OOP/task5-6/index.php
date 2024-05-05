<?php
require_once('classes/Circle.php');

//перевірка методів get i set
// $Circle = new Circle(1, 2, 1);
// echo "x =".$Circle->__get("x"). "<br>";
// echo "y =".$Circle->__get("y"). "<br>";
// echo "radius =" . $Circle->__get("radius") . "<br>";
// echo $Circle->__toString();
// echo "<br>";
// $Circle->__set('x', 3);
// $Circle->__set('y', 5);
// $Circle->__set('radius', 2);
// echo $Circle->__toString();

$Circle1 = new Circle(2, 5, 1);

$Circle2 = new Circle(1, 4, 1);


if($Circle1 -> circlesCheck($Circle2)){
    echo 'Кола перетинаються';
}else{
    echo 'Кола не перетинаються';

}
