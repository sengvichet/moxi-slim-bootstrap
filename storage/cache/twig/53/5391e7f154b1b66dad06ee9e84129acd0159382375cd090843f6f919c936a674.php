<?php

/* Dealers/gmb/posts/create.twig */
class __TwigTemplate_235c29fd349b40095df9027fb1a35b8e7fb91f2ed20324257cd94984970110be extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/layouts/dashboard.twig", "Dealers/gmb/posts/create.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'sidebar' => array($this, 'block_sidebar'),
            'header_styles' => array($this, 'block_header_styles'),
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
        echo "Google My Business - Post";
    }

    // line 3
    public function block_sidebar($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        $this->loadTemplate("Dealers/partials/sidebar/dealer.twig", "Dealers/gmb/posts/create.twig", 4)->display($context);
    }

    // line 6
    public function block_header_styles($context, array $blocks = array())
    {
        // line 7
        echo "  <link href=\"/assets/css/button-upload.css\" rel=\"stylesheet\">
  <link href=\"/assets/css/material-switch.css\" rel=\"stylesheet\">
";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "  <h1>Google My Business Post</h1>
  <div class=\"row\">
    <div class=\"col-12\">
      <a class=\"btn btn-secondary\" href=\"/";
        // line 14
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "back", array()), "html", null, true);
        echo "\"><i class=\"fa fa-arrow-left\"></i>&nbsp;Back To Data</a>
      ";
        // line 15
        $this->loadTemplate("Dealers/partials/errors.twig", "Dealers/gmb/posts/create.twig", 15)->display($context);
        // line 16
        echo "      <form action=\"/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "save", array()), "html", null, true);
        echo "\" method=\"POST\" enctype=\"multipart/form-data\" class=\"mt-3 needs-validation\" novalidate>
        <div class=\"form-group\">
          <label class=\"btn btn-lg btn-block btn-primary btn-file\">
            Upload Image File Here
            <input type=\"file\" name=\"media\" style=\"display: none;\" accept=\"";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "media", array()), "format", array()), "html", null, true);
        echo "\" files=\"\">
          </label>
          <p class=\"font-italic\">Photos should have a minimum resolution of 400px wide by 300px tall, in JPG or PNG format. File size 10MB Maximum.</p>
          <span class=\"badge badge-primary\" id=\"file-span\"></span>
        </div>
        <div class=\"form-group\">
          <label for=\"summary-textarea\">Post (standard)</label>
          <textarea class=\"form-control ";
        // line 27
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "summary", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            id=\"summary-textarea\" name=\"summary\" placeholder=\"Write your post\" required
            maxlength=\"";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "summary", array()), "max_length", array()), "html", null, true);
        echo "\">";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "summary", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "summary", array()), "html", null, true);
        }
        echo "</textarea>
            ";
        // line 30
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "summary", array(), "any", true, true)) {
            // line 31
            echo "              ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "summary", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 32
                echo "                <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo "            ";
        } else {
            // line 35
            echo "              <div class=\"invalid-feedback\">Please provide a post's text.</div>
            ";
        }
        // line 37
        echo "          <p class=\"font-italic\">1,500 character maximum. Ideal length is between 150-300 characters.</p>
        </div>
        <div class=\"form-group\">
          <label for=\"topic-type-select\">Post Type</label>
          <select id=\"topic-type-select\" name=\"topic_type\" class=\"form-control\">
            <option value=\"standard\">What's New (Standard)</option>
            <option value=\"event\">Event</option>
            <option value=\"offer\">Offer</option>
            <option value=\"product\">Product</option>
          </select>
        </div>
        <div id=\"event\" class=\"topic\" style=\"display: none\">
          <div class=\"form-group\">
            <label for=\"event-title-input\">Title</label>
            <input type=\"text\" name=\"event_title\" id=\"event-title-input\"
              class=\"form-control required\" placeholder=\"Title\" value=\"\">
            <div class=\"invalid-feedback\">Please provide a title.</div>
          </div>
          <div class=\"form-group\">
            <label for=\"add-time-switch\">Add Time</label>
            <div class=\"material-switch pull-right\" id=\"add-time-switch\">
                <input id=\"add-time-checkbox\" type=\"checkbox\">
                <label for=\"add-time-checkbox\" class=\"label-primary\"></label>
            </div>
          </div>
          <div class=\"row\">
            <div class=\"col-sm-6\">
              <div class=\"form-group\">
                <label for=\"event-start-date-input\">Start Date</label>
                <input type=\"date\" name=\"event_start_date\" id=\"event-start-date-input\"
                  class=\"form-control required\" placeholder=\"Start Date\" value=\"\">
                <div class=\"invalid-feedback\">Please provide a start date.</div>
              </div>
            </div>
            <div class=\"col-sm-6\">
              <div class=\"form-group\">
                <label for=\"event-end-date-input\">End Date</label>
                <input type=\"date\" name=\"event_end_date\" id=\"event-end-date-input\"
                  class=\"form-control required\" placeholder=\"End Date\" value=\"\">
                <div class=\"invalid-feedback\">Please provide an end date.</div>
              </div>
            </div>
          </div>
          <div class=\"row\" id=\"time-group\" style=\"display: none\">
            <div class=\"col-sm-6\">
              <div class=\"form-group\">
                <label for=\"event-start-time-input\">Start Time</label>
                <input type=\"time\" name=\"event_start_time\" id=\"event-start-time-input\"
                  class=\"form-control\" placeholder=\"Start Time\" value=\"\">
              </div>
            </div>
            <div class=\"col-sm-6\">
              <div class=\"form-group\">
                <label for=\"event-end-time-input\">End Time</label>
                <input type=\"time\" name=\"event_end_time\" id=\"event-end-time-input\"
                  class=\"form-control\" placeholder=\"End Time\" value=\"\">
              </div>
            </div>
          </div>
        </div>
        <div id=\"offer\" class=\"topic\" style=\"display: none\">
          <div class=\"form-group\">
            <label for=\"coupon-code-input\">Coupon Code</label>
            <input type=\"text\" name=\"offer_coupon_code\" id=\"coupon-code-input\"
              class=\"form-control\" placeholder=\"Coupon Code\" value=\"\">
          </div>
          <div class=\"form-group\">
            <label for=\"redeem-offer-input\">Link to redeem offer</label>
            <input type=\"text\" name=\"offer_redeem_online_url\" id=\"redeem-offer-input\"
              class=\"form-control\" placeholder=\"Link to redeem offer\" value=\"\">
          </div>
          <div class=\"form-group\">
            <label for=\"terms-conditions-input\">Terms and conditions</label>
            <textarea name=\"offer_terms_conditions\" id=\"terms-conditions-input\"
              class=\"form-control\" placeholder=\"Terms and conditions\"></textarea>
          </div>
        </div>
        <div id=\"product\" class=\"topic\" style=\"display: none\">
          <div class=\"form-group\">
            <label for=\"product-name-input\">Product Name</label>
            <input type=\"text\" name=\"product_name\" id=\"product-name-input\"
              class=\"form-control required\" placeholder=\"Product Name\" value=\"\">
            <div class=\"invalid-feedback\">Please provide a product name.</div>
          </div>
          <div class=\"form-group\">
            <label for=\"add-range-switch\">Add Range</label>
            <div class=\"material-switch pull-right\" id=\"add-range-switch\">
                <input id=\"add-range-checkbox\" type=\"checkbox\">
                <label for=\"add-range-checkbox\" class=\"label-primary\"></label>
            </div>
          </div>
          <div class=\"form-group\" id=\"product-price-group\">
            <label id=\"product-price-input\">Price (USD)</label>
            <input type=\"text\" name=\"product_price\" id=\"product-price-input\"
              class=\"form-control\" placeholder=\"Price (USD)\" value=\"\">
          </div>
          <div class=\"row\" id=\"product-price-range-group\" style=\"display:none\">
            <div class=\"col-sm-6\">
              <div class=\"form-group\">
                <label id=\"product-minimum-price-input\">Minimum (USD)</label>
                <input type=\"text\" name=\"product_minimum_price\" id=\"product-minimum-price-input\"
                  class=\"form-control\" placeholder=\"Minimum (USD)\" value=\"\">
              </div>
            </div>
            <div class=\"col-sm-6\">
              <div class=\"form-group\">
                <label id=\"product-maximum-price-input\">Maximum (USD)</label>
                <input type=\"text\" name=\"product_maximum_price\" id=\"product-maximum-price-input\"
                  class=\"form-control\" placeholder=\"Maximum (USD)\" value=\"\">
              </div>
            </div>
          </div>
        </div>
        <div class=\"form-group\">
          <label for=\"cta_type-select\">Add a button (optional)</label>
          <select class=\"form-control\" name=\"cta_type\">
            <option value=\"action_type_unspecified\" ";
        // line 153
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "cta_type", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "cta_type", array()) == "action_type_unspecified"))) {
            echo "selected";
        }
        echo ">Not Selected</option>
            <option value=\"book\" ";
        // line 154
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "cta_type", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "cta_type", array()) == "book"))) {
            echo "selected";
        }
        echo ">Book</option>
            <option value=\"order\" ";
        // line 155
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "cta_type", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "cta_type", array()) == "order"))) {
            echo "selected";
        }
        echo ">Order</option>
            <option value=\"shop\" ";
        // line 156
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "cta_type", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "cta_type", array()) == "shop"))) {
            echo "selected";
        }
        echo ">Shop</option>
            <option value=\"learn_more\" ";
        // line 157
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "cta_type", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "cta_type", array()) == "learn_more"))) {
            echo "selected";
        }
        echo ">Learn More</option>
            <option value=\"sign_up\" ";
        // line 158
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "cta_type", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "cta_type", array()) == "sign_up"))) {
            echo "selected";
        }
        echo ">Sign Up</option>
            <option value=\"get_offer\" ";
        // line 159
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "cta_type", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "cta_type", array()) == "get_offer"))) {
            echo "selected";
        }
        echo ">Get Offer</option>
            <option value=\"call\" ";
        // line 160
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "cta_type", array(), "any", true, true) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "cta_type", array()) == "call"))) {
            echo "selected";
        }
        echo ">Call</option>
          </select>
          ";
        // line 162
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "cta_type", array(), "any", true, true)) {
            // line 163
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "cta_type", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 164
                echo "              <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 166
            echo "          ";
        } else {
            // line 167
            echo "            <div class=\"invalid-feedback\">Please provide a button's type.</div>
          ";
        }
        // line 169
        echo "          <input type=\"url\" class=\"form-control mt-3
          ";
        // line 170
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "cta_url", array(), "any", true, true)) {
            echo "is-invalid";
        }
        echo "\"
            id=\"cta_url-input\" name=\"cta_url\" placeholder=\"Link for your button\"
            maxlength=\"";
        // line 172
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "cta_url", array()), "max_length", array()), "html", null, true);
        echo "\" style=\"display: none\"
            value=\"";
        // line 173
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "cta_url", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "cta_url", array()), "html", null, true);
        }
        echo "\">
            ";
        // line 174
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "cta_url", array(), "any", true, true)) {
            // line 175
            echo "              ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "cta_url", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 176
                echo "                <div class=\"invalid-feedback\">";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</div>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 178
            echo "            ";
        } else {
            // line 179
            echo "              <div class=\"invalid-feedback\">Please provide a button's URL.</div>
            ";
        }
        // line 181
        echo "        </div>
        <input type=\"hidden\" name=\"location_id\" value=\"";
        // line 182
        echo twig_escape_filter($this->env, ($context["location"] ?? null), "html", null, true);
        echo "\">
        <button type=\"submit\" class=\"btn btn-success float-right\">Post</button>
      </form>
    </div>
  </div>
