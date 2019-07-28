<?php

/* Dealers/company-profile/website-information.twig */
class __TwigTemplate_061a1b42ebc1310bf9770f8d6963561547626b71a83c11f65c5c1d1a01738edd extends Twig_Template
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
        echo "<h5 class=\"text-uppercase\">Website Information</h5>
<div class=\"alert alert-info font-weight-bold\">Please fill out as much of this information as possible. If you are unable to provide all of the information requested on this page, please be sure to include contact info for your IT service. We will reach out to them for any information you are unable to provide.</div>
";
        // line 3
        $this->loadTemplate("Dealers/partials/errors.twig", "Dealers/company-profile/website-information.twig", 3)->display($context);
        // line 4
        echo "<form action=\"/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "action", array()), "html", null, true);
        echo "\" method=\"POST\" id=\"website-information-form\" class=\"needs-validation\" novalidate>
  <input type=\"hidden\" name=\"company_id\" value=\"";
        // line 5
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array())) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "id", array()), "html", null, true);
        }
        echo "\">
  <h6>Basic Website Information</h6>
  <!-- Website URL -->
  <div class=\"form-group row\">
    <label for=\"website-url-input\" class=\"col-sm-3 col-form-label\">Website URL</label>
    <div class=\"col-sm-9\">
      <input type=\"url\" id=\"website-url-input\"
        class=\"form-control ";
        // line 12
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "website_url", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"website_url\" placeholder=\"http://website.net\" required
        maxlength=\"";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company", array()), "website", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 15
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "website_url", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "website_url", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "company", array(), "any", false, true), "website", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "website", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 17
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "website_url", array(), "any", true, true)) {
            // line 18
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "website_information", array()), "website_url", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 19
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "      ";
        } else {
            // line 22
            echo "        <div class=\"invalid-feedback\">Hint: try pasting your website link directly from the web browser.</div>
      ";
        }
        // line 24
        echo "    </div>
  </div>
  <!-- Website Name -->
  <div class=\"form-group row\">
    <label for=\"website-name-input\" class=\"col-sm-3 col-form-label\">Name of Website</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"website-name-input\"
        class=\"form-control ";
        // line 31
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "website_name", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"website_name\" placeholder=\"Name of Website\"
        maxlength=\"";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "website_information", array()), "website_name", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 34
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "website_name", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "website_name", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array(), "any", false, true), "website_information", array(), "any", false, true), "name", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array()), "website_information", array()), "name", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 36
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "website_name", array(), "any", true, true)) {
            // line 37
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "website_information", array()), "website_name", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 38
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "      ";
        } else {
            // line 41
            echo "        <div class=\"invalid-feedback\">Please provide a valid website name.</div>
      ";
        }
        // line 43
        echo "    </div>
  </div>
  <!-- Website Phone -->
  <div class=\"form-group row\">
    <label for=\"website-phone-input\" class=\"col-sm-3 col-form-label\">Company Phone</label>
    <div class=\"col-sm-9\">
      <input type=\"tel\" id=\"website-phone-input\"
        class=\"form-control ";
        // line 50
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "website_phone", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"website_phone\" placeholder=\"Company Phone\" required
        maxlength=\"";
        // line 52
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company", array()), "company_phone", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 53
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "website_phone", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "website_phone", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "company", array(), "any", false, true), "phone", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "phone", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 55
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "website_phone", array(), "any", true, true)) {
            // line 56
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "website_information", array()), "website_phone", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 57
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "      ";
        } else {
            // line 60
            echo "        <div class=\"invalid-feedback\">Please provide a valid phone.</div>
      ";
        }
        // line 62
        echo "    </div>
  </div>
  <!-- Website Street -->
  <div class=\"form-group row\">
    <label for=\"website-street-input\" class=\"col-sm-3 col-form-label\">Street Address</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"website-street-input\"
        class=\"form-control ";
        // line 69
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "website_street", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"website_street\" placeholder=\"Street Address\" required
        maxlength=\"";
        // line 71
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company", array()), "street_address", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 72
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "website_street", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "website_street", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "company", array(), "any", false, true), "street", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "street", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 74
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "website_street", array(), "any", true, true)) {
            // line 75
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "website_information", array()), "website_street", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 76
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 78
            echo "      ";
        } else {
            // line 79
            echo "        <div class=\"invalid-feedback\">Please provide a valid street.</div>
      ";
        }
        // line 81
        echo "    </div>
  </div>
  <!-- Website Address Line 2 -->
  <div class=\"form-group row\">
    <label for=\"website-address-line-2-input\" class=\"col-sm-3 col-form-label\">Address Line 2</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"website-address-line-2-input\"
        class=\"form-control ";
        // line 88
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "website_address_line_2", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"website_address_line_2\" placeholder=\"Address Line 2\"
        maxlength=\"";
        // line 90
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company", array()), "address_line_2", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 91
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "website_address_line_2", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "website_address_line_2", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "company", array(), "any", false, true), "address_line_2", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "address_line_2", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 93
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "website_address_line_2", array(), "any", true, true)) {
            // line 94
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "website_information", array()), "website_address_line_2", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 95
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 97
            echo "      ";
        } else {
            // line 98
            echo "        <div class=\"invalid-feedback\">Please provide a valid address.</div>
      ";
        }
        // line 100
        echo "    </div>
  </div>
  <!-- Website City -->
  <div class=\"form-group row\">
    <label for=\"website-city-input\" class=\"col-sm-3 col-form-label\">City</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"website-city-input\"
        class=\"form-control ";
        // line 107
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "city", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"website_city\" placeholder=\"City\" required
        maxlength=\"";
        // line 109
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company", array()), "city", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 110
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "website_city", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "website_city", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "company", array(), "any", false, true), "city", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "city", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 112
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "website_city", array(), "any", true, true)) {
            // line 113
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "website_information", array()), "website_city", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 114
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 116
            echo "      ";
        } else {
            // line 117
            echo "        <div class=\"invalid-feedback\">Please provide a valid city.</div>
      ";
        }
        // line 119
        echo "    </div>
  </div>
  <!-- Website State -->
  <div class=\"form-group row\">
    <label for=\"website-state-input\" class=\"col-sm-3 col-form-label\">State</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"website-state-input\"
        class=\"form-control ";
        // line 126
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "state", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"website_state\" placeholder=\"State\" required
        maxlength=\"";
        // line 128
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company", array()), "state", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 129
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "website_state", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "website_state", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "company", array(), "any", false, true), "state", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "state", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 131
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "website_state", array(), "any", true, true)) {
            // line 132
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "website_information", array()), "website_state", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 133
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 135
            echo "      ";
        } else {
            // line 136
            echo "        <div class=\"invalid-feedback\">Please provide a valid state.</div>
      ";
        }
        // line 138
        echo "    </div>
  </div>
  <!-- Website Zip Code -->
  <div class=\"form-group row\">
    <label for=\"website-zip-input\" class=\"col-sm-3 col-form-label\">Zip Code</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"website-zip-input\"
        class=\"form-control ";
        // line 145
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "zip", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"website_zip\" placeholder=\"Zip Code\" required
        maxlength=\"";
        // line 147
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company", array()), "zip_code", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 148
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "website_zip", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "website_zip", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "company", array(), "any", false, true), "zip", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "zip", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 150
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "website_zip", array(), "any", true, true)) {
            // line 151
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "website_information", array()), "website_zip", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 152
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 154
            echo "      ";
        } else {
            // line 155
            echo "        <div class=\"invalid-feedback\">Please provide a valid zip code.</div>
      ";
        }
        // line 157
        echo "    </div>
  </div>
  <!-- Website Email -->
  <div class=\"form-group row\">
    <label for=\"website-email-input\" class=\"col-sm-3 col-form-label\">Email To Be Displayed On The Website</label>
    <div class=\"col-sm-9\">
      <input type=\"email\" id=\"website-email-input\"
        class=\"form-control ";
        // line 164
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "website_email", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"website_email\" placeholder=\"Email To Be Displayed On The Website\"
        maxlength=\"";
        // line 166
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "website_information", array()), "website_email", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 167
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "website_email", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "website_email", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array(), "any", false, true), "website_information", array(), "any", false, true), "email", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array()), "website_information", array()), "email", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 169
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_information", array(), "any", false, true), "website_email", array(), "any", true, true)) {
            // line 170
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "website_information", array()), "website_email", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 171
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 173
            echo "      ";
        } else {
            // line 174
            echo "        <div class=\"invalid-feedback\">Please provide a valid email.</div>
      ";
        }
        // line 176
        echo "    </div>
  </div>
  <!-- Contact Information For IT -->
  <div class=\"form-group row\">
    <label for=\"email-email-input\" class=\"col-sm-3 col-form-label\">
      Contact Information For IT
    </label>
    <div class=\"col-sm-9\">
      <a href=\"javascript:void(0);\" class=\"font-italic\" id=\"add-contact-information-link\">Add Contact Information</a>
      <p class=\"font-italic\">(You will be directed to Business Information tab to add IT to Additional Key Personnel list. Both in-house and external IT contact info acceptable.)</p>
    </div>
  </div>
  <!-- Contact IT -->
  ";
        // line 207
        echo "  <h6>Website Emailing Information</h6>
  <!-- Email Host -->
  <div class=\"form-group row\">
    <label for=\"email-host-select\" class=\"col-sm-3 col-form-label\">Email Host</label>
    <div class=\"col-sm-9\">
      <select id=\"email-host-select\" name=\"email_host\"
        class=\"form-control ";
        // line 213
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "email_information", array(), "any", false, true), "email_host", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\">
          <!-- option Outlook -->
          <option value=\"outlook\"
          ";
        // line 216
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "email_host", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 217
($context["messages"] ?? null), "input", array()), "email_host", array()) == "outlook"))) {
            echo "selected";
        } else {
            // line 218
            echo "          ";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array(), "any", false, true), "email_information", array(), "any", false, true), "host", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 219
