<?php
/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */

namespace TwilioBundle\Utils;

class Call extends TwilioAbstract
{
    /**
     * Establish Voice Call and return associated parameters
     */
    public function MakeCall()
    {
        $call = $this->client->calls->create(
            $this->parameters['to'], $this->parameters['from'],
            $this->parameters
        );

        $this->setResponse(['status' => 'success', ['callbackParameters' => [
                'sid' => $call->sid,
                'dateCreated' => $call->dateCreated,
                'dateUpdated' => $call->dateUpdated,
                'parentCallSid' => $call->parentCallSid,
                'accountSid' => $call->accountSid,
                'to' => $call->to,
                'toFormatted' => $call->toFormatted,
                'from' => $call->from,
                'forwardedFrom' => $call->forwardedFrom,
                'phoneNumberSid' => $call->phoneNumberSid,
                'status' => $call->status,
                'startTime' => $call->startTime,
                'endTime' => $call->endTime,
                'duration' => $call->duration,
                'price' => $call->price,
                'direction' => $call->direction,
                'answeredBy' => $call->answeredBy,
                'apiVersion' => $call->apiVersion,
                'callerName' => $call->callerName,
                'uri' => $call->uri,
                'annotation' => $call->annotation,
                'groupSid' => $call->groupSid,
                'priceUnit' => $call->priceUnit,
                'subresourceUris' => $call->subresourceUris
            ]
            ]]
        );
    }

}