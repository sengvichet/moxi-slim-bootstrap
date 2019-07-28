<?php

/* Dealers/website/products.twig */
class __TwigTemplate_8c4fedd91eabe31df6e90d7b9d791b7e5965edf60da99b1445b10157f3280b1b extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/layouts/dashboard.twig", "Dealers/website/products.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'sidebar' => array($this, 'block_sidebar'),
            'content' => array($this, 'block_content'),
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
    public function block_title($context, array $blocks = array())
    {
        echo "Dealers Select Products";
    }

    // line 3
    public function block_sidebar($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        $this->loadTemplate("Dealers/partials/sidebar/dealer.twig", "Dealers/website/products.twig", 4)->display($context);
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "  <div class=\"page-header\">
    <h1>Dealer eStore Inventory Selection Tool</h1>
  </div>
  <div class=\"row card\">
    <div class=\"card-header text-white bg-success\">
      <p class=\"card-text\">Below you will find a list of available Vendors to showcase on your eStore website. This tool will allow you the opportunity to hand select the number of products you want on your website. As you select a Vendor the available products for that Vendor will be counted at the top of the screen. Use this tool to design a Vendor selection and product count that works for your monthly budget.</p>
    </div>
    <div class=\"card-body\">
      <div class=\"h3 alert alert-info\">It is <u>VERY IMPORTANT</u> that you <u>save</u> by clicking the button below at least <u>once per hour</u> in order to avoid losing your work.</div>
      <div class=\"row\">
        <div class=\"col-8\">
          <p class=\"h2\">Total # of Products Selected <span id=\"totalproducts\">";
        // line 18
        if ((isset($context["totals"]) || array_key_exists("totals", $context))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["totals"] ?? null), "products", array()), "html", null, true);
        }
        echo "</span></p>
          <p class=\"h2\">Total # of Vendors Selected <span id=\"totalvendors\">";
        // line 19
        if ((isset($context["totals"]) || array_key_exists("totals", $context))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["totals"] ?? null), "vendors", array()), "html", null, true);
        }
        echo "</span></p>
          <div class=\"form-inline h2\">
            <div class=\"form-group\">
              <label for=\"difopt\" style=\"font-weight: normal;\">Which product package did you select?</label>
              <select id=\"difopt\" class=\"form-control\">
                <option value=\"10000\">up-to-10,000</option>
                <option value=\"25000\">10,001-25,000</option>
                <option value=\"50000\">25,001-50,000</option>
              </select>
            </div>
          </div>
          <p class=\"h2\">Difference <span id=\"totaldiff\"></span></p>
        </div>
        <div class=\"col-4 text-center\" id=\"toolsubmit\">
          <img src=\"/assets/images/website/finalize_inventory.png\" alt=\"CLICK HERE When you are ready to finalize your Inventory\" class=\"mw-100\">
        </div>
      </div>
    </div>
  </div>
  <div class=\"row table-title\">
    <div class=\"col-12 text-center\">
      <h2>eStore Product Inventory Selection Tool</h2>
    </div>
  </div>
  <div class=\"row\">
    <table class=\"table table-bordered\">
      <thead>
        <tr>
          <th>Select</th>
          <th>Click on + to See Vendor's Categories</th>
          <th># of Products Available</th>
          <th># of Products Selected</th>
        </tr>
      </thead>
      <tbody id=\"selectdata\">
        ";
        // line 54
        if ((isset($context["products"]) || array_key_exists("products", $context))) {
            echo twig_escape_filter($this->env, ($context["products"] ?? null), "html", null, true);
        }
        // line 55
        echo "      </tbody>
    </table>
  </div>
";
    }

    public function getTemplateName()
    {
        return "Dealers/website/products.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 55,  110 => 54,  70 => 19,  64 => 18,  51 => 7,  48 => 6,  43 => 4,  40 => 3,  34 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/website/products.twig", "/home/dealerportal/public_html/app/Views/Dealers/website/products.twig");
    }
}
