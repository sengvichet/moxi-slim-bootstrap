<?php

/* Admin/services/index.twig */
class __TwigTemplate_50360947f561d658b00afecff2aa15a89e86aee83c619bed183a876df8b71d18 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Admin/layouts/index.twig", "Admin/services/index.twig", 1);
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
        echo "Admin - Services";
    }

    // line 5
    public function block_page_content($context, array $blocks = array())
    {
        // line 6
        $this->loadTemplate("Admin/partials/home-button.twig", "Admin/services/index.twig", 6)->display($context);
        // line 7
        echo "<h1>Admin - Services</h1>
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">Subscribe Dealer to Services</h3>
  </div>
  <div class=\"card-body\">
    ";
        // line 13
        $this->loadTemplate("Dealers/partials/errors.twig", "Admin/services/index.twig", 13)->display($context);
        // line 14
        echo "    <form action=\"/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "save", array()), "html", null, true);
        echo "\" method=\"POST\" class=\"needs-validation\" novalidate>
      <div class=\"row\">
        <div class=\"form-group col-sm-4 col-lg-3 col-xl-2\">
          <label for=\"dealer-select\"><br>Email</label>
          <select name=\"dealer\" id=\"dealer-select\"
            class=\"form-control
            ";
        // line 20
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "errors", array(), "any", false, true), "dealer", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\">
            ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["dealers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["dealer"]) {
            // line 22
            echo "              <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "id", array()), "html", null, true);
            echo "\"
              ";
            // line 23
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "dealer", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "dealer", array()) == twig_get_attribute($this->env, $this->source, $context["dealer"], "id", array())))) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "email", array()), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dealer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "          </select>
          ";
        // line 26
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "dealer", array(), "any", true, true)) {
            // line 27
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "dealer", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 28
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "          ";
        } else {
            // line 31
            echo "            <div class=\"invalid-feedback\">Please provide a valid dealer.</div>
          ";
        }
        // line 33
        echo "        </div>
        ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["services"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 35
            echo "          <div class=\"form-group col-sm-4 col-lg-3 col-xl-2\">
            <label for=\"";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["service"], "name", array()), "html", null, true);
            echo "-input\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["service"], "title", array()), "html", null, true);
            echo "<br>- \$";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["service"], "cost", array()), "html", null, true);
            echo "</label>
            <input type=\"number\" name=\"";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["service"], "name", array()), "html", null, true);
            echo "_quarters\" id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["service"], "name", array()), "html", null, true);
            echo "-input\"
              min=\"";
            // line 38
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "quarters", array()), "min_value", array()), "html", null, true);
            echo "\" value=\"0\"
              class=\"form-control
              ";
            // line 40
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "errors", array(), "any", false, true), twig_get_attribute($this->env, $this->source, $context["service"], "name", array()), array(), "array", true, true)) {
                echo "is-invalid";
            }
            echo "\">
            ";
            // line 41
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), twig_get_attribute($this->env, $this->source, $context["service"], "name", array()), array(), "array", true, true)) {
                // line 42
                echo "              ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array())) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[twig_get_attribute($this->env, $this->source, $context["service"], "name", array())] ?? null) : null));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 43
                    echo "                <div class=\"invalid-feedback\">";
                    echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                    echo "</div>
              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 45
                echo "            ";
            } else {
                // line 46
                echo "              <div class=\"invalid-feedback\">Please provide a valid quarters number.</div>
            ";
            }
            // line 48
            echo "          </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "      </div>
      <button type=\"submit\" class=\"btn btn-success\">Subscribe</button>
    </form>
  </div>
