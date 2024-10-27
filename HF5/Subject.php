<?php

namespace HF5;

class Subject
{
    private string $code;
    private string $name;
    private array $students = [];

    public function __construct(string $code, string $name)
    {
        $this->code = $code;
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function addStudent(Student $student): void
    {
        $this->students[$student->getStudentNumber()] = $student;
    }

    public function deleteStudent(string $studentNumber): string
    {
        if (isset($this->students[$studentNumber])) {
            unset($this->students[$studentNumber]);
            return "Student {$studentNumber} deleted successfully.";
        }
        return "Student not found.";
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    public function hasStudents(): bool
    {
        return !empty($this->students);
    }

    public function __toString(): string
    {
        return "{$this->getCode()} - {$this->getName()}\n";
    }
}
