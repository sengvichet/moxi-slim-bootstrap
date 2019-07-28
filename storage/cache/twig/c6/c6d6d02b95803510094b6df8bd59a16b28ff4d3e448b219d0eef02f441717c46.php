<?php

/* Dealers/website/order/start-order.twig */
class __TwigTemplate_4aaa35a48749bb009cd325f535d5c59bcce9f7e0c878ced135793d99728c0d6e extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/website/order/order.twig", "Dealers/website/order/start-order.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'order_page_title' => array($this, 'block_order_page_title'),
            'order_page_top_description' => array($this, 'block_order_page_top_description'),
            'order_buttons' => array($this, 'block_order_buttons'),
            'order_table' => array($this, 'block_order_table'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Dealers/website/order/order.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Let's Get Started";
    }

    // line 3
    public function block_order_page_title($context, array $blocks = array())
    {
        echo "Let's Get Started";
    }

    // line 4
    public function block_order_page_top_description($context, array $blocks = array())
    {
        // line 5
        echo "<h2 class=\"text-center\">Let’s build your website with Place1SEO</h2>
<p class=\"text-center\">The next few pages will determine your cost for our basic website template. You can add on to the package with custom features after you answer a few basic template questions. Click on the “Save and Continue” button to make your selections.</p>
<h2 class=\"text-center\">Get started by answering the following questions:</h2>
<div class=\"row mt-5 mb-3 start-buttons\">
  <div class=\"col-12\">
    <button type=\"button\" class=\"btn btn-success btn-lg btn-block save-button\" data-action=\"continue\">Sign Up Now</button>
  </div>
</div>
";
    }

    // line 14
    public function block_order_buttons($context, array $blocks = array())
    {
    }

    // line 15
    public function block_order_table($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Dealers/website/order/start-order.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 15,  63 => 14,  51 => 5,  48 => 4,  42 => 3,  36 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/website/order/start-order.twig", "/home/dealerportal/public_html/app/Views/Dealers/website/order/start-order.twig");
    }
}
