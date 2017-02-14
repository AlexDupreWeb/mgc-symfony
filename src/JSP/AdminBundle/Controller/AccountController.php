<?php

namespace JSP\AdminBundle\Controller;

use JSP\AdminBundle\Services\AccountService;
use JSP\CoreBundle\Entity\Account;
use MGC\CoreBundle\Controller\MGCController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class AccountController extends MGCController {

    /**
     * @var AccountService
     */
    private $accountService;

    /**
     * @Route("/jsp/accounts", name="jsp_admin_accounts")
     */
    public function indexAction(Request $request) {
        $accounts = $this->getDoctrine()->getRepository('JspCoreBundle:Account')->findAll();

        $txt_account = $this->get('translator')->trans('jsp.global.account', array(), 'messages', $request->getLocale());

        return $this->render('JspAdminBundle:Account:index.html.twig', array('accounts' => $accounts, 'txt_account' => $txt_account));
    }

    /**
     * @Route("/jsp/accounts/add", name="jsp_admin_accounts_add")
     */
    public function addAction(Request $request) {
        $this->accountService = $this->get('jsp.admin.service.account');

        $account = new Account();
        $account->setName("Nouveau compte...");

        /** @var Form $form */
        $form = $this->createFormBuilder($account)
            ->add('name', TextType::class, array('label' => "Create account"))
            ->add('description', TextareaType::class, array('label' => "Create account"))
            ->add('save', SubmitType::class, array('label' => "Create account"))
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isSubmitted() && $form->isValid()) {
                $account = $this->accountService->createAccount($account);

                return $this->redirectToRoute('jsp_admin_accounts_edit', array('id' => $account->getId()));
            }
        }

        return $this->render('JspAdminBundle:Account:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/jsp/accounts/edit/{id}", requirements={"id": "\d+"}, name="jsp_admin_accounts_edit")
     */
    public function editAction($id, Request $request) {
        $this->accountService = $this->get('jsp.admin.service.account');
        $account = $this->getDoctrine()->getRepository('JspCoreBundle:Account')->find($id);

        $form = $this->createFormBuilder($account)
            ->add('name', TextType::class, array('label' => "Create account"))
            ->add('description', TextareaType::class, array('label' => "Create account"))
            ->add('save', SubmitType::class, array('label' => "Update account"))
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isSubmitted() && $form->isValid()) {
                $this->accountService->updateAccount($form->getData());

                return $this->redirectToRoute('jsp_admin_accounts_edit', array('id' => $account->getId()));
            }
        }

        return $this->render('JspAdminBundle:Account:edit.html.twig', array(
            'account' => $account,
            'form' => $form->createView(),
        ));
    }

}