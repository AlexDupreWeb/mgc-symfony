<?php

namespace JSP\AdminBundle;

use JSP\AdminBundle\DependencyInjection\JspAdminServiceExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class JspAdminBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new JspAdminServiceExtension();
    }
}
