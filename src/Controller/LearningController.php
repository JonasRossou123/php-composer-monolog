<?php

namespace App\Controller;

use bdk\Debug\Collector\MonologHandler;
use Monolog\Handler\ChromePHPHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\NativeMailerHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Monolog\Handler\BrowserConsoleHandler;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Psr\Log\LogLevel;
use Symfony\Bridge\Monolog;
use bdk\Debug;
use Monolog\Handler\MongoDBHandler;
use Psr;
use Illuminate\Support\Facades\Log;


class LearningController extends AbstractController
{
    /**
     * @Route("/learning", name="learning")
     */
    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }

    /**
     * @Route("/info", name="info", methods={"POST"})
     */
    public function info(Request $request): Response
    {

    $message = $request->get('message');
    $log = new Logger('testtest');

        //info (blue)

        $log->pushHandler(new StreamHandler('./info.log', Logger::INFO));
    $log->pushHandler(new ChromePHPHandler());

    $log->info($message);
        return $this->forward('App\Controller\LearningController::index', []);
    }

    /**
     * @Route("/warninglog", name="warninglog", methods={"POST"})
     */
    public function warning(Request $request): Response
    {
        $message = $request->get('message');
        $log = new Logger('logger');

        //warning (orange)
        $log->pushHandler(new StreamHandler('./warning.log', Logger::WARNING));
        $log->warning($message);
        return $this->forward('App\Controller\LearningController::index', [
        ]);
    }


    /**
     * @Route("/warningmail", name="warningmail", methods={"POST"})
     */
    public function test(Request $request): Response
    {
        $message = $request->get('message');
        $log = new Logger('logger');

        //danger (red)
        $from = "x@gmail.com";
        $to = "jonas.rossou@hotmail.com";
        $subject = "spam";

        $log->pushHandler(new NativeMailerHandler($to,$subject,$from, Logger::WARNING));
        $log->pushHandler(new StreamHandler('./warning.log', Logger::WARNING));
        $log->warning($message);

        return $this->forward('App\Controller\LearningController::index', [
        ]);
    }

    /**
     * @Route("/emergency", name="emergency", methods={"POST"})
     */
    public function emergency(Request $request): Response
    {
        $message = $request->get('message');
        $log = new Logger('logger');

        //emergency (black)

        $from = "sicco.smit@becode.be";
        $to = "yarrut.franken@gmail.com";
        $subject = "BeCode exit";

        $log->pushHandler(new NativeMailerHandler($to,$subject,$from));
        $log->pushHandler(new StreamHandler('./emergency.log', Logger::EMERGENCY));
        $log->emergency($message);

        return $this->forward('App\Controller\LearningController::index', [
        ]);
    }
}