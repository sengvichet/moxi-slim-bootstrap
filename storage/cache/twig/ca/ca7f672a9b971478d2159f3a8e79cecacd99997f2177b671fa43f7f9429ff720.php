<?php

/* Admin/gmb/index.twig */
class __TwigTemplate_4cc26497b4a9173160535d23212f3ed297b653b1ff23e435253abd13a733c181 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Admin/layouts/index.twig", "Admin/gmb/index.twig", 1);
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
        echo "Admin - GMB";
    }

    // line 5
    public function block_page_content($context, array $blocks = array())
    {
        // line 6
        $this->loadTemplate("Admin/partials/home-button.twig", "Admin/gmb/index.twig", 6)->display($context);
        // line 7
        echo "<h2 class=\"text-center mt-3 mb-3\">Pull data from API</h2>
<div class=\"card-group text-center mt-3\">
  <div class=\"card border-primary\">
      <div class=\"card-header\">
        <h3>Locations</h3>
      </div>
      <div class=\"card-body\">
        <p class=\"card-text\">
          ";
        // line 15
        if (((isset($context["locations"]) || array_key_exists("locations", $context)) && twig_length_filter($this->env, ($context["locations"] ?? null)))) {
            // line 16
            echo "            There ";
            if ((twig_length_filter($this->env, ($context["locations"] ?? null)) == 1)) {
                echo "is";
            } else {
                echo "are";
            }
            echo " <span class=\"badge badge-primary\">";
            echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["locations"] ?? null)), "html", null, true);
            echo "</span> location";
            if ((twig_length_filter($this->env, ($context["locations"] ?? null)) > 1)) {
                echo "s";
            }
            echo ".
          ";
        } else {
            // line 18
            echo "            There are no locations yet.
          ";
        }
        // line 20
        echo "        </p>
        <p class=\"card-text\">
          ";
        // line 22
        if ((twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "location", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "location", array()))) {
            // line 23
            echo "            Last time locations have been updated at <span class=\"badge badge-primary\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "location", array()), "F jS \\a\\t g:ia"), "html", null, true);
            echo " GMT</span>.
          ";
        }
        // line 25
        echo "        </p>
      </div>
      <div class=\"card-footer\">
        <button type=\"button\" class=\"btn btn-primary refresh-btn\" data-type=\"location\">Update Locations</button>
      </div>
    </div>
  ";
        // line 53
        echo "</div>
<div class=\"card-group text-center mt-3\">
    <div class=\"card border-primary\">
      <div class=\"card-header\">
        <h3>Insights</h3>
      </div>
      <div class=\"card-body\">
        <p class=\"card-text\">
          ";
        // line 61
        if (((isset($context["timestamps"]) || array_key_exists("timestamps", $context)) && twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "insight", array()))) {
            // line 62
            echo "            Last time insights have been updated at <span class=\"badge badge-primary\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "insight", array()), "F jS \\a\\t g:ia"), "html", null, true);
            echo " GMT</span>.
          ";
        } else {
            // line 64
            echo "            There are no insights yet.
          ";
        }
        // line 66
        echo "        </p>
      </div>
      <div class=\"card-footer\">
        <button type=\"button\" class=\"btn btn-primary refresh-btn\" data-type=\"insight\">Update Insights</button>
      </div>
    </div>
    <div class=\"card border-primary\">
      <div class=\"card-header\">
        <h3>Reviews</h3>
      </div>
      <div class=\"card-body\">
        <p class=\"card-text\">
          ";
        // line 78
        if (((isset($context["timestamps"]) || array_key_exists("timestamps", $context)) && twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "review", array()))) {
            // line 79
            echo "            Last time reviews have been updated at <span class=\"badge badge-primary\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "review", array()), "F jS \\a\\t g:ia"), "html", null, true);
            echo " GMT</span>.
          ";
        } else {
            // line 81
            echo "            There are no reviews yet.
          ";
        }
        // line 83
        echo "        </p>
      </div>
      <div class=\"card-footer\">
        <button type=\"button\" class=\"btn btn-primary refresh-btn\" data-type=\"review\">Update Reviews</button>
      </div>
    </div>
  <div class=\"card border-primary\">
      <div class=\"card-header\">
        <h3>Posts</h3>
      </div>
      <div class=\"card-body\">
        <p class=\"card-text\">
          ";
        // line 95
        if (((isset($context["timestamps"]) || array_key_exists("timestamps", $context)) && twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "post", array()))) {
            // line 96
            echo "            Last time posts have been updated at <span class=\"badge badge-primary\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "post", array()), "F jS \\a\\t g:ia"), "html", null, true);
            echo " GMT</span>.
          ";
        } else {
            // line 98
            echo "            There are no posts yet.
          ";
        }
        // line 100
        echo "        </p>
      </div>
      <div class=\"card-footer\">
        <button type=\"button\" class=\"btn btn-primary refresh-btn\" data-type=\"post\">Update Posts</button>
      </div>
    </div>
