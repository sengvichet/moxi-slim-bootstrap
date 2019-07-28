<?php

/* Common/login.twig */
class __TwigTemplate_e5803b1dc0dcc2319e3ec41d295e390e1aa084b1f07c9cd576f0a6db4abb096d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Common/layouts/index.twig", "Common/login.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "Common/layouts/index.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Dealers";
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"row\">
  <div class=\"col\">
    <h1>Login to Dealers Portal!</h1>
  </div>
</div>
";
        // line 9
        if (((isset($context["messages"]) || array_key_exists("messages", $context)) &&  !twig_test_empty(($context["messages"] ?? null)))) {
            // line 10
            echo "<div class=\"row\">
  <div class=\"col\">
    <ul class=\"list-group\">
      ";
            // line 13
            if (twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "array", true, true)) {
                // line 14
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = ($context["messages"] ?? null)) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5["error"] ?? null) : null));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 15
                    echo "          <li class=\"list-group-item list-group-item-danger\">
            ";
                    // line 16
                    echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                    echo "
          </li>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 19
                echo "      ";
            } elseif (twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "message", array(), "array", true, true)) {
                // line 20
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = ($context["messages"] ?? null)) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a["message"] ?? null) : null));
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 21
                    echo "          <li class=\"list-group-item list-group-item-";
                    if ((twig_get_attribute($this->env, $this->source, $context["message"], "status", array()) == "success")) {
                        echo "success";
                    } else {
                        echo "danger";
                    }
                    echo "\">
            ";
                    // line 22
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["message"], "text", array()), "html", null, true);
                    echo "
          </li>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 25
                echo "      ";
            }
            // line 26
            echo "    </ul>
  </div>
</div>
";
        }
        // line 30
        echo "<div class=\"row justify-content-md-center\">
  <div class=\"col col-md-6\">
    <form action=\"/login\" method=\"POST\">
      <div class=\"form-group\">
        <label for=\"email-input\">Email address</label>
        <input type=\"email\" class=\"form-control\" id=\"email-input\" name=\"email\" placeholder=\"Email\" required maxlength=\"";
        // line 35
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "email", array()), "max_length", array()), "html", null, true);
        echo "\">
      </div>
      <div class=\"form-group\">
        <label for=\"password-input\">Password</label>
        <input type=\"password\" class=\"form-control\" id=\"password-input\" name=\"password\" placeholder=\"Password\" required minlength=\"";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "password", array()), "min_length", array()), "html", null, true);
        echo "\">
      </div>
      <button type=\"submit\" class=\"btn btn-primary\">Submit</button>
      <p class=\"float-right\"><a href=\"";
        // line 42
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["links"] ?? null), "reset", array()), "html", null, true);
        echo "\">Reset Password</a></p>
    </form>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "Common/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 42,  124 => 39,  117 => 35,  110 => 30,  104 => 26,  101 => 25,  92 => 22,  83 => 21,  78 => 20,  75 => 19,  66 => 16,  63 => 15,  58 => 14,  56 => 13,  51 => 10,  49 => 9,  42 => 4,  39 => 3,  33 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Common/login.twig", "/home/phpdeva/public_html/app/Views/Common/login.twig");
    }
}
