<?php

/* Dealers/website/order/website-pages.twig */
class __TwigTemplate_542ece9b77e005d61bcd0a0bbfcdc940d518a46d3516da7ef9d897e0359a458f extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/website/order/new-order.twig", "Dealers/website/order/website-pages.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'order_page_title' => array($this, 'block_order_page_title'),
            'order_page_form' => array($this, 'block_order_page_form'),
            'footer_scripts' => array($this, 'block_footer_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Dealers/website/order/new-order.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Website Pages &amp; Options";
    }

    // line 3
    public function block_order_page_title($context, array $blocks = array())
    {
        echo "Website Pages &amp; Options";
    }

    // line 4
    public function block_order_page_form($context, array $blocks = array())
    {
        // line 5
        echo "  ";
        $context["cost"] = twig_get_attribute($this->env, $this->source, ($context["costs"] ?? null), "website_page", array());
        // line 6
        echo "  ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, ($context["included_pages_number"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 7
            echo "    <div id=\"website_page-";
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "\">
      <div class=\"row mt-5\">
        <div class=\"col-12\">
          <h2>";
            // line 10
            echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, ($context["cost"] ?? null), "title", array()), array("{id}" => $context["i"])), "html", null, true);
            echo " <span class=\"badge info-tool\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["cost"] ?? null), "title", array()), "html", null, true);
            echo "\"><i class=\"fa fa-info-circle\"></i></span></h2>
        </div>
      </div>
      <div class=\"row mr-1 mb-3 mt-3 pl-3\">
        <div class=\"col-12 row-bordered border-secondary pt-3 pb-4\">
          <h3>Select The Website Page Type
            <span class=\"badge info-tool\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Choose Page Type\"><i class=\"fa fa-info-circle\"></i></span>
          </h3>
          <select class=\"custom-select page-type-select col-11 mb-3\" name=\"website_page[]\">
            ";
            // line 19
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["costs"] ?? null), "website_page", array()), "options", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                // line 20
                echo "              <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", array()), "html", null, true);
                echo "\"
                ";
                // line 21
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), 0, array(), "array", false, true), "website_page", array(), "any", true, true)) {
                    // line 22
                    echo "                  ";
                    if (twig_test_iterable(twig_get_attribute($this->env, $this->source, (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array())) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[0] ?? null) : null), "website_page", array()))) {
                        // line 23
                        echo "                    ";
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), 0, array(), "array", false, true), "website_page", array(), "any", false, true), ($context["i"] - 1), array(), "array", true, true)) {
                            // line 24
                            echo "                      ";
                            if (((($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = twig_get_attribute($this->env, $this->source, (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array())) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[0] ?? null) : null), "website_page", array())) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[($context["i"] - 1)] ?? null) : null) == twig_get_attribute($this->env, $this->source, $context["option"], "id", array()))) {
                                echo "selected";
                            }
                            // line 25
                            echo "                    ";
                        }
                        // line 26
                        echo "                  ";
                    } else {
                        echo " ";
                        // line 27
                        echo "                    ";
                        if ((($context["i"] == 1) && (twig_get_attribute($this->env, $this->source, (($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array())) && is_array($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9) || $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 instanceof ArrayAccess ? ($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9[0] ?? null) : null), "website_page", array()) == twig_get_attribute($this->env, $this->source, $context["option"], "id", array())))) {
                            echo "selected";
                        }
                        // line 28
                        echo "                  ";
                    }
                    // line 29
                    echo "                ";
                } else {
                    // line 30
                    echo "                  ";
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array(), "any", false, true), "website_page", array(), "any", true, true)) {
                        // line 31
                        echo "                    ";
                        if (twig_test_iterable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array()), "website_page", array()))) {
                            // line 32
                            echo "                      ";
                            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array(), "any", false, true), "website_page", array(), "any", false, true), ($context["i"] - 1), array(), "array", true, true)) {
                                // line 33
                                echo "                        ";
                                if (((($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array()), "website_page", array())) && is_array($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217) || $__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 instanceof ArrayAccess ? ($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217[($context["i"] - 1)] ?? null) : null) == twig_get_attribute($this->env, $this->source, $context["option"], "id", array()))) {
                                    echo "selected";
                                }
                                // line 34
                                echo "                      ";
                            }
                            // line 35
                            echo "                    ";
                        } else {
                            echo " ";
                            // line 36
                            echo "                      ";
                            if ((($context["i"] == 1) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array()), "website_page", array()) == twig_get_attribute($this->env, $this->source, $context["option"], "id", array())))) {
                                echo "selected";
                            }
                            // line 37
                            echo "                    ";
                        }
                        // line 38
                        echo "                  ";
                    } else {
                        echo " ";
                        // line 39
                        echo "                    ";
                        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["costs"] ?? null), "website_page", array()), "default", array()) == twig_get_attribute($this->env, $this->source, $context["option"], "id", array()))) {
                            echo "selected";
                        }
                        // line 40
                        echo "                  ";
                    }
                    // line 41
                    echo "                ";
                }
                // line 42
                echo "                data-option-name=\"website_page\"
                data-option-value=\"";
                // line 43
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", array()), "html", null, true);
                echo "\"
                data-option-index=\"";
                // line 44
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "\">
                &middot; ";
                // line 45
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "title", array()), "html", null, true);
                if (twig_get_attribute($this->env, $this->source, $context["option"], "setup", array())) {
                    echo " - \$";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "setup", array()), "html", null, true);
                }
                // line 46
                echo "              </option>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            echo "          </select>
          <div class=\"input-group mb-3\">
              <div class=\"input-group-prepend\">
                <span class=\"input-group-text\" id=\"page-title-label-";
            // line 51
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "\">Page Title</span>
              </div>
              <input type=\"text\" class=\"form-control text-center\"
              placeholder=\"What will be the title of this website page? ex: About Us\"
              aria-label=\"What will be the title of this website page? ex: About Us\"
              aria-describedby=\"page-title-label-";
            // line 56
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "\" name=\"website_page_title[]\"
              value=\"";
            // line 57
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), 0, array(), "array", false, true), "website_page_title", array(), "any", false, true), ($context["i"] - 1), array(), "array", true, true)) {
                echo twig_escape_filter($this->env, (($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 = twig_get_attribute($this->env, $this->source, (($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 = twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array())) && is_array($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779) || $__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 instanceof ArrayAccess ? ($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779[0] ?? null) : null), "website_page_title", array())) && is_array($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105) || $__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 instanceof ArrayAccess ? ($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105[($context["i"] - 1)] ?? null) : null), "html", null, true);
            } else {
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "website_pages", array(), "any", false, true), $context["i"], array(), "array", true, true)) {
                    echo twig_escape_filter($this->env, (($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 = twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "website_pages", array())) && is_array($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1) || $__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 instanceof ArrayAccess ? ($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1[$context["i"]] ?? null) : null), "html", null, true);
                }
            }
            echo "\">
              <span class=\"badge info-tool large-badge col-1\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Page Title\"><i class=\"fa fa-info-circle\"></i></span>
          </div>
          <button type=\"button\" class=\"btn btn-danger clear-page-button float-right\">
            <i class=\"fa fa-trash\"></i>&nbsp;Remove Page
          </button>
        </div>
      </div>
    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "  <div class=\"row mt-3 mb-3\">
    <div class=\"col-12\">
      <button type=\"button\" class=\"btn btn-lg\" id=\"add-extra-page-button\" disabled=\"disabled\">
        <i class=\"fa fa-plus\"></i> Add Another Page?
      </button>
      <span class=\"badge info-tool large-badge align-middle\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Add Another Page\"><i class=\"fa fa-info-circle\"></i></span>
    </div>
  </div>
  <div id=\"extra-pages\">
    <div class=\"extra-website-page template\" style=\"display: none\">
        <div class=\"row mt-5\">
          <div class=\"col-12\">
            <h2>Extra Page #<span class=\"extra-page-no\"></span> <span class=\"badge info-tool\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"\"><i class=\"fa fa-info-circle\"></i></span></h2>
          </div>
        </div>
        <div class=\"row mr-1 mb-3 mt-3 pl-3\">
          <div class=\"col-12 row-bordered border-secondary pt-3 pb-4 \">
            <h3>Select The Website Page Type <span class=\"badge info-tool\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Choose Page Type\"><i class=\"fa fa-info-circle\"></i></span></h3>
            <select class=\"custom-select extra-page-type-select col-11 mb-3\" name=\"extra_website_page[]\">
              ";
        // line 86
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["costs"] ?? null), "extra_website_page", array()), "options", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 87
            echo "                <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", array()), "html", null, true);
            echo "\"
                  ";
            // line 88
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["costs"] ?? null), "extra_website_page", array()), "default", array()) == twig_get_attribute($this->env, $this->source, $context["option"], "id", array()))) {
                echo "selected";
            }
            // line 89
            echo "                  data-option-name=\"extra_website_page\"
                  data-option-value=\"";
            // line 90
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", array()), "html", null, true);
            echo "\"
                  data-option-index=\"\">
                  &middot; ";
            // line 92
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "title", array()), "html", null, true);
            if (twig_get_attribute($this->env, $this->source, $context["option"], "setup", array())) {
                echo " - \$";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "setup", array()), "html", null, true);
            }
            // line 93
            echo "                </option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 95
        echo "            </select>
            <div class=\"input-group mb-3\">
              <div class=\"input-group-prepend\">
                <span class=\"input-group-text extra-page-title-label\">Page Title</span>
              </div>
              <input type=\"text\" class=\"form-control text-center\"
              placeholder=\"What will be the title of this website page? ex: About Us\" aria-label=\"(Enter Text Here)\"
              aria-describedby=\"\" name=\"extra_website_page_title[]\"
              value=\"\">
              <span class=\"badge info-tool large-badge col-1\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Page Title\"><i class=\"fa fa-info-circle\"></i></span>
            </div>
            <button type=\"button\" class=\"btn btn-danger remove-page-button float-right\">
            <i class=\"fa fa-trash\"></i>&nbsp;Remove Page
            </button>
          </div>
        </div>
    </div>
    ";
        // line 112
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), 0, array(), "array", false, true), "extra_website_page", array(), "any", true, true)) {
            // line 113
            echo "      ";
            $context["cost"] = twig_get_attribute($this->env, $this->source, ($context["costs"] ?? null), "extra_website_page", array());
            // line 114
            echo "      ";
            if (twig_test_iterable(twig_get_attribute($this->env, $this->source, (($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 = twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array())) && is_array($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0) || $__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 instanceof ArrayAccess ? ($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0[0] ?? null) : null), "extra_website_page", array()))) {
                // line 115
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 = twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array())) && is_array($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866) || $__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 instanceof ArrayAccess ? ($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866[0] ?? null) : null), "extra_website_page", array()));
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
                foreach ($context['_seq'] as $context["i"] => $context["page"]) {
                    // line 116
                    echo "          ";
                    $context["i"] = ($context["i"] + 1);
                    // line 117
                    echo "          ";
                    $this->loadTemplate("Dealers/partials/order/extra-website-page-input-block.twig", "Dealers/website/order/website-pages.twig", 117)->display($context);
                    // line 118
                    echo "        ";
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
                unset($context['_seq'], $context['_iterated'], $context['i'], $context['page'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 119
                echo "      ";
            } else {
                // line 120
                echo "        ";
                $context["page"] = twig_get_attribute($this->env, $this->source, (($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f = twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array())) && is_array($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f) || $__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f instanceof ArrayAccess ? ($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f[0] ?? null) : null), "extra_website_page", array());
                // line 121
                echo "        ";
                $context["i"] = 1;
                // line 122
                echo "        ";
                $this->loadTemplate("Dealers/partials/order/extra-website-page-input-block.twig", "Dealers/website/order/website-pages.twig", 122)->display($context);
                // line 123
                echo "      ";
            }
            // line 124
            echo "    ";
        } else {
            // line 125
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array(), "any", false, true), "extra_website_page", array(), "any", true, true)) {
                // line 126
                echo "        ";
                $context["cost"] = twig_get_attribute($this->env, $this->source, ($context["costs"] ?? null), "extra_website_page", array());
                // line 127
                echo "        ";
                if (twig_test_iterable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array()), "extra_website_page", array()))) {
                    // line 128
                    echo "          ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array()), "extra_website_page", array()));
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
                    foreach ($context['_seq'] as $context["i"] => $context["page"]) {
                        // line 129
                        echo "            ";
                        $context["i"] = ($context["i"] + 1);
                        // line 130
                        echo "            ";
                        $this->loadTemplate("Dealers/partials/order/extra-website-page-block.twig", "Dealers/website/order/website-pages.twig", 130)->display($context);
                        // line 131
                        echo "          ";
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
                    unset($context['_seq'], $context['_iterated'], $context['i'], $context['page'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 132
                    echo "        ";
                } else {
                    // line 133
                    echo "          ";
                    $context["page"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "costs", array()), "extra_website_page", array());
                    // line 134
                    echo "          ";
                    $context["i"] = 1;
                    // line 135
                    echo "          ";
                    $this->loadTemplate("Dealers/partials/order/extra-website-page-block.twig", "Dealers/website/order/website-pages.twig", 135)->display($context);
                    // line 136
                    echo "        ";
                }
                // line 137
                echo "      ";
            }
            // line 138
            echo "    ";
        }
        // line 139
        echo "  </div>
  ";
        // line 140
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "order", array(), "any", false, true), "id", array(), "any", true, true)) {
            // line 141
            echo "    <input type=\"hidden\" name=\"order_id\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "order", array()), "id", array()), "html", null, true);
            echo "\">
  ";
        }
    }

    // line 144
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 145
        $this->displayParentBlock("footer_scripts", $context, $blocks);
        echo "
