<?php

namespace Risan\OAuth1;

use Risan\OAuth1\Request\UriParser;
use Risan\OAuth1\Config\ConfigFactory;
use Risan\OAuth1\Request\NonceGenerator;
use Risan\OAuth1\Request\RequestFactory;
use Risan\OAuth1\Signature\HmacSha1Signer;
use Risan\OAuth1\Request\ProtocolParameter;
use Risan\OAuth1\Request\AuthorizationHeader;
use Risan\OAuth1\Credentials\CredentialsFactory;

class OAuth1Factory
{
    /**
     * Create the new OAuth1Interface instance.
     *
     * @param  array  $config
     * @return \Risan\OAuth1\OAuth1Interface
     */
    public static function create(array $config)
    {
        $configFactory = new ConfigFactory;

        $protocolParameter = new ProtocolParameter(
            $configFactory->createFromArray($config),
            new HmacSha1Signer,
            new NonceGenerator
        );

        $authorizationHeader = new AuthorizationHeader($protocolParameter);

        $requestFactory = new RequestFactory($authorizationHeader, new UriParser);

        return new OAuth1(new HttpClient, $requestFactory, new CredentialsFactory);
    }
}
