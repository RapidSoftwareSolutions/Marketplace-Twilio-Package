<?php
/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */

namespace TwilioBundle\Utils;

class Mms extends TwilioAbstract
{
    /**
     * Send mms message and return associated parameters
     */
    public function SendMms()
    {
        $mms = $this->client->messages->create(
            $this->parameters['to'],
            $this->parameters
        );

        $this->setResponse(['status' => 'success', ['callbackParameters' => [
            $mms->sid,
            $mms->body,
            $mms->dateCreated,
            $mms->dateUpdated,
            $mms->accountSid,
            $mms->to,
            $mms->from,
            $mms->status,
            $mms->price,
            $mms->direction,
            $mms->apiVersion,
            $mms->uri,
            $mms->subresourceUris,
            $mms->priceUnit,
            $mms->dateSent,
            $mms->errorCode,
            $mms->errorMessage,
            $mms->numMedia,
            $mms->numSegments
        ]
        ]]);
    }

}