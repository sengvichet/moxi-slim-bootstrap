<?php

/* Dealers/partials/topbar/company-profile.twig */
class __TwigTemplate_e3fc6edcb8b52100449012446e6b63d60408e04c6ab6f3b9e287748754dbfc22 extends Twig_Template
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
        echo "<nav class=\"nav\">
  <div class=\"nav nav-pills\" id=\"nav-tab\" role=\"tablist\">
    ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tabs"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["tab"]) {
            // line 4
            echo "      ";
            if (twig_in_filter(($context["page"] ?? null), twig_get_attribute($this->env, $this->source, $context["tab"], "pages", array()))) {
                // line 5
                echo "      <a class=\"nav-link nav-tab ";
                if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", array())) {
                    echo "active";
                }
                echo "\"
         id=\"nav-";
                // line 6
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tab"], "name", array()), "html", null, true);
                echo "-tab\" href=\"#nav-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tab"], "name", array()), "html", null, true);
                echo "\" data-toggle=\"tab\"
         role=\"tab\" aria-controls=\"nav-";
                // line 7
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tab"], "name", array()), "html", null, true);
                echo "\" aria-selected=\"false\" title=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tab"], "title", array()), "html", null, true);
                echo "\">
        ";
                // line 8
                if (($context["icon"] ?? null)) {
                    echo "<i class=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tab"], "class", array()), "html", null, true);
                    echo "\"></i>";
                } else {
                    echo "<i class=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tab"], "class", array()), "html", null, true);
                    echo " d-xxl-none\"></i>";
                }
                // line 9
                echo "        ";
                if ( !($context["icon"] ?? null)) {
                    echo "<span class=\"d-none d-xxl-inline-display\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tab"], "title", array()), "html", null, true);
                    echo "</span>";
                }
                // line 10
                echo "      </a>
      ";
            }
            // line 12
            echo "    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "  </div>
</nav>
";
    }

    public function getTemplateName()
    {
        return "Dealers/partials/topbar/company-profile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 13,  87 => 12,  83 => 10,  76 => 9,  66 => 8,  60 => 7,  54 => 6,  47 => 5,  44 => 4,  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/partials/topbar/company-profile.twig", "/home/dealerportal/public_html/app/Views/Dealers/partials/topbar/company-profile.twig");
    }
}
