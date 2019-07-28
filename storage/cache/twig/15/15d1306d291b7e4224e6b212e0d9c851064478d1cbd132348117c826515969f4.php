<?php

/* Common/layouts/index.twig */
class __TwigTemplate_d14b2f921468460372723eada73847c028e25caccccb8a9d0383bf448c6709c3 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header_styles' => array($this, 'block_header_styles'),
            'header_scripts' => array($this, 'block_header_scripts'),
            'content' => array($this, 'block_content'),
            'footer_scripts' => array($this, 'block_footer_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <meta name=\"description\" content=\"Dealers\">
  <meta name=\"author\" content=\"Dealers\">

  <title>";
        // line 10
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

  <!-- Bootstrap Core CSS -->
  <link href=\"/assets/css/bootstrap.min.css\" rel=\"stylesheet\">
  <link href=\"/assets/css/fontawesome/all.min.css\" rel=\"stylesheet\">
  <link href=\"/assets/css/custom.css\" rel=\"stylesheet\">

  <!-- FAVICON-->
  <link rel=\"icon\" type=\"image/png\" href=\"/assets/images/favicon.png\" sizes=\"16x16\">
  <link rel=\"icon\" type=\"image/png\" href=\"/assets/images/favicon.png\" sizes=\"32x32\">
  <link rel=\"icon\" type=\"image/png\" href=\"/assets/images/favicon.png\" sizes=\"96x96\">

  <link rel=\"apple-touch-icon\" sizes=\"57x57\" href=\"/favicon-touch.png\">
  <link rel=\"apple-touch-icon\" sizes=\"114x114\" href=\"/favicon-touch.png\">
  <link rel=\"apple-touch-icon\" sizes=\"72x72\" href=\"/favicon-touch.png\">
  <link rel=\"apple-touch-icon\" sizes=\"144x144\" href=\"/favicon-touch.png\">
  <link rel=\"apple-touch-icon\" sizes=\"60x60\" href=\"/favicon-touch.png\">
  <link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"/favicon-touch.png\">
  <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"/favicon-touch.png\">
  <link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"/favicon-touch.png\">

  <meta name=\"msapplication-TileColor\" content=\"#2b5797\">
  <meta name=\"msapplication-TileImage\" content=\"/favicon-touch.png\">

  <!-- CSS -->
  ";
        // line 35
        $this->displayBlock('header_styles', $context, $blocks);
        // line 36
        echo "
  <!-- SCRIPTS --> <!-- home -->
  ";
        // line 38
        $this->displayBlock('header_scripts', $context, $blocks);
        // line 39
        echo "    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
        <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->
</head>
<body>

";
        // line 48
        $this->loadTemplate("Common/partials/header.twig", "Common/layouts/index.twig", 48)->display($context);
        // line 49
        echo "
<div class=\"container-fluid\">
";
        // line 51
        $this->displayBlock('content', $context, $blocks);
        // line 52
        echo "</div>

";
        // line 54
        $this->loadTemplate("Common/partials/footer.twig", "Common/layouts/index.twig", 54)->display($context);
        // line 55
        echo "
";
        // line 56
        $this->displayBlock('footer_scripts', $context, $blocks);
        // line 57
        echo "
</body>
</html>
";
    }

    // line 10
    public function block_title($context, array $blocks = array())
    {
    }

    // line 35
    public function block_header_styles($context, array $blocks = array())
    {
    }

    // line 38
    public function block_header_scripts($context, array $blocks = array())
    {
    }

    // line 51
    public function block_content($context, array $blocks = array())
    {
    }

    // line 56
    public function block_footer_scripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Common/layouts/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 56,  127 => 51,  122 => 38,  117 => 35,  112 => 10,  105 => 57,  103 => 56,  100 => 55,  98 => 54,  94 => 52,  92 => 51,  88 => 49,  86 => 48,  75 => 39,  73 => 38,  69 => 36,  67 => 35,  39 => 10,  28 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Common/layouts/index.twig", "C:\\xampp\\htdocs\\moxxi\\app\\Views\\Common\\layouts\\index.twig");
    }
}
