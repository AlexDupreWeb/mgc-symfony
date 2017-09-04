<?php

namespace MGC\TimeTrackingBundle\Command;

use MGC\TimeTrackingBundle\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TaskAddCommand extends ContainerAwareCommand {

    /**
     * {@inheritdoc}
     */
    protected function configure() {
        $this
            ->setName('timetracking:task:add')
            ->setDescription('Add time tracking task')

            ->addArgument('name', InputArgument::REQUIRED, 'name ?')
            ->addArgument('execution_time', InputArgument::REQUIRED, 'execution time ?')
            ->addArgument('date', InputArgument::OPTIONAL, 'date ?')
            ->addArgument('comment', InputArgument::OPTIONAL, 'comment ?')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output) {
        $name = $input->getArgument('name');
        $executionTime = $input->getArgument('execution_time');
        $date = $input->getArgument('date');
        $comment = $input->getArgument('comment');

        if(empty($date)) {
            $datetime = new \DateTime();
            $datetime->setTime(0,0,0);
        } else {
            $datetime = new \DateTime($date);
        }

        $task = new Task();
        $task
            ->setName($name)
            ->setExecutionTime($executionTime)
            ->setDate($datetime)
            ->setComment($comment);

        $em = $this->getContainer()->get('doctrine')->getEntityManager('default');
        $em->persist($task);
        $em->flush();

        $output->writeln("Task '{$task->getName()}' created !");
    }

}