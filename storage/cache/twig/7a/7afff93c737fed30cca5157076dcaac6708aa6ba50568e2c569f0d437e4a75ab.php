<?php

/* Dealers/website/order/order.twig */
class __TwigTemplate_997f03c757dfafd531d7956abca5527d232efa4281634907e3374fb14886c6d1 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/layouts/order.twig", "Dealers/website/order/order.twig", 1);
        $this->blocks = array(
            'footer_scripts' => array($this, 'block_footer_scripts'),
            'order_page_percentage' => array($this, 'block_order_page_percentage'),
            'order_form_action' => array($this, 'block_order_form_action'),
            'order_buttons' => array($this, 'block_order_buttons'),
            'order_table' => array($this, 'block_order_table'),
            'order_page_bottom_description' => array($this, 'block_order_page_bottom_description'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Dealers/layouts/order.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 3
        echo "  ";
        $this->displayParentBlock("footer_scripts", $context, $blocks);
        echo "
  <script>
    var costs = ";
        // line 5
        echo json_encode(($context["costs"] ?? null));
        echo ";
    var totals = ";
        // line 6
        echo json_encode(($context["totals"] ?? null));
        echo ";
  </script>
";
    }

    // line 9
    public function block_order_page_percentage($context, array $blocks = array())
    {
        // line 10
        echo "  ";
        if (twig_get_attribute($this->env, $this->source, ($context["percentage"] ?? null), "value", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["percentage"] ?? null), "value", array()), "html", null, true);
        } else {
            echo "0";
        }
    }

    // line 12
    public function block_order_form_action($context, array $blocks = array())
    {
        echo "/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "form", array()), "html", null, true);
    }

    // line 13
    public function block_order_buttons($context, array $blocks = array())
    {
        // line 14
        echo "  <ul class=\"list-group order-buttons-list\">
    ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = ($context["costs"] ?? null)) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[($context["costs_type"] ?? null)] ?? null) : null), "options", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 16
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, $context["option"], "title", array())) {
                // line 17
                echo "      <li class=\"list-group-item\">
        <button type=\"button\" class=\"btn btn-block btn-lg
        ";
                // line 19
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array(), "any", false, true), ($context["costs_type"] ?? null), array(), "array", true, true)) {
                    // line 20
                    echo "          ";
                    if (((($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array())) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[($context["costs_type"] ?? null)] ?? null) : null) == twig_get_attribute($this->env, $this->source, $context["option"], "id", array()))) {
                        echo "btn-primary";
                    } else {
                        echo "btn-secondary";
                    }
                    // line 21
                    echo "        ";
                } else {
                    // line 22
                    echo "          ";
                    if ((twig_get_attribute($this->env, $this->source, (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = ($context["costs"] ?? null)) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[($context["costs_type"] ?? null)] ?? null) : null), "default", array()) == twig_get_attribute($this->env, $this->source, $context["option"], "id", array()))) {
                        echo "btn-primary";
                    } else {
                        echo "btn-secondary";
                    }
                    // line 23
                    echo "        ";
                }
                echo "\" data-option-name=\"";
                echo twig_escape_filter($this->env, ($context["costs_type"] ?? null), "html", null, true);
                echo "\" data-option-value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "title", array()), "html", null, true);
                echo "</button>
      </li>
      ";
            }
            // line 26
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "  </ul>
  ";
        // line 28
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "order", array(), "any", false, true), "id", array(), "any", true, true)) {
            // line 29
            echo "    <input type=\"hidden\" name=\"order_id\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "order", array()), "id", array()), "html", null, true);
            echo "\">
  ";
        }
        // line 31
        echo "  <input type=\"hidden\" name=\"";
        echo twig_escape_filter($this->env, ($context["costs_type"] ?? null), "html", null, true);
        echo "\" value=\"";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array(), "any", false, true), ($context["costs_type"] ?? null), array(), "array", true, true)) {
            echo twig_escape_filter($this->env, (($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array())) && is_array($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9) || $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 instanceof ArrayAccess ? ($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9[($context["costs_type"] ?? null)] ?? null) : null), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = ($context["costs"] ?? null)) && is_array($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217) || $__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 instanceof ArrayAccess ? ($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217[($context["costs_type"] ?? null)] ?? null) : null), "default", array()), "html", null, true);
        }
        echo "\">
";
    }

    // line 33
    public function block_order_table($context, array $blocks = array())
    {
        // line 34
        echo "  ";
        $this->loadTemplate("Dealers/partials/order/table.twig", "Dealers/website/order/order.twig", 34)->display($context);
    }

    // line 36
    public function block_order_page_bottom_description($context, array $blocks = array())
    {
        // line 37
        echo "<p class=\"text-center\">Follow the steps to make selections and build your custom website. When the Percentage of Completion reaches 100% you will be led to a Pricing page that will summarize the start-up cost and monthly fee associated with your selections. You can always make edits as you go and save your work to finish the order later.</p>
<p class=\"text-center\">If you have any questions, please email Nic Monette at <a href=\"mailto: nic@moxximarketing.com\">nic@moxximarketing.com</a>.</p>
";
    }

    public function getTemplateName()
    {
        return "Dealers/website/order/order.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 37,  163 => 36,  158 => 34,  155 => 33,  142 => 31,  136 => 29,  134 => 28,  131 => 27,  125 => 26,  112 => 23,  105 => 22,  102 => 21,  95 => 20,  93 => 19,  89 => 17,  86 => 16,  82 => 15,  79 => 14,  76 => 13,  69 => 12,  60 => 10,  57 => 9,  50 => 6,  46 => 5,  40 => 3,  37 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/website/order/order.twig", "/home/dealerportal/public_html/app/Views/Dealers/website/order/order.twig");
    }
}
