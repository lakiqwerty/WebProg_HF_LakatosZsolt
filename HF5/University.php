<?php

namespace HF5;

use Exception;

require_once "AbstractUniversity.php";
require_once "Subject.php";

class University extends AbstractUniversity
{
    public function addSubject(string $code, string $name): Subject
    {
        $subject = new Subject($code, $name);
        $this->subjects[] = $subject;
        return $subject;
    }

    public function addStudentOnSubject(string $subjectCode, Student $student): void
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() === $subjectCode) {
                $subject->addStudent($student);
                return;
            }
        }
        throw new Exception("Subject not found!");
    }

    public function getStudentsForSubject(string $subjectCode): array
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() === $subjectCode) {
                return $subject->getStudents();
            }
        }
        return [];
    }

    public function getNumberOfStudents(): int
    {
        $total = 0;
        foreach ($this->subjects as $subject) {
            $total += count($subject->getStudents());
        }
        return $total;
    }

    public function print(): void
    {
        foreach ($this->subjects as $subject) {
            echo '---------------------------------' . "<br>";
            echo $subject . "<br>";
            echo '---------------------------------' . "<br>";

            foreach ($subject->getStudents() as $student) {
                echo $student->getName() . " - " . $student->getStudentNumber() . "<br>";
            }
        }
    }

    public function deleteSubject(Subject $subject): string
    {
        if ($subject->hasStudents()) {
            throw new Exception("Cannot delete subject with assigned students!");
        }

        foreach ($this->subjects as $key => $existingSubject) {
            if ($existingSubject->getCode() === $subject->getCode()) {
                unset($this->subjects[$key]);
                return "Subject {$subject->getCode()} deleted successfully.";
            }
        }
        return "Subject not found.";
    }
}
