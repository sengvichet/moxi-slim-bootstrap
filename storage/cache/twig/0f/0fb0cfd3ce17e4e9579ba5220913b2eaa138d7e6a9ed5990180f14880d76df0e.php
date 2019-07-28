<?php

/* Dealers/services/index.twig */
class __TwigTemplate_0895c95cb862cb04924a17ebb55db0ac301e52b5247a25faa115984d25743145 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/layouts/dashboard.twig", "Dealers/services/index.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'sidebar' => array($this, 'block_sidebar'),
            'content' => array($this, 'block_content'),
            'footer_scripts' => array($this, 'block_footer_scripts'),
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
        echo "Services &amp; Billing";
    }

    // line 3
    public function block_sidebar($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        $this->loadTemplate("Dealers/partials/sidebar/dealer.twig", "Dealers/services/index.twig", 4)->display($context);
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "  <h1 class=\"text-center\">Services &amp; Billing</h1>
  <hr>
  <!-- Billing -->
  <div class=\"row\">
    <div class=\"col-sm-2 text-center\">
     <img src=\"/assets/images/services/billing.png\" width=\"75\" height=\"75\" alt=\"Billing\">
    </div>
    <div class=\"col-sm-8\">
      <h2 class=\"text-center\">Billing</h2>
      ";
        // line 16
        if (((isset($context["billing"]) || array_key_exists("billing", $context)) && ($context["billing"] ?? null))) {
            // line 17
            echo "        <ul class=\"list-text\">
          <li><span>Billing:</span> ";
            // line 18
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["billing"] ?? null), "billing_frequency", array())), "html", null, true);
            echo "</li>
          <li><span>Next Bill Date:</span> ";
            // line 19
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["billing"] ?? null), "next_bill_date", array()), "j/n/Y"), "html", null, true);
            echo " </li>
          <li><span>Billing Details:</span> ";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["billing"] ?? null), "billing_details", array()), "html", null, true);
            echo "</li>
          <li><span>Payment Method:</span> ";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["billing"] ?? null), "payment_method", array()), "html", null, true);
            echo "</li>
        </ul>
      ";
        } else {
            // line 24
            echo "        <div class=\"alert alert-danger\">Your billing settings are not defined.</div>
      ";
        }
        // line 26
        echo "      <p class=\"mt-5\">Interested in automated payments?</p>
      <a href=\"mailto:heather@moxximarketing.com\">Email heather@moxximarketing.com for more information!</a>
    </div>
  </div>
  <hr>
  <!-- Website Services -->
  <div class=\"row\">
    <div class=\"col-sm-2 text-center\">
      <img src=\"/assets/images/services/services.png\" width=\"75\" height=\"75\" alt=\"Services\">
    </div>
    <div class=\"col-sm-8\">
      <h2 class=\"text-center\">Services</h2>
      <p class=\"text-center font-italic\">Your Website and Marketing Services via Place1SEO</p>
      <table class=\"table table-borderless\">
        <thead>
          <tr>
            <th class=\"w-50 h3\">Website</th>
            <th class=\"w-50 h3\">Cost Per Quarter:</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Shopping Cart: ";
        // line 48
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array(), "any", false, true), "ecommerce", array(), "any", true, true)) ? (twig_get_attribute($this->env, $this->source, (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["costs"] ?? null), "ecommerce", array()), "options", array())) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array()), "ecommerce", array()) - 1)] ?? null) : null), "title", array())) : ("No")), "html", null, true);
        echo "</td>
            <td>\$";
        // line 49
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array(), "any", false, true), "ecommerce", array(), "any", true, true)) ? (twig_get_attribute($this->env, $this->source, (($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["costs"] ?? null), "ecommerce", array()), "options", array())) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array()), "ecommerce", array()) - 1)] ?? null) : null), "cost", array())) : ("0")), "html", null, true);
        echo " / Quarter</td>
          </tr>
          <tr>
            <td>Pricing: ";
        // line 52
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array(), "any", false, true), "pricing", array(), "any", true, true)) ? (twig_get_attribute($this->env, $this->source, (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["costs"] ?? null), "pricing", array()), "options", array())) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array()), "pricing", array()) - 1)] ?? null) : null), "title", array())) : ("No")), "html", null, true);
        echo "</td>
            <td>\$";
        // line 53
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array(), "any", false, true), "pricing", array(), "any", true, true)) ? (twig_get_attribute($this->env, $this->source, (($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["costs"] ?? null), "pricing", array()), "options", array())) && is_array($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9) || $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 instanceof ArrayAccess ? ($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9[(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array()), "pricing", array()) - 1)] ?? null) : null), "cost", array())) : ("0")), "html", null, true);
        echo " / Quarter</td>
          </tr>
          <tr>
            <td>Showcasing: ";
        // line 56
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array(), "any", false, true), "products", array(), "any", true, true)) ? (twig_get_attribute($this->env, $this->source, (($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["costs"] ?? null), "products", array()), "options", array())) && is_array($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217) || $__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 instanceof ArrayAccess ? ($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217[(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array()), "products", array()) - 1)] ?? null) : null), "title", array())) : ("No")), "html", null, true);
        echo "</td>
            <td>\$";
        // line 57
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array(), "any", false, true), "products", array(), "any", true, true)) ? (twig_get_attribute($this->env, $this->source, (($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["costs"] ?? null), "products", array()), "options", array())) && is_array($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105) || $__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 instanceof ArrayAccess ? ($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105[(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array()), "products", array()) - 1)] ?? null) : null), "cost", array())) : ("0")), "html", null, true);
        echo " / Quarter</td>
          </tr>
          <tr>
            <td>Spec Sheets: ";
        // line 60
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array(), "any", false, true), "specsheets", array(), "any", true, true)) ? (twig_get_attribute($this->env, $this->source, (($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["costs"] ?? null), "specsheets", array()), "options", array())) && is_array($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779) || $__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 instanceof ArrayAccess ? ($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779[(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array()), "specsheets", array()) - 1)] ?? null) : null), "title", array())) : ("No")), "html", null, true);
        echo "</td>
            <td>\$";
        // line 61
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array(), "any", false, true), "specsheets", array(), "any", true, true)) ? (twig_get_attribute($this->env, $this->source, (($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["costs"] ?? null), "specsheets", array()), "options", array())) && is_array($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1) || $__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 instanceof ArrayAccess ? ($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1[(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array()), "specsheets", array()) - 1)] ?? null) : null), "cost", array())) : ("0")), "html", null, true);
        echo " / Quarter</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Google My Business -->
  <div class=\"row\">
    <div class=\"col-sm-2 text-center\">
      <img src=\"/assets/images/services/gmb.png\" width=\"75\" height=\"75\" alt=\"Google My Business\">
    </div>
    <div class=\"col-sm-8\">
      <table class=\"table table-borderless\">
        <thead>
          <tr>
            <th class=\"w-50 h3\" id=\"gmb\">Google My Business</th>
            <th class=\"w-50\"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Subscribed: ";
        // line 82
        echo (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array()), "is_approved", array()))) ? ("Yes") : ("Not Subscribed"));
        echo "</td>
            <td>\$";
        // line 83
        echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array()), "is_approved", array()))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["services"] ?? null), "gmb", array()), "cost", array())) : (0)), "html", null, true);
        echo " / Quarter</td>
          </tr>
          ";
        // line 85
        if (( !twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array(), "any", true, true) ||  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array()), "is_approved", array()))) {
            // line 86
            echo "            <tr>
              <td colspan=\"2\">
                <div class=\"alert alert-turquoise sign-up-alert\" role=\"alert\" data-service=\"gmb\">
                  Interested in Signing up?
                </div>
              </td>
            </tr>
            <tr class=\"sign-up-form\" data-service=\"gmb\" ";
            // line 93
            if ( !twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array(), "any", true, true)) {
                echo "style=\"display: none\"";
            }
            echo ">
              <td colspan=\"2\">
                <form action=\"";
            // line 95
            echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
            echo "\" method=\"POST\">
                  <div class=\"form-row\">
                  <div class=\"form-group col-sm-1\">
                    <label class=\"control-label col-form-label col-form-label-sm\">Yes</label>
                    <input type=\"checkbox\" name=\"subscribed\" class=\"form-control\" ";
            // line 99
            if (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array()), "quarters", array()))) {
                echo "checked";
            }
            echo ">
                  </div>
                  <div class=\"form-group col-sm-3\">
                    <label class=\"control-label col-form-label col-form-label-sm\"># of Quarters</label>
                    <input type=\"number\" name=\"quarters\" class=\"form-control\" min=\"1\"
                    value=\"";
            // line 104
            if (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array()), "quarters", array()))) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array()), "quarters", array()), "html", null, true);
            }
            echo "\"
                    ";
            // line 105
            if ( !((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array()), "quarters", array()))) {
                echo "disabled=\"disabled\"";
            }
            echo ">
                  </div>
                  <div class=\"form-group col-sm-3\">
                    <label class=\"control-label col-form-label col-form-label-sm\">Total Price</label>
                    <input type=\"number\" name=\"total_price\" class=\"form-control\" disabled=\"disabled\" readonly=\"readonly\"
                    value=\"";
            // line 110
            if (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array()), "quarters", array()))) {
                echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array()), "quarters", array()) * twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["services"] ?? null), "gmb", array()), "cost", array())), "html", null, true);
            }
            echo "\">
                  </div>
                  <div class=\"form-group col-sm-3\">
                    <label class=\"control-label col-form-label col-form-label-sm\">&nbsp;</label>
                    <button type=\"submit\" class=\"btn btn-success form-control align-middle\" ";
            // line 114
            if ( !((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "gmb", array()), "quarters", array()))) {
                echo "disabled=\"disabled\"";
            }
            echo ">Submit</button>
                  </div>
                  <div class=\"form-group col-sm-2\">
                    <a href=\"https://place1seo.com/services/google-my-business-portal\" target=\"_blank\">Click here to learn about this service</a>
                  </div>
                  </div>
                </form>
              </td>
            </tr>
          ";
        }
        // line 124
        echo "        </tbody>
      </table>
    </div>
  </div>
  <!-- Local Listings -->
  <div class=\"row\">
    <div class=\"col-sm-2 text-center\">
    </div>
    <div class=\"col-sm-8\">
      <table class=\"table table-borderless\">
        <thead>
          <tr>
            <th class=\"w-50 h3\" id=\"local_listings\">Local Listings</th>
            <th class=\"w-50\"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Subscribed: ";
        // line 142
        echo (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array()), "is_approved", array()))) ? ("Yes") : ("Not Subscribed"));
        echo "</td>
            <td>\$";
        // line 143
        echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array()), "is_approved", array()))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["services"] ?? null), "local_listings", array()), "cost", array())) : (0)), "html", null, true);
        echo " / Quarter</td>
          </tr>
          ";
        // line 145
        if (( !twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array(), "any", true, true) ||  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array()), "is_approved", array()))) {
            // line 146
            echo "            <tr>
              <td colspan=\"2\">
                <div class=\"alert alert-turquoise sign-up-alert\" role=\"alert\" data-service=\"local_listings\">Interested in Signing up?</div>
              </td>
            </tr>
            <tr class=\"sign-up-form\" data-service=\"local_listings\" ";
            // line 151
            if ( !twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array(), "any", true, true)) {
                echo "style=\"display: none\"";
            }
            echo ">
              <td colspan=\"2\">
                <form action=\"";
            // line 153
            echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
            echo "\" method=\"POST\">
                  <div class=\"form-row\">
                  <div class=\"form-group col-sm-1\">
                    <label class=\"control-label col-form-label col-form-label-sm\">Yes</label>
                    <input type=\"checkbox\" name=\"subscribed\" class=\"form-control\" ";
            // line 157
            if (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array()), "quarters", array()))) {
                echo "checked";
            }
            echo ">
                  </div>
                  <div class=\"form-group col-sm-3\">
                    <label class=\"control-label col-form-label col-form-label-sm\"># of Quarters</label>
                    <input type=\"number\" name=\"quarters\" class=\"form-control\" min=\"1\"
                    value=\"";
            // line 162
            if (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array()), "quarters", array()))) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array()), "quarters", array()), "html", null, true);
            }
            echo "\"
                    ";
            // line 163
            if ( !((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array()), "quarters", array()))) {
                echo "disabled=\"disabled\"";
            }
            echo ">
                  </div>
                  <div class=\"form-group col-sm-3\">
                    <label class=\"control-label col-form-label col-form-label-sm\">Total Price</label>
                    <input type=\"number\" name=\"total_price\" class=\"form-control\"
                    disabled=\"disabled\" readonly=\"readonly\"
                    value=\"";
            // line 169
            if (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array()), "quarters", array()))) {
                echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array()), "quarters", array()) * twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["services"] ?? null), "local_listings", array()), "cost", array())), "html", null, true);
            }
            echo "\">
                  </div>
                  <div class=\"form-group col-sm-3\">
                    <label class=\"control-label col-form-label col-form-label-sm\">&nbsp;</label>
                    <button type=\"submit\" class=\"btn btn-success form-control align-middle\" ";
            // line 173
            if ( !((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_listings", array()), "quarters", array()))) {
                echo "disabled=\"disabled\"";
            }
            echo ">Submit</button>
                  </div>
                  <div class=\"form-group col-sm-2\">
                    <a href=\"https://place1seo.com/services/local-listings\" target=\"_blank\">Click here to learn about this service</a>
                  </div>
                  </div>
                </form>
              </td>
            </tr>
          ";
        }
        // line 183
        echo "        </tbody>
      </table>
    </div>
  </div>
  <!-- Social Media -->
  <div class=\"row\">
    <div class=\"col-sm-2 text-center\">
    </div>
    <div class=\"col-sm-8\">
      <table class=\"table table-borderless\">
        <thead>
          <tr>
            <th class=\"w-50 h3\" id=\"social_media\">Social Media</th>
            <th class=\"w-50\"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Subscribed: ";
        // line 201
        echo (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array()), "is_approved", array()))) ? ("Yes") : ("Not Subscribed"));
        echo "</td>
            <td>\$";
        // line 202
        echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array()), "is_approved", array()))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["services"] ?? null), "social_media", array()), "cost", array())) : (0)), "html", null, true);
        echo " / Quarter</td>
          </tr>
          ";
        // line 204
        if (( !twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array(), "any", true, true) ||  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array()), "is_approved", array()))) {
            // line 205
            echo "            <tr>
              <td colspan=\"2\">
                <div class=\"alert alert-turquoise sign-up-alert\" role=\"alert\" data-service=\"social_media\">Interested in Signing up?</div>
              </td>
            </tr>
            <tr class=\"sign-up-form\" data-service=\"social_media\" ";
            // line 210
            if ( !twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array(), "any", true, true)) {
                echo "style=\"display: none\"";
            }
            echo ">
              <td colspan=\"2\">
                <form action=\"";
            // line 212
            echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
            echo "\" method=\"POST\">
                  <div class=\"form-row\">
                  <div class=\"form-group col-sm-1\">
                    <label class=\"control-label col-form-label col-form-label-sm\">Yes</label>
                    <input type=\"checkbox\" name=\"subscribed\" class=\"form-control\" ";
            // line 216
            if (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array()), "quarters", array()))) {
                echo "checked";
            }
            echo ">
                  </div>
                  <div class=\"form-group col-sm-3\">
                    <label class=\"control-label col-form-label col-form-label-sm\"># of Quarters</label>
                    <input type=\"number\" name=\"quarters\" class=\"form-control\" min=\"1\"
                    value=\"";
            // line 221
            if (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array()), "quarters", array()))) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array()), "quarters", array()), "html", null, true);
            }
            echo "\"
                    ";
            // line 222
            if ( !((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array()), "quarters", array()))) {
                echo "disabled=\"disabled\"";
            }
            echo ">
                  </div>
                  <div class=\"form-group col-sm-3\">
                    <label class=\"control-label col-form-label col-form-label-sm\">Total Price</label>
                    <input type=\"number\" name=\"total_price\" class=\"form-control\" disabled=\"disabled\" readonly=\"readonly\"
                    value=\"";
            // line 227
            if (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array()), "quarters", array()))) {
                echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array()), "quarters", array()) * twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["services"] ?? null), "social_media", array()), "cost", array())), "html", null, true);
            }
            echo "\">
                  </div>
                  <div class=\"form-group col-sm-3\">
                    <label class=\"control-label col-form-label col-form-label-sm\">&nbsp;</label>
                    <button type=\"submit\" class=\"btn btn-success form-control align-middle\" ";
            // line 231
            if ( !((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "social_media", array()), "quarters", array()))) {
                echo "disabled=\"disabled\"";
            }
            echo ">Submit</button>
                  </div>
                  <div class=\"form-group col-sm-2\">
                    <a href=\"https://place1seo.com/services/social-media\" target=\"_blank\">Click here to learn about this service</a>
                  </div>
                  </div>
                </form>
              </td>
            </tr>
          ";
        }
        // line 241
        echo "        </tbody>
      </table>
    </div>
  </div>
  <!-- Local Google Ads -->
  <div class=\"row\">
    <div class=\"col-sm-2 text-center\">
    </div>
    <div class=\"col-sm-8\">
      <table class=\"table table-borderless\">
        <thead>
          <tr>
            <th class=\"w-50 h3\" id=\"local_google_ads\">Local Google Ads</th>
            <th class=\"w-50\"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Subscribed: ";
        // line 259
        echo (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array()), "is_approved", array()))) ? ("Yes") : ("Not Subscribed"));
        echo "</td>
            <td>\$";
        // line 260
        echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array()), "is_approved", array()))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["services"] ?? null), "local_google_ads", array()), "cost", array())) : (0)), "html", null, true);
        echo " / Quarter</td>
          </tr>
          ";
        // line 262
        if (( !twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array(), "any", true, true) ||  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array()), "is_approved", array()))) {
            // line 263
            echo "            <tr>
              <td colspan=\"2\">
                <div class=\"alert alert-turquoise sign-up-alert\" role=\"alert\" data-service=\"local_google_ads\">Interested in Signing up?</div>
              </td>
            </tr>
            <tr class=\"sign-up-form\" data-service=\"local_google_ads\" ";
            // line 268
            if ( !twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array(), "any", true, true)) {
                echo "style=\"display: none\"";
            }
            echo ">
              <td colspan=\"2\">
                <form action=\"";
            // line 270
            echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
            echo "\" method=\"POST\">
                  <div class=\"form-row\">
                  <div class=\"form-group col-sm-1\">
                    <label class=\"control-label col-form-label col-form-label-sm\">Yes</label>
                    <input type=\"checkbox\" name=\"subscribed\" class=\"form-control\" ";
            // line 274
            if (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array()), "quarters", array()))) {
                echo "checked";
            }
            echo ">
                  </div>
                  <div class=\"form-group col-sm-3\">
                    <label class=\"control-label col-form-label col-form-label-sm\"># of Quarters</label>
                    <input type=\"number\" name=\"quarters\" class=\"form-control\" min=\"1\"
                    value=\"";
            // line 279
            if (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array()), "quarters", array()))) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array()), "quarters", array()), "html", null, true);
            }
            echo "\"
                    ";
            // line 280
            if ( !((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array()), "quarters", array()))) {
                echo "disabled=\"disabled\"";
            }
            echo ">
                  </div>
                  <div class=\"form-group col-sm-3\">
                    <label class=\"control-label col-form-label col-form-label-sm\">Total Price</label>
                    <input type=\"number\" name=\"total_price\" class=\"form-control\" disabled=\"disabled\" readonly=\"readonly\"
                    value=\"";
            // line 285
            if (((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array()), "quarters", array()))) {
                echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array()), "quarters", array()) * twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["services"] ?? null), "local_google_ads", array()), "cost", array())), "html", null, true);
            }
            echo "\">
                  </div>
                  <div class=\"form-group col-sm-3\">
                    <label class=\"control-label col-form-label col-form-label-sm\">&nbsp;</label>
                    <button type=\"submit\" class=\"btn btn-success form-control align-middle\" ";
            // line 289
            if ( !((twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array(), "any", true, true) &&  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array()), "is_approved", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["subscriptions"] ?? null), "local_google_ads", array()), "quarters", array()))) {
                echo "disabled=\"disabled\"";
            }
            echo ">Submit</button>
                  </div>
                  <div class=\"form-group col-sm-2\">
                    <a href=\"https://place1seo.com/services/local-google-ads\" target=\"_blank\">Click here to learn about this service</a>
                  </div>
                  </div>
                </form>
              </td>
            </tr>
          ";
        }
        // line 299
        echo "          <tr>
            <td>Discretionary Ad Budget: \$500 / month</td>
            <td rowspan=\"2\"><span class=\"font-italic\">**\$450 is a service management fee, your discretionary ad budget (the amount you spend for advertising) will be paid directly to Google via a credit card from your company.</span></td>
          </tr>
          <tr>
            <td>Credit Card for Ad Spend: Ending in xxxx</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- More Services -->
  <div class=\"row\">
    <div class=\"col-sm-2 text-center\">
      <img src=\"/assets/images/services/more.png\" width=\"75\" height=\"75\" alt=\"Interested In More Services?\">
    </div>
    <div class=\"col-sm-8\">
      <h2 class=\"text-center\">Interested In More Services?</h2>
      <p class=\"text-center font-italic\">Let our experts help grow your online presence!</p>
      <ul class=\"list-text\">
        <li><span>Contact Us:</span> <a href=\"mailto:nic@moxximarketing.com\">nic@moxximarketing.com</a></li>
        <li><span>More Information:</span> <a href=\"https://place1seo.com/\">https://place1seo.com/</a></li>
      </ul>
    </div>
  </div>
  <hr>
  <!-- Support -->
  <div class=\"row\">
    <div class=\"col-sm-2 text-center\">
      <img src=\"/assets/images/services/support.png\" width=\"75\" height=\"75\" alt=\"Support\">
    </div>
    <div class=\"col-sm-8\">
      <h2 class=\"text-center\">Support</h2>
      <p class=\"text-center font-italic\">How can we assist you?</p>
      <ul class=\"list-text\">
        <li><span>Troubleshooting:</span> <a href=\"mailto:nic@moxximarketing.com\">nic@moxximarketing.com</a></li>
        <li><span>Billing:</span> <a href=\"mailto:heather@moxximarketing.com\">heather@moxximarketing.com</a></li>
      </ul>
    </div>
  </div>
