<?php

/* Dealers/layouts/new-order.twig */
class __TwigTemplate_d5ac4120cffc3eca97382f2a99a99b878c89051054429d6a50ccbb3519ae2c3d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/layouts/dashboard.twig", "Dealers/layouts/new-order.twig", 1);
        $this->blocks = array(
            'footer_scripts' => array($this, 'block_footer_scripts'),
            'sidebar' => array($this, 'block_sidebar'),
            'content' => array($this, 'block_content'),
            'order_page_title' => array($this, 'block_order_page_title'),
            'order_form_action' => array($this, 'block_order_form_action'),
            'order_form_type' => array($this, 'block_order_form_type'),
            'order_page_form' => array($this, 'block_order_page_form'),
            'order_table' => array($this, 'block_order_table'),
            'content_footer' => array($this, 'block_content_footer'),
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
  <script src=\"/assets/js/website/new-order.js\"></script>
";
    }

    // line 7
    public function block_sidebar($context, array $blocks = array())
    {
        // line 8
        echo "  ";
        $this->loadTemplate("Dealers/partials/sidebar/dealer.twig", "Dealers/layouts/new-order.twig", 8)->display($context);
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "<div class=\"row align-items-center\">
  <div class=\"col-12\">
    <h1>";
        // line 13
        $this->displayBlock('order_page_title', $context, $blocks);
        echo "</h1>
  </div>
</div>
<div class=\"row\">
  <div class=\"col-12\">
    ";
        // line 18
        $this->loadTemplate("Dealers/partials/order/breadcrumbs.twig", "Dealers/layouts/new-order.twig", 18)->display($context);
        // line 19
        echo "  </div>
</div>
";
        // line 21
        $this->loadTemplate("Dealers/partials/errors.twig", "Dealers/layouts/new-order.twig", 21)->display($context);
        // line 22
        echo "<form action=\"";
        $this->displayBlock('order_form_action', $context, $blocks);
        echo "\" method=\"POST\" id=\"order-form\" class=\"needs-validation\" novalidate ";
        $this->displayBlock('order_form_type', $context, $blocks);
        echo ">
  <input type=\"hidden\" name=\"action\" value=\"\">
  ";
        // line 24
        $this->displayBlock('order_page_form', $context, $blocks);
        // line 25
        echo "  <div class=\"row\">
    <div class=\"";
        // line 26
        if ((isset($context["start"]) || array_key_exists("start", $context))) {
            echo "col-sm-6";
        } else {
            echo "col-sm-4";
        }
        echo "\">
      <button type=\"button\" class=\"btn btn-primary btn-block save-button\" data-action=\"exit\">Save and Exit</button>
    </div>
    ";
        // line 29
        if ( !(isset($context["start"]) || array_key_exists("start", $context))) {
            // line 30
            echo "    <div class=\"col-sm-4\">
      <button type=\"button\" class=\"btn btn-secondary btn-block save-button\" data-action=\"back\">Save and Go Back</button>
    </div>
    ";
        }
        // line 34
        echo "    <div class=\"";
        if ((isset($context["start"]) || array_key_exists("start", $context))) {
            echo "col-sm-6";
        } else {
            echo "col-sm-4";
        }
        echo "\">
      <button type=\"button\" class=\"btn btn-success btn-block save-button\" data-action=\"continue\">Save and Continue</button>
    </div>
  </div>
</form>
<div class=\"row mt-3\">
  <div class=\"col-12\">
    ";
        // line 41
        $this->displayBlock('order_table', $context, $blocks);
        // line 42
        echo "  </div>
</div>
";
        // line 44
        $this->displayBlock('content_footer', $context, $blocks);
    }

    // line 13
    public function block_order_page_title($context, array $blocks = array())
    {
    }

    // line 22
    public function block_order_form_action($context, array $blocks = array())
    {
    }

    public function block_order_form_type($context, array $blocks = array())
    {
    }

    // line 24
    public function block_order_page_form($context, array $blocks = array())
    {
    }

    // line 41
    public function block_order_table($context, array $blocks = array())
    {
    }

    // line 44
    public function block_content_footer($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Dealers/layouts/new-order.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  161 => 44,  156 => 41,  151 => 24,  142 => 22,  137 => 13,  133 => 44,  129 => 42,  127 => 41,  112 => 34,  106 => 30,  104 => 29,  94 => 26,  91 => 25,  89 => 24,  81 => 22,  79 => 21,  75 => 19,  73 => 18,  65 => 13,  61 => 11,  58 => 10,  53 => 8,  50 => 7,  43 => 3,  40 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/layouts/new-order.twig", "/home/dealerportal/public_html/app/Views/Dealers/layouts/new-order.twig");
    }
}
