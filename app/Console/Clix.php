<?php namespace Mhouse\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Clix extends Command
{
    protected static $defaultName = 'clix:run';

    protected function configure()
    {
        $this->setDescription('Run application container')
            ->setHelp('This command allows you to runs the application container');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $config = new \Psy\Configuration([
            'defaultIncludes' => [
                __DIR__ . '/initialize.slim.php'
            ],
            'updateCheck' => 'never'
        ]);
        $shell = new \Psy\Shell($config);

        $shell->run();

        return 0;
    }
}