</div>
<h2 class=\"text-center mt-3 mb-3\">Push data to API</h2>
<div class=\"card-group text-center mt-3\">
      <div class=\"card border-primary\">
      <div class=\"card-header\">
        <h3>Business</h3>
      </div>
      <div class=\"card-body\">
        <p class=\"card-text\">
          ";
        // line 115
        if ((twig_get_attribute($this->env, $this->source, ($context["updates"] ?? null), "business", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, ($context["updates"] ?? null), "business", array()))) {
            // line 116
            echo "            There ";
            if ((twig_get_attribute($this->env, $this->source, ($context["updates"] ?? null), "business", array()) == 1)) {
                echo "is";
            } else {
                echo "are";
            }
            // line 117
            echo "            <span class=\"badge badge-primary\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["updates"] ?? null), "business", array()), "html", null, true);
            echo "</span>
            business";
            // line 118
            if ((twig_get_attribute($this->env, $this->source, ($context["updates"] ?? null), "business", array()) > 1)) {
                echo "es";
            }
            echo " to update.
          ";
        } else {
            // line 120
            echo "            There are no businesses to update yet.
          ";
        }
        // line 122
        echo "        </p>
        <p class=\"card-text\">
          ";
        // line 124
        if ((twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "business", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "business", array()))) {
            // line 125
            echo "            Last time businesses have been updated at
            <span class=\"badge badge-primary\">";
            // line 126
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "business", array()), "F jS \\a\\t g:ia"), "html", null, true);
            echo " GMT</span>.
          ";
        } else {
            // line 128
            echo "            Businesses have never been updated.
          ";
        }
        // line 130
        echo "        </p>
      </div>
      <div class=\"card-footer\">
        <a href=\"/";
        // line 133
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "location", array()), "html", null, true);
        echo "\" class=\"btn btn-primary\">Review Information</a>
        <button type=\"button\" class=\"btn btn-primary refresh-btn\" data-type=\"business\">Update Information</button>
      </div>
    </div>
    <div class=\"card border-primary\">
      <div class=\"card-header\">
        <h3>Reviews Replies</h3>
      </div>
      <div class=\"card-body\">
        <p class=\"card-text\">
          ";
        // line 143
        if ((twig_get_attribute($this->env, $this->source, ($context["updates"] ?? null), "reply", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, ($context["updates"] ?? null), "reply", array()))) {
            // line 144
            echo "            There ";
            if ((twig_get_attribute($this->env, $this->source, ($context["updates"] ?? null), "reply", array()) == 1)) {
                echo "is";
            } else {
                echo "are";
            }
            echo " <span class=\"badge badge-primary\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["updates"] ?? null), "reply", array()), "html", null, true);
            echo "</span> new ";
            if ((twig_get_attribute($this->env, $this->source, ($context["updates"] ?? null), "reply", array()) == 1)) {
                echo "reply";
            } else {
                echo "replies";
            }
            echo ".
          ";
        } else {
            // line 146
            echo "            There are no new replies.
          ";
        }
        // line 148
        echo "        </p>
        <p class=\"card-text\">
          ";
        // line 150
        if ((twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "reply", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "reply", array()))) {
            // line 151
            echo "            Last time replies have been updated at <span class=\"badge badge-primary\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "reply", array()), "F jS \\a\\t g:ia"), "html", null, true);
            echo " GMT</span>.
          ";
        } else {
            // line 153
            echo "            Replies have never been updated.
          ";
        }
        // line 155
        echo "        </p>
      </div>
      <div class=\"card-footer\">
        <a href=\"/";
        // line 158
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "review", array()), "html", null, true);
        echo "\" class=\"btn btn-primary\">Review Replies</a>
        <button type=\"button\" class=\"btn btn-primary refresh-btn\" data-type=\"reply\">Update Replies</button>
      </div>
    </div>
  <div class=\"card border-primary\">
      <div class=\"card-header\">
        <h3>New Posts</h3>
      </div>
      <div class=\"card-body\">
        <p class=\"card-text\">
          ";
        // line 168
        if ((twig_get_attribute($this->env, $this->source, ($context["updates"] ?? null), "post_new", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, ($context["updates"] ?? null), "post_new", array()))) {
            // line 169
            echo "            There ";
            if ((twig_get_attribute($this->env, $this->source, ($context["updates"] ?? null), "post_new", array()) == 1)) {
                echo "is";
            } else {
                echo "are";
            }
            echo " <span class=\"badge badge-primary\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["updates"] ?? null), "post_new", array()), "html", null, true);
            echo "</span> new post";
            if ((twig_get_attribute($this->env, $this->source, ($context["updates"] ?? null), "post_new", array()) > 1)) {
                echo "s";
            }
            echo " to update.
          ";
        } else {
            // line 171
            echo "            There are no new posts to update.
          ";
        }
        // line 173
        echo "        </p>
        <p class=\"card-text\">
          ";
        // line 175
        if ((twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "post_new", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "post_new", array()))) {
            // line 176
            echo "            Last time posts have been updated at <span class=\"badge badge-primary\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["timestamps"] ?? null), "post_new", array()), "F jS \\a\\t g:ia"), "html", null, true);
            echo " GMT</span>.
          ";
        } else {
            // line 178
            echo "            Posts have never been updated.
          ";
        }
        // line 180
        echo "        </p>
      </div>
      <div class=\"card-footer\">
        <a href=\"/";
        // line 183
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "post", array()), "html", null, true);
        echo "\" class=\"btn btn-primary\">Review New Posts</a>
        <button type=\"button\" class=\"btn btn-primary refresh-btn\" data-type=\"post_new\">Update New Posts</button>
      </div>
    </div>
