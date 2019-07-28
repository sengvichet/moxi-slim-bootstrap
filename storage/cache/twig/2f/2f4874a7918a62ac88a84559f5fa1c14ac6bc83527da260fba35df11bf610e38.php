<?php

/* Dealers/website/index.twig */
class __TwigTemplate_aa6ddbebd522fd3de518665ca8a8f91d6c5a2359cc539d1b378cb3c23d0f679e extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/layouts/dashboard.twig", "Dealers/website/index.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header_scripts' => array($this, 'block_header_scripts'),
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
        echo "Dealers Website";
    }

    // line 3
    public function block_header_scripts($context, array $blocks = array())
    {
        // line 4
        echo "  <script src=\"/assets/js/jquery-3.3.1.min.js\"></script>
  <script src=\"/assets/js/bootstrap.min.js\"></script>
  <script src=\"/assets/js/website/website.js\"></script>
";
    }

    // line 8
    public function block_sidebar($context, array $blocks = array())
    {
        // line 9
        echo "  ";
        $this->loadTemplate("Dealers/partials/sidebar/dealer.twig", "Dealers/website/index.twig", 9)->display($context);
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "  <div class=\"row\">
    ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cards"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["card"]) {
            // line 14
            echo "      ";
            $context["disabled"] = (twig_get_attribute($this->env, $this->source, $context["card"], "completed_order", array(), "any", true, true) && (((twig_get_attribute($this->env, $this->source, $context["card"], "completed_order", array()) == false) && ($context["has_completed_order"] ?? null)) || (twig_get_attribute($this->env, $this->source, $context["card"], "completed_order", array()) &&  !($context["has_completed_order"] ?? null))));
            // line 15
            echo "      <div class=\"col\">
        <div class=\"col card-box card-";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["card"], "color", array()), "html", null, true);
            echo "
          ";
            // line 17
            if (($context["disabled"] ?? null)) {
                echo "card-disabled";
            }
            echo "\" data-href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["card"], "link", array()), "html", null, true);
            echo "\">
          <img src=\"/assets/images/card_icons/";
            // line 18
            if (($context["disabled"] ?? null)) {
                echo "disabled_";
            }
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["card"], "image", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["card"], "title", array()), "html", null, true);
            echo "\">
          <p class=\"card-title\">";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["card"], "title", array()), "html", null, true);
            echo "</p>
        </div>
        <p class=\"card-description\">";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["card"], "description", array()), "html", null, true);
            echo "</p>
      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['card'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "  </div>
";
    }

    public function getTemplateName()
    {
        return "Dealers/website/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 24,  101 => 21,  96 => 19,  87 => 18,  79 => 17,  75 => 16,  72 => 15,  69 => 14,  65 => 13,  62 => 12,  59 => 11,  54 => 9,  51 => 8,  44 => 4,  41 => 3,  35 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/website/index.twig", "/home/dealerportal/public_html/app/Views/Dealers/website/index.twig");
    }
}
