<?php
/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */

namespace TwilioBundle\Utils;


class Mms extends TwilioAbstract
{
    public function SendMms()
    {
        $mms = $this->client->messages->create(
            $this->parameters['sid'],
            array(
                'from' => $this->parameters['from'],
                'body' => $this->parameters['text'],
                'mediaUrl' => $this->parameters['media'],
            )
        );

        $this->setResponse($mms->sid);
    }

}