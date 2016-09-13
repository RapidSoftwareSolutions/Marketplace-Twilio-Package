<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/api')) {
            // twilio_package_metadata
            if (preg_match('#^/api/(?P<packageName>twilio)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_twilio_package_metadata;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'twilio_package_metadata')), array (  '_controller' => 'TwilioBundle\\Controller\\PackageController::metadataAction',));
            }
            not_twilio_package_metadata:

            // twilio_package_makecall
            if (preg_match('#^/api/(?P<packageName>twilio)/makeCall$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_twilio_package_makecall;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'twilio_package_makecall')), array (  '_controller' => 'TwilioBundle\\Controller\\PackageController::makeCallAction',));
            }
            not_twilio_package_makecall:

            // twilio_package_sendsms
            if (preg_match('#^/api/(?P<packageName>twilio)/sendSms$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_twilio_package_sendsms;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'twilio_package_sendsms')), array (  '_controller' => 'TwilioBundle\\Controller\\PackageController::sendSmsAction',));
            }
            not_twilio_package_sendsms:

            // twilio_package_sendmms
            if (preg_match('#^/api/(?P<packageName>twilio)/sendMms$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_twilio_package_sendmms;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'twilio_package_sendmms')), array (  '_controller' => 'TwilioBundle\\Controller\\PackageController::sendMmsAction',));
            }
            not_twilio_package_sendmms:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
