<?php

/* Dealers/website/order/special-features.twig */
class __TwigTemplate_7cc86d95910501d285c6c7bfa662d8e0aab4b7e9bbc11fa774d978acb6cd18f7 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/website/order/new-order.twig", "Dealers/website/order/special-features.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'order_page_title' => array($this, 'block_order_page_title'),
            'order_page_form' => array($this, 'block_order_page_form'),
            'footer_scripts' => array($this, 'block_footer_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Dealers/website/order/new-order.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Special Features";
    }

    // line 3
    public function block_order_page_title($context, array $blocks = array())
    {
        echo "Special Features";
    }

    // line 4
    public function block_order_page_form($context, array $blocks = array())
    {
        // line 5
        echo "  ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["costs"] ?? null));
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
        foreach ($context['_seq'] as $context["costs_type"] => $context["cost"]) {
            // line 6
            echo "    ";
            if ((twig_get_attribute($this->env, $this->source, $context["cost"], "group", array()) == "special_features")) {
                // line 7
                echo "    <div id=\"";
                echo twig_escape_filter($this->env, $context["costs_type"], "html", null, true);
                echo "\">
    <div class=\"row\">
      <div class=\"col-12\">
        <h2>";
                // line 10
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cost"], "title", array()), "html", null, true);
                echo " <span class=\"badge info-tool\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cost"], "title", array()), "html", null, true);
                echo "\"><i class=\"fa fa-info-circle\"></i></span></h2>
      </div>
    </div>
    ";
                // line 13
                $this->loadTemplate("Dealers/partials/order/website-package-buttons.twig", "Dealers/website/order/special-features.twig", 13)->display($context);
                // line 14
                echo "    </div>
    <input type=\"hidden\" name=\"";
                // line 15
                echo twig_escape_filter($this->env, $context["costs_type"], "html", null, true);
                echo "\" value=\"";
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), 0, array(), "array", false, true), $context["costs_type"], array(), "array", true, true)) {
                    echo twig_escape_filter($this->env, (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = (($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array())) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[0] ?? null) : null)) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[$context["costs_type"]] ?? null) : null), "html", null, true);
                } else {
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array(), "any", false, true), $context["costs_type"], array(), "array", true, true)) {
                        echo twig_escape_filter($this->env, (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array())) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[$context["costs_type"]] ?? null) : null), "html", null, true);
                    } else {
                        echo "0";
                    }
                }
                echo "\">
    ";
            }
            // line 17
            echo "  ";
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
        unset($context['_seq'], $context['_iterated'], $context['costs_type'], $context['cost'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "  <div class=\"row\">
    <div class=\"col-12\">
      <h2>Unique Customer Login Experience <span class=\"badge info-tool\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Unique Customer Login Experience\"><i class=\"fa fa-info-circle\"></i></span></h2>
      <p>Available February 2019</p>
    </div>
  </div>
  ";
        // line 24
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "order", array(), "any", false, true), "id", array(), "any", true, true)) {
            // line 25
            echo "    <input type=\"hidden\" name=\"order_id\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "order", array()), "id", array()), "html", null, true);
            echo "\">
  ";
        }
    }

    // line 28
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 29
        $this->displayParentBlock("footer_scripts", $context, $blocks);
        echo "
<script>
  \$('.info-tool').tooltip();
  \$('button[data-option-name=\"standard_banner\"]').click(function () {
    \$('button[data-option-name=\"scrolling_banner\"], button[data-option-name=\"video_banner\"]')
      .removeClass('btn-primary').addClass('btn-secondary');
    \$('input[name=\"scrolling_banner\"], input[name=\"video_banner\"]').val(0);
    \$('[data-scrolling_banner-total]').data('scrolling_banner-total', 0);
    \$('[data-video_banner-total]').data('video_banner-total', 0);
  });
  \$('button[data-option-name=\"scrolling_banner\"]').click(function () {
    \$('button[data-option-name=\"standard_banner\"], button[data-option-name=\"video_banner\"]')
      .removeClass('btn-primary').addClass('btn-secondary');
    \$('input[name=\"standard_banner\"], input[name=\"video_banner\"]').val(0);
    \$('[data-standard_banner-total]').data('standard_banner-total', 0);
    \$('[data-video_banner-total]').data('video_banner-total', 0);
  });
  \$('button[data-option-name=\"video_banner\"]').click(function () {
    \$('button[data-option-name=\"scrolling_banner\"], button[data-option-name=\"standard_banner\"]')
      .removeClass('btn-primary').addClass('btn-secondary');
    \$('input[name=\"scrolling_banner\"], input[name=\"standard_banner\"]').val(0);
    \$('[data-scrolling_banner-total]').data('scrolling_banner-total', 0);
    \$('[data-standard_banner-total]').data('standard_banner-total', 0);
  });
  var order = ";
        // line 53
        echo json_encode(($context["order"] ?? null));
        echo ";
</script>
";
    }

    public function getTemplateName()
    {
        return "Dealers/website/order/special-features.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 53,  141 => 29,  138 => 28,  130 => 25,  128 => 24,  120 => 18,  106 => 17,  91 => 15,  88 => 14,  86 => 13,  78 => 10,  71 => 7,  68 => 6,  50 => 5,  47 => 4,  41 => 3,  35 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/website/order/special-features.twig", "/home/dealerportal/public_html/app/Views/Dealers/website/order/special-features.twig");
    }
}
