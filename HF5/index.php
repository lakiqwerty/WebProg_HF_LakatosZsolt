<?php

declare(strict_types=1);

require_once __DIR__ . "/Student.php";
require_once __DIR__ . "/Subject.php";
require_once __DIR__ . "/University.php";

use HF5\University;
use HF5\Student;
use HF5\Subject;

$univ = new University();

$webProg = $univ->addSubject('101', 'Web Programming');
$database = $univ->addSubject('102', 'Database');
$javaProg = $univ->addSubject('103', 'Java Programming');

$student1 = new Student("Kiss Lajos", "520");
$student2 = new Student("Nagy Peter", "521");
$student3 = new Student("Egy Elek", "522");
$student4 = new Student("Ket Ella", "523");
$student5 = new Student("Harom Ella", "524");
$student6 = new Student("Negy Ella", "525");

$univ->addStudentOnSubject($webProg->getCode(), $student1);
$univ->addStudentOnSubject($webProg->getCode(), $student2);
$univ->addStudentOnSubject($database->getCode(), $student3);
$univ->addStudentOnSubject($javaProg->getCode(), $student4);
$univ->addStudentOnSubject($javaProg->getCode(), $student5);
$univ->addStudentOnSubject($database->getCode(), $student6);

$student1->addGrade($webProg, 6.5);
$student1->addGrade($database, 7);
$student1->addGrade($javaProg, 8);

$student2->addGrade($webProg, 5);
$student2->addGrade($database, 6);
$student2->addGrade($javaProg, 7.5);

$student3->addGrade($database, 8);
$student3->addGrade($webProg, 9);
$student3->addGrade($javaProg, 8.5);

$student4->addGrade($webProg, 6.5);
$student4->addGrade($database, 7);
$student4->addGrade($javaProg, 5.5);

$student5->addGrade($javaProg, 9);
$student5->addGrade($webProg, 8.5);
$student5->addGrade($database, 7.5);

$student6->addGrade($javaProg, 6);
$student6->addGrade($webProg, 5);
$student6->addGrade($database, 6.5);

$student1->printGrades();
$student2->printGrades();
$student3->printGrades();
$student4->printGrades();
$student5->printGrades();
$student6->printGrades();


echo $webProg->deleteStudent("521");
echo "<br>";
echo $webProg->deleteStudent("100");
echo "<br>";


echo "<br>";
echo "Subjects:";
echo "<br>";
$univ->print();
