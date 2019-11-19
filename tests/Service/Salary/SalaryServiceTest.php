<?php

declare(strict_types=1);

namespace App\Tests\Service\Salary;

use App\Entity\Employee;
use App\Service\Salary\Processor\AgeProcessor;
use App\Service\Salary\Processor\CarProcessor;
use App\Service\Salary\Processor\KidsProcessor;
use App\Service\Salary\SalaryService;
use PHPUnit\Framework\TestCase;

class SalaryServiceTest extends TestCase
{
    public function employeeProvider()
    {
        return [
            [new Employee("Mark", 26, 0, false, 10000), [], 8000],
            [new Employee("Andy", 60, 0, false, 10000), [new AgeProcessor()], 8560],
            [new Employee("Christie", 20, 3, false, 10000), [new KidsProcessor()], 8200],
            [new Employee("Christie", 20, 3, false, 10000), [], 8000],

            [new Employee("Alice", 26, 2, false, 6000), [new AgeProcessor(), new KidsProcessor(), new CarProcessor()], 4800],
            [new Employee("Bob", 52, 0, true, 4000), [new AgeProcessor(), new KidsProcessor(), new CarProcessor()], 3024],
            [new Employee("Charlie", 36, 3, true, 5000), [new AgeProcessor(), new KidsProcessor(), new CarProcessor()],  3690],
        ];
    }

    /**
     * @dataProvider employeeProvider
     * @param Employee $employee
     * @param array $processors
     * @param int $expectedSalary
     */
    public function testCalculateSalary(Employee $employee, array $processors, int $expectedSalary): void
    {
        $salaryService = new SalaryService();

        foreach ($processors as $processor) {
            $salaryService->addProcessor($processor);
        }

        $this->assertEquals($expectedSalary, $salaryService->calculateSalary($employee));
    }
}