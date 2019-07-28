<?php

/* Dealers/gmb/index.twig */
class __TwigTemplate_cf246627564f82823f4b61705ee7a7916e5ac95c5b48fc875a5801e1f3b32277 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/layouts/dashboard.twig", "Dealers/gmb/index.twig", 1);
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
        echo "Google My Business";
    }

    // line 3
    public function block_sidebar($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        $this->loadTemplate("Dealers/partials/sidebar/dealer.twig", "Dealers/gmb/index.twig", 4)->display($context);
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "  ";
        if (($context["forbidden"] ?? null)) {
            // line 8
            echo "    <img src=\"/assets/images/gmb/dashboard.png\" class=\"img-fluid\">
    <div class=\"modal fade forbidden-modal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"forbidden-modal-title\" aria-hidden=\"true\">
      <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
        <div class=\"modal-content bg-secondary\">
          <div class=\"modal-header\">
            <h1 class=\"modal-title mx-auto text-white\" id=\"forbidden-modal-title\">Section Unavailable!</h1>
            <a href=\"/\" class=\"close\" aria-label=\"Close\">
              <span aria-hidden=\"true\">&times;</span>
            </a>
          </div>
          <div class=\"modal-body text-center\">
            <img src=\"/assets/images/padlock.png\" width=\"100\">
            <p class=\"mt-3 font-large text-white\">Please contact your account manager to learn more about Place1SEO's managed Google My Business Accounts.</p>
          </div>
          <div class=\"modal-footer\">
            <a class=\"btn btn-lg btn-block btn-primary\" href=\"/";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "services", array()), "html", null, true);
            echo "#gmb\">Activate GMB section</a>
          </div>
        </div>
      </div>
    </div>
  ";
        } else {
            // line 29
            echo "    <h1>Google My Business</h1>
    ";
            // line 40
            echo "  ";
        }
        // line 41
        echo "  ";
        if ( !($context["forbidden"] ?? null)) {
            // line 42
            echo "  <div class=\"row\">
    <div class=\"col-sm-4\">
      <p><b>Period: </b></p>
      <p><span>";
            // line 45
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["period"] ?? null), "current", array()), "start", array()), "j M\\. Y"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["period"] ?? null), "current", array()), "end", array()), "j M.\\ Y"), "html", null, true);
            echo "</span>
      comparing to <span>";
            // line 46
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["period"] ?? null), "previous", array()), "start", array()), "j M\\. Y"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["period"] ?? null), "previous", array()), "end", array()), "j M\\. Y"), "html", null, true);
            echo "</span></p>
    </div>
    <div class=\"col-sm-4\">
      <p><b>GMB Account ID: </b></p>
      <p>";
            // line 50
            echo twig_escape_filter($this->env, ($context["account"] ?? null), "html", null, true);
            echo "</p>
    </div>
    <div class=\"col-sm-4\">
      <p><b>GMB Location ID: </b></p>
      <form id=\"location-form\">
      <select class=\"form-control\" name=\"location\" onchange=\"document.getElementById('location-form').submit()\">
        ";
            // line 56
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["locations"] ?? null), "id", array()));
            foreach ($context['_seq'] as $context["key"] => $context["location"]) {
                // line 57
                echo "          <option value=\"";
                echo twig_escape_filter($this->env, $context["location"], "html", null, true);
                echo "\" ";
                if ((twig_get_attribute($this->env, $this->source, ($context["selected_location"] ?? null), "id", array()) == $context["location"])) {
                    echo "selected";
                }
                echo ">";
                echo twig_escape_filter($this->env, (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_attribute($this->env, $this->source, ($context["locations"] ?? null), "name", array())) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[$context["key"]] ?? null) : null), "html", null, true);
                echo "</option>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['location'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "      </select>
    </form>
    </div>
  </div>
  <h2 class=\"text-center mt-4 mb-4\">Google My Business Performance Summary</h2>
  <div class=\"row\">
    <div class=\"col-md-4 col-xl-3\">
      <div class=\"row mt-2 mb-2\">
        <div class=\"col-6\">
          <img src=\"/assets/images/gmb/website_visits.png\" width=\"100\">
        </div>
        <div class=\"col-6 align-self-center\">
          <p class=\"text-secondary h6 font-weight-light mb-0\">Website Visits</p>
          <h2 class=\"mb-0\">";
            // line 72
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "website_visits", array()), "count", array()), "current", array()), "html", null, true);
            echo "</h2>
          <h6 class=\"";
            // line 73
            echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "website_visits", array()), "count", array()), "percent", array()) > 0)) ? ("text-success") : ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "website_visits", array()), "count", array()), "percent", array()) == 0)) ? ("text-warning") : ("text-danger"))));
            echo "\">
            <i class=\"fa ";
            // line 74
            echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "website_visits", array()), "count", array()), "percent", array()) > 0)) ? ("fa-arrow-up") : ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "website_visits", array()), "count", array()), "percent", array()) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
            echo "\"></i>&nbsp;";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "website_visits", array()), "count", array()), "percent", array()), "html", null, true);
            echo "
          </h6>
        </div>
      </div>
      <div class=\"row mt-2 mb-2\">
        <div class=\"col-6\">
          <img src=\"/assets/images/gmb/directions.png\" width=\"100\">
        </div>
        <div class=\"col-6 align-self-center\">
          <p class=\"text-secondary h6 font-weight-light mb-0\">Directions</p>
          <h2 class=\"mb-0\">";
            // line 84
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "directions", array()), "count", array()), "current", array()), "html", null, true);
            echo "</h2>
          <h6 class=\"";
            // line 85
            echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "directions", array()), "count", array()), "percent", array()) > 0)) ? ("text-success") : ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "directions", array()), "count", array()), "percent", array()) == 0)) ? ("text-warning") : ("text-danger"))));
            echo "\">
            <i class=\"fa ";
            // line 86
            echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "directions", array()), "count", array()), "percent", array()) > 0)) ? ("fa-arrow-up") : ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "directions", array()), "count", array()), "percent", array()) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
            echo "\"></i>&nbsp;";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "directions", array()), "count", array()), "percent", array()), "html", null, true);
            echo "
          </h6>
        </div>
      </div>
      <div class=\"row mt-2 mb-2\">
        <div class=\"col-6\">
          <img src=\"/assets/images/gmb/phone_calls.png\" width=\"100\">
        </div>
        <div class=\"col-6 align-self-center\">
          <p class=\"text-secondary h6 font-weight-light mb-0\">Phone Calls</p>
          <h2 class=\"mb-0\">";
            // line 96
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "phone_calls", array()), "count", array()), "current", array()), "html", null, true);
            echo "</h2>
          <h6 class=\"";
            // line 97
            echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "phone_calls", array()), "count", array()), "percent", array()) > 0)) ? ("text-success") : ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "phone_calls", array()), "count", array()), "percent", array()) == 0)) ? ("text-warning") : ("text-danger"))));
            echo "\">
            <i class=\"fa ";
            // line 98
            echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "phone_calls", array()), "count", array()), "percent", array()) > 0)) ? ("fa-arrow-up") : ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "phone_calls", array()), "count", array()), "percent", array()) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
            echo "\"></i>
            &nbsp;";
            // line 99
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "phone_calls", array()), "count", array()), "percent", array()), "html", null, true);
            echo "
          </h6>
        </div>
      </div>
    </div>
    <div class=\"col-md-8 col-xl-9\">
      <canvas id=\"gmb-chart\" width=\"400\" height=\"300\"></canvas>
    </div>
  </div>
  <h2 class=\"text-center mt-4 mb-4\">Manage Listing</h2>
  <div class=\"row mt-2 mb-2\">
    <div class=\"col-3\">
      <img src=\"/assets/images/gmb/reviews.png\" width=\"100\">
    </div>
    <div class=\"col-3\">
      <p class=\"text-secondary h6 font-weight-light mb-0\">Review Score</p>
      <h2 class=\"mb-0\">";
            // line 115
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "review_score", array()), "count", array()), "current", array()), "html", null, true);
            echo "</h2>
      <h6 class=\"";
            // line 116
            echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "review_score", array()), "count", array()), "percent", array()) > 0)) ? ("text-success") : ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "review_score", array()), "count", array()), "percent", array()) == 0)) ? ("text-warning") : ("text-danger"))));
            echo "\">
      <i class=\"fa ";
            // line 117
            echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "review_score", array()), "count", array()), "percent", array()) > 0)) ? ("fa-arrow-up") : ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "review_score", array()), "count", array()), "percent", array()) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
            echo "\"></i>
        ";
            // line 118
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "review_score", array()), "count", array()), "percent", array()), "html", null, true);
            echo "
      </h6>
    </div>
    <div class=\"col-3\">
      <p class=\"text-secondary h6 font-weight-light mb-0\">Total Reviews</p>
      <h2 class=\"mb-0\">";
            // line 123
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "total_reviews", array()), "count", array()), "current", array()), "html", null, true);
            echo "</h2>
      <h6 class=\"";
            // line 124
            echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "total_reviews", array()), "count", array()), "percent", array()) > 0)) ? ("text-success") : ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "total_reviews", array()), "count", array()), "percent", array()) == 0)) ? ("text-warning") : ("text-danger"))));
            echo "\">
      <i class=\"fa ";
            // line 125
            echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "total_reviews", array()), "count", array()), "percent", array()) > 0)) ? ("fa-arrow-up") : ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "total_reviews", array()), "count", array()), "percent", array()) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
            echo "\"></i>
        ";
            // line 126
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "total_reviews", array()), "count", array()), "percent", array()), "html", null, true);
            echo "
      </h6>
    </div>
    <div class=\"col-3 align-self-center\">
      <a class=\"btn btn-lg btn-block btn-primary\" href=\"";
            // line 130
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["url"] ?? null), "reviews", array()), "html", null, true);
            echo "\">See Reviews</a>
    </div>
  </div>
  <div class=\"row mt-2 mb-2\">
    <div class=\"col-3\">
      <img src=\"/assets/images/gmb/posts.png\" width=\"100\">
    </div>
    <div class=\"col-3\">
      <p class=\"text-secondary h6 font-weight-light mb-0\">Total Posts</p>
      <h2 class=\"mb-0\">";
            // line 139
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "total_posts", array()), "count", array()), "current", array()), "html", null, true);
            echo "</h2>
      <h6 class=\"";
            // line 140
            echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "total_posts", array()), "count", array()), "percent", array()) > 0)) ? ("text-success") : ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "total_posts", array()), "count", array()), "percent", array()) == 0)) ? ("text-warning") : ("text-danger"))));
            echo "\">
      <i class=\"fa ";
            // line 141
            echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "total_posts", array()), "count", array()), "percent", array()) > 0)) ? ("fa-arrow-up") : ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "total_posts", array()), "count", array()), "percent", array()) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
            echo "\"></i>
        ";
            // line 142
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "total_posts", array()), "count", array()), "percent", array()), "html", null, true);
            echo "
      </h6>
    </div>
    <div class=\"col-3\">
      <p class=\"text-secondary h6 font-weight-light mb-0\">Post Views</p>
      <h2 class=\"mb-0\">";
            // line 147
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "post_views", array()), "count", array()), "current", array()), "html", null, true);
            echo "</h2>
      <h6 class=\"";
            // line 148
            echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "post_views", array()), "count", array()), "percent", array()) > 0)) ? ("text-success") : ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "post_views", array()), "count", array()), "percent", array()) == 0)) ? ("text-warning") : ("text-danger"))));
            echo "\">
      <i class=\"fa ";
            // line 149
            echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "post_views", array()), "count", array()), "percent", array()) > 0)) ? ("fa-arrow-up") : ((((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "post_views", array()), "count", array()), "percent", array()) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
            echo "\"></i>
        ";
            // line 150
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["prepared_gmb"] ?? null), "post_views", array()), "count", array()), "percent", array()), "html", null, true);
            echo "
      </h6>
    </div>
    ";
            // line 161
            echo "    <div class=\"col-3 align-self-center\">
      <a class=\"btn btn-lg btn-block btn-primary\" href=\"";
            // line 162
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["url"] ?? null), "post_new", array()), "html", null, true);
            echo "\">Create Post</a>
    </div>
  </div>
  ";
        }
    }

    // line 167
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 168
        echo "  ";
        if (($context["forbidden"] ?? null)) {
            // line 169
            echo "    <script>
    \$(document).ready(function() {
      \$('.forbidden-modal').modal({backdrop: 'static', keyboard: false});
    });
    </script>
  ";
        } else {
            // line 175
            echo "    <script>var refreshUrl = '";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "refresh", array()), "html", null, true);
            echo "';</script>
    <script src=\"/assets/js/gmb/refresh.js\"></script>
    <script>var data = ";
            // line 177
            echo json_encode(($context["prepared_gmb"] ?? null));
            echo ";</script>
    <script src=\"/assets/js/Chart.bundle.min.js\"></script>
    <script src=\"/assets/js/gmb/weekly-activity-chart.js\"></script>
  ";
        }
    }

    public function getTemplateName()
    {
        return "Dealers/gmb/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  351 => 177,  345 => 175,  337 => 169,  334 => 168,  331 => 167,  322 => 162,  319 => 161,  313 => 150,  309 => 149,  305 => 148,  301 => 147,  293 => 142,  289 => 141,  285 => 140,  281 => 139,  269 => 130,  262 => 126,  258 => 125,  254 => 124,  250 => 123,  242 => 118,  238 => 117,  234 => 116,  230 => 115,  211 => 99,  207 => 98,  203 => 97,  199 => 96,  184 => 86,  180 => 85,  176 => 84,  161 => 74,  157 => 73,  153 => 72,  138 => 59,  123 => 57,  119 => 56,  110 => 50,  101 => 46,  95 => 45,  90 => 42,  87 => 41,  84 => 40,  81 => 29,  72 => 23,  55 => 8,  52 => 7,  49 => 6,  44 => 4,  41 => 3,  35 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/gmb/index.twig", "/home/dealerportal/public_html/app/Views/Dealers/gmb/index.twig");
    }
}
