<?php

declare(strict_types=1);

namespace App\Service\Salary\Processor;

use App\Entity\Employee;

class AgeProcessor implements ProcessorInterface
{
    private const AGE_WITH_DISCOUNT = 50;
    private const AGE_DISCOUNT_PERCENT = 7;

    public function process(Employee $employee): void
    {
        if($employee->getAge() > self::AGE_WITH_DISCOUNT) {
            $salary = $employee->getSalary() + $employee->getSalary() * self::AGE_DISCOUNT_PERCENT / 100;
            $employee->setSalary($salary);
        }
    }
}