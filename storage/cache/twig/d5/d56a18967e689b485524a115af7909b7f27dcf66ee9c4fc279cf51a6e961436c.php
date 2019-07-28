<?php

/* Dealers/partials/order/breadcrumbs.twig */
class __TwigTemplate_5af86cffa7cf7a736903d2824c020fd5ed3658cba2b66b1db8607b5f4ac04582 extends Twig_Template
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
        echo "<nav aria-label=\"breadcrumb\">
  <ol class=\"breadcrumb\">
    ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 4
            echo "      <li class=\"breadcrumb-item ";
            if ((twig_get_attribute($this->env, $this->source, $context["item"], "name", array()) == ($context["routeGroup"] ?? null))) {
                echo "active";
            }
            echo "\">
        ";
            // line 5
            if ((twig_get_attribute($this->env, $this->source, $context["item"], "name", array()) != ($context["routeGroup"] ?? null))) {
                // line 6
                echo "          <a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "link", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "title", array()), "html", null, true);
                echo "</a>
        ";
            } else {
                // line 8
                echo "          ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "title", array()), "html", null, true);
                echo "
        ";
            }
            // line 10
            echo "      </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "  </ol>
</nav>";
    }

    public function getTemplateName()
    {
        return "Dealers/partials/order/breadcrumbs.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 12,  54 => 10,  48 => 8,  40 => 6,  38 => 5,  31 => 4,  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/partials/order/breadcrumbs.twig", "/home/dealerportal/public_html/app/Views/Dealers/partials/order/breadcrumbs.twig");
    }
}
