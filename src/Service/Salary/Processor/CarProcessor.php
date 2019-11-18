<?php

namespace App\Service\Salary\Processor;

use App\Entity\Employee;

class CarProcessor implements ProcessorInterface
{
    private const CAR_RENT_PRICE = 500;

    public function process(Employee $employee): void
    {
        if($employee->isCompanyCar()) {
            $salary = $employee->getSalary() - self::CAR_RENT_PRICE;
            $employee->setSalary($salary);
        }
    }
}