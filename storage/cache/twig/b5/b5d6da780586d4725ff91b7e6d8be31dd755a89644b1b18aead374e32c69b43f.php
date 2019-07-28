<?php

/* Dealers/gmb/reviews/index.twig */
class __TwigTemplate_66e7cba33d8da8a42357cef3a879b5f95722b49e06575d443d5eb33124a514e1 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/layouts/dashboard.twig", "Dealers/gmb/reviews/index.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'sidebar' => array($this, 'block_sidebar'),
            'content' => array($this, 'block_content'),
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
        echo "Google My Business - Reviews";
    }

    // line 3
    public function block_sidebar($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        $this->loadTemplate("Dealers/partials/sidebar/dealer.twig", "Dealers/gmb/reviews/index.twig", 4)->display($context);
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "  <h1>Google My Business Reviews</h1>
  <div class=\"row\">
    <div class=\"col-12\">
      <a class=\"btn btn-secondary\" href=\"/";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "back", array()), "html", null, true);
        echo "\">Back To GMB Dashboard</a>
    </div>
  </div>
  <div class=\"row\">
    <div class=\"col-sm-6 text-right\">
      <p><b>GMB Location ID: </b></p>
    </div>
    <div class=\"col-sm-6\">
      <form id=\"location-form\">
      <select class=\"form-control\" name=\"location\" onchange=\"document.getElementById('location-form').submit()\">
        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["locations"] ?? null), "id", array()));
        foreach ($context['_seq'] as $context["key"] => $context["location"]) {
            // line 21
            echo "          <option value=\"";
            echo twig_escape_filter($this->env, $context["location"], "html", null, true);
            echo "\" ";
            if ((twig_get_attribute($this->env, $this->source, ($context["selected_location"] ?? null), "id", array()) == $context["location"])) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_attribute($this->env, $this->source, ($context["locations"] ?? null), "name", array())) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[$context["key"]] ?? null) : null), "html", null, true);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['location'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "      </select>
    </form>
    </div>
  </div>
  <div class=\"row\">
    <div class=\"col-12\">
      ";
        // line 29
        if (twig_length_filter($this->env, ($context["reviews"] ?? null))) {
            // line 30
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["reviews"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["review"]) {
                // line 31
                echo "        <div class=\"card mt-3 mb-3\">
          <div class=\"card-header\">
            <div class=\"row\">
              <div class=\"col-4\">
                ";
                // line 35
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, twig_get_attribute($this->env, $this->source, $context["review"], "star_rating", array())));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 36
                    echo "                  <i class=\"fa fa-star text-warning\"></i>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 38
                echo "                ";
                if ((twig_get_attribute($this->env, $this->source, $context["review"], "star_rating", array()) < 5)) {
                    // line 39
                    echo "                  ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(twig_get_attribute($this->env, $this->source, $context["review"], "star_rating", array()), 4));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 40
                        echo "                    <i class=\"fa fa-star text-secondary\"></i>
                  ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 42
                    echo "                ";
                }
                // line 43
                echo "              </div>
              <div class=\"col-4 text-center\">";
                // line 44
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "reviewer_name", array()), "html", null, true);
                echo "</div>
              <div class=\"col-4 text-right text-muted\">";
                // line 45
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "create_timestamp", array()), "F j Y \\a\\t H:i"), "html", null, true);
                echo " GMT</div>
            </div>
          </div>
          <div class=\"card-body\">
            ";
                // line 49
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "comment", array()), "html", null, true);
                echo "
          </div>
          <div class=\"card-footer text-muted\">
            ";
                // line 52
                if (twig_get_attribute($this->env, $this->source, $context["review"], "reply_comment", array())) {
                    // line 53
                    echo "              <p><i>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "reply_comment", array()), "html", null, true);
                    echo "</i></p>
              <p>
                <a class=\"btn btn-primary\" href=\"/";
                    // line 55
                    echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "review", array()), array(":review" => twig_get_attribute($this->env, $this->source, $context["review"], "review_id", array()))), "html", null, true);
                    echo "\">View and Edit</a>
                <span class=\"float-right\">";
                    // line 56
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "reply_update_timestamp", array()), "F j Y \\a\\t H:i"), "html", null, true);
                    echo " GMT</span>
              </p>
            ";
                } else {
                    // line 59
                    echo "              <a class=\"btn btn-primary\" href=\"/";
                    echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "review", array()), array(":review" => twig_get_attribute($this->env, $this->source, $context["review"], "review_id", array()))), "html", null, true);
                    echo "\">Reply</a>
            ";
                }
                // line 61
                echo "          </div>
        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['review'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "      ";
        } else {
            // line 65
            echo "        <h3 class=\"text-center mt-3 mb-3\">No reviews yet</h3>
      ";
        }
        // line 67
        echo "    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "Dealers/gmb/reviews/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 67,  193 => 65,  190 => 64,  182 => 61,  176 => 59,  170 => 56,  166 => 55,  160 => 53,  158 => 52,  152 => 49,  145 => 45,  141 => 44,  138 => 43,  135 => 42,  128 => 40,  123 => 39,  120 => 38,  113 => 36,  109 => 35,  103 => 31,  98 => 30,  96 => 29,  88 => 23,  73 => 21,  69 => 20,  56 => 10,  51 => 7,  48 => 6,  43 => 4,  40 => 3,  34 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/gmb/reviews/index.twig", "/home/dealerportal/public_html/app/Views/Dealers/gmb/reviews/index.twig");
    }
}
