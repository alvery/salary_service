<?php

namespace App\Service\Salary\Processor;

use App\Entity\Employee;

class KidsProcessor implements ProcessorInterface
{
    private const KIDS_AMOUNT_DISCOUNT = 2;
    private const KIDS_TAX_DISCOUNT_PERCENT = 2;

    public function process(Employee $employee): void
    {
        if ($employee->getKidsAmount() > self::KIDS_AMOUNT_DISCOUNT) {
            $employee->setTax($employee->getTax() - self::KIDS_TAX_DISCOUNT_PERCENT);
        }
    }
}