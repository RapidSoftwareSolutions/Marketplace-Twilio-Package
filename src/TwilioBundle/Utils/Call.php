<?php
/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */

namespace TwilioBundle\Utils;

class Call extends TwilioAbstract
{
    /**
     * Establish Voice Call and return associated parameters
     *
     * todo check existence of vars
     */
    public function MakeCall()
    {
        $call = $this->client->calls->create(
            $this->parameters['to'], $this->parameters['from'],
            $this->parameters
        );

        $this->setResponse(['status' => 'success', 'callbackParameters' => [
                $call->sid,
                $call->dateCreated,
                $call->dateUpdated,
                $call->parentCallSid,
                $call->accountSid,
                $call->to,
                $call->toFormatted,
                $call->from,
                $call->forwardedFrom,
                $call->phoneNumberSid,
                $call->status,
                $call->startTime,
                $call->endTime,
                $call->duration,
                $call->price,
                $call->direction,
                $call->answeredBy,
                $call->apiVersion,
                $call->forwardedFrom,
                $call->callerName,
                $call->uri,
                $call->annotation,
                $call->groupSid,
                $call->priceUnit,
                $call->subresourceUris
            ]
            ]
        );
    }

    public function checkExistence($var)
    {
        if (isset($var)){
            return $var;
        }else{
            return 0;
        }
    }

}