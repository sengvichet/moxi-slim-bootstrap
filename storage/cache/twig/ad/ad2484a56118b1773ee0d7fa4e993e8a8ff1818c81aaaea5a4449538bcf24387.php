<?php

/* Admin/social_media/index.twig */
class __TwigTemplate_70dab2f77f21a6c49ddfef547fafa0c396b8aef1328f2e76f652257ee52f92df extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Admin/layouts/index.twig", "Admin/social_media/index.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header_styles' => array($this, 'block_header_styles'),
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
        echo "Admin - Social Media";
    }

    // line 5
    public function block_header_styles($context, array $blocks = array())
    {
        // line 6
        echo "  ";
        $this->displayParentBlock("header_styles", $context, $blocks);
        echo "
  <link rel=\"stylesheet\" type=\"text/css\" href=\"/assets/DataTables/datatables.min.css\">
";
    }

    // line 10
    public function block_page_content($context, array $blocks = array())
    {
        // line 11
        $this->loadTemplate("Admin/partials/home-button.twig", "Admin/social_media/index.twig", 11)->display($context);
        // line 12
        echo "<h1>Admin - Social Media</h1>
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">Add Social Media Data</h3>
  </div>
  <div class=\"card-body\">
    ";
        // line 18
        $this->loadTemplate("Dealers/partials/errors.twig", "Admin/social_media/index.twig", 18)->display($context);
        // line 19
        echo "    <form action=\"/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "save", array()), "html", null, true);
        echo "\" method=\"POST\" class=\"needs-validation\" novalidate>
      <div class=\"row\">
        <!-- Dealer -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"dealer-select\">Dealer</label>
          <select id=\"dealer-select\" name=\"dealer\" required
            class=\"form-control
            ";
        // line 26
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "dealer", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\">
            ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["dealers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["dealer"]) {
            // line 28
            echo "              <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "id", array()), "html", null, true);
            echo "\"
                ";
            // line 29
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "dealer", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "dealer", array()) == twig_get_attribute($this->env, $this->source, $context["dealer"], "id", array())))) {
                echo "selected";
            }
            echo ">
                  ";
            // line 30
            if ((twig_get_attribute($this->env, $this->source, $context["dealer"], "first_name", array()) || twig_get_attribute($this->env, $this->source, $context["dealer"], "last_name", array()))) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "first_name", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "last_name", array()), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["dealer"], "email", array()), "html", null, true);
            }
            // line 31
            echo "              </option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dealer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "          </select>
          ";
        // line 34
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "dealer", array(), "any", true, true)) {
            // line 35
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "dealer", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 36
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "          ";
        } else {
            // line 39
            echo "            <div class=\"invalid-feedback\">Please provide a valid dealer.</div>
          ";
        }
        // line 41
        echo "        </div>
        <!-- Year -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"year-input\">Year</label>
          <input type=\"number\" name=\"year\" id=\"year-input\" required class=\"form-control
            ";
        // line 46
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "year", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            min=\"";
        // line 47
        echo twig_escape_filter($this->env, (twig_date_format_filter($this->env, "now", "Y") - 1), "html", null, true);
        echo "\" max=\"";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo "\"
            placeholder=\"";
        // line 48
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo "\"
            value=\"";
        // line 49
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "year", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "year", array()), "html", null, true);
        }
        echo "\">
          ";
        // line 50
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "year", array(), "any", true, true)) {
            // line 51
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "year", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 52
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            echo "          ";
        } else {
            // line 55
            echo "            <div class=\"invalid-feedback\">Please provide a valid year.</div>
          ";
        }
        // line 57
        echo "        </div>
        <!-- Month -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"month-select\">Month</label>
          <select name=\"month\" id=\"month-input\" required
            class=\"form-control
            ";
        // line 63
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "month", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\">
            ";
        // line 64
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(array(0 => "january", 1 => "february", 2 => "march", 3 => "april", 4 => "may", 5 => "june", 6 => "july", 7 => "august", 8 => "september", 9 => "october", 10 => "november", 11 => "december"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["month"]) {
            // line 66
            echo "              <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", array()), "html", null, true);
            echo "\"
                ";
            // line 67
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "month", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "month", array()) == twig_get_attribute($this->env, $this->source, $context["loop"], "index", array())))) {
                echo "selected";
            }
            echo ">
                ";
            // line 68
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["month"]), "html", null, true);
            echo "
              </option>
            ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['month'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "          </select>
          ";
        // line 72
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "month", array(), "any", true, true)) {
            // line 73
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "month", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 74
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "          ";
        } else {
            // line 77
            echo "            <div class=\"invalid-feedback\">Please provide a valid month.</div>
          ";
        }
        // line 79
        echo "        </div>
        <!-- Day of Week -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"day-select\">Day Of Week</label>
          <select name=\"day\" id=\"day-select\" required
            class=\"form-control
            ";
        // line 85
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "day", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\">
            ";
        // line 86
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(array(0 => "monday", 1 => "tuesday", 2 => "wednesday", 3 => "thursday", 4 => "friday", 5 => "saturday", 6 => "sunday"));
        foreach ($context['_seq'] as $context["_key"] => $context["day"]) {
            // line 88
            echo "              <option value=\"";
            echo twig_escape_filter($this->env, $context["day"], "html", null, true);
            echo "\"
                ";
            // line 89
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "day", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "day", array()) == $context["day"]))) {
                echo "selected";
            }
            echo ">
                ";
            // line 90
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["day"]), "html", null, true);
            echo "
              </option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['day'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        echo "          </select>
          ";
        // line 94
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "day", array(), "any", true, true)) {
            // line 95
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "day", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 96
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 98
            echo "          ";
        } else {
            // line 99
            echo "            <div class=\"invalid-feedback\">Please provide a valid day of week.</div>
          ";
        }
        // line 101
        echo "        </div>
        <!-- Platform -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"platform-select\">Platform</label>
          <select id=\"platform-select\" name=\"platform\" required
            class=\"form-control
            ";
        // line 107
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "platform", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\">
            ";
        // line 108
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["platforms"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["platform"]) {
            // line 109
            echo "              <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["platform"], "id", array()), "html", null, true);
            echo "\"
                ";
            // line 110
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "platform", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "platform", array()) == twig_get_attribute($this->env, $this->source, $context["platform"], "id", array())))) {
                echo "selected";
            }
            echo ">
                  ";
            // line 111
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["platform"], "title", array()), "html", null, true);
            echo "
              </option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['platform'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 114
        echo "          </select>
          ";
        // line 115
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "platform", array(), "any", true, true)) {
            // line 116
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "platform", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 117
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 119
            echo "          ";
        } else {
            // line 120
            echo "            <div class=\"invalid-feedback\">Please provide a valid platform.</div>
          ";
        }
        // line 122
        echo "        </div>
        <!-- Posts -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"posts-input\">Posts</label>
          <input type=\"number\" name=\"posts\" id=\"post-input\" required
            class=\"form-control
            ";
        // line 128
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "posts", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            min=\"";
        // line 129
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "posts", array()), "min_value", array()), "html", null, true);
        echo "\"
            max=\"";
        // line 130
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "posts", array()), "max_value", array()), "html", null, true);
        echo "\"
            placeholder=\"5\"
            value=\"";
        // line 132
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "posts", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "posts", array()), "html", null, true);
        }
        echo "\">
          ";
        // line 133
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "posts", array(), "any", true, true)) {
            // line 134
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "posts", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 135
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 137
            echo "          ";
        } else {
            // line 138
            echo "            <div class=\"invalid-feedback\">Please provide a valid posts number.</div>
          ";
        }
        // line 140
        echo "        </div>
        <!-- Engagements -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"engagements-input\">Engagements</label>
          <input type=\"number\" name=\"engagements\" id=\"engagements-input\" required
            class=\"form-control
            ";
        // line 146
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "engagements", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            min=\"";
        // line 147
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "engagements", array()), "min_value", array()), "html", null, true);
        echo "\"
            max=\"";
        // line 148
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "engagements", array()), "max_value", array()), "html", null, true);
        echo "\"
            placeholder=\"5\"
            value=\"";
        // line 150
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "engagements", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "engagements", array()), "html", null, true);
        }
        echo "\">
          ";
        // line 151
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "engagements", array(), "any", true, true)) {
            // line 152
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "engagements", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 153
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 155
            echo "          ";
        } else {
            // line 156
            echo "            <div class=\"invalid-feedback\">Please provide a valid engagements number.</div>
          ";
        }
        // line 158
        echo "        </div>
        <!-- Impressions -->
        <div class=\"form-group col-sm-4 col-lg-3\">
          <label for=\"impressions-input\">Impressions</label>
          <input type=\"number\" name=\"impressions\" id=\"impressions-input\"
            class=\"form-control
            ";
        // line 164
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "impressions", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            min=\"";
        // line 165
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "impressions", array()), "min_value", array()), "html", null, true);
        echo "\"
            max=\"";
        // line 166
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "impressions", array()), "max_value", array()), "html", null, true);
        echo "\"
            placeholder=\"5\"
            value=\"";
        // line 168
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "impressions", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "impressions", array()), "html", null, true);
        }
        echo "\">
          ";
        // line 169
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "impressions", array(), "any", true, true)) {
            // line 170
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "impressions", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 171
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 173
            echo "          ";
        } else {
            // line 174
            echo "            <div class=\"invalid-feedback\">Please provide a valid impressions number.</div>
          ";
        }
        // line 176
        echo "        </div>
      </div>
      <button type=\"submit\" class=\"btn btn-primary float-right\">Create</button>
    </form>
  </div>
