<?php

/* Dealers/layouts/order.twig */
class __TwigTemplate_1132868ca5ecbf027f8a3c341d9bd7943d474c114a4cf43bfda9c1f38e19d4f8 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/layouts/dashboard.twig", "Dealers/layouts/order.twig", 1);
        $this->blocks = array(
            'footer_scripts' => array($this, 'block_footer_scripts'),
            'sidebar' => array($this, 'block_sidebar'),
            'content' => array($this, 'block_content'),
            'order_page_title' => array($this, 'block_order_page_title'),
            'order_page_percentage' => array($this, 'block_order_page_percentage'),
            'order_page_top_description' => array($this, 'block_order_page_top_description'),
            'order_form_action' => array($this, 'block_order_form_action'),
            'order_form_type' => array($this, 'block_order_form_type'),
            'order_buttons' => array($this, 'block_order_buttons'),
            'order_table' => array($this, 'block_order_table'),
            'order_page_content' => array($this, 'block_order_page_content'),
            'order_page_bottom_description' => array($this, 'block_order_page_bottom_description'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Dealers/layouts/dashboard.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 3
        echo "  <script src=\"/assets/js/sweetalert2.all.min.js\"></script>
  <script src=\"/assets/js/bootstrap-form-validation.js\"></script>
  <script src=\"/assets/js/website/order.js\"></script>
";
    }

    // line 7
    public function block_sidebar($context, array $blocks = array())
    {
        // line 8
        echo "  ";
        $this->loadTemplate("Dealers/partials/sidebar/dealer.twig", "Dealers/layouts/order.twig", 8)->display($context);
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "<div class=\"row align-items-center\">
  <div class=\"col-12 col-sm-6\">
    <h1>";
        // line 13
        $this->displayBlock('order_page_title', $context, $blocks);
        echo "</h1>
  </div>
  <div class=\"col-12 col-sm-6\">
    <h5 class=\"float-right\">Percentage Completion: ";
        // line 16
        $this->displayBlock('order_page_percentage', $context, $blocks);
        echo "%</h5>
  </div>
</div>
<div class=\"row\">
  <div class=\"col-12\">
    ";
        // line 21
        $this->loadTemplate("Dealers/partials/order/breadcrumbs.twig", "Dealers/layouts/order.twig", 21)->display($context);
        // line 22
        echo "  </div>
</div>
<div class=\"row mb-3\">
  <div class=\"col-12\">
    ";
        // line 26
        $this->displayBlock('order_page_top_description', $context, $blocks);
        // line 27
        echo "  </div>
</div>
<form action=\"";
        // line 29
        $this->displayBlock('order_form_action', $context, $blocks);
        echo "\" method=\"POST\" id=\"order-form\" class=\"needs-validation\" novalidate ";
        $this->displayBlock('order_form_type', $context, $blocks);
        echo ">
  <input type=\"hidden\" name=\"action\" value=\"\">
<div class=\"row\">
  <div class=\"col-sm-4\">
    ";
        // line 33
        $this->displayBlock('order_buttons', $context, $blocks);
        // line 34
        echo "  </div>
  <div class=\"col-sm-8\">
    ";
        // line 36
        $this->displayBlock('order_table', $context, $blocks);
        // line 37
        echo "  </div>
</div>
";
        // line 39
        $this->displayBlock('order_page_content', $context, $blocks);
        // line 40
        echo "<div class=\"row mt-3\">
  <div class=\"col-12\">
    ";
        // line 42
        $this->displayBlock('order_page_bottom_description', $context, $blocks);
        // line 43
        echo "  </div>
</div>
<div class=\"row\">
  <div class=\"";
        // line 46
        if ((isset($context["start"]) || array_key_exists("start", $context))) {
            echo "col-sm-6";
        } else {
            echo "col-sm-4";
        }
        echo "\">
    <button type=\"button\" class=\"btn btn-primary btn-lg btn-block save-button\" data-action=\"exit\">Save and Exit</button>
  </div>
  ";
        // line 49
        if ( !(isset($context["start"]) || array_key_exists("start", $context))) {
            // line 50
            echo "  <div class=\"col-sm-4\">
    <button type=\"button\" class=\"btn btn-secondary btn-lg btn-block save-button\" data-action=\"back\">Save and Go Back</button>
  </div>
  ";
        }
        // line 54
        echo "  <div class=\"";
        if ((isset($context["start"]) || array_key_exists("start", $context))) {
            echo "col-sm-6";
        } else {
            echo "col-sm-4";
        }
        echo "\">
    <button type=\"button\" class=\"btn btn-success btn-lg btn-block save-button\" data-action=\"continue\">Save and Continue</button>
  </div>
</div>
</form>
";
    }

    // line 13
    public function block_order_page_title($context, array $blocks = array())
    {
    }

    // line 16
    public function block_order_page_percentage($context, array $blocks = array())
    {
    }

    // line 26
    public function block_order_page_top_description($context, array $blocks = array())
    {
    }

    // line 29
    public function block_order_form_action($context, array $blocks = array())
    {
    }

    public function block_order_form_type($context, array $blocks = array())
    {
    }

    // line 33
    public function block_order_buttons($context, array $blocks = array())
    {
    }

    // line 36
    public function block_order_table($context, array $blocks = array())
    {
    }

    // line 39
    public function block_order_page_content($context, array $blocks = array())
    {
    }

    // line 42
    public function block_order_page_bottom_description($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Dealers/layouts/order.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  202 => 42,  197 => 39,  192 => 36,  187 => 33,  178 => 29,  173 => 26,  168 => 16,  163 => 13,  148 => 54,  142 => 50,  140 => 49,  130 => 46,  125 => 43,  123 => 42,  119 => 40,  117 => 39,  113 => 37,  111 => 36,  107 => 34,  105 => 33,  96 => 29,  92 => 27,  90 => 26,  84 => 22,  82 => 21,  74 => 16,  68 => 13,  64 => 11,  61 => 10,  56 => 8,  53 => 7,  46 => 3,  43 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/layouts/order.twig", "/home/dealerportal/public_html/app/Views/Dealers/layouts/order.twig");
    }
}
