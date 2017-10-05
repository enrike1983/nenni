<?php

namespace AppBundle\Controller;

use AppBundle\Manager\BlocksManager;
use Psr\Log\InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use HttpInvalidParamException;

class CommonController extends Controller
{
  /**
   * @Route("/update-elements-sort", name="update_elements_sort")
   * @param \Symfony\Component\HttpFoundation\Request $request
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   * @throws \LogicException
   */
  public function updateBlockSortAction(Request $request)
  {
    $ids_string = $request->request->get('ids');
    $ids = explode(',', $ids_string);

    $object_class = $request->request->get('object_class');

    try {
      $this->container->get('app.common_manager')->updateElementsPosition(
        $ids,
        $object_class
      );

      $message = 'Sort updated!';

    } catch (InvalidArgumentException $e) {
      $message = $e->getMessage();
    }

    return $this->json(['data' => [
      'message' => $message
    ]]);
  }
}
