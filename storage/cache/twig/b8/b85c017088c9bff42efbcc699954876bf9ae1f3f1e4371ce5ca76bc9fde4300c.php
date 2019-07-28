<?php

/* Admin/listing_leader/index.twig */
class __TwigTemplate_91bb8973ed53ac968a5172db50e495bad8be5bd91131297d44a6d841f8b874ce extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Admin/layouts/index.twig", "Admin/listing_leader/index.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header_styles' => array($this, 'block_header_styles'),
            'page_content' => array($this, 'block_page_content'),
            'footer_scripts' => array($this, 'block_footer_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Admin/layouts/index.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Admin - Listing Leader";
    }

    // line 5
    public function block_header_styles($context, array $blocks = array())
    {
        // line 6
        echo "  ";
        $this->displayParentBlock("header_styles", $context, $blocks);
        echo "
  <link rel=\"stylesheet\" type=\"text/css\" href=\"/assets/DataTables/datatables.min.css\">
";
    }

    // line 10
    public function block_page_content($context, array $blocks = array())
    {
        // line 11
        $this->loadTemplate("Admin/partials/home-button.twig", "Admin/listing_leader/index.twig", 11)->display($context);
        // line 12
        echo "<h1>Admin - Listing Leader</h1>
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">Add Listing Leader Data</h3>
  </div>
  <div class=\"card-body\">
    ";
        // line 18
        $this->loadTemplate("Dealers/partials/errors.twig", "Admin/listing_leader/index.twig", 18)->display($context);
        // line 19
        echo "    <form action=\"/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "save", array()), "html", null, true);
        echo "\" method=\"POST\" class=\"needs-validation\" novalidate>
      <div class=\"row\">
        <!-- Dealer -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"dealer-select\">Dealer</label>
          <select id=\"dealer-select\" name=\"dealer\" required
            class=\"form-control
            ";
        // line 26
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "dealer", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\">
            ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["dealers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["dealer"]) {
            // line 28
            echo "              <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "id", array()), "html", null, true);
            echo "\"
                ";
            // line 29
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "dealer", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "dealer", array()) == twig_get_attribute($this->env, $this->source, $context["dealer"], "id", array())))) {
                echo "selected";
            }
            echo ">
                  ";
            // line 30
            if ((twig_get_attribute($this->env, $this->source, $context["dealer"], "first_name", array()) || twig_get_attribute($this->env, $this->source, $context["dealer"], "last_name", array()))) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "first_name", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "last_name", array()), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "email", array()), "html", null, true);
            }
            // line 31
            echo "              </option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dealer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "          </select>
          ";
        // line 34
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "dealer", array(), "any", true, true)) {
            // line 35
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "dealer", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 36
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "          ";
        } else {
            // line 39
            echo "            <div class=\"invalid-feedback\">Please provide a valid dealer.</div>
          ";
        }
        // line 41
        echo "        </div>
        <!-- Year -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"year-input\">Year</label>
          <input type=\"number\" name=\"year\" id=\"year-input\" required class=\"form-control
            ";
        // line 46
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "year", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            min=\"";
        // line 47
        echo twig_escape_filter($this->env, (twig_date_format_filter($this->env, "now", "Y") - 1), "html", null, true);
        echo "\" max=\"";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo "\"
            placeholder=\"";
        // line 48
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo "\"
            value=\"";
        // line 49
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "year", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "year", array()), "html", null, true);
        }
        echo "\">
          ";
        // line 50
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "year", array(), "any", true, true)) {
            // line 51
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "year", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 52
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            echo "          ";
        } else {
            // line 55
            echo "            <div class=\"invalid-feedback\">Please provide a valid year.</div>
          ";
        }
        // line 57
        echo "        </div>
        <!-- Month -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"month-select\">Month</label>
          <select name=\"month\" id=\"month-input\" required
            class=\"form-control
            ";
        // line 63
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "month", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\">
            ";
        // line 64
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(array(0 => "january", 1 => "february", 2 => "march", 3 => "april", 4 => "may", 5 => "june", 6 => "july", 7 => "august", 8 => "september", 9 => "october", 10 => "november", 11 => "december"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["month"]) {
            // line 66
            echo "              <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
            echo "\"
                ";
            // line 67
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "month", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "month", array()) == twig_get_attribute($this->env, $this->source, $context["loop"], "index", array())))) {
                echo "selected";
            }
            echo ">
                ";
            // line 68
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["month"]), "html", null, true);
            echo "
              </option>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['month'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "          </select>
          ";
        // line 72
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "month", array(), "any", true, true)) {
            // line 73
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "month", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 74
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "          ";
        } else {
            // line 77
            echo "            <div class=\"invalid-feedback\">Please provide a valid month.</div>
          ";
        }
        // line 79
        echo "        </div>
        <!-- Correct Listing -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"listing-correct-input\">Correct Listings</label>
          <input type=\"number\" name=\"listing_correct\" id=\"listing-correct-input\" required
            class=\"form-control
            ";
        // line 85
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "listing_correct", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            min=\"";
        // line 86
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "listing_correct", array()), "min_value", array()), "html", null, true);
        echo "\"
            max=\"";
        // line 87
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "listing_correct", array()), "max_value", array()), "html", null, true);
        echo "\"
            placeholder=\"5\"
            value=\"";
        // line 89
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "listing_correct", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "listing_correct", array()), "html", null, true);
        }
        echo "\">
          ";
        // line 90
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "listing_correct", array(), "any", true, true)) {
            // line 91
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "listing_correct", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 92
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 94
            echo "          ";
        } else {
            // line 95
            echo "            <div class=\"invalid-feedback\">Please provide a valid listing number.</div>
          ";
        }
        // line 97
        echo "        </div>
        <!-- Listing Processing -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"listing-processing-input\">Processing Listings</label>
          <input type=\"number\" name=\"listing_processing\" id=\"listing-processing-input\" required
            class=\"form-control
            ";
        // line 103
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "listing_processing", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            min=\"";
        // line 104
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "listing_processing", array()), "min_value", array()), "html", null, true);
        echo "\"
            max=\"";
        // line 105
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "listing_processing", array()), "max_value", array()), "html", null, true);
        echo "\"
            placeholder=\"5\"
            value=\"";
        // line 107
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "listing_processing", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "listing_processing", array()), "html", null, true);
        }
        echo "\">
          ";
        // line 108
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "listing_processing", array(), "any", true, true)) {
            // line 109
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "listing_processing", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 110
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 112
            echo "          ";
        } else {
            // line 113
            echo "            <div class=\"invalid-feedback\">Please provide a valid listing number.</div>
          ";
        }
        // line 115
        echo "        </div>
        <!-- Total Referral Traffic -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"total-referral-traffic-input\">Total Referral Traffic</label>
          <input type=\"number\" name=\"total_referral_traffic\" id=\"total-referral-traffic-input\" required
            class=\"form-control
            ";
        // line 121
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "total_referral_traffic", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            min=\"";
        // line 122
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "total_referral_traffic", array()), "min_value", array()), "html", null, true);
        echo "\"
            max=\"";
        // line 123
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "total_referral_traffic", array()), "max_value", array()), "html", null, true);
        echo "\"
            placeholder=\"5\"
            value=\"";
        // line 125
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "total_referral_traffic", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "total_referral_traffic", array()), "html", null, true);
        }
        echo "\">
          ";
        // line 126
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "total_referral_traffic", array(), "any", true, true)) {
            // line 127
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "total_referral_traffic", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 128
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 130
            echo "          ";
        } else {
            // line 131
            echo "            <div class=\"invalid-feedback\">Please provide a valid traffic number.</div>
          ";
        }
        // line 133
        echo "        </div>
      </div>
      <button type=\"submit\" class=\"btn btn-primary float-right\">Create</button>
    </form>
  </div>
