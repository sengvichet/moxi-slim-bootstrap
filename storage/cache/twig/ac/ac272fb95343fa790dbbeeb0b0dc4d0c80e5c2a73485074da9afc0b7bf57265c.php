<?php

/* Dealers/layouts/dashboard.twig */
class __TwigTemplate_5e2b6b5acf2a7d6c868c9388a3c3b8fe4329f7c958d7ccc4c5634f03239250f6 extends Twig_Template
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
            'topbar' => array($this, 'block_topbar'),
            'sidebar' => array($this, 'block_sidebar'),
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
        // line 34
        $this->displayBlock('header_styles', $context, $blocks);
        // line 35
        echo "
  <!-- SCRIPTS --> <!-- home -->
  ";
        // line 37
        $this->displayBlock('header_scripts', $context, $blocks);
        // line 38
        echo "    
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
    <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
  <![endif]-->
</head>
<body>

";
        // line 48
        $this->loadTemplate("Dealers/partials/header.twig", "Dealers/layouts/dashboard.twig", 48)->display($context);
        // line 49
        echo "
<div class=\"container-fluid\">
  <div class=\"row page-header\">
    <div class=\"col-md-3\">
      <p><a href=\"/\">&lt; Back to menu</a></p>
    </div>
    <div class=\"col-md-9\">
      ";
        // line 56
        $this->displayBlock('topbar', $context, $blocks);
        // line 57
        echo "    </div>
  </div>
  <div class=\"row\">
    <div class=\"col-md-3 sidebar\">
      ";
        // line 61
        $this->displayBlock('sidebar', $context, $blocks);
        // line 62
        echo "    </div>
    <div class=\"col-md-9\">
      ";
        // line 64
        $this->displayBlock('content', $context, $blocks);
        // line 65
        echo "    </div>
  </div>
</div>
";
        // line 68
        $this->loadTemplate("Dealers/partials/footer.twig", "Dealers/layouts/dashboard.twig", 68)->display($context);
        // line 69
        $this->displayBlock('footer_scripts', $context, $blocks);
        // line 70
        echo "</body>
</html>
";
    }

    // line 10
    public function block_title($context, array $blocks = array())
    {
    }

    // line 34
    public function block_header_styles($context, array $blocks = array())
    {
    }

    // line 37
    public function block_header_scripts($context, array $blocks = array())
    {
    }

    // line 56
    public function block_topbar($context, array $blocks = array())
    {
    }

    // line 61
    public function block_sidebar($context, array $blocks = array())
    {
    }

    // line 64
    public function block_content($context, array $blocks = array())
    {
    }

    // line 69
    public function block_footer_scripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "Dealers/layouts/dashboard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 69,  155 => 64,  150 => 61,  145 => 56,  140 => 37,  135 => 34,  130 => 10,  124 => 70,  122 => 69,  120 => 68,  115 => 65,  113 => 64,  109 => 62,  107 => 61,  101 => 57,  99 => 56,  90 => 49,  88 => 48,  76 => 38,  74 => 37,  70 => 35,  68 => 34,  41 => 10,  30 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/layouts/dashboard.twig", "C:\\xampp\\htdocs\\moxxi\\app\\Views\\Dealers\\layouts\\dashboard.twig");
    }
}