</div>
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">Dealers Service Data</h3>
  </div>
  <div class=\"card-body\">
    <div class=\"row\">
      <div class=\"col-12 table-responsive\">
        <table class=\"table table-bordered\" id=\"services-data-table\">
          <thead>
            <tr>
              <th>Dealer</th>
              ";
        // line 66
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["services"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 67
            echo "                <th>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["service"], "title", array()), "html", null, true);
            echo "</th>
                <th>\$";
            // line 68
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["service"], "cost", array()), "html", null, true);
            echo "</th>
                <th>Approve</th>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "              <th>Total Cost</th>
            </tr>
          </thead>
          <tbody>
            ";
        // line 75
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["dealer_id"] => $context["row"]) {
            // line 76
            echo "              ";
            $context["dealer"] = (($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = ($context["dealers"] ?? null)) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[$context["dealer_id"]] ?? null) : null);
            // line 77
            echo "              <tr>
                <td>";
            // line 78
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["dealer"] ?? null), "email", array()), "html", null, true);
            echo "</td>
                ";
            // line 79
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["services"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
                // line 80
                echo "                  <td>";
                if ((($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = $context["row"]) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[twig_get_attribute($this->env, $this->source, $context["service"], "id", array())] ?? null) : null)) {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = $context["row"]) && is_array($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9) || $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 instanceof ArrayAccess ? ($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9[twig_get_attribute($this->env, $this->source, $context["service"], "id", array())] ?? null) : null), "quarters", array()), "html", null, true);
                    echo " qrts.";
                } else {
                    echo "-";
                }
                echo "</td>
                  <td>";
                // line 81
                if ((($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = $context["row"]) && is_array($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217) || $__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 instanceof ArrayAccess ? ($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217[twig_get_attribute($this->env, $this->source, $context["service"], "id", array())] ?? null) : null)) {
                    echo "\$";
                    echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["service"], "cost", array()) * twig_get_attribute($this->env, $this->source, (($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 = $context["row"]) && is_array($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105) || $__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 instanceof ArrayAccess ? ($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105[twig_get_attribute($this->env, $this->source, $context["service"], "id", array())] ?? null) : null), "quarters", array())), "html", null, true);
                } else {
                    echo "-";
                }
                echo "</td>
                  <td>
                    ";
                // line 83
                if (((($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 = $context["row"]) && is_array($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779) || $__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 instanceof ArrayAccess ? ($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779[twig_get_attribute($this->env, $this->source, $context["service"], "id", array())] ?? null) : null) && twig_get_attribute($this->env, $this->source, (($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 = $context["row"]) && is_array($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1) || $__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 instanceof ArrayAccess ? ($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1[twig_get_attribute($this->env, $this->source, $context["service"], "id", array())] ?? null) : null), "quarters", array()))) {
                    // line 84
                    echo "                      <button type=\"button\" data-dealer=\"";
                    echo twig_escape_filter($this->env, $context["dealer_id"], "html", null, true);
                    echo "\" data-service=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["service"], "id", array()), "html", null, true);
                    echo "\" data-approved=\"";
                    if (twig_get_attribute($this->env, $this->source, (($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 = $context["row"]) && is_array($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0) || $__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 instanceof ArrayAccess ? ($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0[twig_get_attribute($this->env, $this->source, $context["service"], "id", array())] ?? null) : null), "is_approved", array())) {
                        echo "1";
                    } else {
                        echo "0";
                    }
                    echo "\" class=\"approve-button btn btn-sm btn-";
                    if (twig_get_attribute($this->env, $this->source, (($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 = $context["row"]) && is_array($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866) || $__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 instanceof ArrayAccess ? ($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866[twig_get_attribute($this->env, $this->source, $context["service"], "id", array())] ?? null) : null), "is_approved", array())) {
                        echo "secondary";
                    } else {
                        echo "success";
                    }
                    echo "\">";
                    if (twig_get_attribute($this->env, $this->source, (($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f = $context["row"]) && is_array($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f) || $__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f instanceof ArrayAccess ? ($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f[twig_get_attribute($this->env, $this->source, $context["service"], "id", array())] ?? null) : null), "is_approved", array())) {
                        echo "Disapprove";
                    } else {
                        echo "Approve";
                    }
                    echo "</button>
                    ";
                }
                // line 86
                echo "                  </td>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
            echo "                <td>\$";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "total", array()), "html", null, true);
            echo "</td>
              </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['dealer_id'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        echo "          </tbody>
          <tfoot>
            <tr>
              <th>Dealer</th>
              ";
        // line 95
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["services"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["service"]) {
            // line 96
            echo "                <th>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["service"], "title", array()), "html", null, true);
            echo "</th>
                <th>\$";
            // line 97
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["service"], "cost", array()), "html", null, true);
            echo "</th>
                <th>Approve</th>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['service'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 100
        echo "              <th>Total Cost</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
";
    }

    // line 109
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 110
        echo "  <script src=\"/assets/DataTables/datatables.min.js\"></script>
  <script src=\"/assets/js/bootstrap-form-validation.js\"></script>
  <script>var updateUrl = '/";
        // line 112
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "update", array()), "html", null, true);
        echo "';</script>
  <script src=\"/assets/js/admin/services.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "Admin/services/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  351 => 112,  347 => 110,  344 => 109,  332 => 100,  323 => 97,  318 => 96,  314 => 95,  308 => 91,  298 => 88,  291 => 86,  265 => 84,  263 => 83,  253 => 81,  243 => 80,  239 => 79,  235 => 78,  232 => 77,  229 => 76,  225 => 75,  219 => 71,  210 => 68,  205 => 67,  201 => 66,  183 => 50,  176 => 48,  172 => 46,  169 => 45,  160 => 43,  155 => 42,  153 => 41,  147 => 40,  142 => 38,  136 => 37,  128 => 36,  125 => 35,  121 => 34,  118 => 33,  114 => 31,  111 => 30,  102 => 28,  97 => 27,  95 => 26,  92 => 25,  80 => 23,  75 => 22,  71 => 21,  65 => 20,  55 => 14,  53 => 13,  45 => 7,  43 => 6,  40 => 5,  34 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Admin/services/index.twig", "/home/dealerportal/public_html/app/Views/Admin/services/index.twig");
    }
}