<script>
  \$('.info-tool').tooltip();
  var order = ";
        // line 148
        echo json_encode(($context["order"] ?? null));
        echo ";
</script>
<script src=\"/assets/js/website/website-pages.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "Dealers/website/order/website-pages.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  454 => 148,  448 => 145,  445 => 144,  437 => 141,  435 => 140,  432 => 139,  429 => 138,  426 => 137,  423 => 136,  420 => 135,  417 => 134,  414 => 133,  411 => 132,  397 => 131,  394 => 130,  391 => 129,  373 => 128,  370 => 127,  367 => 126,  364 => 125,  361 => 124,  358 => 123,  355 => 122,  352 => 121,  349 => 120,  346 => 119,  332 => 118,  329 => 117,  326 => 116,  308 => 115,  305 => 114,  302 => 113,  300 => 112,  281 => 95,  274 => 93,  268 => 92,  263 => 90,  260 => 89,  256 => 88,  251 => 87,  247 => 86,  226 => 67,  204 => 57,  200 => 56,  192 => 51,  187 => 48,  180 => 46,  174 => 45,  170 => 44,  166 => 43,  163 => 42,  160 => 41,  157 => 40,  152 => 39,  148 => 38,  145 => 37,  140 => 36,  136 => 35,  133 => 34,  128 => 33,  125 => 32,  122 => 31,  119 => 30,  116 => 29,  113 => 28,  108 => 27,  104 => 26,  101 => 25,  96 => 24,  93 => 23,  90 => 22,  88 => 21,  83 => 20,  79 => 19,  65 => 10,  58 => 7,  53 => 6,  50 => 5,  47 => 4,  41 => 3,  35 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/website/order/website-pages.twig", "/home/dealerportal/public_html/app/Views/Dealers/website/order/website-pages.twig");
    }
}
