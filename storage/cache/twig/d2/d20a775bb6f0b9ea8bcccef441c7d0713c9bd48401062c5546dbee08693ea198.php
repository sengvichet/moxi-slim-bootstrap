<?php

/* Dealers/partials/header.twig */
class __TwigTemplate_4f2e279659eedfc209c15e67690feca663453b16bd27252a86f76d470806a5af extends Twig_Template
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
        echo "<!-- Header Section -->
<header class=\"navbar navbar-expand navbar-light bg-light flex-column flex-md-row bd-navbar\">
  <a class=\"navbar-brand\" href=\"/\" title=\"Home\">
    ";
        // line 4
        if (twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "business_name", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "business_name", array()), "html", null, true);
        }
        // line 5
        echo "  </a>
  <ul class=\"navbar-nav flex-row ml-md-auto d-none d-md-flex\">
    ";
        // line 7
        if (((isset($context["user"]) || array_key_exists("user", $context)) &&  !twig_test_empty(($context["user"] ?? null)))) {
            // line 8
            echo "      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/logout\">Logout</a>
      </li>
    ";
        } else {
            // line 12
            echo "      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/login\">Login</a>
      </li>
    ";
        }
        // line 16
        echo "  </ul>
  <a href=\"/\" class=\"navbar-logo\">
    <img src=\"/assets/images/logo.png\" height=\"45\" class=\"img-responsive\" alt=\"Dealers Logo\"/>
  </a>
</header><!-- Header Section /- -->
";
    }

    public function getTemplateName()
    {
        return "Dealers/partials/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 16,  44 => 12,  38 => 8,  36 => 7,  32 => 5,  28 => 4,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/partials/header.twig", "/home/dealerportal/public_html/app/Views/Dealers/partials/header.twig");
    }
}