";
    }

    // line 341
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 342
        echo "  ";
        $this->displayParentBlock("footer_scripts", $context, $blocks);
        echo "
  <script>
    var services = ";
        // line 344
        echo json_encode(($context["services"] ?? null));
        echo ";
  </script>
  <script src=\"/assets/js/sweetalert2.all.min.js\"></script>
  <script src=\"/assets/js/services/index.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "Dealers/services/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  616 => 344,  610 => 342,  607 => 341,  563 => 299,  548 => 289,  539 => 285,  529 => 280,  523 => 279,  513 => 274,  506 => 270,  499 => 268,  492 => 263,  490 => 262,  485 => 260,  481 => 259,  461 => 241,  446 => 231,  437 => 227,  427 => 222,  421 => 221,  411 => 216,  404 => 212,  397 => 210,  390 => 205,  388 => 204,  383 => 202,  379 => 201,  359 => 183,  344 => 173,  335 => 169,  324 => 163,  318 => 162,  308 => 157,  301 => 153,  294 => 151,  287 => 146,  285 => 145,  280 => 143,  276 => 142,  256 => 124,  241 => 114,  232 => 110,  222 => 105,  216 => 104,  206 => 99,  199 => 95,  192 => 93,  183 => 86,  181 => 85,  176 => 83,  172 => 82,  148 => 61,  144 => 60,  138 => 57,  134 => 56,  128 => 53,  124 => 52,  118 => 49,  114 => 48,  90 => 26,  86 => 24,  80 => 21,  76 => 20,  72 => 19,  68 => 18,  65 => 17,  63 => 16,  52 => 7,  49 => 6,  44 => 4,  41 => 3,  35 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/services/index.twig", "C:\\xampp\\htdocs\\moxxi\\app\\Views\\Dealers\\services\\index.twig");
    }
}