</div>
<div class=\"row text-center mt-3\">
  <div class=\"col-12\" id=\"summary\">
  </div>
</div>
";
    }

    // line 194
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 195
        echo "  <script>
    var refreshUrl = {
      location: '/";
        // line 197
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "location", array()), "html", null, true);
        echo "',
      insight: '/";
        // line 198
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "insight", array()), "html", null, true);
        echo "',
      review: '/";
        // line 199
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "review", array()), "html", null, true);
        echo "',
      reply: '/";
        // line 200
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "reply", array()), "html", null, true);
        echo "',
      post: '/";
        // line 201
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "post", array()), "html", null, true);
        echo "',
      post_new: '/";
        // line 202
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "post_new", array()), "html", null, true);
        echo "',
      business: '/";
        // line 203
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "business", array()), "html", null, true);
        echo "',
      information: '/";
        // line 204
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "information", array()), "html", null, true);
        echo "'
    };
  </script>
  <script src=\"/assets/js/sweetalert2.all.min.js\"></script>
  <script src=\"/assets/js/admin/gmb/refresh.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "Admin/gmb/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  399 => 204,  395 => 203,  391 => 202,  387 => 201,  383 => 200,  379 => 199,  375 => 198,  371 => 197,  367 => 195,  364 => 194,  350 => 183,  345 => 180,  341 => 178,  335 => 176,  333 => 175,  329 => 173,  325 => 171,  309 => 169,  307 => 168,  294 => 158,  289 => 155,  285 => 153,  279 => 151,  277 => 150,  273 => 148,  269 => 146,  251 => 144,  249 => 143,  236 => 133,  231 => 130,  227 => 128,  222 => 126,  219 => 125,  217 => 124,  213 => 122,  209 => 120,  202 => 118,  197 => 117,  190 => 116,  188 => 115,  171 => 100,  167 => 98,  161 => 96,  159 => 95,  145 => 83,  141 => 81,  135 => 79,  133 => 78,  119 => 66,  115 => 64,  109 => 62,  107 => 61,  97 => 53,  89 => 25,  83 => 23,  81 => 22,  77 => 20,  73 => 18,  57 => 16,  55 => 15,  45 => 7,  43 => 6,  40 => 5,  34 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Admin/gmb/index.twig", "/home/dealerportal/public_html/app/Views/Admin/gmb/index.twig");
    }
}