</div>
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">Dealers Social Media Data</h3>
  </div>
  <div class=\"card-body\">
    <div class=\"row\">
      <div class=\"col-12 table-responsive\">
        <table class=\"table table-bordered table-striped\" id=\"social-media-data-table\">
          <thead>
            <tr>
              <th>Dealer</th>
              <th>Year</th>
              <th>Month</th>
              <th>Day of Week</th>
              <th>Platform</th>
              <th>Posts</th>
              <th>Engagements</th>
              <th>Impressions</th>
            </tr>
          </thead>
          <tbody>
            ";
        // line 203
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["data"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 204
            echo "              ";
            $context["dealer"] = (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = ($context["dealers"] ?? null)) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[twig_get_attribute($this->env, $this->source, $context["row"], "dealer_id", array())] ?? null) : null);
            // line 205
            echo "              <tr>
                <td>";
            // line 206
            if ((twig_get_attribute($this->env, $this->source, ($context["dealer"] ?? null), "first_name", array()) || twig_get_attribute($this->env, $this->source, ($context["dealer"] ?? null), "last_name", array()))) {
                // line 207
                echo "                  ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["dealer"] ?? null), "first_name", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["dealer"] ?? null), "last_name", array()), "html", null, true);
                echo "
                ";
            } else {
                // line 208
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["dealer"] ?? null), "email", array()), "html", null, true);
            }
            echo "</td>
                <td>";
            // line 209
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "date", array()), "Y"), "html", null, true);
            echo "</td>
                <td>";
            // line 210
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "date", array()), "F"), "html", null, true);
            echo "</td>
                <td>";
            // line 211
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "day_of_week", array())), "html", null, true);
            echo "</td>
                <td>";
            // line 212
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = ($context["platforms"] ?? null)) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[twig_get_attribute($this->env, $this->source, $context["row"], "social_media_id", array())] ?? null) : null), "title", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 213
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "posts", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 214
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "engagements", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 215
            echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, $context["row"], "impressions", array()) == null)) ? ("N/A") : (twig_get_attribute($this->env, $this->source, $context["row"], "impressions", array()))), "html", null, true);
            echo "</td>
              </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 218
        echo "          </tbody>
          <tfoot>
            <tr>
              <th>Dealer</th>
              <th>Year</th>
              <th>Month</th>
              <th>Day of Week</th>
              <th>Platform</th>
              <th>Posts</th>
              <th>Engagements</th>
              <th>Impressions</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
