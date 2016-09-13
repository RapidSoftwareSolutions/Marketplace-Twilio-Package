<?php
/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */

namespace TwilioBundle\Utils;

class Sms extends TwilioAbstract
{
    /**
     * Send sms message
     */
    public function SendSms()
    {
        if (isset($this->parameters['to']) && isset($this->parameters['from']) && isset($this->parameters['text'])) {
            $sms = $this->client->messages->create(
                $this->parameters['to'],
                array(
                    'from' => $this->parameters['from'],
                    'body' => $this->parameters['text'],
                )
            );

            $this->setResponse(['status' => 'success', 'sid' => $sms->sid]);
        } else {
            $this->setResponse(['status' => 'error', 'errno' => $this->getErrors('required_parameters_missing')]);
        }
    }

}