<?php

namespace MGC\CoreBundle\EventListener;

use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class AuthorizationListener {

    const USERNAME_PASSWORD_TOKEN_CLASS = 'Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken';
    const ANONYMOUS_TOKEN_CLASS = 'Symfony\Component\Security\Core\Authentication\Token\AnonymousToken';

    /**
     * @var TokenStorage
     */
    private $tokenStorage;

    /**
     * @var Router
     */
    private $router;

    public function __construct(TokenStorage $tokenStorage, Router $router) {
        $this->tokenStorage = $tokenStorage;
        $this->router = $router;
    }

    public function onKernelResponse(FilterResponseEvent $event) {
        $token = $this->tokenStorage->getToken();

        if(is_a($token, self::USERNAME_PASSWORD_TOKEN_CLASS)) {
            // Redirect to Home
            if($event->getRequest()->getRequestUri() == '/login') {
                $event->setResponse(new RedirectResponse($this->router->generate('home')));
            }

            // Check premissions


        } else {
            // Redirect to Login
            if($event->getRequest()->getRequestUri() != '/login') {
                $event->setResponse(new RedirectResponse($this->router->generate('login')));
            }

        }

    }

}