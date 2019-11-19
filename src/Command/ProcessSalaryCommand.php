<?php

namespace App\Command;

use App\Entity\Employee;
use App\Service\Salary\Processor\AgeProcessor;
use App\Service\Salary\Processor\CarProcessor;
use App\Service\Salary\Processor\KidsProcessor;
use App\Service\Salary\SalaryService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProcessSalaryCommand extends Command
{
    /**
     * Configures the argument and options
     */
    protected function configure()
    {
        $this
            ->setName('salary:process')
            ->setDescription('Count employee salaries');
    }

    /**
     * Executes the logic and creates the output.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $employees = [
            new Employee("Alice", 26, 2, false, 6000),
            new Employee("Bob", 52, 0, true, 4000),
            new Employee("Charlie", 36, 3, true, 5000),
        ];

        $salaryService = new SalaryService();
        $salaryService->addProcessor(new AgeProcessor());
        $salaryService->addProcessor(new KidsProcessor());
        $salaryService->addProcessor(new CarProcessor());

        $msg = '';

        /** @var Employee $employee */
        foreach ($employees as $employee) {
            try {
                $finalSalary = $salaryService->calculateSalary($employee);
                $msg .= '<fg=green>' . $employee->getName() . ':' . $finalSalary . '$</fg=green>' . PHP_EOL;
            } catch (\Throwable $e) {
                $msg = '<fg=yellow>' . $e->getMessage() . '</fg=yellow>';
            }
        }

        $output->writeln($msg);
    }

}