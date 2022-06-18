<?php

namespace jorgelive\IcalBundle;

use jorgelive\IcalBundle\DependencyInjection\jorgeliveIcalExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class jorgeliveIcalBundle extends Bundle
{
    /**
     * Get container extension
     *
     * @return ExtensionInterface
     */
    public function getContainerExtension()
    {
        if (!$this->extension instanceof ExtensionInterface) {
            $this->extension = new jorgeliveIcalExtension();
        }

        return $this->extension;
    }
}
