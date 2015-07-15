<?php

namespace Rick\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ServerCommand extends Command
{
    public function __construct($server)
    {
        parent::__construct();

        $this->server = $server;
    }

    protected function configure()
    {
        $this
            ->setName('server')
            ->setDescription('Run the development server')
            ->addOption(
                'port',
                'p',
                InputOption::VALUE_REQUIRED,
                'The port on which to beind the server address',
                7425
            )
            ->addOption(
                'host',
                null,
                InputOption::VALUE_REQUIRED,
                'Address to bind the server process',
                'localhost'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $port = $input->getOption('port');
        $host = $input->getOption('host');
        $address = $host . ':' . $port;

        $output->writeln(sprintf("Listening on <info>http://%s</info>", $address));
        $output->writeln("Press Ctrl-C to quit.");

        return $this->server->run($host, $port, function($type, $data) use ($output) {
            $output->write($data);
        });
    }
}
