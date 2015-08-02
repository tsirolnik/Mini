<?php

/* index.html */
class __TwigTemplate_cdad3cda6ee0b3fafffdcc9fdf1935958c76aed3420570cd5dde78c0a88826c0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "Sup?
";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["var"]) ? $context["var"] : null), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }
}