</div>
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">Dealers Listing Leader Data</h3>
  </div>
  <div class=\"card-body\">
    <div class=\"row\">
      <div class=\"col-12 table-responsive\">
        <table class=\"table table-bordered table-striped\" id=\"listing-leader-data-table\">
          <thead>
            <tr>
              <th>Dealer</th>
              <th>Year</th>
              <th>Month</th>
              <th>Correct Listing</th>
              <th>Processing Listings</th>
              <th>Total Referral Traffic</th>
            </tr>
          </thead>
          <tbody>
            ";
        // line 158
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 159
            echo "              ";
            $context["dealer"] = (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = ($context["dealers"] ?? null)) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[twig_get_attribute($this->env, $this->source, $context["row"], "dealer_id", array())] ?? null) : null);
            // line 160
            echo "              <tr>
                <td>";
            // line 161
            if ((twig_get_attribute($this->env, $this->source, ($context["dealer"] ?? null), "first_name", array()) || twig_get_attribute($this->env, $this->source, ($context["dealer"] ?? null), "last_name", array()))) {
                // line 162
                echo "                  ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["dealer"] ?? null), "first_name", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["dealer"] ?? null), "last_name", array()), "html", null, true);
                echo "
                ";
            } else {
                // line 163
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["dealer"] ?? null), "email", array()), "html", null, true);
            }
            echo "</td>
                <td>";
            // line 164
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "date", array()), "Y"), "html", null, true);
            echo "</td>
                <td>";
            // line 165
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "date", array()), "F"), "html", null, true);
            echo "</td>
                <td>";
            // line 166
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "listing_correct", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 167
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "listing_processing", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 168
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "total_referral_traffic", array()), "html", null, true);
            echo "</td>
              </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 171
        echo "          </tbody>
          <tfoot>
            <tr>
              <th>Dealer</th>
              <th>Year</th>
              <th>Month</th>
              <th>Correct Listing</th>
              <th>Processing Listings</th>
              <th>Total Referral Traffic</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
