<?php
/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */

namespace TwilioBundle\Utils;

class Mms extends TwilioAbstract
{
    /**
     * Send mms message
     */
    public function SendMms()
    {
        if (isset($this->parameters['to']) && isset($this->parameters['from']) && isset($this->parameters['mediaUrl'])) {
            $mms = $this->client->messages->create(
                $this->parameters['to'],
                array(
                    'from' => $this->parameters['from'],
                    'mediaUrl' => $this->parameters['mediaUrl'],
                )
            );

            $this->setResponse(['status' => 'success', 'sid' => $mms->sid]);
        } else {
            $this->setResponse(['status' => 'error', 'errno' => $this->getErrors('required_parameters_missing')]);
        }
    }

}