<?php

/* Admin/index.twig */
class __TwigTemplate_3e97802e492cfe8a3b6af7c1a48a219a9a5f216f238a0a237dd4a0eb4a30a38d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Admin/layouts/index.twig", "Admin/index.twig", 1);
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
        echo "Admin - Dashboard";
    }

    // line 5
    public function block_page_content($context, array $blocks = array())
    {
        // line 6
        echo "<h1>Admin - Dashboard</h1>
  <div class=\"row\">
    ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["menu"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 9
            echo "      <div class=\"col-sm-4 col-lg-3\">
        <div class=\"col card-box bg-";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "color", array()), "html", null, true);
            echo "\" data-href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "link", array()), "html", null, true);
            echo "\">
          <p class=\"text-white text-center h3\">";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "title", array()), "html", null, true);
            echo "</p>
        </div>
        <p class=\"card-description text-center\">";
            // line 13
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "description", array()), "html", null, true);
            echo "</p>
      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "  </div>
";
    }

    // line 19
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 20
        $this->displayParentBlock("footer_scripts", $context, $blocks);
        echo "
<script>
  \$(document).ready(function () {
    \$('.card-box').click(function () {
        var href = \$(this).data('href');
        window.location.href = href;
    });
  });
</script>
";
    }

    public function getTemplateName()
    {
        return "Admin/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 20,  79 => 19,  74 => 16,  65 => 13,  60 => 11,  54 => 10,  51 => 9,  47 => 8,  43 => 6,  40 => 5,  34 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Admin/index.twig", "/home/phpdeva/public_html/app/Views/Admin/index.twig");
    }
}
