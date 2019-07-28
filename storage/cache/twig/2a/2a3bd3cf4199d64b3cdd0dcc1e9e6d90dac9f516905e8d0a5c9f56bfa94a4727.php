<?php

/* Admin/dealers/index.twig */
class __TwigTemplate_0fd87f4b6fc17bc161da649410bde42ad9a702c084841039a93d03c47055b721 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Admin/layouts/index.twig", "Admin/dealers/index.twig", 1);
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
        echo "Admin - Users";
    }

    // line 5
    public function block_page_content($context, array $blocks = array())
    {
        // line 6
        $this->loadTemplate("Admin/partials/home-button.twig", "Admin/dealers/index.twig", 6)->display($context);
        // line 7
        echo "<h1>Admin - Dealers</h1>
";
        // line 8
        $this->loadTemplate("Dealers/partials/errors.twig", "Admin/dealers/index.twig", 8)->display($context);
        // line 9
        echo "<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">Create New Dealer</h3>
  </div>
  <div class=\"card-body\">
    <form action=\"/";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "save", array()), "html", null, true);
        echo "\" method=\"POST\" class=\"needs-validation\" novalidate>
      <div class=\"row\">
        <div class=\"form-group col-sm-4\">
          <label for=\"dealer-email-input\">Email</label>
          <input type=\"email\" name=\"email\" placeholder=\"Email\" required
            id=\"dealer-email-input\" class=\"form-control
            ";
        // line 20
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "errors", array(), "any", false, true), "email", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            value=\"";
        // line 21
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "email", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "email", array()), "html", null, true);
        }
        echo "\">
            ";
        // line 22
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "email", array(), "any", true, true)) {
            // line 23
            echo "              ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "email", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 24
                echo "                <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 26
            echo "            ";
        } else {
            // line 27
            echo "              <div class=\"invalid-feedback\">Please provide a valid email.</div>
            ";
        }
        // line 29
        echo "        </div>
        <div class=\"form-group col-sm-4\">
          <label for=\"dealer-password-input\">Password</label>
          <input type=\"password\" name=\"password\" placeholder=\"Password\" required
            id=\"dealer-password-input\" class=\"form-control
            ";
        // line 34
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "errors", array(), "any", false, true), "password", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            value=\"\">
          ";
        // line 36
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "password", array(), "any", true, true)) {
            // line 37
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "password", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 38
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "          ";
        } else {
            // line 41
            echo "            <div class=\"invalid-feedback\">Please provide a valid password.</div>
          ";
        }
        // line 43
        echo "        </div>
        <div class=\"form-group col-sm-4\">
          <label for=\"dealer-account-select\">GMB Account</label>
          <select name=\"account_id\" id=\"dealer-account-select\"
            class=\"form-control
            ";
        // line 48
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "errors", array(), "any", false, true), "account_id", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\">
            <option value=\"0\">No GMB Account</option>
            ";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["accounts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["account"]) {
            // line 51
            echo "              <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["account"], "account_id", array()), "html", null, true);
            echo "\"
              ";
            // line 52
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "account_id", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "account_id", array()) == twig_get_attribute($this->env, $this->source, $context["account"], "account_id", array())))) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["account"], "account_name", array()), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['account'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "          </select>
          ";
        // line 55
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "account_id", array(), "any", true, true)) {
            // line 56
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "account_id", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 57
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "          ";
        } else {
            // line 60
            echo "            <div class=\"invalid-feedback\">Please provide a valid account.</div>
          ";
        }
        // line 62
        echo "        </div>
      </div>
      <button type=\"submit\" class=\"btn btn-primary float-right\">Create</button>
    </form>
  </div>
</div>
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">Update Dealer</h3>
  </div>
  <div class=\"card-body\">
    <form action=\"/";
        // line 73
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "save", array()), "html", null, true);
        echo "\" method=\"POST\" class=\"needs-validation\" novalidate>
      <div class=\"row\">
        <div class=\"form-group col-sm-4\">
          <label for=\"dealer-old-email-input\">Old Email</label>
          <select name=\"id\" id=\"dealer-old-email-input\" class=\"form-control\" required>
            ";
        // line 78
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["dealers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["dealer"]) {
            // line 79
            echo "              <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "email", array()), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dealer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "          </select>
        </div>
        <div class=\"form-group col-sm-4\">
          <label for=\"dealer-new-email-input\">New Email</label>
          <input type=\"email\" name=\"email\" placeholder=\"Email\" required
            id=\"dealer-new-email-input\" class=\"form-control
            ";
        // line 87
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "errors", array(), "any", false, true), "email", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            value=\"";
        // line 88
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "email", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "email", array()), "html", null, true);
        }
        echo "\">
            ";
        // line 89
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "email", array(), "any", true, true)) {
            // line 90
            echo "              ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "email", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 91
                echo "                <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 93
            echo "            ";
        } else {
            // line 94
            echo "              <div class=\"invalid-feedback\">Please provide a valid email.</div>
            ";
        }
        // line 96
        echo "        </div>
        <div class=\"form-group col-sm-4\">
          <label for=\"dealer-new-password-input\">New Password</label>
          <input type=\"password\" name=\"password\" placeholder=\"Password\" required
            id=\"dealer-new-password-input\" class=\"form-control
            ";
        // line 101
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "errors", array(), "any", false, true), "password", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            value=\"\">
          ";
        // line 103
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "password", array(), "any", true, true)) {
            // line 104
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "password", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 105
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 107
            echo "          ";
        } else {
            // line 108
            echo "            <div class=\"invalid-feedback\">Please provide a valid password.</div>
          ";
        }
        // line 110
        echo "        </div>
      </div>
      <button type=\"submit\" class=\"btn btn-primary float-right\">Update</button>
    </form>
  </div>
