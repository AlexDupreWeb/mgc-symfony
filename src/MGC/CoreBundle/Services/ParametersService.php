<?php

namespace MGC\CoreBundle\Services;

use Symfony\Component\DependencyInjection\Container;

class ParametersService {

    /**
     * @var Container $container
     */
    protected $container;

    /**
     * @var array $mgcParams
     */
    protected $mgcParams;

    /**
     * @var array $mgcParams
     */
    protected $adminlteParams;

    /**
     * ParametersService constructor.
     */
    public function __construct(Container $container) {
        $this->container = $container;

        $this->mgcParams = $this->container->getParameter('mgc');

        $this->adminlteParams = $this->container->getParameter('adminlte');
    }

    /**
     * @return array
     */
    public function getMgcParams() {
        return $this->mgcParams;
    }

    /**
     * @return array
     */
    public function getAdminlteParams() {
        return $this->adminlteParams;
    }

}