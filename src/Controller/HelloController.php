<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    /**
   * @Route("")
   */
  public function helloEveryone() {
    return new Response("Hello World!");
  }

    /**
     * @Route("/{name}")
     */
    public function helloSomeone($name) {
        return new Response(sprintf('Hello %s, nice to have you here!', (string)$name));
    }

}
