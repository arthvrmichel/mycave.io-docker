<?php

namespace App\Command;

use App\Service\DatabasePopulator;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:populate-database',
    description: 'Populate the database with basic data.'
)]
class PopulateDatabaseCommand extends Command
{
    public function __construct(private DatabasePopulator $databasePopulator)
    {
        parent::__construct();
    }

    protected function configure()
    {
        
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->databasePopulator->populate();

        return Command::SUCCESS;
    }
}
