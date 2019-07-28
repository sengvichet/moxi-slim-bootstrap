<?php

/* Dealers/partials/order/extra-website-page-block.twig */
class __TwigTemplate_79a533628da5929d434e4491bfb749cbfa908c8fc90d5d6d1b5bb37460887912 extends Twig_Template
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
        echo "<div class=\"extra-website-page\" id=\"extra-website-page-";
        echo twig_escape_filter($this->env, ($context["i"] ?? null), "html", null, true);
        echo "\">
            <div class=\"row mt-5\">
              <div class=\"col-12\">
                <h2>";
        // line 4
        echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, ($context["cost"] ?? null), "title", array()), array("{id}" => ($context["i"] ?? null))), "html", null, true);
        echo " <span class=\"badge info-tool\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cost"] ?? null), "title", array()), "html", null, true);
        echo "\"><i class=\"fa fa-info-circle\"></i></span></h2>
              </div>
            </div>
            <div class=\"row mr-1 mb-3 mt-3 pl-3\">
              <div class=\"col-12 row-bordered border-secondary pt-3 pb-4 \">
                <h3>Select The Website Page Type <span class=\"badge info-tool\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Choose Page Type\"><i class=\"fa fa-info-circle\"></i></span></h3>
                <select class=\"custom-select extra-page-type-select col-11 mb-3\" id=\"extra-page-type-select-";
        // line 10
        echo twig_escape_filter($this->env, ($context["i"] ?? null), "html", null, true);
        echo "\" name=\"extra_website_page[]\">
                  ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["costs"] ?? null), "extra_website_page", array()), "options", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 12
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", array()), "html", null, true);
            echo "\"
                      ";
            // line 13
            if ((($context["page"] ?? null) == twig_get_attribute($this->env, $this->source, $context["option"], "id", array()))) {
                echo "selected";
            }
            // line 14
            echo "                      data-option-name=\"extra_website_page\"
                      data-option-value=\"";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", array()), "html", null, true);
            echo "\"
                      data-option-index=\"";
            // line 16
            echo twig_escape_filter($this->env, ($context["i"] ?? null), "html", null, true);
            echo "\">
                      &middot; ";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "title", array()), "html", null, true);
            if (twig_get_attribute($this->env, $this->source, $context["option"], "setup", array())) {
                echo " - \$";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "setup", array()), "html", null, true);
            }
            // line 18
            echo "                    </option>
                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "                </select>
                <div class=\"input-group mb-3\">
                  <div class=\"input-group-prepend\">
                    <span class=\"input-group-text\" id=\"extra-page-title-label-";
        // line 23
        echo twig_escape_filter($this->env, ($context["i"] ?? null), "html", null, true);
        echo "\">Page Title</span>
                  </div>
                  <input type=\"text\" class=\"form-control text-center\"
                  placeholder=\"What will be the title of this website page? ex: About Us\" aria-label=\"(Enter Text Here)\"
                  aria-describedby=\"extra-page-title-label-";
        // line 27
        echo twig_escape_filter($this->env, ($context["i"] ?? null), "html", null, true);
        echo "\" name=\"extra_website_page_title[]\"
                  value=\"";
        // line 28
        echo twig_escape_filter($this->env, (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "extra_website_pages", array())) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[($context["i"] ?? null)] ?? null) : null), "html", null, true);
        echo "\">
                  <span class=\"badge info-tool large-badge col-1\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Page Title\"><i class=\"fa fa-info-circle\"></i></span>
                </div>
                <button type=\"button\" class=\"btn btn-danger remove-page-button float-right\">
                <i class=\"fa fa-trash\"></i>&nbsp;Remove Page
                </button>
              </div>
            </div>
          </div>";
    }

    public function getTemplateName()
    {
        return "Dealers/partials/order/extra-website-page-block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 28,  94 => 27,  87 => 23,  82 => 20,  75 => 18,  69 => 17,  65 => 16,  61 => 15,  58 => 14,  54 => 13,  49 => 12,  45 => 11,  41 => 10,  30 => 4,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/partials/order/extra-website-page-block.twig", "/home/dealerportal/public_html/app/Views/Dealers/partials/order/extra-website-page-block.twig");
    }
}
