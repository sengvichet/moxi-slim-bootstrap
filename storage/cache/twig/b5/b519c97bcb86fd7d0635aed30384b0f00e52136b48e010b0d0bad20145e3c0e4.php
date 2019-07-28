<?php

/* Dealers/company-profile/index.twig */
class __TwigTemplate_16b4ac9dac3f22f5c4bcf933392af53529bf5972ad0fa42a16a13d089e1cc7c3 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/layouts/dashboard.twig", "Dealers/company-profile/index.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header_styles' => array($this, 'block_header_styles'),
            'footer_scripts' => array($this, 'block_footer_scripts'),
            'topbar' => array($this, 'block_topbar'),
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
        echo "Dealers Company Profile";
    }

    // line 3
    public function block_header_styles($context, array $blocks = array())
    {
        // line 4
        echo "  <link href=\"/assets/css/material-switch.css\" rel=\"stylesheet\">
  <link href=\"/assets/css/checkbox.css\" rel=\"stylesheet\">
  <link href=\"/assets/css/fileupload/blueimp-gallery.min.css\" rel=\"stylesheet\">
  <link href=\"/assets/css/fileupload/jquery.fileupload.css\" rel=\"stylesheet\">
  <link href=\"/assets/css/fileupload/jquery.fileupload-ui.css\" rel=\"stylesheet\">
  <link href=\"/assets/css/bootstrap-tagsinput.css\" rel=\"stylesheet\">
";
    }

    // line 11
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 12
        echo "  <script>
    ";
        // line 13
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array(), "any", false, true), "categories", array(), "any", true, true)) {
            // line 14
            echo "      var companyCategories = ";
            echo json_encode(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "categories", array()));
            echo ";
    ";
        } else {
            // line 16
            echo "      var companyCategories = [];
    ";
        }
        // line 18
        echo "  </script>
  <script src=\"/assets/js/sweetalert2.all.min.js\"></script>
  <script src=\"/assets/js/bootstrap-form-validation.js\"></script>
  <script src=\"/assets/js/company-profile/contact-information.js\"></script>
  <script src=\"/assets/js/company-profile/website-information.js\"></script>
  <script src=\"/assets/js/company-profile/essential-information.js\"></script>
  <script src=\"/assets/js/company-profile/social-media.js\"></script>
  <script src=\"/assets/js/company-profile/company-photos.js\"></script>
  <script src=\"/assets/js/fileupload/tmpl.min.js\"></script>
  <script src=\"/assets/js/fileupload/load-image.all.min.js\"></script>
  <script src=\"/assets/js/fileupload/jquery.blueimp-gallery.min.js\"></script>
  <script src=\"/assets/js/fileupload/canvas-to-blob.min.js\"></script>
  <script src=\"/assets/js/fileupload/jquery.ui.widget.js\"></script>
  <script src=\"/assets/js/fileupload/jquery.iframe-transport.js\"></script>
  <script src=\"/assets/js/fileupload/jquery.fileupload.js\"></script>
  <script src=\"/assets/js/fileupload/jquery.fileupload-process.js\"></script>
  <script src=\"/assets/js/fileupload/jquery.fileupload-image.js\"></script>
  <script src=\"/assets/js/fileupload/jquery.fileupload-ui.js\"></script>
  <script src=\"/assets/js/fileupload/main.js\"></script>
  <script src=\"https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js\"></script>
  <script src=\"/assets/js/bootstrap-tagsinput.min.js\"></script>
  <script>
    var tab = '";
        // line 40
        if (twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "tab", array(), "any", true, true)) {
            echo "'
    + '";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "tab", array()), "name", array()), "html", null, true);
            echo "'
    +' ";
        } else {
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["tabs"] ?? null)), "name", array()), "html", null, true);
        }
        echo "';
    \$(document).ready(function () {
      \$('#nav-tab a').removeClass('active');
      \$('#nav-' + tab + '-tab').addClass('active');
      \$('.nav-tab').click(function() {
        \$('.errors-section').remove();
      });
    });
    var page = '";
        // line 50
        echo twig_escape_filter($this->env, ($context["page"] ?? null), "html", null, true);
        echo "';
</script>
";
    }

    // line 53
    public function block_topbar($context, array $blocks = array())
    {
        // line 54
        echo " ";
        $this->loadTemplate("Dealers/partials/topbar/company-profile.twig", "Dealers/company-profile/index.twig", 54)->display($context);
    }

    // line 56
    public function block_sidebar($context, array $blocks = array())
    {
        // line 57
        echo "  ";
        $this->loadTemplate("Dealers/partials/sidebar/dealer.twig", "Dealers/company-profile/index.twig", 57)->display($context);
    }

    // line 59
    public function block_content($context, array $blocks = array())
    {
        // line 60
        echo "<div class=\"tab-content\" id=\"nav-tabContent\">
  ";
        // line 61
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tabs"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["tab"]) {
            // line 62
            echo "    ";
            if (twig_in_filter(($context["page"] ?? null), twig_get_attribute($this->env, $this->source, $context["tab"], "pages", array()))) {
                // line 63
                echo "    <div class=\"tab-pane fade ";
                if (twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "tab", array(), "any", true, true)) {
                    // line 64
                    echo "      ";
                    if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "tab", array()), "name", array()) == twig_get_attribute($this->env, $this->source, $context["tab"], "name", array()))) {
                        echo "show active";
                    }
                    // line 65
                    echo "      ";
                } else {
                    if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", array())) {
                        echo "show active";
                    }
                }
                echo "\"
      id=\"nav-";
                // line 66
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tab"], "name", array()), "html", null, true);
                echo "\" role=\"tabpanel\" aria-labelledby=\"nav-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["tab"], "name", array()), "html", null, true);
                echo "-tab\">
      ";
                // line 67
                $this->loadTemplate((("Dealers/company-profile/" . twig_get_attribute($this->env, $this->source, $context["tab"], "name", array())) . ".twig"), "Dealers/company-profile/index.twig", 67)->display($context);
                // line 68
                echo "    </div>
    ";
            }
            // line 70
            echo "  ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "Dealers/company-profile/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 71,  197 => 70,  193 => 68,  191 => 67,  185 => 66,  176 => 65,  171 => 64,  168 => 63,  165 => 62,  148 => 61,  145 => 60,  142 => 59,  137 => 57,  134 => 56,  129 => 54,  126 => 53,  119 => 50,  107 => 42,  102 => 41,  98 => 40,  74 => 18,  70 => 16,  64 => 14,  62 => 13,  59 => 12,  56 => 11,  46 => 4,  43 => 3,  37 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/company-profile/index.twig", "/home/dealerportal/public_html/app/Views/Dealers/company-profile/index.twig");
    }
}
