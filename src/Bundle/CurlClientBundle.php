<?php
namespace Http\Client\Curl\Symfony\Bundle;

use Http\Client\Curl\Symfony\Resources\DependencyInjection\CurlClientExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CurlClientBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new CurlClientExtension();
    }
}
