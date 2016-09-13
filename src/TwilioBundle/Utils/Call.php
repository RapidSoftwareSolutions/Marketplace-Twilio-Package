<?php
/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */

namespace TwilioBundle\Utils;

class Call extends TwilioAbstract
{
    /**
     * Establish Voice Call
     */
    public function MakeCall()
    {
        $call = $this->client->calls->create(
            $this->parameters['to'], $this->parameters['from'],
            array("url" => $this->parameters['url'])
        );

        $response = ['status' => 'success', 'sid' => $call->sid];
        $this->setResponse($response);
    }

}