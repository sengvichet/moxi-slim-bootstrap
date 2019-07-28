<?php

/* /Common/404.twig */
class __TwigTemplate_a08063556cfeac32420bc7f91f53b3bf2d49131ebe42b5129e98619cb8c56e1d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Common/layouts/index.twig", "/Common/404.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Common/layouts/index.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "404 - Dealers";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"page-header\">
  <h1 class=\"text-center\">404 Not Found</h1>
</div>
";
    }

    public function getTemplateName()
    {
        return "/Common/404.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 4,  39 => 3,  33 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "/Common/404.twig", "/home/phpdeva/public_html/app/Views/Common/404.twig");
    }
}
