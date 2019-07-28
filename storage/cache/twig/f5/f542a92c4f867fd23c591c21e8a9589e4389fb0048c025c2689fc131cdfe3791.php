<?php

/* Dealers/partials/order/website-package-buttons.twig */
class __TwigTemplate_2e9259520380daa19c22cdd84ea7b536f318f51afb9af6c104338cff3b67ef15 extends Twig_Template
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
        echo "<div class=\"row website-package-buttons-row\">
  ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = ($context["costs"] ?? null)) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[($context["costs_type"] ?? null)] ?? null) : null), "options", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 3
            echo "    ";
            if (twig_get_attribute($this->env, $this->source, $context["option"], "title", array())) {
                // line 4
                echo "      <div class=\"col-12 col-md-";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (12 / twig_get_attribute($this->env, $this->source, (($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = ($context["costs"] ?? null)) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[($context["costs_type"] ?? null)] ?? null) : null), "options_count", array()))), "html", null, true);
                echo " table-responsive\">
        <table class=\"table table-bordered\">
          <tbody>
            <tr>
              <td colspan=\"2\">
                <button type=\"button\" class=\"btn btn-block btn-md website-package-button
                  ";
                // line 10
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), 0, array(), "array", false, true), ($context["costs_type"] ?? null), array(), "array", true, true)) {
                    // line 11
                    echo "                    ";
                    if (((($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = (($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array())) && is_array($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9) || $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 instanceof ArrayAccess ? ($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9[0] ?? null) : null)) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[($context["costs_type"] ?? null)] ?? null) : null) == twig_get_attribute($this->env, $this->source, $context["option"], "id", array()))) {
                        echo "btn-primary";
                    } else {
                        echo "btn-secondary";
                    }
                    // line 12
                    echo "                  ";
                } else {
                    // line 13
                    echo "                    ";
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array(), "any", false, true), ($context["costs_type"] ?? null), array(), "array", true, true)) {
                        // line 14
                        echo "                      ";
                        if (((($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array())) && is_array($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217) || $__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 instanceof ArrayAccess ? ($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217[($context["costs_type"] ?? null)] ?? null) : null) == twig_get_attribute($this->env, $this->source, $context["option"], "id", array()))) {
                            echo "btn-primary";
                        } else {
                            echo "btn-secondary";
                        }
                        // line 15
                        echo "                    ";
                    } else {
                        // line 16
                        echo "                      ";
                        if ((twig_get_attribute($this->env, $this->source, (($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 = ($context["costs"] ?? null)) && is_array($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105) || $__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 instanceof ArrayAccess ? ($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105[($context["costs_type"] ?? null)] ?? null) : null), "default", array()) == twig_get_attribute($this->env, $this->source, $context["option"], "id", array()))) {
                            echo "btn-primary";
                        } else {
                            echo "btn-secondary";
                        }
                        // line 17
                        echo "                    ";
                    }
                    // line 18
                    echo "                  ";
                }
                echo "\" data-option-name=\"";
                echo twig_escape_filter($this->env, ($context["costs_type"] ?? null), "html", null, true);
                echo "\" data-option-value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", array()), "html", null, true);
                echo "\" data-option-group=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 = ($context["costs"] ?? null)) && is_array($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779) || $__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 instanceof ArrayAccess ? ($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779[($context["costs_type"] ?? null)] ?? null) : null), "group", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "title", array()), "html", null, true);
                echo "
                </button>
              </td>
            </tr>
            <tr>
              <td>Monthly - \$";
                // line 23
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 = twig_get_attribute($this->env, $this->source, (($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 = ($context["costs"] ?? null)) && is_array($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0) || $__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 instanceof ArrayAccess ? ($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0[($context["costs_type"] ?? null)] ?? null) : null), "options", array())) && is_array($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1) || $__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 instanceof ArrayAccess ? ($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1[(twig_get_attribute($this->env, $this->source, $context["option"], "id", array()) - 1)] ?? null) : null), "cost", array()), "html", null, true);
                echo "</td>
              <td>Start Up - \$";
                // line 24
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 = twig_get_attribute($this->env, $this->source, (($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f = ($context["costs"] ?? null)) && is_array($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f) || $__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f instanceof ArrayAccess ? ($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f[($context["costs_type"] ?? null)] ?? null) : null), "options", array())) && is_array($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866) || $__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 instanceof ArrayAccess ? ($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866[(twig_get_attribute($this->env, $this->source, $context["option"], "id", array()) - 1)] ?? null) : null), "setup", array()), "html", null, true);
                echo "</td>
            </tr>
          </tbody>
        </table>
      </div>
    ";
            }
            // line 30
            echo "  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "Dealers/partials/order/website-package-buttons.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 31,  108 => 30,  99 => 24,  95 => 23,  78 => 18,  75 => 17,  68 => 16,  65 => 15,  58 => 14,  55 => 13,  52 => 12,  45 => 11,  43 => 10,  33 => 4,  30 => 3,  26 => 2,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/partials/order/website-package-buttons.twig", "/home/dealerportal/public_html/app/Views/Dealers/partials/order/website-package-buttons.twig");
    }
}
