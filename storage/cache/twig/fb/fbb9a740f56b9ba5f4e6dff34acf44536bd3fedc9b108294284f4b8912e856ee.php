<?php

/* Admin/billing/index.twig */
class __TwigTemplate_ccf51227fd642a917e5964e94c962631008e58a7483c94c92af67063426b36de extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Admin/layouts/index.twig", "Admin/billing/index.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
        echo "Admin - Billing";
    }

    // line 5
    public function block_page_content($context, array $blocks = array())
    {
        // line 6
        $this->loadTemplate("Admin/partials/home-button.twig", "Admin/billing/index.twig", 6)->display($context);
        // line 7
        echo "<h1>Admin - Billing</h1>
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">Dealer Billing Data</h3>
  </div>
  <div class=\"card-body\">
    ";
        // line 13
        $this->loadTemplate("Dealers/partials/errors.twig", "Admin/billing/index.twig", 13)->display($context);
        // line 14
        echo "    <form action=\"/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "save", array()), "html", null, true);
        echo "\" method=\"POST\" class=\"needs-validation\" novalidate>
      <div class=\"row\">
        <!-- Dealer -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"dealer-select\">Dealer</label>
          <select name=\"dealer\" id=\"dealer-select\"
            class=\"form-control
            ";
        // line 21
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "errors", array(), "any", false, true), "dealer", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\">
            ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["dealers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["dealer"]) {
            // line 23
            echo "              <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "id", array()), "html", null, true);
            echo "\"
              ";
            // line 24
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "dealer", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "dealer", array()) == twig_get_attribute($this->env, $this->source, $context["dealer"], "id", array())))) {
                echo "selected";
            }
            echo ">";
            if ((twig_get_attribute($this->env, $this->source, $context["dealer"], "first_name", array()) || twig_get_attribute($this->env, $this->source, $context["dealer"], "last_name", array()))) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "first_name", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "last_name", array()), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "email", array()), "html", null, true);
            }
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dealer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "          </select>
          ";
        // line 27
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "dealer", array(), "any", true, true)) {
            // line 28
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "dealer", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 29
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "          ";
        } else {
            // line 32
            echo "            <div class=\"invalid-feedback\">Please provide a valid dealer.</div>
          ";
        }
        // line 34
        echo "        </div>
        <!-- Billing Frequency -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"billing-frequency-select\">Billing Frequency</label>
          <select name=\"billing_frequency\" id=\"billing-frequency-select\"
            class=\"form-control
            ";
        // line 40
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "errors", array(), "any", false, true), "billing_frequency", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\">
              <option value=\"monthly\"
              ";
        // line 42
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "billing_frequency", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "billing_frequency", array()) == "monthly"))) {
            echo "selected";
        }
        echo ">Monthly</option>
              <option value=\"quarterly\"
              ";
        // line 44
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "billing_frequency", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "billing_frequency", array()) == "quarterly"))) {
            echo "selected";
        }
        echo ">Quarterly</option>
              <option value=\"annualy\"
              ";
        // line 46
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "billing_frequency", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "billing_frequency", array()) == "annualy"))) {
            echo "selected";
        }
        echo ">Annualy</option>
          </select>
          ";
        // line 48
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "billing_frequency", array(), "any", true, true)) {
            // line 49
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "billing_frequency", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 50
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 52
            echo "          ";
        } else {
            // line 53
            echo "            <div class=\"invalid-feedback\">Please provide a valid billing frequency.</div>
          ";
        }
        // line 55
        echo "        </div>
        <!-- Next Bill Date -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"next-bill-date-input\">Next Bill Date</label>
          <input type=\"date\" id=\"next-bill-date-input\" name=\"next_bill_date\" required
            class=\"form-control
            ";
        // line 61
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "errors", array(), "any", false, true), "next_bill_date", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            min=\"";
        // line 62
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "next_bill_date", array()), "min_value", array()), "html", null, true);
        echo "\"
            value=\"";
        // line 63
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "next_bill_date", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "next_bill_date", array()), "html", null, true);
        }
        echo "\">
          ";
        // line 64
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "next_bill_date", array(), "any", true, true)) {
            // line 65
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "next_bill_date", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 66
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            echo "          ";
        } else {
            // line 69
            echo "            <div class=\"invalid-feedback\">Please provide a valid bill date.</div>
          ";
        }
        // line 71
        echo "        </div>
        <!-- Billing Details -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"billing-details-input\">Billing Details</label>
          <input type=\"text\" id=\"billing-details-input\" name=\"billing_details\" required
            class=\"form-control
            ";
        // line 77
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "errors", array(), "any", false, true), "billing_details", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            maxlength=\"";
        // line 78
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "billing_details", array()), "max_length", array()), "html", null, true);
        echo "\"
            value=\"";
        // line 79
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "billing_details", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "billing_details", array()), "html", null, true);
        }
        echo "\">
          ";
        // line 80
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "billing_details", array(), "any", true, true)) {
            // line 81
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "billing_details", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 82
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            echo "          ";
        } else {
            // line 85
            echo "            <div class=\"invalid-feedback\">Please provide valid billing details.</div>
          ";
        }
        // line 87
        echo "        </div>
        <!-- Payment Method -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"payment-method-input\">Payment Method</label>
          <input type=\"text\" id=\"payment-method-input\" name=\"payment_method\" required
            class=\"form-control
            ";
        // line 93
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "errors", array(), "any", false, true), "payment_method", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            maxlength=\"";
        // line 94
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "payment_method", array()), "max_length", array()), "html", null, true);
        echo "\"
            value=\"";
        // line 95
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "payment_method", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "payment_method", array()), "html", null, true);
        }
        echo "\">
          ";
        // line 96
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "payment_method", array(), "any", true, true)) {
            // line 97
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "payment_method", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 98
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 100
            echo "          ";
        } else {
            // line 101
            echo "            <div class=\"invalid-feedback\">Please provide valid payment method.</div>
          ";
        }
        // line 103
        echo "        </div>
      </div>
      <button type=\"submit\" class=\"btn btn-primary float-right\">Create</button>
    </form>
  </div>
