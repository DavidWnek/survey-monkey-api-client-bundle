<?php

namespace davidwnek\SurveyMonkeyApiClientBundle\Controller;

use davidwnek\SurveyMonkey\Authentication;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AuthenticationController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @Route("/survey_monkey/code", name="davidwnek_surveymonkey_authentication_return")
     */
    public function authenticationReturnAction(Request $request)
    {
        $failedRouteName = $this->getParameter('davidwnek.parameters.authentication_failed_redirect_route_name');

        if (!$request->request->has('code')) {
            return $this->redirectToRoute($failedRouteName);
        }

        $code = $request->request->get('code');

        if (empty($code)) {
            return $this->redirectToRoute($failedRouteName);
        }

        /** @var Authentication $authentication */
        $authentication = $this->get('survey_monkey_api_client.authentication');

        $authentication->storeAccessToken($code);

        return $this->redirectToRoute($this->getParameter('davidwnek.parameters.authentication_success_redirect_route_name'));
    }
}
