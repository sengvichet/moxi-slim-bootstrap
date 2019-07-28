<?php

/* Dealers/partials/errors.twig */
class __TwigTemplate_c6060421e0b66e802dfacff8ce69569aa2f35ba0fb485b6af30be7920c3d6130 extends Twig_Template
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
        if (((isset($context["messages"]) || array_key_exists("messages", $context)) &&  !twig_test_empty(($context["messages"] ?? null)))) {
            // line 2
            echo "<div class=\"row mt-3 mb-3 errors-section\">
  <div class=\"col\">
    <ul class=\"list-group\">
      ";
            // line 11
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "message", array(), "array", true, true)) {
                // line 12
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = ($context["messages"] ?? null)) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5["message"] ?? null) : null));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 13
                    echo "          <li class=\"list-group-item list-group-item-";
                    if ((twig_get_attribute($this->env, $this->source, $context["message"], "status", array()) == "success")) {
                        echo "success";
                    } else {
                        echo "danger";
                    }
                    echo "\">
            ";
                    // line 14
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["message"], "text", array()), "html", null, true);
                    echo "
          </li>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 17
                echo "      ";
            }
            // line 18
            echo "    </ul>
  </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "Dealers/partials/errors.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 18,  56 => 17,  47 => 14,  38 => 13,  33 => 12,  30 => 11,  25 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/partials/errors.twig", "/home/dealerportal/public_html/app/Views/Dealers/partials/errors.twig");
    }
}
