<?php
namespace Application\Service;

class Auth
{
    private $request;
    private $adapter;

    public function __construct($request, $adapter)
    {
        $this->request = $request;
        $this->adapter = $adapter;
    }

    public function isAuthorized()
    {
        if(! $this->request->getHeader('authorization')){
            throw new \Exception("Not authorized", 401);
        }

        if (!$this->isValid()) {
            throw new \Exception("Not authorized", 403);
        }

        return true;
    }

    private function isValid()
    {
        $token = $this->request->getHeader('authorization');
        //validar o token de alguma forma...
        return true;
    }
}
