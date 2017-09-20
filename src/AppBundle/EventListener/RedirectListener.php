<?php

namespace AppBundle\EventListener;

use Symfony\Bundle\TwigBundle\TwigEngine;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class RedirectListener implements EventSubscriberInterface
{

    /**
     * @var \Symfony\Component\Routing\Router
     */
    private $router;

    /**
     * @var $index_route
     */
    private $index_route;

    /**
     * @var $default_locale
     */
    private $default_locale;

    /**
     * RedirectListener constructor.
     *
     * @param \Symfony\Component\Routing\Router $router
     * @param $index_route
     * @param $default_locale
     */
    public function __construct(Router $router, $index_route, $default_locale)
    {
        $this->router = $router;
        $this->index_route = $index_route;
        $this->default_locale = $default_locale;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if(!$event->getRequest()->get('_locale') && $event->getRequest()->get('_route') === $this->index_route) {
            $url = $this->router->generate('home', ['_locale' => $this->default_locale]);
            $response = new RedirectResponse($url);
            $event->setResponse($response);
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            // must be registered after the default Locale listener
          KernelEvents::REQUEST => [['onKernelRequest', 15]],
        ];
    }
}