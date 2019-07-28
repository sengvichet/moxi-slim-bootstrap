<?php

/* Dealers/company-profile/contact-information.twig */
class __TwigTemplate_dfc9f686ad6b59fb328896a0c12e34981f6aecea0eecae0d2387cb815aa60d74 extends Twig_Template
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
        echo "<h5 class=\"text-uppercase\">Business Information</h5>
";
        // line 2
        $this->loadTemplate("Dealers/partials/errors.twig", "Dealers/company-profile/contact-information.twig", 2)->display($context);
        // line 3
        echo "<form action=\"/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "action", array()), "html", null, true);
        echo "\" method=\"POST\" id=\"contact-information-form\" class=\"needs-validation\" novalidate>
  <input type=\"hidden\" name=\"company_id\" value=\"";
        // line 4
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array())) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "id", array()), "html", null, true);
        }
        echo "\">
  <div class=\"form-group row\">
    <label for=\"business-name-input\" class=\"col-sm-3 col-form-label\">Business Name</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"business-name-input\"
        class=\"form-control ";
        // line 9
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "business_name", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"business_name\" placeholder=\"Business Name\" required
        maxlength=\"";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company", array()), "business_name", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 12
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "business_name", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "business_name", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array())) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "business_name", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 14
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "business_name", array(), "any", true, true)) {
            // line 15
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "company", array()), "business_name", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 16
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "      ";
        } else {
            // line 19
            echo "        <div class=\"invalid-feedback\">Please provide a valid business name.</div>
      ";
        }
        // line 21
        echo "    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"brand-name-input\" class=\"col-sm-3 col-form-label\">Brand Name</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"brand-name-input\"
        class=\"form-control ";
        // line 27
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "brand_name", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"brand_name\" placeholder=\"Brand Name\" required
        maxlength=\"";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company", array()), "brand_name", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 30
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "brand_name", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "brand_name", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "company", array(), "any", false, true), "brand_name", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "brand_name", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 32
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "brand_name", array(), "any", true, true)) {
            // line 33
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "company", array()), "brand_name", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 34
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            echo "      ";
        } else {
            // line 37
            echo "        <div class=\"invalid-feedback\">Please provide a valid brand name.</div>
      ";
        }
        // line 39
        echo "    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"categories-input\" class=\"col-sm-3 col-form-label\">Service Categories</label>
    <div class=\"col-sm-9\">
      <select id=\"categories-input\" data-role=\"tagsinput\" multiple>
        ";
        // line 45
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "categories", array(), "any", true, true)) {
            // line 46
            echo "          ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "categories", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 47
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "title", array()), "html", null, true);
                echo "</option>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "        ";
        }
        // line 50
        echo "      </select>
      <input type=\"hidden\" name=\"categories\" value=\"\">
    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"opening-date-input\" class=\"col-sm-3 col-form-label\">Opening Date</label>
    <div class=\"col-sm-9\">
      <input type=\"date\" id=\"opening-date-input\" name=\"opening_date\"
        class=\"form-control ";
        // line 58
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "opening_date", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        value=\"";
        // line 59
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "opening_date", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "opening_date", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "company", array(), "any", false, true), "opening_date", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "opening_date", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 61
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "opening_date", array(), "any", true, true)) {
            // line 62
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "company", array()), "opening_date", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 63
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "      ";
        } else {
            // line 66
            echo "        <div class=\"invalid-feedback\">Please provide a valid opening date.</div>
      ";
        }
        // line 68
        echo "    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"street-address-input\" class=\"col-sm-3 col-form-label\">Street Address</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"street-address-input\"
        class=\"form-control ";
        // line 74
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "street_address", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"street_address\" placeholder=\"Street Address\" required
        maxlength=\"";
        // line 76
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company", array()), "street_address", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 77
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "street_address", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "street_address", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array())) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "street", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 79
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "street_address", array(), "any", true, true)) {
            // line 80
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "company", array()), "street_address", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 81
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 83
            echo "      ";
        } else {
            // line 84
            echo "        <div class=\"invalid-feedback\">Please provide a valid street.</div>
      ";
        }
        // line 86
        echo "    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"street-address-input\" class=\"col-sm-3 col-form-label\">Address Line 2</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"address-line-2-input\"
        class=\"form-control ";
        // line 92
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "address_line_2", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"address_line_2\" placeholder=\"Address Line 2\"
        maxlength=\"";
        // line 94
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company", array()), "address_line_2", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 95
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "address_line_2", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "address_line_2", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array())) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "address_line_2", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 97
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "address_line_2", array(), "any", true, true)) {
            // line 98
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "company", array()), "address_line_2", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 99
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 101
            echo "      ";
        } else {
            // line 102
            echo "        <div class=\"invalid-feedback\">Please provide a valid address line 2.</div>
      ";
        }
        // line 104
        echo "    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"city-input\" class=\"col-sm-3 col-form-label\">City</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"city-input\" name=\"city\"
        class=\"form-control ";
        // line 110
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "city", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        placeholder=\"City\" required maxlength=\"";
        // line 111
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company", array()), "city", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 112
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "city", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "city", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array())) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "city", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 114
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "city", array(), "any", true, true)) {
            // line 115
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "company", array()), "city", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 116
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 118
            echo "      ";
        } else {
            // line 119
            echo "        <div class=\"invalid-feedback\">Please provide a valid city.</div>
      ";
        }
        // line 121
        echo "    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"state-input\" class=\"col-sm-3 col-form-label\">State</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"state-input\" name=\"state\"
        class=\"form-control ";
        // line 127
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "state", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        placeholder=\"State\" required maxlength=\"";
        // line 128
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company", array()), "state", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 129
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "state", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "state", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array())) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "state", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 131
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "state", array(), "any", true, true)) {
            // line 132
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "company", array()), "state", array()));
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
  <div class=\"form-group row\">
    <label for=\"zip-code-input\" class=\"col-sm-3 col-form-label\">Zip Code</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"zip-code-input\" name=\"zip_code\"
        class=\"form-control ";
        // line 144
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "zip_code", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        placeholder=\"\" required maxlength=\"";
        // line 145
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company", array()), "zip_code", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 146
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "zip_code", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "zip_code", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array())) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "zip", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 148
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "zip_code", array(), "any", true, true)) {
            // line 149
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "company", array()), "zip_code", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 150
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 152
            echo "      ";
        } else {
            // line 153
            echo "        <div class=\"invalid-feedback\">Please provide a valid zip code.</div>
      ";
        }
        // line 155
        echo "    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"website-input\" class=\"col-sm-3 col-form-label\">Website URL</label>
    <div class=\"col-sm-9\">
      <input type=\"url\" id=\"website-input\" name=\"website\"
        class=\"form-control ";
        // line 161
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "website", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        placeholder=\"http://website.net\" required maxlength=\"";
        // line 162
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company", array()), "website", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 163
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "website", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "website", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array())) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "website", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 165
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "website", array(), "any", true, true)) {
            // line 166
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "company", array()), "website", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 167
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 169
            echo "      ";
        } else {
            // line 170
            echo "        <div class=\"invalid-feedback\">Hint: try pasting your website link directly from the web browser.</div>
      ";
        }
        // line 172
        echo "    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"company-phone-input\" class=\"col-sm-3 col-form-label\">Company Phone</label>
    <div class=\"col-sm-9\">
      <input type=\"tel\" id=\"company-phone-input\" name=\"company_phone\"
      class=\"form-control ";
        // line 178
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "company_phone", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
      placeholder=\"\" required maxlength=\"";
        // line 179
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company", array()), "company_phone", array()), "max_length", array()), "html", null, true);
        echo "\"
      value=\"";
        // line 180
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "company_phone", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "company_phone", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array())) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "phone", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 182
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "company_phone", array(), "any", true, true)) {
            // line 183
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "company", array()), "company_phone", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 184
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 186
            echo "      ";
        } else {
            // line 187
            echo "        <div class=\"invalid-feedback\">Please provide a valid phone.</div>
      ";
        }
        // line 189
        echo "    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"company-email-input\" class=\"col-sm-3 col-form-label\">Company Email</label>
    <div class=\"col-sm-9\">
      <input type=\"email\" id=\"company-email-input\" name=\"company_email\"
        class=\"form-control ";
        // line 195
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "company_email", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        placeholder=\"company@email.net\" required
        value=\"";
        // line 197
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "company_email", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "company_email", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array())) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "email", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 199
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "company", array(), "any", false, true), "company_email", array(), "any", true, true)) {
            // line 200
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "company", array()), "company_email", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 201
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 203
            echo "      ";
        } else {
            // line 204
            echo "        <div class=\"invalid-feedback\">Please provide a valid email.</div>
      ";
        }
        // line 206
        echo "    </div>
  </div>
  <h6 class=\"font-italic\">Primary Company Contact:</h6>
  <input type=\"hidden\" name=\"primary_contact_id\" value=\"";
        // line 209
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "contacts", array(), "any", false, true), "primary", array(), "any", false, true), 0, array(), "array", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "contacts", array()), "primary", array())) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[0] ?? null) : null), "id", array()), "html", null, true);
        }
        echo "\">
  <div class=\"form-group row\">
    <label for=\"primary-contact-first-name-input\" class=\"col-sm-3 col-form-label\">First Name</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"primary-contact-first-name-input\"
        class=\"form-control ";
        // line 214
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "primary_contact", array(), "any", false, true), "primary_contact_first_name", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"primary_contact_first_name\" placeholder=\"First Name\" required
        maxlength=\"";
        // line 216
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "contact", array()), "primary_contact_first_name", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 217
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "primary_contact_first_name", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "primary_contact_first_name", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "contacts", array(), "any", false, true), "primary", array(), "any", false, true), 0, array(), "array", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "contacts", array()), "primary", array())) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[0] ?? null) : null), "first_name", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 219
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "primary_contact", array(), "any", false, true), "primary_contact_first_name", array(), "any", true, true)) {
            // line 220
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "primary_contact", array()), "primary_contact_first_name", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 221
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 223
            echo "      ";
        } else {
            // line 224
            echo "        <div class=\"invalid-feedback\">Please provide a valid first name.</div>
      ";
        }
        // line 226
        echo "    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"primary-contact-last-name-input\" class=\"col-sm-3 col-form-label\">Last Name</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"primary-contact-last-name-input\"
        class=\"form-control ";
        // line 232
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "primary_contact", array(), "any", false, true), "primary_contact_last_name", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
      name=\"primary_contact_last_name\" placeholder=\"Last Name\" required
      maxlength=\"";
        // line 234
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "contact", array()), "primary_contact_last_name", array()), "max_length", array()), "html", null, true);
        echo "\"
      value=\"";
        // line 235
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "primary_contact_last_name", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "primary_contact_last_name", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "contacts", array(), "any", false, true), "primary", array(), "any", false, true), 0, array(), "array", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "contacts", array()), "primary", array())) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[0] ?? null) : null), "last_name", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 237
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "primary_contact", array(), "any", false, true), "primary_contact_last_name", array(), "any", true, true)) {
            // line 238
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "primary_contact", array()), "primary_contact_last_name", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 239
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 241
            echo "      ";
        } else {
            // line 242
            echo "        <div class=\"invalid-feedback\">Please provide a valid last name.</div>
      ";
        }
        // line 244
        echo "    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"primary-contact-position-input\" class=\"col-sm-3 col-form-label\">Position</label>
    <div class=\"col-sm-9\">
      <input type=\"text\" id=\"primary-contact-position-input\"
        class=\"form-control ";
        // line 250
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "primary_contact", array(), "any", false, true), "primary_contact_position", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"primary_contact_position\" placeholder=\"Position\" required
        maxlength=\"";
        // line 252
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "contact", array()), "primary_contact_position", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 253
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "primary_contact_position", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "primary_contact_position", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "contacts", array(), "any", false, true), "primary", array(), "any", false, true), 0, array(), "array", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "contacts", array()), "primary", array())) && is_array($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9) || $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 instanceof ArrayAccess ? ($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9[0] ?? null) : null), "position", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 255
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "primary_contact", array(), "any", false, true), "primary_contact_position", array(), "any", true, true)) {
            // line 256
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "primary_contact", array()), "primary_contact_position", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 257
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 259
            echo "      ";
        } else {
            // line 260
            echo "        <div class=\"invalid-feedback\">Please provide a valid position.</div>
      ";
        }
        // line 262
        echo "    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"primary-contact-email-input\" class=\"col-sm-3 col-form-label\">Email</label>
    <div class=\"col-sm-9\">
      <input type=\"email\" id=\"primary-contact-email-input\"
        class=\"form-control ";
        // line 268
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "primary_contact", array(), "any", false, true), "primary_contact_email", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"primary_contact_email\" placeholder=\"primary@email.net\" required
        value=\"";
        // line 270
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "primary_contact_email", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "primary_contact_email", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "contacts", array(), "any", false, true), "primary", array(), "any", false, true), 0, array(), "array", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "contacts", array()), "primary", array())) && is_array($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217) || $__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 instanceof ArrayAccess ? ($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217[0] ?? null) : null), "email", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 272
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "primary_contact", array(), "any", false, true), "primary_contact_email", array(), "any", true, true)) {
            // line 273
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "primary_contact", array()), "primary_contact_email", array()));
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
            echo "        <div class=\"invalid-feedback\">Please provide a valid email.</div>
      ";
        }
        // line 279
        echo "    </div>
  </div>
  <div class=\"form-group row\">
    <label for=\"primary-contact-mobile-number-input\" class=\"col-sm-3 col-form-label\">Mobile Number</label>
    <div class=\"col-sm-9\">
      <input type=\"tel\" id=\"primary-contact-mobile-number-input\"
        class=\"form-control ";
        // line 285
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "primary_contact", array(), "any", false, true), "primary_contact_mobile_number", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
        name=\"primary_contact_mobile_number\" placeholder=\"\"
        maxlength=\"";
        // line 287
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "contact", array()), "primary_contact_mobile_number", array()), "max_length", array()), "html", null, true);
        echo "\"
        value=\"";
        // line 288
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "primary_contact_mobile_number", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "primary_contact_mobile_number", array()), "html", null, true);
        } else {
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "contacts", array(), "any", false, true), "primary", array(), "any", false, true), 0, array(), "array", true, true)) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "contacts", array()), "primary", array())) && is_array($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105) || $__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 instanceof ArrayAccess ? ($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105[0] ?? null) : null), "mobile_number", array()), "html", null, true);
            }
        }
        echo "\">
      <div class=\"valid-feedback\">Looks good!</div>
      ";
        // line 290
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "primary_contact", array(), "any", false, true), "primary_contact_mobile_number", array(), "any", true, true)) {
            // line 291
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "primary_contact", array()), "primary_contact_mobile_number", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 292
                echo "          <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 294
            echo "      ";
        } else {
            // line 295
            echo "        <div class=\"invalid-feedback\">Please provide a valid mobile number.</div>
      ";
        }
        // line 297
        echo "    </div>
  </div>
  ";
        // line 299
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "contacts", array(), "any", false, true), "additional", array(), "any", true, true) && twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "contacts", array()), "additional", array())))) {
            // line 300
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "contacts", array()), "additional", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["additional"]) {
                // line 301
                echo "      <div class=\"additional-contact-form-group\">
        <h6 class=\"font-italic\">Additional Key Personnel ";
                // line 302
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo "<br>(recommended):</h6>
        <input type=\"hidden\" name=\"additional_contact_id[]\" value=\"";
                // line 303
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["additional"], "id", array()), "html", null, true);
                echo "\">
        <div class=\"form-group row\">
          <label for=\"additional-contact-first-name-input-";
                // line 305
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo "\" class=\"col-sm-3 col-form-label\">First Name</label>
          <div class=\"col-sm-9\">
            <input type=\"text\" id=\"additional-contact-first-name-input-";
                // line 307
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo "\"
              class=\"form-control required ";
                // line 308
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "additional_contact", array(), "any", false, true), (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1), array(), "array", false, true), "additional_contact_first_name", array(), "any", true, true)) {
                    echo "is-invalid";
                }
                echo "\"
              name=\"additional_contact_first_name[]\" placeholder=\"First Name\"
              maxlength=\"";
                // line 310
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "contact", array()), "additional_contact_first_name", array()), "max_length", array()), "html", null, true);
                echo "\"
              value=\"";
                // line 311
                if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "additional_contact_first_name", array(), "any", false, true), (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
                    echo twig_escape_filter($this->env, (($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "additional_contact_first_name", array())) && is_array($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779) || $__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 instanceof ArrayAccess ? ($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779[(twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1)] ?? null) : null), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["additional"], "first_name", array()), "html", null, true);
                }
                echo "\">
            <div class=\"valid-feedback\">Looks good!</div>
            ";
                // line 313
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "additional_contact", array(), "any", false, true), (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1), array(), "array", false, true), "additional_contact_first_name", array(), "any", true, true)) {
                    // line 314
                    echo "              ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "additional_contact", array())) && is_array($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1) || $__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 instanceof ArrayAccess ? ($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1[(twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1)] ?? null) : null), "additional_contact_first_name", array()));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 315
                        echo "                <div class=\"invalid-feedback\">";
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "</div>
              ";
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 317
                    echo "            ";
                } else {
                    // line 318
                    echo "              <div class=\"invalid-feedback\">Please provide a valid first name.</div>
            ";
                }
                // line 320
                echo "          </div>
        </div>
        <div class=\"form-group row\">
          <label for=\"additional-contact-last-name-input-";
                // line 323
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo "\" class=\"col-sm-3 col-form-label\">Last Name</label>
          <div class=\"col-sm-9\">
            <input type=\"text\" id=\"additional-contact-last-name-input-";
                // line 325
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo "\"
              class=\"form-control required ";
                // line 326
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "additional_contact", array(), "any", false, true), (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1), array(), "array", false, true), "additional_contact_last_name", array(), "any", true, true)) {
                    echo "is-invalid";
                }
                echo "\"
            name=\"additional_contact_last_name[]\" placeholder=\"Last Name\"
            maxlength=\"";
                // line 328
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "contact", array()), "additional_contact_last_name", array()), "max_length", array()), "html", null, true);
                echo "\"
            value=\"";
                // line 329
                if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "additional_contact_last_name", array(), "any", false, true), (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
                    echo twig_escape_filter($this->env, (($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "additional_contact_last_name", array())) && is_array($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0) || $__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 instanceof ArrayAccess ? ($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0[(twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1)] ?? null) : null), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["additional"], "last_name", array()), "html", null, true);
                }
                echo "\">
            <div class=\"valid-feedback\">Looks good!</div>
            ";
                // line 331
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "additional_contact", array(), "any", false, true), (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1), array(), "array", false, true), "additional_contact_last_name", array(), "any", true, true)) {
                    // line 332
                    echo "              ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "additional_contact", array())) && is_array($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866) || $__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 instanceof ArrayAccess ? ($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866[(twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1)] ?? null) : null), "additional_contact_last_name", array()));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 333
                        echo "                <div class=\"invalid-feedback\">";
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "</div>
              ";
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 335
                    echo "            ";
                } else {
                    // line 336
                    echo "              <div class=\"invalid-feedback\">Please provide a valid last name.</div>
            ";
                }
                // line 338
                echo "          </div>
        </div>
        <div class=\"form-group row\">
          <label for=\"additional-contact-position-input-";
                // line 341
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo "\" class=\"col-sm-3 col-form-label\">Position</label>
          <div class=\"col-sm-9\">
            <input type=\"text\" id=\"additional-contact-position-input-";
                // line 343
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo "\"
              class=\"form-control required ";
                // line 344
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "additional_contact", array(), "any", false, true), (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1), array(), "array", false, true), "additional_contact_position", array(), "any", true, true)) {
                    echo "is-invalid";
                }
                echo "\"
              name=\"additional_contact_position[]\" placeholder=\"Position\"
              maxlength=\"";
                // line 346
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "contact", array()), "additional_contact_position", array()), "max_length", array()), "html", null, true);
                echo "\"
              value=\"";
                // line 347
                if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "additional_contact_position", array(), "any", false, true), (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
                    echo twig_escape_filter($this->env, (($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "additional_contact_position", array())) && is_array($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f) || $__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f instanceof ArrayAccess ? ($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f[(twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1)] ?? null) : null), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["additional"], "position", array()), "html", null, true);
                }
                echo "\">
            <div class=\"valid-feedback\">Looks good!</div>
            ";
                // line 349
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "additional_contact", array(), "any", false, true), (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1), array(), "array", false, true), "additional_contact_position", array(), "any", true, true)) {
                    // line 350
                    echo "              ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "additional_contact", array())) && is_array($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7) || $__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7 instanceof ArrayAccess ? ($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7[(twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1)] ?? null) : null), "additional_contact_position", array()));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 351
                        echo "                <div class=\"invalid-feedback\">";
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "</div>
              ";
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 353
                    echo "            ";
                } else {
                    // line 354
                    echo "              <div class=\"invalid-feedback\">Please provide a valid position.</div>
            ";
                }
                // line 356
                echo "          </div>
        </div>
        <div class=\"form-group row\">
          <label for=\"additional-contact-email-input-";
                // line 359
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo "\" class=\"col-sm-3 col-form-label\">Email</label>
          <div class=\"col-sm-9\">
            <input type=\"email\" id=\"additional-contact-email-input-";
                // line 361
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo "\"
              class=\"form-control required ";
                // line 362
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "additional_contact", array(), "any", false, true), (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1), array(), "array", false, true), "additional_contact_email", array(), "any", true, true)) {
                    echo "is-invalid";
                }
                echo "\"
              name=\"additional_contact_email[]\" placeholder=\"additional@email.net\"
              value=\"";
                // line 364
                if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "additional_contact_email", array(), "any", false, true), (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
                    echo twig_escape_filter($this->env, (($__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "additional_contact_email", array())) && is_array($__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289) || $__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289 instanceof ArrayAccess ? ($__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289[(twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1)] ?? null) : null), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["additional"], "email", array()), "html", null, true);
                }
                echo "\">
            <div class=\"valid-feedback\">Looks good!</div>
            ";
                // line 366
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "additional_contact", array(), "any", false, true), (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1), array(), "array", false, true), "additional_contact_email", array(), "any", true, true)) {
                    // line 367
                    echo "              ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (($__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "additional_contact", array())) && is_array($__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18) || $__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18 instanceof ArrayAccess ? ($__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18[(twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1)] ?? null) : null), "additional_contact_email", array()));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 368
                        echo "                <div class=\"invalid-feedback\">";
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "</div>
              ";
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 370
                    echo "            ";
                } else {
                    // line 371
                    echo "              <div class=\"invalid-feedback\">Please provide a valid email.</div>
            ";
                }
                // line 373
                echo "          </div>
        </div>
        <div class=\"form-group row\">
          <label for=\"additional-contact-mobile-number-input-";
                // line 376
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo "\" class=\"col-sm-3 col-form-label\">Mobile Number</label>
          <div class=\"col-sm-9\">
            <input type=\"tel\" id=\"additional-contact-mobile-number-input-";
                // line 378
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
                echo "\"
              class=\"form-control ";
                // line 379
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "additional_contact", array(), "any", false, true), (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1), array(), "array", false, true), "additional_contact_mobile_number", array(), "any", true, true)) {
                    echo "is-invalid";
                }
                echo "\"
              name=\"additional_contact_mobile_number[]\" placeholder=\"\"
              maxlength=\"";
                // line 381
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "contact", array()), "additional_contact_mobile_number", array()), "max_length", array()), "html", null, true);
                echo "\"
              value=\"";
                // line 382
                if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "additional_contact_mobile_number", array(), "any", false, true), (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
                    echo twig_escape_filter($this->env, (($__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "additional_contact_mobile_number", array())) && is_array($__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018) || $__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018 instanceof ArrayAccess ? ($__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018[(twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1)] ?? null) : null), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["additional"], "mobile_number", array()), "html", null, true);
                }
                echo "\">
            <div class=\"valid-feedback\">Looks good!</div>
            ";
                // line 384
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "additional_contact", array(), "any", false, true), (twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1), array(), "array", false, true), "additional_contact_mobile_number", array(), "any", true, true)) {
                    // line 385
                    echo "              ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (($__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "additional_contact", array())) && is_array($__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413) || $__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413 instanceof ArrayAccess ? ($__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413[(twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()) - 1)] ?? null) : null), "additional_contact_mobile_number", array()));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 386
                        echo "                <div class=\"invalid-feedback\">";
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "</div>
              ";
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 388
                    echo "            ";
                } else {
                    // line 389
                    echo "              <div class=\"invalid-feedback\">Please provide a valid mobile number.</div>
            ";
                }
                // line 391
                echo "          </div>
        </div>
      </div>
    ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['additional'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 395
            echo "  ";
        } else {
            // line 396
            echo "    <div class=\"additional-contact-form-group\">
      <h6 class=\"font-italic\">Additional Key Personnel<br>(recommended):</h6>
      <input type=\"hidden\" name=\"additional_contact_id[]\" value=\"0\">
      <div class=\"form-group row\">
        <label for=\"additional-contact-first-name-input-";
            // line 400
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loop"] ?? null), "index", array()), "html", null, true);
            echo "\" class=\"col-sm-3 col-form-label\">First Name</label>
        <div class=\"col-sm-9\">
          <input type=\"text\" class=\"form-control required\" id=\"additional-contact-first-name-input-";
            // line 402
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loop"] ?? null), "index", array()), "html", null, true);
            echo "\"
            name=\"additional_contact_first_name[]\" placeholder=\"First Name\"
            maxlength=\"";
            // line 404
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "contact", array()), "additional_contact_first_name", array()), "max_length", array()), "html", null, true);
            echo "\">
          <div class=\"valid-feedback\">Looks good!</div>
          <div class=\"invalid-feedback\">Please provide a valid first name.</div>
        </div>
      </div>
      <div class=\"form-group row\">
        <label for=\"additional-contact-last-name-input-";
            // line 410
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loop"] ?? null), "index", array()), "html", null, true);
            echo "\" class=\"col-sm-3 col-form-label\">Last Name</label>
        <div class=\"col-sm-9\">
          <input type=\"text\" class=\"form-control required\" id=\"additional-contact-last-name-input-";
            // line 412
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loop"] ?? null), "index", array()), "html", null, true);
            echo "\"
            name=\"additional_contact_last_name[]\" placeholder=\"Last Name\"
            maxlength=\"";
            // line 414
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "contact", array()), "additional_contact_last_name", array()), "max_length", array()), "html", null, true);
            echo "\">
          <div class=\"valid-feedback\">Looks good!</div>
          <div class=\"invalid-feedback\">Please provide a valid last name.</div>
        </div>
      </div>
      <div class=\"form-group row\">
        <label for=\"additional-contact-position-input-";
            // line 420
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loop"] ?? null), "index", array()), "html", null, true);
            echo "\" class=\"col-sm-3 col-form-label\">Position</label>
        <div class=\"col-sm-9\">
          <input type=\"text\" class=\"form-control required\" id=\"additional-contact-position-input-";
            // line 422
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loop"] ?? null), "index", array()), "html", null, true);
            echo "\"
            name=\"additional_contact_position[]\" placeholder=\"Position\"
            maxlength=\"";
            // line 424
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "contact", array()), "additional_contact_position", array()), "max_length", array()), "html", null, true);
            echo "\">
          <div class=\"valid-feedback\">Looks good!</div>
          <div class=\"invalid-feedback\">Please provide a valid position.</div>
        </div>
      </div>
      <div class=\"form-group row\">
        <label for=\"additional-contact-email-input-";
            // line 430
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loop"] ?? null), "index", array()), "html", null, true);
            echo "\" class=\"col-sm-3 col-form-label\">Email</label>
        <div class=\"col-sm-9\">
          <input type=\"email\" class=\"form-control required\" id=\"additional-contact-email-input-";
            // line 432
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loop"] ?? null), "index", array()), "html", null, true);
            echo "\"
            name=\"additional_contact_email[]\" placeholder=\"additional@email.net\">
          <div class=\"valid-feedback\">Looks good!</div>
          <div class=\"invalid-feedback\">Please provide a valid email.</div>
        </div>
      </div>
      <div class=\"form-group row\">
        <label for=\"additional-contact-mobile-number-input-";
            // line 439
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loop"] ?? null), "index", array()), "html", null, true);
            echo "\" class=\"col-sm-3 col-form-label\">Mobile Number</label>
        <div class=\"col-sm-9\">
          <input type=\"tel\" class=\"form-control\" id=\"additional-contact-mobile-number-input-";
            // line 441
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loop"] ?? null), "index", array()), "html", null, true);
            echo "\"
            name=\"additional_contact_mobile_number[]\" placeholder=\"\"
            maxlength=\"";
            // line 443
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "contact", array()), "additional_contact_mobile_number", array()), "max_length", array()), "html", null, true);
            echo "\">
          <div class=\"valid-feedback\">Looks good!</div>
          <div class=\"invalid-feedback\">Please provide a valid mobile number.</div>
        </div>
      </div>
    </div>
  ";
        }
        // line 450
        echo "  <div class=\"form-group row\">
    <div class=\"col-sm-12\">
      <button class=\"btn btn-sm btn-primary\" id=\"add-contact-button\">+ Additional Key Personnel</button>
    </div>
  </div>
  <div class=\"form-group row\">
    <div class=\"col-sm-12\">
      <input type=\"submit\" class=\"btn btn-sm btn-success\" id=\"submit-input\" name=\"submit\" value=\"Save changes\">
      ";
        // line 458
        if ((($context["gmb"] ?? null) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()))) {
            // line 459
            echo "        <button type=\"button\" class=\"btn btn-sm btn-info\" id=\"update-contact-gmb-button\">Update GMB account</button>
      ";
        }
        // line 461
        echo "    </div>
  </div>
