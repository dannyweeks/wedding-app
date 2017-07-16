<?php

namespace Weeks\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('WeeksAppBundle:Default:index.html.twig');
    }

    /**
     * @return Response
     */
    public function weddingAction()
    {
        return $this->render('WeeksAppBundle:Default:wedding.html.twig');
    }

    public function receptionAction()
    {
        return $this->render('WeeksAppBundle:Default:reception.html.twig');
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function saveRSVPAction(Request $request)
    {
        try {
            $name = $request->get('name');
            $email = $request->get('email');

            if (empty($name) || empty($email)) {
                throw new \Exception(
                    'Please enter your name and email address :)',
                    400
                );
            }

            $appRoot = realpath($this->get('kernel')->getRootDir() . '/..');
            $file = new \SplFileObject($appRoot . '/storage/rsvp.csv', 'a');
            $result = $file->fputcsv([$name, $email]);
            $file = null;
        } catch (\Exception $e) {
            $code = $e->getCode() !== 0 ? $e->getCode() : 500;

            return new JsonResponse([
                'message' => $e->getMessage(),
                'code'    => $code,
            ], $code);
        }

        return new JsonResponse([]);
    }
}
