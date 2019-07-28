<?php

/* Common/home.twig */
class __TwigTemplate_dd8d2f30c967682ba5b72d6ce026f7134c172b5a5800a5158fc4810e45401d87 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Common/layouts/index.twig", "Common/home.twig", 1);
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
        echo "Dealers";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"page-header\">
  <h1>Welcome to Dealers Portal!</h1>
</div>
<h5><a href=\"/login\">Login to your account</a></h5>
";
    }

    public function getTemplateName()
    {
        return "Common/home.twig";
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
        return new Twig_Source("", "Common/home.twig", "/home/phpdeva/public_html/app/Views/Common/home.twig");
    }
}
