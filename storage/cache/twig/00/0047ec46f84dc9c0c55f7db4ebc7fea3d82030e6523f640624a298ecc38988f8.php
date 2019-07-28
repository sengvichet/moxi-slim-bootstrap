<?php

/* Dealers/partials/order/totals-table.twig */
class __TwigTemplate_8578374c4ecbd26317c386e52d0fb0034c919c08645ec555066f6e166e3631f5 extends Twig_Template
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
        echo "<table class=\"table table-bordered table-striped\" id=\"totals-table\">
  <tbody>
    <tr id=\"website_package\">
      <td>Website Package Totals</td>
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
        echo "\">
          \$";
        // line 10
        echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "products", array()), "cost", array()) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "specsheets", array()), "cost", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "ecommerce", array()), "cost", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "pricing", array()), "cost", array())), "html", null, true);
        echo "
        </span>
      </td>
      <td>Start Up -
        <span data-products-total=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "products", array()), "setup", array()), "html", null, true);
        echo "\"
          data-specsheets-total=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "specsheets", array()), "setup", array()), "html", null, true);
        echo "\"
          data-ecommerce-total=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "ecommerce", array()), "setup", array()), "html", null, true);
        echo "\"
          data-pricing-total=\"";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "pricing", array()), "setup", array()), "html", null, true);
        echo "\">
          \$";
        // line 18
        echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "products", array()), "setup", array()) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "specsheets", array()), "setup", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "ecommerce", array()), "setup", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "pricing", array()), "setup", array())), "html", null, true);
        echo "
        </span>
      </td>
    </tr>
    <tr id=\"home_page\">
      <td>Home Page Totals</td>
      <td>Monthly -
        <span data-standard_banner-total=\"";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "standard_banner", array()), "cost", array()), "html", null, true);
        echo "\"
          data-scrolling_banner-total=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "scrolling_banner", array()), "cost", array()), "html", null, true);
        echo "\"
          data-video_banner-total=\"";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "video_banner", array()), "cost", array()), "html", null, true);
        echo "\"
          data-category_images-total=\"";
        // line 28
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "category_images", array()), "cost", array()), "html", null, true);
        echo "\"
          data-category_structures-total=\"";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "category_structures", array()), "cost", array()), "html", null, true);
        echo "\">
          \$";
        // line 30
        echo twig_escape_filter($this->env, ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "standard_banner", array()), "cost", array()) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "scrolling_banner", array()), "cost", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 31
($context["summary"] ?? null), "video_banner", array()), "cost", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "category_images", array()), "cost", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 32
($context["summary"] ?? null), "category_structures", array()), "cost", array())), "html", null, true);
        echo "
        </span>
        </td>
      <td>Start Up -
      <span data-standard_banner-total=\"";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "standard_banner", array()), "setup", array()), "html", null, true);
        echo "\"
          data-scrolling_banner-total=\"";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "scrolling_banner", array()), "setup", array()), "html", null, true);
        echo "\"
          data-video_banner-total=\"";
        // line 38
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "video_banner", array()), "setup", array()), "html", null, true);
        echo "\"
          data-category_images-total=\"";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "category_images", array()), "setup", array()), "html", null, true);
        echo "\"
          data-category_structures-total=\"";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "category_structures", array()), "setup", array()), "html", null, true);
        echo "\">
          \$";
        // line 41
        echo twig_escape_filter($this->env, ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "standard_banner", array()), "setup", array()) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "scrolling_banner", array()), "setup", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 42
