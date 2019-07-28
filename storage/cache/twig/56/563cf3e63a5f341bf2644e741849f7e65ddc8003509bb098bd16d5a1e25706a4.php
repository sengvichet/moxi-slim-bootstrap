<?php

/* Dealers/website/order/update/welcome.twig */
class __TwigTemplate_74866b71b66d9870815f133df980b1f95a9140ede733979b461aa7c919bbd887 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/website/index.twig", "Dealers/website/order/update/welcome.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Dealers/website/index.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "  <div class=\"row mt-3 mb-3\">
    <div class=\"col-12\">
      <h1 class=\"text-center\">Thank you for your website signup.</h1>
      <p>The entire Place1SEO team is looking forward to working with you and your company to develop a website you can be proud of.</p>
      <p>We will begin to communicate with you regarding design, product selection and many other important items, to insure a smooth transition/launch/process. To facilitate the process, I would like to introduce</p>
      <p class=\"h2\">Your team:</p>
      <ul style=\"list-style-type: none\">
        <li>Kari Whittemore, MBA - President</li>
        <li>Nicholas Monette - Project Management and SEM</li>
        <li>Martin Vickery - Graphic design, Social Media and all things visual</li>
        <li>Heather Hubbard - Office Manager</li>
        <li>Devan Cottone - IT, DNS, Email</li>
      </ul>
      <p class=\"h2\">What to expect:</p>
      <ol>
        <li>An annual contract will be sent to you, which needs to be reviewed and signed prior to going live.</li>
        <li>You will receive an invoice for the startup fee which should be paid by the stated due date. You can reschedule your start date if you need more time to review the contract and costs.</li>
        <li>You will receive an estimate which will explain your monthly fees and the start dates.</li>
      </ol>
      <p class=\"h2\">Your next step:</p>
      <ul>
        <li>Make your <a href=\"/products\">inventory selection</a>.</li>
        <li>Add needed <a href=\"/company-profile\">company information</a>.</li>
      </ul>
      <p><a href=\"https://place1seo.com\">You can use this link to schedule an online meeting with Nic</a>, if you have questions or want a walk-through or just reply to this email with any questions! We’re always here to help.</p>
      <p class=\"font-italic\">Sincerely,</p>
      <p class=\"font-italic\">Your friends at Place1SEO</p>
      <a class=\"btn btn-lg btn-block btn-primary\" href=\"/website/order/update/website-package\">Update Order</a>
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "Dealers/website/order/update/welcome.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 4,  39 => 3,  33 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/website/order/update/welcome.twig", "/home/dealerportal/public_html/app/Views/Dealers/website/order/update/welcome.twig");
    }
}
