<?php

/* Dealers/partials/order/summary-table.twig */
class __TwigTemplate_14220a24b94ad2b2b1b5e775e7200ca71d8ccd91f83c8b9340693aad4a7b1ed7 extends Twig_Template
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
        echo "<table class=\"table table-bordered\" id=\"summary-table\">
  <tbody>
    <tr class=\"text-center\">
      <td>Order Summary</td>
      <td>Monthly -
        <span data-products-total=\"";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "products", array()), "cost", array()), "html", null, true);
        echo "\"
          data-specsheets-total=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "specsheets", array()), "cost", array()), "html", null, true);
        echo "\"
          data-ecommerce-total=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "ecommerce", array()), "cost", array()), "html", null, true);
        echo "\"
          data-pricing-total=\"";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "pricing", array()), "cost", array()), "html", null, true);
        echo "\"
          data-standard_banner-total=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "standard_banner", array()), "cost", array()), "html", null, true);
        echo "\"
          data-scrolling_banner-total=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "scrolling_banner", array()), "cost", array()), "html", null, true);
        echo "\"
          data-video_banner-total=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "video_banner", array()), "cost", array()), "html", null, true);
        echo "\"
          data-category_images-total=\"";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "category_images", array()), "cost", array()), "html", null, true);
        echo "\"
          data-category_structures-total=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "category_structures", array()), "cost", array()), "html", null, true);
        echo "\"
          ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "website_page", array()));
        foreach ($context['_seq'] as $context["index"] => $context["row"]) {
            // line 16
            echo "            ";
            if (($context["index"] != "total")) {
                // line 17
                echo "              data-website_page-total_";
                echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "cost", array()), "html", null, true);
                echo "\"
            ";
            }
            // line 19
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "          ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "extra_website_page", array()));
        foreach ($context['_seq'] as $context["index"] => $context["row"]) {
            // line 21
            echo "            ";
            if (($context["index"] != "total")) {
                // line 22
                echo "              data-extra_website_page-total_";
                echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "cost", array()), "html", null, true);
                echo "\"
            ";
            }
            // line 24
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "          data-logo-total=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "logo", array()), "cost", array()), "html", null, true);
        echo "\"
          data-banner_ads-total=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "banner_ads", array()), "cost", array()), "html", null, true);
        echo "\">
          \$";
        // line 27
        echo twig_escape_filter($this->env, ((((((((((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "products", array()), "cost", array()) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "specsheets", array()), "cost", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 28
($context["summary"] ?? null), "ecommerce", array()), "cost", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "pricing", array()), "cost", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 29
($context["summary"] ?? null), "standard_banner", array()), "cost", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "scrolling_banner", array()), "cost", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 30
($context["summary"] ?? null), "video_banner", array()), "cost", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "category_images", array()), "cost", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 31
($context["summary"] ?? null), "category_structures", array()), "cost", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 32
($context["summary"] ?? null), "website_page", array()), "total", array()), "cost", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "extra_website_page", array()), "total", array()), "cost", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 33
($context["summary"] ?? null), "logo", array()), "cost", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "banner_ads", array()), "cost", array())), "html", null, true);
        echo "
          </span>
      </td>
      <td>Start Up -
        <span data-products-total=\"";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "products", array()), "setup", array()), "html", null, true);
        echo "\"
          data-specsheets-total=\"";
        // line 38
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "specsheets", array()), "setup", array()), "html", null, true);
        echo "\"
          data-ecommerce-total=\"";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "ecommerce", array()), "setup", array()), "html", null, true);
        echo "\"
          data-pricing-total=\"";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "pricing", array()), "setup", array()), "html", null, true);
        echo "\"
          data-standard_banner-total=\"";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "standard_banner", array()), "setup", array()), "html", null, true);
        echo "\"
          data-scrolling_banner-total=\"";
        // line 42
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "scrolling_banner", array()), "setup", array()), "html", null, true);
        echo "\"
          data-video_banner-total=\"";
        // line 43
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "video_banner", array()), "setup", array()), "html", null, true);
        echo "\"
          data-category_images-total=\"";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "category_images", array()), "setup", array()), "html", null, true);
        echo "\"
          data-category_structures-total=\"";
        // line 45
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "category_structures", array()), "setup", array()), "html", null, true);
        echo "\"
          ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "website_page", array()));
        foreach ($context['_seq'] as $context["index"] => $context["row"]) {
            // line 47
            echo "            ";
            if (($context["index"] != "total")) {
                // line 48
                echo "              data-website_page-total_";
                echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "setup", array()), "html", null, true);
                echo "\"
            ";
            }
            // line 50
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "          ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "extra_website_page", array()));
        foreach ($context['_seq'] as $context["index"] => $context["row"]) {
            // line 52
            echo "            ";
            if (($context["index"] != "total")) {
                // line 53
                echo "              data-extra_website_page-total_";
                echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "setup", array()), "html", null, true);
                echo "\"
            ";
            }
            // line 55
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "          data-logo-total=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "logo", array()), "setup", array()), "html", null, true);
        echo "\"
          data-banner_ads-total=\"";
        // line 57
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "banner_ads", array()), "setup", array()), "html", null, true);
        echo "\">
          \$";
        // line 58
        echo twig_escape_filter($this->env, ((((((((((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "products", array()), "setup", array()) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "specsheets", array()), "setup", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 59
($context["summary"] ?? null), "ecommerce", array()), "setup", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "pricing", array()), "setup", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 60
($context["summary"] ?? null), "standard_banner", array()), "setup", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "scrolling_banner", array()), "setup", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 61
($context["summary"] ?? null), "video_banner", array()), "setup", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "category_images", array()), "setup", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 62
($context["summary"] ?? null), "category_structures", array()), "setup", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 63
($context["summary"] ?? null), "website_page", array()), "total", array()), "setup", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "extra_website_page", array()), "total", array()), "setup", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 64
($context["summary"] ?? null), "logo", array()), "setup", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "banner_ads", array()), "setup", array())), "html", null, true);
        echo "
          </span>
      </td>
    </tr>
  </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "Dealers/partials/order/summary-table.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  225 => 64,  224 => 63,  223 => 62,  222 => 61,  221 => 60,  220 => 59,  219 => 58,  215 => 57,  210 => 56,  204 => 55,  196 => 53,  193 => 52,  188 => 51,  182 => 50,  174 => 48,  171 => 47,  167 => 46,  163 => 45,  159 => 44,  155 => 43,  151 => 42,  147 => 41,  143 => 40,  139 => 39,  135 => 38,  131 => 37,  124 => 33,  123 => 32,  122 => 31,  121 => 30,  120 => 29,  119 => 28,  118 => 27,  114 => 26,  109 => 25,  103 => 24,  95 => 22,  92 => 21,  87 => 20,  81 => 19,  73 => 17,  70 => 16,  66 => 15,  62 => 14,  58 => 13,  54 => 12,  50 => 11,  46 => 10,  42 => 9,  38 => 8,  34 => 7,  30 => 6,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/partials/order/summary-table.twig", "/home/dealerportal/public_html/app/Views/Dealers/partials/order/summary-table.twig");
    }
}
