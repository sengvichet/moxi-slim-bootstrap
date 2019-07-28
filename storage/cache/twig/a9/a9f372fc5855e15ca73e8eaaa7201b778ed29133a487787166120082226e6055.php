<?php

/* Common/partials/footer.twig */
class __TwigTemplate_ef6623827893ac40a5ec56aaf68e47416c020aa44099758784f12be2ea2221ee extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'footer_up_scripts' => array($this, 'block_footer_up_scripts'),
            'footer_down_scripts' => array($this, 'block_footer_down_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<footer></footer>
";
        // line 2
        $this->displayBlock('footer_up_scripts', $context, $blocks);
        // line 3
        echo "<script src=\"/assets/js/jquery-3.3.1.min.js\"></script>
<script src=\"/assets/js/bootstrap.min.js\"></script>
";
        // line 5
        $this->displayBlock('footer_down_scripts', $context, $blocks);
    }

    // line 2
    public function block_footer_up_scripts($context, array $blocks = array())
    {
    }

    // line 5
    public function block_footer_down_scripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Common/partials/footer.twig";
    }

    public function getDebugInfo()
    {
        return array (  43 => 5,  38 => 2,  34 => 5,  30 => 3,  28 => 2,  25 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Common/partials/footer.twig", "/home/phpdeva/public_html/app/Views/Common/partials/footer.twig");
    }
}
