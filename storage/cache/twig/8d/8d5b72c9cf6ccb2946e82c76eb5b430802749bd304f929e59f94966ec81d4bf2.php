<?php

/* Admin/partials/home-button.twig */
class __TwigTemplate_bce0f5a449d0b91e61f9c19a18e5ecc02e6a0b7cd7e45844571a69be14582329 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"row mt-3 mb-3\">
  <div class=\"col-12\">
    <a href=\"/";
        // line 3
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "home", array()), "html", null, true);
        echo "\" class=\"btn btn-secondary\">
      <i class=\"fa fa-home\"></i>&nbsp;Back to Home
    </a>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "Admin/partials/home-button.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Admin/partials/home-button.twig", "/home/phpdeva/public_html/app/Views/Admin/partials/home-button.twig");
    }
}