";
    }

    // line 237
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 238
        echo "  <script src=\"/assets/DataTables/datatables.min.js\"></script>
  <script src=\"/assets/js/bootstrap-form-validation.js\"></script>
  <script src=\"/assets/js/admin/social-media.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "Admin/social_media/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  673 => 238,  670 => 237,  648 => 218,  639 => 215,  635 => 214,  631 => 213,  627 => 212,  623 => 211,  619 => 210,  615 => 209,  610 => 208,  602 => 207,  600 => 206,  597 => 205,  594 => 204,  590 => 203,  561 => 176,  557 => 174,  554 => 173,  545 => 171,  540 => 170,  538 => 169,  532 => 168,  527 => 166,  523 => 165,  517 => 164,  509 => 158,  505 => 156,  502 => 155,  493 => 153,  488 => 152,  486 => 151,  480 => 150,  475 => 148,  471 => 147,  465 => 146,  457 => 140,  453 => 138,  450 => 137,  441 => 135,  436 => 134,  434 => 133,  428 => 132,  423 => 130,  419 => 129,  413 => 128,  405 => 122,  401 => 120,  398 => 119,  389 => 117,  384 => 116,  382 => 115,  379 => 114,  370 => 111,  364 => 110,  359 => 109,  355 => 108,  349 => 107,  341 => 101,  337 => 99,  334 => 98,  325 => 96,  320 => 95,  318 => 94,  315 => 93,  306 => 90,  300 => 89,  295 => 88,  291 => 86,  285 => 85,  277 => 79,  273 => 77,  270 => 76,  261 => 74,  256 => 73,  254 => 72,  251 => 71,  234 => 68,  228 => 67,  223 => 66,  206 => 64,  200 => 63,  192 => 57,  188 => 55,  185 => 54,  176 => 52,  171 => 51,  169 => 50,  163 => 49,  159 => 48,  153 => 47,  147 => 46,  140 => 41,  136 => 39,  133 => 38,  124 => 36,  119 => 35,  117 => 34,  114 => 33,  107 => 31,  99 => 30,  93 => 29,  88 => 28,  84 => 27,  78 => 26,  67 => 19,  65 => 18,  57 => 12,  55 => 11,  52 => 10,  44 => 6,  41 => 5,  35 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Admin/social_media/index.twig", "/home/dealerportal/public_html/app/Views/Admin/social_media/index.twig");
    }
}
