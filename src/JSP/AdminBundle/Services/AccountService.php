<?php

namespace JSP\AdminBundle\Services;

use Doctrine\ORM\EntityManager;
use JSP\CoreBundle\Entity\Account;
use JSP\CoreBundle\Repository\AccountRepository;

class AccountService {

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var AccountRepository
     */
    private $accountRepository;

    /**
     * AccountService constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em) {
        $this->em = $em;

        $this->accountRepository = $em->getRepository('JspCoreBundle:Account');
    }

    public function createAccount(Account $account) {
        $now = new \DateTime();

        $account
            ->setDateCreated($now)
            ->setDateUpdated($now)
        ;

        $this->em->persist($account);
        $this->em->flush();

        return $account;
    }

    public function updateAccount(Account $account) {
        $now = new \DateTime();

        $account->setDateUpdated($now);

        $this->em->persist($account);
        $this->em->flush();
    }

    public function deleteAccount(Account $account) {
        $this->em->remove($account);
        $this->em->flush();
    }
}