";
    }

    // line 188
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 189
        echo "  <script src=\"/assets/DataTables/datatables.min.js\"></script>
  <script src=\"/assets/js/bootstrap-form-validation.js\"></script>
  <script src=\"/assets/js/admin/listing-leader.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "Admin/listing_leader/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  533 => 189,  530 => 188,  510 => 171,  501 => 168,  497 => 167,  493 => 166,  489 => 165,  485 => 164,  480 => 163,  472 => 162,  470 => 161,  467 => 160,  464 => 159,  460 => 158,  433 => 133,  429 => 131,  426 => 130,  417 => 128,  412 => 127,  410 => 126,  404 => 125,  399 => 123,  395 => 122,  389 => 121,  381 => 115,  377 => 113,  374 => 112,  365 => 110,  360 => 109,  358 => 108,  352 => 107,  347 => 105,  343 => 104,  337 => 103,  329 => 97,  325 => 95,  322 => 94,  313 => 92,  308 => 91,  306 => 90,  300 => 89,  295 => 87,  291 => 86,  285 => 85,  277 => 79,  273 => 77,  270 => 76,  261 => 74,  256 => 73,  254 => 72,  251 => 71,  234 => 68,  228 => 67,  223 => 66,  206 => 64,  200 => 63,  192 => 57,  188 => 55,  185 => 54,  176 => 52,  171 => 51,  169 => 50,  163 => 49,  159 => 48,  153 => 47,  147 => 46,  140 => 41,  136 => 39,  133 => 38,  124 => 36,  119 => 35,  117 => 34,  114 => 33,  107 => 31,  99 => 30,  93 => 29,  88 => 28,  84 => 27,  78 => 26,  67 => 19,  65 => 18,  57 => 12,  55 => 11,  52 => 10,  44 => 6,  41 => 5,  35 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Admin/listing_leader/index.twig", "/home/dealerportal/public_html/app/Views/Admin/listing_leader/index.twig");
    }
}
