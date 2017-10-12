<?php

namespace Risan\OAuth1\Credentials;

use Psr\Http\Message\ResponseInterface;

interface CredentialsFactoryInterface
{
    /**
     * Create TemporaryCredentials instance from response.
     *
     * @param  \Psr\Http\Message\ResponseInterface $response
     * @return \Risan\OAuth1\Credentials\TemporaryCredentials
     */
    public function createTemporaryCredentialsFromResponse(ResponseInterface $response);
}
