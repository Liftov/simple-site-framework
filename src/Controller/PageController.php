<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    /**
     * Catch the root rout and render index template.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }

    /**
     * Catch all routes except root and render template.
     *
     * @param $url
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function catchAllAction($url)
    {
        var_dump($url);

        return $this->render($this->getTemplatePath($url));
    }

    /**
     * Convert the url to a template.
     *
     * @param $url
     * @return string
     */
    private function getTemplatePath($url)
    {

        // Check if given url translates into an existing template.
        $path = $url . '.html.twig';
        if ($this->templateExists($path)) {
            return $path;
        }

        // Maybe there is an index file in the folder.
        $path = $url . '/index.html.twig';
        if ($this->templateExists($path)) {
            return $path;
        }

        // Return 404 if nothing can be found.
        throw $this->createNotFoundException('The page does not exist');
    }

    /**
     * Check if a template file exists.
     *
     * @param $templatePath
     * @return mixed
     */
    private function templateExists($templatePath)
    {
        return $this->get('twig')->getLoader()->exists($templatePath);
    }
}