";
    }

    // line 188
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 189
        echo "<script src=\"/assets/js/bootstrap-form-validation.js\"></script>
<script src=\"/assets/js/button-upload.js\"></script>
<script>
validateForm();
function toggleUrlInput(type) {
  if (type === 'action_type_unspecified') {
    \$('input[name=\"cta_url\"]').removeAttr('required').hide();
  } else {
    \$('input[name=\"cta_url\"]').attr('required', 'required').show();
  }
}
function toggleTimeGroup(checked) {
  (checked) ? \$('#time-group').show() : \$('#time-group').hide();
}
function toggleRangeGroup(checked) {
  if (checked) {
    \$('#product-price-group').hide();
    \$('#product-price-range-group').show();
  } else {
    \$('#product-price-group').show();
    \$('#product-price-range-group').hide();
  }
}
function displayTopicSection(topicId) {
  var topics = \$('.topic');
  var topic = \$('#' + topicId);
  topics.hide();
  topics.find('input.required').removeAttr('required');
  topic.show();
  topic.find('input.required').attr('required', 'required');
  if (topicId === 'offer') {
    var event = \$('#event');
    event.show();
    event.find('input.required').attr('required', 'required');
  }
}
\$(document).ready(function(){
  \$('select[name=\"cta_type\"]').change(function() {
    toggleUrlInput(\$(this).val());
  });
  toggleUrlInput(\$('select[name=\"cta_type\"]').val());
  \$('select[name=\"topic_type\"]').change(function() {
    displayTopicSection(\$(this).val());
  });
  \$('#add-time-checkbox').change(function() {
    toggleTimeGroup(\$(this).prop('checked'));
  });
  \$('#add-range-checkbox').change(function() {
    toggleRangeGroup(\$(this).prop('checked'));
  });
});
</script>
";
    }

    public function getTemplateName()
    {
        return "Dealers/gmb/posts/create.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  378 => 189,  375 => 188,  365 => 182,  362 => 181,  358 => 179,  355 => 178,  346 => 176,  341 => 175,  339 => 174,  333 => 173,  329 => 172,  322 => 170,  319 => 169,  315 => 167,  312 => 166,  303 => 164,  298 => 163,  296 => 162,  289 => 160,  283 => 159,  277 => 158,  271 => 157,  265 => 156,  259 => 155,  253 => 154,  247 => 153,  129 => 37,  125 => 35,  122 => 34,  113 => 32,  108 => 31,  106 => 30,  98 => 29,  91 => 27,  81 => 20,  73 => 16,  71 => 15,  67 => 14,  62 => 11,  59 => 10,  53 => 7,  50 => 6,  45 => 4,  42 => 3,  36 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/gmb/posts/create.twig", "/home/dealerportal/public_html/app/Views/Dealers/gmb/posts/create.twig");
    }
}
