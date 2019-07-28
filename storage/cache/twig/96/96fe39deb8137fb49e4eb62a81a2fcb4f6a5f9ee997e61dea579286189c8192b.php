<?php

/* Admin/layouts/index.twig */
class __TwigTemplate_8cf2062c3a44c43565bf067874c6734cf9ecebe1bb1c47f324dde77e46af7707 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Common/layouts/index.twig", "Admin/layouts/index.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'page_content' => array($this, 'block_page_content'),
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

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "  <div class=\"row\">
    <div class=\"col-12\">
      ";
        // line 6
        $this->displayBlock('page_content', $context, $blocks);
        // line 7
        echo "    </div>
  </div>
";
    }

    // line 6
    public function block_page_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Admin/layouts/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 6,  42 => 7,  40 => 6,  36 => 4,  33 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Admin/layouts/index.twig", "/home/dealerportal/public_html/app/Views/Admin/layouts/index.twig");
    }
}