</div>
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">Dealers Billing Data</h3>
  </div>
  <div class=\"card-body\">
    <div class=\"row\">
      <div class=\"col-12 table-responsive\">
        <table class=\"table table-bordered table-striped\" id=\"billing-data-table\">
          <thead>
            <tr>
              <th>Dealer</th>
              <th>Billing</th>
              <th>Next Bill Date</th>
              <th>Billing Details</th>
              <th>Payment Method</th>
            </tr>
          </thead>
          <tbody>
            ";
        // line 127
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 128
            echo "              ";
            $context["dealer"] = (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = ($context["dealers"] ?? null)) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[twig_get_attribute($this->env, $this->source, $context["row"], "dealer_id", array())] ?? null) : null);
            // line 129
            echo "              <tr>
                <td>";
            // line 130
            if ((twig_get_attribute($this->env, $this->source, ($context["dealer"] ?? null), "first_name", array()) || twig_get_attribute($this->env, $this->source, ($context["dealer"] ?? null), "last_name", array()))) {
                // line 131
                echo "                  ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["dealer"] ?? null), "first_name", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["dealer"] ?? null), "last_name", array()), "html", null, true);
                echo "
                ";
            } else {
                // line 132
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["dealer"] ?? null), "email", array()), "html", null, true);
            }
            echo "</td>
                <td>";
            // line 133
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "billing_frequency", array())), "html", null, true);
            echo "</td>
                <td>";
            // line 134
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "next_bill_date", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 135
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "billing_details", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 136
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "payment_method", array()), "html", null, true);
            echo "</td>
              </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 139
        echo "          </tbody>
          <tfoot>
            <tr>
              <th>Dealer</th>
              <th>Billing</th>
              <th>Next Bill Date</th>
              <th>Billing Details</th>
              <th>Payment Method</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
";
    }

    // line 155
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 156
        echo "  <script src=\"/assets/DataTables/datatables.min.js\"></script>
  <script src=\"/assets/js/bootstrap-form-validation.js\"></script>
  <script src=\"/assets/js/admin/billing.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "Admin/billing/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  419 => 156,  416 => 155,  397 => 139,  388 => 136,  384 => 135,  380 => 134,  376 => 133,  371 => 132,  363 => 131,  361 => 130,  358 => 129,  355 => 128,  351 => 127,  325 => 103,  321 => 101,  318 => 100,  309 => 98,  304 => 97,  302 => 96,  296 => 95,  292 => 94,  286 => 93,  278 => 87,  274 => 85,  271 => 84,  262 => 82,  257 => 81,  255 => 80,  249 => 79,  245 => 78,  239 => 77,  231 => 71,  227 => 69,  224 => 68,  215 => 66,  210 => 65,  208 => 64,  202 => 63,  198 => 62,  192 => 61,  184 => 55,  180 => 53,  177 => 52,  168 => 50,  163 => 49,  161 => 48,  154 => 46,  147 => 44,  140 => 42,  133 => 40,  125 => 34,  121 => 32,  118 => 31,  109 => 29,  104 => 28,  102 => 27,  99 => 26,  81 => 24,  76 => 23,  72 => 22,  66 => 21,  55 => 14,  53 => 13,  45 => 7,  43 => 6,  40 => 5,  34 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Admin/billing/index.twig", "/home/dealerportal/public_html/app/Views/Admin/billing/index.twig");
    }
}
