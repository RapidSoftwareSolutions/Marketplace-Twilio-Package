<?php
/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */

namespace TwilioBundle\Utils;

use Twilio\Rest\Client;

abstract class TwilioAbstract
{
    /**
     * @var mixed
     */
    protected $response;
    /**
     * @var String
     */
    protected $accountSid;
    /**
     * @var mixed
     */
    protected $parameters;
    /**
     * @var mixed
     */
    protected $client;

    /**
     * TwilioAbstract constructor.
     *
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request->getCurrentRequest();
        $this->parameters = $this->request->request->all();
        $this->client = new Client($this->parameters['accountSid'], $this->parameters['accountToken']);
    }

    /**
     * @param $responseMessage
     */
    public function setResponse($responseMessage)
    {
        if ($responseMessage['status'] == 'error') {
            $this->response = ['callback' => 'error', 'contextWrites' => ['to' => $responseMessage['errno']]];
        } else {
            $this->response = ['callback' => 'success', 'contextWrites' => ['to' => $responseMessage['callbackParameters']]];
        }
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

}