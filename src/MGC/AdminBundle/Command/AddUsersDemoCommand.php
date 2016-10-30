<?php

namespace MGC\AdminBundle\Command;

use MGC\AdminBundle\Services\Mappers\UserMapper;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;

class AddUsersDemoCommand extends ContainerAwareCommand {

    /**
     * {@inheritdoc}
     */
    protected function configure() {
        $this
            ->setName('mgc:add-users:demo')
            ->setDescription('Add users for demo');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output) {
        // CALL TO CONTAINER SERVICES
        $kernel = $this->getContainer()->get('kernel');
        $encoder = $this->getContainer()->get('security.password_encoder');
        $em = $this->getContainer()->get('doctrine')->getEntityManager('default');

        $userMapper = new UserMapper();

        $output->writeln('<info>[BEGIN] Prepare Users</info>');
        $output->writeln('');

        // YAML
        $yamlPath = $kernel->locateResource('@AdminBundle/Resources/config/users.yml');
        $yamlContent = Yaml::parse(file_get_contents($yamlPath));
        $yamlUsers = $yamlContent['users']['demo'];

        // USERS
        $mgcUsers = array();
        foreach($yamlUsers as $yamlUser) {
            $mgcUsers[] = $userMapper->yamlToEntity($yamlUser, $encoder);
        }

        $output->writeln('<info> - Insert Users</info>');
        $output->writeln('');

        //$em = $this->getDoctrine()->getEntityManager();
        foreach($mgcUsers as $mgcUser) {
            $em->persist($mgcUser);
            $em->flush();
        }

        $output->writeln('<info>[END] Users created!</info>');
    }
}