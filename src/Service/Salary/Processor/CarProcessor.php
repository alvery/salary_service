<?php

declare(strict_types=1);

namespace App\Service\Salary\Processor;

use App\Entity\Employee;
use http\Exception\InvalidArgumentException;

class CarProcessor implements ProcessorInterface
{
    private const CAR_RENT_PRICE = 500;

    public function process(Employee $employee): void
    {
        if($employee->isCompanyCar()) {

            if ($employee->getSalary() < self::CAR_RENT_PRICE) {
                throw new InvalidArgumentException("Salary is less than car rent price. Could not process");
            }

            $salary = $employee->getSalary() - self::CAR_RENT_PRICE;
            $employee->setSalary($salary);
        }
    }
}