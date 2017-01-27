<?php

namespace JSP\AdminBundle\Controller;

use MGC\CoreBundle\Controller\MGCController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class AccountController extends MGCController {

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
    public function addAction() {
        return $this->render('JspAdminBundle:Account:add.html.twig');
    }

    /**
     * @Route("/jsp/accounts/edit/{id}", requirements={"id": "\d+"}, name="jsp_admin_accounts_edit")
     */
    public function editAction($id) {
        $account = $this->getDoctrine()->getRepository('JspCoreBundle:Account')->find($id);

        return $this->render('JspAdminBundle:Account:edit.html.twig', array('account' => $account));
    }

}