</div>
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">Dealers</h3>
  </div>
  <div class=\"card-body\">
    <table class=\"table table-bordered\">
      <thead>
        <tr>
          <th>Email</th>
          <th>Location</th>
          <th>Company</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        ";
        // line 131
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["dealers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["dealer"]) {
            // line 132
            echo "          <tr>
            <td>";
            // line 133
            if ((twig_get_attribute($this->env, $this->source, $context["dealer"], "first_name", array()) || twig_get_attribute($this->env, $this->source, $context["dealer"], "last_name", array()))) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "first_name", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "last_name", array()), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "email", array()), "html", null, true);
            }
            echo "</td>
            <td>
              <form action=\"/";
            // line 135
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "update", array()), "html", null, true);
            echo "\" method=\"POST\">
              <div class=\"input-group\">
                <select name=\"account_id\" id=\"dealer-account-select-";
            // line 137
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "id", array()), "html", null, true);
            echo "\" class=\"form-control\"
                  ";
            // line 138
            if (twig_get_attribute($this->env, $this->source, $context["dealer"], "account_id", array())) {
                echo "disabled";
            }
            echo ">
                  <option value=\"0\">No GMB Account</option>
                  ";
            // line 140
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["accounts"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["account"]) {
                // line 141
                echo "                    <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["account"], "account_id", array()), "html", null, true);
                echo "\"
                    ";
                // line 142
                if ((twig_get_attribute($this->env, $this->source, $context["dealer"], "account_id", array()) == twig_get_attribute($this->env, $this->source, $context["account"], "account_id", array()))) {
                    echo "selected";
                }
                echo ">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["account"], "account_name", array()), "html", null, true);
                echo "</option>
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['account'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 144
            echo "                </select>
                ";
            // line 145
            if ( !twig_get_attribute($this->env, $this->source, $context["dealer"], "account_id", array())) {
                // line 146
                echo "                <div class=\"input-group-append\">
                  <input type=\"hidden\" name=\"dealer_id\" value=\"";
                // line 147
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "id", array()), "html", null, true);
                echo "\">
                  <button class=\"btn btn-primary\" type=\"submit\">Assign Location</button>
                </div>
                ";
            }
            // line 151
            echo "                </form>
              </div>
            </td>
            <td>
              ";
            // line 155
            if ( !twig_get_attribute($this->env, $this->source, $context["dealer"], "company_id", array())) {
                // line 156
                echo "                ";
                if (twig_get_attribute($this->env, $this->source, $context["dealer"], "account_id", array())) {
                    // line 157
                    echo "                  <button class=\"btn btn-primary create-company-button\" type=\"button\" data-dealer=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "id", array()), "html", null, true);
                    echo "\">
                    Create Company
                  </button>
                ";
                } else {
                    // line 161
                    echo "                  <span class=\"font-small\">You can create a company based on the location data<br> after you assign a location.</span>
                ";
                }
                // line 163
                echo "              ";
            } else {
                // line 164
                echo "                ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "company_name", array()), "html", null, true);
                echo "
              ";
            }
            // line 166
            echo "            </td>
            <td>
              <form action=\"/";
            // line 168
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "delete", array()), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "id", array()), "html", null, true);
            echo "\">
                <button class=\"btn btn-danger delete-dealer-button\"><i class=\"fa fa-trash\"></i></button>
              </form>
            </td>
          </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dealer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 174
        echo "      </tbody>
    </table>
  </div>
</div>
";
    }

    // line 179
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 180
        echo "  <script src=\"/assets/js/sweetalert2.all.min.js\"></script>
  <script src=\"/assets/js/bootstrap-form-validation.js\"></script>
  <script>var createCompanyUrl = '/";
        // line 182
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "create", array()), "html", null, true);
        echo "';</script>
  <script src=\"/assets/js/admin/dealers.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "Admin/dealers/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  473 => 182,  469 => 180,  466 => 179,  458 => 174,  444 => 168,  440 => 166,  434 => 164,  431 => 163,  427 => 161,  419 => 157,  416 => 156,  414 => 155,  408 => 151,  401 => 147,  398 => 146,  396 => 145,  393 => 144,  381 => 142,  376 => 141,  372 => 140,  365 => 138,  361 => 137,  356 => 135,  345 => 133,  342 => 132,  338 => 131,  315 => 110,  311 => 108,  308 => 107,  299 => 105,  294 => 104,  292 => 103,  285 => 101,  278 => 96,  274 => 94,  271 => 93,  262 => 91,  257 => 90,  255 => 89,  249 => 88,  243 => 87,  235 => 81,  224 => 79,  220 => 78,  212 => 73,  199 => 62,  195 => 60,  192 => 59,  183 => 57,  178 => 56,  176 => 55,  173 => 54,  161 => 52,  156 => 51,  152 => 50,  145 => 48,  138 => 43,  134 => 41,  131 => 40,  122 => 38,  117 => 37,  115 => 36,  108 => 34,  101 => 29,  97 => 27,  94 => 26,  85 => 24,  80 => 23,  78 => 22,  72 => 21,  66 => 20,  57 => 14,  50 => 9,  48 => 8,  45 => 7,  43 => 6,  40 => 5,  34 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Admin/dealers/index.twig", "/home/dealerportal/public_html/app/Views/Admin/dealers/index.twig");
    }
}