($context["website_information"] ?? null), "data", array()), "email_information", array()), "host", array()) == "outlook"))) {
                echo "selected";
            }
        }
        echo ">Outlook 365</option>
          <!-- option Gmail -->
          <option value=\"gmail\"
          ";
        // line 222
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "email_host", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 223
($context["messages"] ?? null), "input", array()), "email_host", array()) == "gmail"))) {
            echo "selected";
        } else {
            // line 224
            echo "          ";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array(), "any", false, true), "email_information", array(), "any", false, true), "host", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 225
($context["website_information"] ?? null), "data", array()), "email_information", array()), "host", array()) == "gmail"))) {
                echo "selected";
            }
        }
        echo ">Gmail</option>
          <!-- option other -->
          <option value=\"other\"
          ";
        // line 228
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "email_host", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 229
($context["messages"] ?? null), "input", array()), "email_host", array()) == "other"))) {
            echo "selected";
        } else {
            // line 230
            echo "          ";
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array(), "any", false, true), "email_information", array(), "any", false, true), "host", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 231
($context["website_information"] ?? null), "data", array()), "email_information", array()), "host", array()) == "other"))) {
                echo "selected";
            }
        }
        echo ">Other</option>
        </select>
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 234
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "email_information", array(), "any", false, true), "email_host", array(), "any", true, true)) {
            // line 235
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "email_information", array()), "email_host", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 236
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 238
            echo "      ";
        } else {
            // line 239
            echo "        <div class=\"invalid-feedback\">Please provide a valid email host.</div>
      ";
        }
        // line 241
        echo "    </div>
  </div>
  <!-- Email Login -->
  <div class=\"form-group row\">
    <label for=\"email-login-input\" class=\"col-sm-3 col-form-label\">Email Login</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"email-login-input\"
        class=\"form-control ";
        // line 248
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "email_information", array(), "any", false, true), "email_login", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"email_login\" placeholder=\"Email Login\"
        maxlength=\"";
        // line 250
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "email_information", array()), "email_login", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 251
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "email_login", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "email_login", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array(), "any", false, true), "email_information", array(), "any", false, true), "login", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array()), "email_information", array()), "login", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 253
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "email_information", array(), "any", false, true), "email_login", array(), "any", true, true)) {
            // line 254
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "email_information", array()), "email_login", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 255
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 257
            echo "      ";
        } else {
            // line 258
            echo "        <div class=\"invalid-feedback\">Please provide a valid email login.</div>
      ";
        }
        // line 260
        echo "    </div>
  </div>
  <!-- Email Password -->
  <div class=\"form-group row\">
    <label for=\"email-password-input\" class=\"col-sm-3 col-form-label\">Password</label>
    <div class=\"col-sm-9\">
      <input type=\"password\" id=\"email-password-input\"
        class=\"form-control ";
        // line 267
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "email_information", array(), "any", false, true), "email_password", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"email_password\" placeholder=\"Email Password\"
        maxlength=\"";
        // line 269
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "email_information", array()), "email_password", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 270
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "email_password", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "email_password", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array(), "any", false, true), "email_information", array(), "any", false, true), "password", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array()), "email_information", array()), "password", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 272
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "email_information", array(), "any", false, true), "email_password", array(), "any", true, true)) {
            // line 273
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "email_information", array()), "email_password", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 274
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 276
            echo "      ";
        } else {
            // line 277
            echo "        <div class=\"invalid-feedback\">Please provide a valid email password.</div>
      ";
        }
        // line 279
        echo "    </div>
  </div>
  <!-- Email Email -->
  <div class=\"form-group row\">
    <label for=\"email-email-input\" class=\"col-sm-3 col-form-label\">
      Email Address To Send From<br>
      <span class=\"font-italic\">(If different from login email above)</span>
    </label>
    <div class=\"col-sm-9\">
      <input type=\"email\" id=\"email-email-input\"
        class=\"form-control ";
        // line 289
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "email_information", array(), "any", false, true), "email_email", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"email_email\" placeholder=\"Email Address To Send From\"
        maxlength=\"";
        // line 291
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "email_information", array()), "email_email", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 292
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "email_email", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "email_email", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array(), "any", false, true), "email_information", array(), "any", false, true), "email", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array()), "email_information", array()), "email", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 294
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "email_information", array(), "any", false, true), "email_email", array(), "any", true, true)) {
            // line 295
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "email_information", array()), "email_email", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 296
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 298
            echo "      ";
        } else {
            // line 299
            echo "        <div class=\"invalid-feedback\">Please provide a valid email.</div>
      ";
        }
        // line 301
        echo "    </div>
  </div>
  <!-- Email Port (optional) -->
  <div class=\"form-group row\" id=\"email-port-block\" style=\"display: none\">
    <label for=\"email-port-input\" class=\"col-sm-3 col-form-label\">Port</label>
    <div class=\"col-sm-9\">
      <input type=\"number\" id=\"email-port-input\"
        class=\"form-control ";
        // line 308
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "email_information", array(), "any", false, true), "email_port", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"email_port\" placeholder=\"Port\"
        maxlength=\"";
        // line 310
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "email_information", array()), "email_port", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 311
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "email_port", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "email_port", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array(), "any", false, true), "email_information", array(), "any", false, true), "port", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array()), "email_information", array()), "port", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 313
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "email_information", array(), "any", false, true), "email_port", array(), "any", true, true)) {
            // line 314
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "email_information", array()), "email_port", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 315
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 317
            echo "      ";
        } else {
            // line 318
            echo "        <div class=\"invalid-feedback\">Please provide a valid mailing port.</div>
      ";
        }
        // line 320
        echo "    </div>
  </div>
  <!-- Email Protocol (optional) -->
  <div class=\"form-group row\" id=\"email-protocol-block\" style=\"display: none\">
    <label for=\"email-protocol-input\" class=\"col-sm-3 col-form-label\">Protocol</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"email-protocol-input\"
        class=\"form-control ";
        // line 327
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "email_information", array(), "any", false, true), "email_protocol", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"email_protocol\" placeholder=\"Protocol\"
        maxlength=\"";
        // line 329
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "email_information", array()), "email_protocol", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 330
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "email_protocol", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "email_protocol", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array(), "any", false, true), "email_information", array(), "any", false, true), "protocol", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array()), "email_information", array()), "protocol", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 332
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "email_information", array(), "any", false, true), "email_protocol", array(), "any", true, true)) {
            // line 333
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "email_information", array()), "email_protocol", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 334
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 336
            echo "      ";
        } else {
            // line 337
            echo "        <div class=\"invalid-feedback\">Please provide a valid mailing protocol.</div>
      ";
        }
        // line 339
        echo "    </div>
  </div>
  <h6>For Newsletters (Mailchimp)</h6>
  <!-- Mailchimp API Key -->
  <div class=\"form-group row\">
    <label for=\"newsletters-api-key-input\" class=\"col-sm-3 col-form-label\">API Key</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"newsletters-api-key-input\"
        class=\"form-control ";
        // line 347
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "newsletters", array(), "any", false, true), "mailchimp_api_key", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"mailchimp_api_key\" placeholder=\"API Key\"
        maxlength=\"";
        // line 349
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "newsletters", array()), "mailchimp_api_key", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 350
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "mailchimp_api_key", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "mailchimp_api_key", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array(), "any", false, true), "newsletters", array(), "any", false, true), "api_key", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array()), "newsletters", array()), "api_key", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 352
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "newsletters", array(), "any", false, true), "mailchimp_api_key", array(), "any", true, true)) {
            // line 353
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "newsletters", array()), "mailchimp_api_key", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 354
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 356
            echo "      ";
        } else {
            // line 357
            echo "        <div class=\"invalid-feedback\">Please provide a valid API Key.</div>
      ";
        }
        // line 359
        echo "    </div>
  </div>
  <!-- Mailchimp List -->
  <div class=\"form-group row\">
    <label for=\"newsletters-mailchimp-list-input\" class=\"col-sm-3 col-form-label\">Mail Chimp List</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"newsletters-mailchimp-list-input\"
        class=\"form-control ";
        // line 366
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "newsletters", array(), "any", false, true), "mailchimp_list", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"mailchimp_list\" placeholder=\"Mail Chimp List\"
        maxlength=\"";
        // line 368
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "newsletters", array()), "mailchimp_list", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 369
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "mailchimp_list", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "mailchimp_list", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array(), "any", false, true), "newsletters", array(), "any", false, true), "list", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array()), "newsletters", array()), "list", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 371
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "newsletters", array(), "any", false, true), "mailchimp_list", array(), "any", true, true)) {
            // line 372
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "newsletters", array()), "mailchimp_list", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 373
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 375
            echo "      ";
        } else {
            // line 376
            echo "        <div class=\"invalid-feedback\">Please provide a valid Mail Chimp list.</div>
      ";
        }
        // line 378
        echo "    </div>
  </div>
  <h6>Information Needed To Go Live With Website</h6>
  <!-- Contact My IT Specialist -->
  <div class=\"form-group row\">
    <label for=\"need-contact-input\" class=\"col-sm-3 col-form-label\">Contact My IT Specialist</label>
    <div class=\"col-sm-9 d-flex align-items-center\">
      <input type=\"checkbox\" id=\"need-contact-input\" name=\"live_need_contact\"
        class=\"";
        // line 386
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_live_information", array(), "any", false, true), "live_need_contact", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        ";
        // line 387
        if ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "live_need_contact", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "live_need_contact", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo "checked";
        } else {
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array(), "any", false, true), "website_live_information", array(), "any", false, true), "need_contact_it", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array()), "website_live_information", array()), "need_contact_it", array()))) {
                echo "checked";
            }
        }
        echo " value=\"1\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 389
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_live_information", array(), "any", false, true), "live_need_contact", array(), "any", true, true)) {
            // line 390
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "website_live_information", array()), "live_need_contact", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 391
                echo "          <div class=\"invalid-feedback\" style=\"display: block\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 393
            echo "      ";
        } else {
            // line 394
            echo "        <div class=\"invalid-feedback\">Please check or uncheck the checkbox.</div>
      ";
        }
        // line 396
        echo "    </div>
  </div>
  <!-- Domain Host -->
  <div class=\"form-group row\">
    <label for=\"live-domain-host-input\" class=\"col-sm-3 col-form-label\">Domain Host</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"live-domain-host-input\"
        class=\"form-control ";
        // line 403
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_live_information", array(), "any", false, true), "live_domain_host", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"live_domain_host\" placeholder=\"Domain Host\"
        maxlength=\"";
        // line 405
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "website_live_information", array()), "live_domain_host", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 406
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "live_domain_host", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "live_domain_host", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array(), "any", false, true), "website_live_information", array(), "any", false, true), "domain_host", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array()), "website_live_information", array()), "domain_host", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 408
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_live_information", array(), "any", false, true), "live_domain_host", array(), "any", true, true)) {
            // line 409
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "website_live_information", array()), "live_domain_host", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 410
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 412
            echo "      ";
        } else {
            // line 413
            echo "        <div class=\"invalid-feedback\">Please provide a valid domain host.</div>
      ";
        }
        // line 415
        echo "    </div>
  </div>
  <!-- Username -->
  <div class=\"form-group row\">
    <label for=\"live-username-input\" class=\"col-sm-3 col-form-label\">Username/Email/Customer ID</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"live-username-input\"
        class=\"form-control ";
        // line 422
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_live_information", array(), "any", false, true), "live_website_username", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"live_website_username\" placeholder=\"Username/Email/Customer ID\"
        maxlength=\"";
        // line 424
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "website_live_information", array()), "live_website_username", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 425
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "live_website_username", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "live_website_username", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array(), "any", false, true), "website_live_information", array(), "any", false, true), "username", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array()), "website_live_information", array()), "username", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 427
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_live_information", array(), "any", false, true), "live_website_username", array(), "any", true, true)) {
            // line 428
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "website_live_information", array()), "live_website_username", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 429
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 431
            echo "      ";
        } else {
            // line 432
            echo "        <div class=\"invalid-feedback\">Please provide a valid username/email/customer ID.</div>
      ";
        }
        // line 434
        echo "    </div>
  </div>
  <!-- Password -->
  <div class=\"form-group row\">
    <label for=\"live-password-input\" class=\"col-sm-3 col-form-label\">Password</label>
    <div class=\"col-sm-9\">
      <input type=\"password\" id=\"live-password-input\" name=\"live_website_password\"
        class=\"form-control ";
        // line 441
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_live_information", array(), "any", false, true), "live_website_password", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        maxlength=\"";
        // line 442
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "website_live_information", array()), "live_website_password", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 443
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "live_website_password", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "live_website_password", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array(), "any", false, true), "website_live_information", array(), "any", false, true), "password", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["website_information"] ?? null), "data", array()), "website_live_information", array()), "password", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 445
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "website_live_information", array(), "any", false, true), "live_website_password", array(), "any", true, true)) {
            // line 446
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "website_live_information", array()), "live_website_password", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 447
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 449
            echo "      ";
        } else {
            // line 450
            echo "        <div class=\"invalid-feedback\">Please provide a valid password.</div>
      ";
        }
        // line 452
        echo "    </div>
  </div>
  <!-- Button -->
  <div class=\"row\">
    <div class=\"col-12\">
      <button type=\"submit\" class=\"btn btn-primary btn-sm\">Submit</button>
    </div>
  </div>
