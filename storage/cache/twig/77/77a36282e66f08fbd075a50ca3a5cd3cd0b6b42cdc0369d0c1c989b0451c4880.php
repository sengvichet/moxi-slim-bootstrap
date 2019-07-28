<?php

/* Admin/partials/gmb-button.twig */
class __TwigTemplate_250037f6a32b10678623862bc3e6dce7245b8b5d36752f8b76491a618ed26804 extends Twig_Template
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
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "gmb", array()), "html", null, true);
        echo "\" class=\"btn btn-secondary\">
      <i class=\"fa fa-user\"></i>&nbsp;Back to GMB
    </a>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "Admin/partials/gmb-button.twig";
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
        return new Twig_Source("", "Admin/partials/gmb-button.twig", "/home/dealerportal/public_html/app/Views/Admin/partials/gmb-button.twig");
    }
}
