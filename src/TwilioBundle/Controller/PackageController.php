<?php

namespace TwilioBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */
class PackageController extends Controller
{
    /**
     *
     * @Route("/api/{packageName}", requirements={"packageName": "twilio"})
     * @Method({"GET"})
     *
     * @return JsonResponse
     */
    public function metadataAction()
    {
        return new JsonResponse($this->getParameter('app_bundle.metadata'));
    }

    /**
     * @Route("/api/{packageName}/makeCall", requirements={"packageName": "twilio"})
     * @Method({"POST"})
     *
     * @return mixed
     */
    public function makeCallAction()
    {
        $twilio = $this->get('app_bundle.call');
        $twilio->makeCall();

        return new JsonResponse($twilio->getResponse());
    }

    /**
     *
     * @Route("/api/{packageName}/sendSms", requirements={"packageName": "twilio"})
     * @Method({"POST"})
     *
     * @return JsonResponse
     */
    public function sendSmsAction()
    {
        $twilio = $this->get('app_bundle.sms');
        $twilio->sendSms();

        return new JsonResponse($twilio->getResponse());
    }

    /**
     *
     * @Route("/api/{packageName}/sendMms", requirements={"packageName": "twilio"})
     * @Method({"POST"})
     *
     * @return JsonResponse
     */
    public function sendMmsAction()
    {
        $twilio = $this->get('app_bundle.mms');
        $twilio->sendMms();

        return new JsonResponse($twilio->getResponse());
    }

}