<?php

namespace BshdevBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BshdevBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
