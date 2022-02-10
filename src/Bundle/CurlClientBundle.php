<?php
declare(strict_types=1);

namespace Http\Client\Curl\Symfony\Bundle;

use Http\Client\Curl\Symfony\Resources\DependencyInjection\CurlClientExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CurlClientBundle extends Bundle
{
    public function getContainerExtension(): ExtensionInterface
    {
        return new CurlClientExtension();
    }
}
