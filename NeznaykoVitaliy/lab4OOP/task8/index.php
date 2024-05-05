<?php
function autoload($class)
{
    $path = "classes/$class.php";
    if (file_exists($path))
        require_once($path);
}
spl_autoload_register("autoload");

$programmer = new Programmer("Vitalik", 180, 90, 19, ["C#", "C++", "PHP"], 3);
$student = new Student("Bogdan", 170, 80, 20, "Zhytomyr Polytechnic" , 2);

echo $programmer ->getprogrammingLanguages("0"). "<br>";
echo $programmer->getprogrammingLanguages("") . "<br>";
echo $programmer->getProgrammerInfo();
echo $student->getStudentInfo();

echo $student -> setHeight(25);
echo $student->getStudentInfo();
