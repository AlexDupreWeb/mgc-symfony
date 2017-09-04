<?php

namespace MGC\TimeTrackingBundle\Command;

use MGC\TimeTrackingBundle\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProjectAddCommand extends ContainerAwareCommand {

    /**
     * {@inheritdoc}
     */
    protected function configure() {
        $this
            ->setName('timetracking:project:add')
            ->setDescription('Add time tracking project')

            ->addArgument('name', InputArgument::REQUIRED, 'name ?')
            ->addArgument('color', InputArgument::OPTIONAL, 'color ?')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output) {
        $color = "#ffffff";
        $name = $input->getArgument('name');
        $now = new \DateTime();

        if($input->getArgument('color')) {
            $color = $input->getArgument('color');
        }

        $project = new Project();
        $project
            ->setName($name)
            ->setColor($color)
            ->setDateCreated($now)
            ->setDateUpdated($now);

        $em = $this->getContainer()->get('doctrine')->getEntityManager('default');
        $em->persist($project);
        $em->flush();

        $output->writeln("Project '{$project->getName()}' created !");
    }

}