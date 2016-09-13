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
        if (isset($this->parameters['to']) && isset($this->parameters['from']) && isset($this->parameters['url'])) {
            $call = $this->client->calls->create(
                $this->parameters['to'], $this->parameters['from'],
                array("url" => $this->parameters['url'])
            );

            $this->setResponse(['status' => 'success', 'sid' => $call->sid]);
        } else {
            $this->setResponse(['status' => 'error', 'errno' => $this->getErrors('required_parameters_missing')]);
        }
    }

}