<?php

namespace JSP\AdminBundle\Command;

use JSP\AdminBundle\Services\Mappers\AccountMapper;
use JSP\AdminBundle\Services\Mappers\ElementMapper;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;

class InsertDataForDemoCommand extends ContainerAwareCommand {

    /**
     * {@inheritdoc}
     */
    protected function configure() {
        $this
            ->setName('jsp:data:demo')
            ->setDescription('Insert data for demo');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output) {
        // CALL TO CONTAINER SERVICES
        $kernel = $this->getContainer()->get('kernel');
        $encoder = $this->getContainer()->get('security.password_encoder');
        $em = $this->getContainer()->get('doctrine')->getEntityManager('default');

        //$this->addAccounts($input, $output, $kernel, $em);
        $this->addElements($input, $output, $kernel, $em);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param $kernel
     * @param $em
     */
    private function addAccounts(InputInterface $input, OutputInterface $output, $kernel, $em) {
        $accountMapper = new AccountMapper();

        $output->writeln('<info>[BEGIN] Prepare Accounts</info>');
        $output->writeln('');

        // YAML
        $yamlPath = $kernel->locateResource('@JspAdminBundle/Resources/config/accounts.yml');
        $yamlContent = Yaml::parse(file_get_contents($yamlPath));
        $yamlAccounts = $yamlContent['accounts']['demo'];

        // ACCOUNTS
        $accounts = array();
        foreach($yamlAccounts as $yamlAccount) {
            $accounts[] = $accountMapper->yamlToEntity($yamlAccount);
        }

        $output->writeln('<info> - Insert Accounts</info>');
        $output->writeln('');

        foreach($accounts as $account) {
            $em->persist($account);
            $em->flush();
        }

        $output->writeln('<info>[END] Accounts created!</info>');
    }

    private function addElements(InputInterface $input, OutputInterface $output, $kernel, $em) {
        $elementMapper = new ElementMapper();

        $output->writeln('<info>[BEGIN] Prepare Elements</info>');
        $output->writeln('');

        // YAML
        $yamlPath = $kernel->locateResource('@JspAdminBundle/Resources/config/elements.yml');
        $yamlContent = Yaml::parse(file_get_contents($yamlPath));
        $yamlElements = $yamlContent['elements']['demo'];

        // ACCOUNTS
        $elements = array();
        foreach($yamlElements as $yamlElement) {
            $elements[] = $elementMapper->yamlToEntity($yamlElement);
        }

        $output->writeln('<info> - Insert Elements</info>');
        $output->writeln('');

        foreach($elements as $element) {
            $em->persist($element);
            $em->flush();
        }

        $output->writeln('<info>[END] Elements created!</info>');
    }

}