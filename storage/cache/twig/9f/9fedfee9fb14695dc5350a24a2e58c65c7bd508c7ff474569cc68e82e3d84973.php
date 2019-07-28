<?php

/* Dealers/gmb/reviews/reply.twig */
class __TwigTemplate_023704dbfa92f045efc48720b492b342c175958008e6912ae8ff1a176a2ec146 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/layouts/dashboard.twig", "Dealers/gmb/reviews/reply.twig", 1);
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
        echo "Google My Business - Review Reply";
    }

    // line 3
    public function block_sidebar($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        $this->loadTemplate("Dealers/partials/sidebar/dealer.twig", "Dealers/gmb/reviews/reply.twig", 4)->display($context);
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "  <h1>Google My Business Review Reply</h1>
  <div class=\"row\">
    <div class=\"col-12\">
      <a class=\"btn btn-secondary\" href=\"/";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "back", array()), "html", null, true);
        echo "\">Back To Reviews</a>
      ";
        // line 11
        if (($context["review"] ?? null)) {
            // line 12
            echo "        <div class=\"card mt-3 mb-3\">
          <div class=\"card-header\">
            <div class=\"row\">
              <div class=\"col-4\">
                ";
            // line 16
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, twig_get_attribute($this->env, $this->source, ($context["review"] ?? null), "star_rating", array())));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 17
                echo "                  <i class=\"fa fa-star text-warning\"></i>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "                ";
            if ((twig_get_attribute($this->env, $this->source, ($context["review"] ?? null), "star_rating", array()) < 5)) {
                // line 20
                echo "                  ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(twig_get_attribute($this->env, $this->source, ($context["review"] ?? null), "star_rating", array()), 4));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 21
                    echo "                    <i class=\"fa fa-star text-secondary\"></i>
                  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 23
                echo "                ";
            }
            // line 24
            echo "              </div>
              <div class=\"col-4 text-center\">";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["review"] ?? null), "reviewer_name", array()), "html", null, true);
            echo "</div>
              <div class=\"col-4 text-right text-muted\">";
            // line 26
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["review"] ?? null), "create_timestamp", array()), "F j Y \\a\\t H:i"), "html", null, true);
            echo " GMT</div>
            </div>
          </div>
          <div class=\"card-body\">
            ";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["review"] ?? null), "comment", array()), "html", null, true);
            echo "
          </div>
          <div class=\"card-footer text-muted\">
            ";
            // line 33
            if (twig_get_attribute($this->env, $this->source, ($context["review"] ?? null), "reply_comment", array())) {
                // line 34
                echo "              <form method=\"POST\" action=\"/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "edit", array()), "html", null, true);
                echo "\" id=\"reply-form\" class=\"needs-validation\" novalidate>
                <div class=\"form-group\">
                  <label for=\"reply-textarea\">Reply</label>
                  <textarea class=\"form-control ";
                // line 37
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "reply", array(), "any", true, true)) {
                    echo "is-invalid";
                }
                echo "\"
                  id=\"reply-textarea\" name=\"reply\" required>";
                // line 38
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "reply", array(), "any", true, true)) {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "reply", array()), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["review"] ?? null), "reply_comment", array()), "html", null, true);
                }
                echo "</textarea>
                  ";
                // line 39
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "reply", array(), "any", true, true)) {
                    // line 40
                    echo "                    ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "reply", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 41
                        echo "                      <div class=\"invalid-feedback\">";
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "</div>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 43
                    echo "                  ";
                } else {
                    // line 44
                    echo "                    <div class=\"invalid-feedback\">Please provide a reply.</div>
                  ";
                }
                // line 46
                echo "                </div>
                <div class=\"form-group float-right\">
                  <button type=\"submit\" class=\"btn btn-warning\">Edit</button>
                  <button type=\"button\" class=\"btn btn-danger delete-reply-button\">Delete</button>
                </div>
              </form>
            ";
            } else {
                // line 53
                echo "              <form action=\"/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "save", array()), "html", null, true);
                echo "\" method=\"POST\" class=\"needs-validation\" novalidate>
                <div class=\"form-group\">
                  <label for=\"reply-textarea\">Reply</label>
                  <textarea  class=\"form-control ";
                // line 56
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "reply", array(), "any", true, true)) {
                    echo "is-invalid";
                }
                echo "\"
                    id=\"reply-textarea\" name=\"reply\" placeholder=\"Reply\" required></textarea>
                  ";
                // line 58
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "reply", array(), "any", true, true)) {
                    // line 59
                    echo "                    ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "reply", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 60
                        echo "                      <div class=\"invalid-feedback\">";
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "</div>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 62
                    echo "                  ";
                } else {
                    // line 63
                    echo "                    <div class=\"invalid-feedback\">Please provide a reply.</div>
                  ";
                }
                // line 65
                echo "                </div>
                <button type=\"submit\" class=\"btn btn-success float-right\">Reply</button>
              </form>
            ";
            }
            // line 69
            echo "          </div>
        </div>
      ";
        } else {
            // line 72
            echo "        <h3 class=\"text-center mt-3 mb-3\">Sorry, review is not available</h3>
      ";
        }
        // line 74
        echo "    </div>
  </div>
";
    }

    // line 77
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 78
        echo "<script src=\"/assets/js/bootstrap-form-validation.js\"></script>
<script>
validateForm();
var deleteAction = '/";
        // line 81
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "delete", array()), "html", null, true);
        echo "';
function deleteReply() {
  \$('#reply-form').prop('action', deleteAction).submit();
}
\$(document).ready(function() {
  \$('.delete-reply-button').click(function(e) {
    e.preventDefault();
    deleteReply();
  });
});
</script>
";
    }

    public function getTemplateName()
    {
        return "Dealers/gmb/reviews/reply.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  239 => 81,  234 => 78,  231 => 77,  225 => 74,  221 => 72,  216 => 69,  210 => 65,  206 => 63,  203 => 62,  194 => 60,  189 => 59,  187 => 58,  180 => 56,  173 => 53,  164 => 46,  160 => 44,  157 => 43,  148 => 41,  143 => 40,  141 => 39,  133 => 38,  127 => 37,  120 => 34,  118 => 33,  112 => 30,  105 => 26,  101 => 25,  98 => 24,  95 => 23,  88 => 21,  83 => 20,  80 => 19,  73 => 17,  69 => 16,  63 => 12,  61 => 11,  57 => 10,  52 => 7,  49 => 6,  44 => 4,  41 => 3,  35 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/gmb/reviews/reply.twig", "/home/dealerportal/public_html/app/Views/Dealers/gmb/reviews/reply.twig");
    }
}