</form>";
    }

    public function getTemplateName()
    {
        return "Dealers/company-profile/contact-information.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1454 => 461,  1450 => 459,  1448 => 458,  1438 => 450,  1428 => 443,  1423 => 441,  1418 => 439,  1408 => 432,  1403 => 430,  1394 => 424,  1389 => 422,  1384 => 420,  1375 => 414,  1370 => 412,  1365 => 410,  1356 => 404,  1351 => 402,  1346 => 400,  1340 => 396,  1337 => 395,  1320 => 391,  1316 => 389,  1313 => 388,  1296 => 386,  1278 => 385,  1276 => 384,  1267 => 382,  1263 => 381,  1256 => 379,  1252 => 378,  1247 => 376,  1242 => 373,  1238 => 371,  1235 => 370,  1218 => 368,  1200 => 367,  1198 => 366,  1189 => 364,  1182 => 362,  1178 => 361,  1173 => 359,  1168 => 356,  1164 => 354,  1161 => 353,  1144 => 351,  1126 => 350,  1124 => 349,  1115 => 347,  1111 => 346,  1104 => 344,  1100 => 343,  1095 => 341,  1090 => 338,  1086 => 336,  1083 => 335,  1066 => 333,  1048 => 332,  1046 => 331,  1037 => 329,  1033 => 328,  1026 => 326,  1022 => 325,  1017 => 323,  1012 => 320,  1008 => 318,  1005 => 317,  988 => 315,  970 => 314,  968 => 313,  959 => 311,  955 => 310,  948 => 308,  944 => 307,  939 => 305,  934 => 303,  930 => 302,  927 => 301,  909 => 300,  907 => 299,  903 => 297,  899 => 295,  896 => 294,  887 => 292,  882 => 291,  880 => 290,  869 => 288,  865 => 287,  858 => 285,  850 => 279,  846 => 277,  843 => 276,  834 => 274,  829 => 273,  827 => 272,  816 => 270,  809 => 268,  801 => 262,  797 => 260,  794 => 259,  785 => 257,  780 => 256,  778 => 255,  767 => 253,  763 => 252,  756 => 250,  748 => 244,  744 => 242,  741 => 241,  732 => 239,  727 => 238,  725 => 237,  714 => 235,  710 => 234,  703 => 232,  695 => 226,  691 => 224,  688 => 223,  679 => 221,  674 => 220,  672 => 219,  661 => 217,  657 => 216,  650 => 214,  640 => 209,  635 => 206,  631 => 204,  628 => 203,  619 => 201,  614 => 200,  612 => 199,  601 => 197,  594 => 195,  586 => 189,  582 => 187,  579 => 186,  570 => 184,  565 => 183,  563 => 182,  552 => 180,  548 => 179,  542 => 178,  534 => 172,  530 => 170,  527 => 169,  518 => 167,  513 => 166,  511 => 165,  500 => 163,  496 => 162,  490 => 161,  482 => 155,  478 => 153,  475 => 152,  466 => 150,  461 => 149,  459 => 148,  448 => 146,  444 => 145,  438 => 144,  430 => 138,  426 => 136,  423 => 135,  414 => 133,  409 => 132,  407 => 131,  396 => 129,  392 => 128,  386 => 127,  378 => 121,  374 => 119,  371 => 118,  362 => 116,  357 => 115,  355 => 114,  344 => 112,  340 => 111,  334 => 110,  326 => 104,  322 => 102,  319 => 101,  310 => 99,  305 => 98,  303 => 97,  292 => 95,  288 => 94,  281 => 92,  273 => 86,  269 => 84,  266 => 83,  257 => 81,  252 => 80,  250 => 79,  239 => 77,  235 => 76,  228 => 74,  220 => 68,  216 => 66,  213 => 65,  204 => 63,  199 => 62,  197 => 61,  186 => 59,  180 => 58,  170 => 50,  167 => 49,  156 => 47,  151 => 46,  149 => 45,  141 => 39,  137 => 37,  134 => 36,  125 => 34,  120 => 33,  118 => 32,  107 => 30,  103 => 29,  96 => 27,  88 => 21,  84 => 19,  81 => 18,  72 => 16,  67 => 15,  65 => 14,  54 => 12,  50 => 11,  43 => 9,  33 => 4,  28 => 3,  26 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/company-profile/contact-information.twig", "/home/dealerportal/public_html/app/Views/Dealers/company-profile/contact-information.twig");
    }
}