($context["summary"] ?? null), "video_banner", array()), "setup", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "category_images", array()), "setup", array())) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 43
($context["summary"] ?? null), "category_structures", array()), "setup", array())), "html", null, true);
        echo "
        </span>
      </td>
    </tr>
    <tr id=\"website_pages\">
      <td>Website Pages Totals</td>
      <td>Monthly -
        <span
        ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "website_page", array()));
        foreach ($context['_seq'] as $context["index"] => $context["row"]) {
            // line 52
            echo "          ";
            if (($context["index"] != "total")) {
                // line 53
                echo "            data-website_page-total_";
                echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "cost", array()), "html", null, true);
                echo "\"
          ";
            }
            // line 55
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "extra_website_page", array()));
        foreach ($context['_seq'] as $context["index"] => $context["row"]) {
            // line 57
            echo "          ";
            if (($context["index"] != "total")) {
                // line 58
                echo "            data-extra_website_page-total_";
                echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "cost", array()), "html", null, true);
                echo "\"
          ";
            }
            // line 60
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo ">
        \$";
        // line 61
        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "website_page", array()), "total", array()), "cost", array()) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "extra_website_page", array()), "total", array()), "cost", array())), "html", null, true);
        echo "
      </span>
      </td>
      <td>Start Up -
        <span
        ";
        // line 66
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "website_page", array()));
        foreach ($context['_seq'] as $context["index"] => $context["row"]) {
            // line 67
            echo "          ";
            if (($context["index"] != "total")) {
                // line 68
                echo "            data-website_page-total_";
                echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "setup", array()), "html", null, true);
                echo "\"
          ";
            }
            // line 70
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "extra_website_page", array()));
        foreach ($context['_seq'] as $context["index"] => $context["row"]) {
            // line 72
            echo "          ";
            if (($context["index"] != "total")) {
                // line 73
                echo "            data-extra_website_page-total_";
                echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "setup", array()), "html", null, true);
                echo "\"
          ";
            }
            // line 75
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo ">
        \$";
        // line 76
        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "website_page", array()), "total", array()), "setup", array()) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "extra_website_page", array()), "total", array()), "setup", array())), "html", null, true);
        echo "
      </span>
      </td>
    </tr>
    <tr id=\"special_features\">
      <td>Special Features Totals</td>
      <td>Monthly -
        <span data-logo-total=\"";
        // line 83
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "logo", array()), "cost", array()), "html", null, true);
        echo "\"
        data-banner_ads-total=\"";
        // line 84
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "banner_ads", array()), "cost", array()), "html", null, true);
        echo "\">
        \$";
        // line 85
        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "logo", array()), "cost", array()) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "banner_ads", array()), "cost", array())), "html", null, true);
        echo "
        </span>
      </td>
      <td>Start Up -
        <span data-logo-total=\"";
        // line 89
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "logo", array()), "setup", array()), "html", null, true);
        echo "\"
        data-banner_ads-total=\"";
        // line 90
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "banner_ads", array()), "setup", array()), "html", null, true);
        echo "\">
        \$";
        // line 91
        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "logo", array()), "setup", array()) + twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "banner_ads", array()), "setup", array())), "html", null, true);
        echo "
        </span>
      </td>
    </tr>
  </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "Dealers/partials/order/totals-table.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  272 => 91,  268 => 90,  264 => 89,  257 => 85,  253 => 84,  249 => 83,  239 => 76,  231 => 75,  223 => 73,  220 => 72,  215 => 71,  209 => 70,  201 => 68,  198 => 67,  194 => 66,  186 => 61,  178 => 60,  170 => 58,  167 => 57,  162 => 56,  156 => 55,  148 => 53,  145 => 52,  141 => 51,  130 => 43,  129 => 42,  128 => 41,  124 => 40,  120 => 39,  116 => 38,  112 => 37,  108 => 36,  101 => 32,  100 => 31,  99 => 30,  95 => 29,  91 => 28,  87 => 27,  83 => 26,  79 => 25,  69 => 18,  65 => 17,  61 => 16,  57 => 15,  53 => 14,  46 => 10,  42 => 9,  38 => 8,  34 => 7,  30 => 6,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/partials/order/totals-table.twig", "/home/dealerportal/public_html/app/Views/Dealers/partials/order/totals-table.twig");
    }
}
