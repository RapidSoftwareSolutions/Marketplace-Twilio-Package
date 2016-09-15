<?php
/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */

namespace TwilioBundle\Utils;

class Sms extends TwilioAbstract
{
    /**
     * Send sms message and return associated parameters
     */
    public function SendSms()
    {
        $sms = $this->client->messages->create(
            $this->parameters['to'],
            $this->parameters
        );

        $this->setResponse(['status' => 'success', ['callbackParameters' => [
            $sms->sid,
            $sms->body,
            $sms->dateCreated,
            $sms->dateUpdated,
            $sms->accountSid,
            $sms->to,
            $sms->from,
            $sms->status,
            $sms->price,
            $sms->direction,
            $sms->apiVersion,
            $sms->uri,
            $sms->subresourceUris,
            $sms->priceUnit,
            $sms->dateSent,
            $sms->errorCode,
            $sms->errorMessage,
            $sms->numMedia,
            $sms->numSegments
        ]
        ]]);
    }

}