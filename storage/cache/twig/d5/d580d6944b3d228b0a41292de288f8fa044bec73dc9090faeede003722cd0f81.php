<?php

/* Dealers/website/order/new-order.twig */
class __TwigTemplate_76a11490125eaf8fa71778c7dcf9910e3168c567d086b260f527e3d344ac2c20 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/layouts/new-order.twig", "Dealers/website/order/new-order.twig", 1);
        $this->blocks = array(
            'footer_scripts' => array($this, 'block_footer_scripts'),
            'order_form_action' => array($this, 'block_order_form_action'),
            'order_table' => array($this, 'block_order_table'),
            'content_footer' => array($this, 'block_content_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Dealers/layouts/new-order.twig";
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
    public function block_order_form_action($context, array $blocks = array())
    {
        echo "/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "form", array()), "html", null, true);
    }

    // line 10
    public function block_order_table($context, array $blocks = array())
    {
        // line 11
        echo "  ";
        $this->loadTemplate("Dealers/partials/order/totals-table.twig", "Dealers/website/order/new-order.twig", 11)->display($context);
    }

    // line 13
    public function block_content_footer($context, array $blocks = array())
    {
        // line 14
        echo "<div class=\"sticky-div bg-warning text-bold\">
  ";
        // line 15
        $this->loadTemplate("Dealers/partials/order/summary-table.twig", "Dealers/website/order/new-order.twig", 15)->display($context);
        // line 16
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "Dealers/website/order/new-order.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 16,  76 => 15,  73 => 14,  70 => 13,  65 => 11,  62 => 10,  55 => 9,  48 => 6,  44 => 5,  38 => 3,  35 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/website/order/new-order.twig", "/home/dealerportal/public_html/app/Views/Dealers/website/order/new-order.twig");
    }
}