</form>";
    }

    public function getTemplateName()
    {
        return "Dealers/company-profile/website-information.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1218 => 452,  1214 => 450,  1211 => 449,  1202 => 447,  1197 => 446,  1195 => 445,  1184 => 443,  1180 => 442,  1174 => 441,  1165 => 434,  1161 => 432,  1158 => 431,  1149 => 429,  1144 => 428,  1142 => 427,  1131 => 425,  1127 => 424,  1120 => 422,  1111 => 415,  1107 => 413,  1104 => 412,  1095 => 410,  1090 => 409,  1088 => 408,  1077 => 406,  1073 => 405,  1066 => 403,  1057 => 396,  1053 => 394,  1050 => 393,  1041 => 391,  1036 => 390,  1034 => 389,  1023 => 387,  1017 => 386,  1007 => 378,  1003 => 376,  1000 => 375,  991 => 373,  986 => 372,  984 => 371,  973 => 369,  969 => 368,  962 => 366,  953 => 359,  949 => 357,  946 => 356,  937 => 354,  932 => 353,  930 => 352,  919 => 350,  915 => 349,  908 => 347,  898 => 339,  894 => 337,  891 => 336,  882 => 334,  877 => 333,  875 => 332,  864 => 330,  860 => 329,  853 => 327,  844 => 320,  840 => 318,  837 => 317,  828 => 315,  823 => 314,  821 => 313,  810 => 311,  806 => 310,  799 => 308,  790 => 301,  786 => 299,  783 => 298,  774 => 296,  769 => 295,  767 => 294,  756 => 292,  752 => 291,  745 => 289,  733 => 279,  729 => 277,  726 => 276,  717 => 274,  712 => 273,  710 => 272,  699 => 270,  695 => 269,  688 => 267,  679 => 260,  675 => 258,  672 => 257,  663 => 255,  658 => 254,  656 => 253,  645 => 251,  641 => 250,  634 => 248,  625 => 241,  621 => 239,  618 => 238,  609 => 236,  604 => 235,  602 => 234,  593 => 231,  591 => 230,  587 => 229,  586 => 228,  577 => 225,  575 => 224,  571 => 223,  570 => 222,  561 => 219,  559 => 218,  555 => 217,  554 => 216,  546 => 213,  538 => 207,  523 => 176,  519 => 174,  516 => 173,  507 => 171,  502 => 170,  500 => 169,  489 => 167,  485 => 166,  478 => 164,  469 => 157,  465 => 155,  462 => 154,  453 => 152,  448 => 151,  446 => 150,  435 => 148,  431 => 147,  424 => 145,  415 => 138,  411 => 136,  408 => 135,  399 => 133,  394 => 132,  392 => 131,  381 => 129,  377 => 128,  370 => 126,  361 => 119,  357 => 117,  354 => 116,  345 => 114,  340 => 113,  338 => 112,  327 => 110,  323 => 109,  316 => 107,  307 => 100,  303 => 98,  300 => 97,  291 => 95,  286 => 94,  284 => 93,  273 => 91,  269 => 90,  262 => 88,  253 => 81,  249 => 79,  246 => 78,  237 => 76,  232 => 75,  230 => 74,  219 => 72,  215 => 71,  208 => 69,  199 => 62,  195 => 60,  192 => 59,  183 => 57,  178 => 56,  176 => 55,  165 => 53,  161 => 52,  154 => 50,  145 => 43,  141 => 41,  138 => 40,  129 => 38,  124 => 37,  122 => 36,  111 => 34,  107 => 33,  100 => 31,  91 => 24,  87 => 22,  84 => 21,  75 => 19,  70 => 18,  68 => 17,  57 => 15,  53 => 14,  46 => 12,  34 => 5,  29 => 4,  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/company-profile/website-information.twig", "/home/dealerportal/public_html/app/Views/Dealers/company-profile/website-information.twig");
    }
}
