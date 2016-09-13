<?php
/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */

namespace TwilioBundle\Utils;

use Symfony\Component\HttpFoundation\RequestStack;
use Twilio\Rest\Client;

abstract class TwilioAbstract
{
    /**
     * @var mixed
     */
    protected $response;
    /**
     * @var mixed
     */
    protected $parameters;
    /**
     * @var mixed
     */
    public $errors;

    /**
     * TwilioAbstract constructor.
     *
     * @param RequestStack $request
     * @param $errors
     */
    public function __construct(RequestStack $request, $errors)
    {
        $this->request = $request->getCurrentRequest();
        $this->parameters = $this->request->request->all();
        $this->errors = $errors;
        $this->client = new Client($this->parameters['sid'], $this->parameters['token']);
    }

    /**
     * @param $responseMessage
     */
    public function setResponse($responseMessage)
    {
        if ($responseMessage['status'] = 'error') {
            $this->response = ['callback' => 'error', 'contextWrites' => ['to' => $responseMessage['errno']]];
        } else {
            $this->response = ['callback' => 'success', 'contextWrites' => ['to' => "Successfully established connection under sid number:" . $responseMessage['sid']]];
        }
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getErrors($name)
    {
        return $this->errors[$name];
    }


}