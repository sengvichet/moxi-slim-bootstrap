<?php

/* Admin/gmb/posts/index.twig */
class __TwigTemplate_5b915d2eacf1371b552b4be7b8641a08c70c0ca26e06e653f968a29c302e2068 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Admin/layouts/index.twig", "Admin/gmb/posts/index.twig", 1);
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
        echo "Admin - GMB - Posts";
    }

    // line 5
    public function block_page_content($context, array $blocks = array())
    {
        // line 6
        $this->loadTemplate("Admin/partials/gmb-button.twig", "Admin/gmb/posts/index.twig", 6)->display($context);
        // line 7
        echo "<h2 class=\"text-center mt-3 mb-3\">Review Posts</h2>

<!-- Standard Posts -->
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">New Standard Posts from Dealers</h3>
  </div>
  <div class=\"card-body\">
    <div class=\"row\">
      <div class=\"col-12 table-responsive\">
        <table class=\"table table-bordered table-striped\" id=\"new-standard-posts-table\">
          <thead>
            <tr>
              <th class=\"search\">Location</th>
              <th class=\"search\">Summary</th>
              <th>Photo</th>
              <th class=\"search\">CTA Type</th>
              <th class=\"search\">CTA URL</th>
              <th class=\"search\">Created At</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["posts"] ?? null), "new", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 31
            echo "              ";
            if ((twig_get_attribute($this->env, $this->source, $context["post"], "topic_type", array()) == "standard")) {
                // line 32
                echo "              ";
                $context["location"] = (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = ($context["locations"] ?? null)) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[twig_get_attribute($this->env, $this->source, $context["post"], "location_id", array())] ?? null) : null);
                // line 33
                echo "              <tr>
                <td>";
                // line 34
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["location"] ?? null), "location_name", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 35
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "summary", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 36
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["media"] ?? null), twig_get_attribute($this->env, $this->source, $context["post"], "post_id", array()), array(), "array", false, true), "source_url", array(), "any", true, true)) {
                    // line 37
                    echo "                  <img src=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = ($context["media"] ?? null)) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[twig_get_attribute($this->env, $this->source, $context["post"], "post_id", array())] ?? null) : null), "source_url", array()), "html", null, true);
                    echo "\" style=\"max-width: 100px; max-height: 100px;\">
                ";
                }
                // line 38
                echo "</td>
                <td>";
                // line 39
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["post"], "cta_type", array()), array("_" => " "))), "html", null, true);
                echo "</td>
                <td>";
                // line 40
                if (twig_get_attribute($this->env, $this->source, $context["post"], "cta_url", array())) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "cta_url", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "cta_url", array()), "html", null, true);
                    echo "</a>";
                }
                echo "</td>
                <td>";
                // line 41
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "create_time", array()), "F j, Y H:i:s"), "html", null, true);
                echo "</td>
                <td>
                  <form action=\"/";
                // line 43
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "delete", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "post_id", array()), "html", null, true);
                echo "\">
                    <button type=\"button\" class=\"btn btn-danger delete-post-button\"><i class=\"fa fa-trash\"></i></button>
                  </form>
                </td>
              </tr>
              ";
            }
            // line 49
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "          </tbody>
          <tfoot>
            <tr>
              <th class=\"search\">Location</th>
              <th class=\"search\">Summary</th>
              <th>Photo</th>
              <th class=\"search\">CTA Type</th>
              <th class=\"search\">CTA URL</th>
              <th class=\"search\">Created At</th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Event Posts -->
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">New Event Posts from Dealers</h3>
  </div>
  <div class=\"card-body\">
    <div class=\"row\">
      <div class=\"col-12 table-responsive\">
        <table class=\"table table-bordered table-striped\" id=\"new-event-posts-table\">
          <thead>
            <tr>
              <th class=\"search\">Location</th>
              <th class=\"search\">Title</th>
              <th class=\"search\">Summary</th>
              <th>Photo</th>
              <th class=\"search\">Start Time</th>
              <th class=\"search\">End Time</th>
              <th class=\"search\">CTA Type</th>
              <th class=\"search\">CTA URL</th>
              <th class=\"search\">Created At</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            ";
        // line 92
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["posts"] ?? null), "new", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 93
            echo "              ";
            if ((twig_get_attribute($this->env, $this->source, $context["post"], "topic_type", array()) == "event")) {
                // line 94
                echo "              ";
                $context["location"] = (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = ($context["locations"] ?? null)) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[twig_get_attribute($this->env, $this->source, $context["post"], "location_id", array())] ?? null) : null);
                // line 95
                echo "              ";
                $context["event"] = (($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = ($context["events"] ?? null)) && is_array($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9) || $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 instanceof ArrayAccess ? ($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9[twig_get_attribute($this->env, $this->source, $context["post"], "post_id", array())] ?? null) : null);
                // line 96
                echo "              <tr>
                <td>";
                // line 97
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["location"] ?? null), "location_name", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 98
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "title", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 99
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "summary", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 100
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["media"] ?? null), twig_get_attribute($this->env, $this->source, $context["post"], "post_id", array()), array(), "array", false, true), "source_url", array(), "any", true, true)) {
                    // line 101
                    echo "                  <img src=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = ($context["media"] ?? null)) && is_array($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217) || $__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 instanceof ArrayAccess ? ($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217[twig_get_attribute($this->env, $this->source, $context["post"], "post_id", array())] ?? null) : null), "source_url", array()), "html", null, true);
                    echo "\" style=\"max-width: 100px; max-height: 100px;\">
                ";
                }
                // line 102
                echo "</td>
                <td>";
                // line 103
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "start_time", array()), "F j, Y H:i:s"), "html", null, true);
                echo "</td>
                <td>";
                // line 104
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "end_time", array()), "F j, Y H:i:s"), "html", null, true);
                echo "</td>
                <td>";
                // line 105
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["post"], "cta_type", array()), array("_" => " "))), "html", null, true);
                echo "</td>
                <td>";
                // line 106
                if (twig_get_attribute($this->env, $this->source, $context["post"], "cta_url", array())) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "cta_url", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "cta_url", array()), "html", null, true);
                    echo "</a>";
                }
                echo "</td>
                <td>";
                // line 107
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "create_time", array()), "F j, Y H:i:s"), "html", null, true);
                echo "</td>
                <td>
                  <form action=\"/";
                // line 109
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "delete", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "post_id", array()), "html", null, true);
                echo "\">
                    <button type=\"button\" class=\"btn btn-danger delete-post-button\"><i class=\"fa fa-trash\"></i></button>
                  </form>
                </td>
              </tr>
              ";
            }
            // line 115
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 116
        echo "          </tbody>
          <tfoot>
            <tr>
              <th class=\"search\">Location</th>
              <th class=\"search\">Title</th>
              <th class=\"search\">Summary</th>
              <th>Photo</th>
              <th class=\"search\">Start Time</th>
              <th class=\"search\">End Time</th>
              <th class=\"search\">CTA Type</th>
              <th class=\"search\">CTA URL</th>
              <th class=\"search\">Created At</th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Offer Posts -->
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">New Offer Posts from Dealers</h3>
  </div>
  <div class=\"card-body\">
    <div class=\"row\">
      <div class=\"col-12 table-responsive\">
        <table class=\"table table-bordered table-striped\" id=\"new-offer-posts-table\">
          <thead>
            <tr>
              <th class=\"search\">Location</th>
              <th class=\"search\">Title</th>
              <th class=\"search\">Summary</th>
              <th>Photo</th>
              <th class=\"search\">Start Time</th>
              <th class=\"search\">End Time</th>
              <th class=\"search\">CTA Type</th>
              <th class=\"search\">CTA URL</th>
              <th class=\"search\">Coupon Code</th>
              <th class=\"search\">Redeem Online URL</th>
              <th class=\"search\">Terms &amp; Conditions</th>
              <th class=\"search\">Created At</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            ";
        // line 164
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["posts"] ?? null), "new", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 165
            echo "              ";
            if ((twig_get_attribute($this->env, $this->source, $context["post"], "topic_type", array()) == "offer")) {
                // line 166
                echo "              ";
                $context["location"] = (($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 = ($context["locations"] ?? null)) && is_array($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105) || $__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 instanceof ArrayAccess ? ($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105[twig_get_attribute($this->env, $this->source, $context["post"], "location_id", array())] ?? null) : null);
                // line 167
                echo "              ";
                $context["event"] = (($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 = ($context["events"] ?? null)) && is_array($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779) || $__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 instanceof ArrayAccess ? ($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779[twig_get_attribute($this->env, $this->source, $context["post"], "post_id", array())] ?? null) : null);
                // line 168
                echo "              ";
                $context["offer"] = (($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 = ($context["offers"] ?? null)) && is_array($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1) || $__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 instanceof ArrayAccess ? ($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1[twig_get_attribute($this->env, $this->source, $context["post"], "post_id", array())] ?? null) : null);
                // line 169
                echo "              <tr>
                <td>";
                // line 170
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["location"] ?? null), "location_name", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 171
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "title", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 172
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "summary", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 173
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["media"] ?? null), twig_get_attribute($this->env, $this->source, $context["post"], "post_id", array()), array(), "array", false, true), "source_url", array(), "any", true, true)) {
                    // line 174
                    echo "                  <img src=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 = ($context["media"] ?? null)) && is_array($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0) || $__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 instanceof ArrayAccess ? ($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0[twig_get_attribute($this->env, $this->source, $context["post"], "post_id", array())] ?? null) : null), "source_url", array()), "html", null, true);
                    echo "\" style=\"max-width: 100px; max-height: 100px;\">
                ";
                }
                // line 175
                echo "</td>
                <td>";
                // line 176
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "start_time", array()), "F j, Y H:i:s"), "html", null, true);
                echo "</td>
                <td>";
                // line 177
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["event"] ?? null), "end_time", array()), "F j, Y H:i:s"), "html", null, true);
                echo "</td>
                <td>";
                // line 178
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["post"], "cta_type", array()), array("_" => " "))), "html", null, true);
                echo "</td>
                <td>";
                // line 179
                if (twig_get_attribute($this->env, $this->source, $context["post"], "cta_url", array())) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "cta_url", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "cta_url", array()), "html", null, true);
                    echo "</a>";
                }
                echo "</td>
                <td>";
                // line 180
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["offer"] ?? null), "coupon_code", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 181
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["offer"] ?? null), "redeem_online_url", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 182
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["offer"] ?? null), "terms_conditions", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 183
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "create_time", array()), "F j, Y H:i:s"), "html", null, true);
                echo "</td>
                <td>
                  <form action=\"/";
                // line 185
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "delete", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "post_id", array()), "html", null, true);
                echo "\">
                    <button type=\"button\" class=\"btn btn-danger delete-post-button\"><i class=\"fa fa-trash\"></i></button>
                  </form>
                </td>
              </tr>
              ";
            }
            // line 191
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 192
        echo "          </tbody>
          <tfoot>
            <tr>
              <th class=\"search\">Location</th>
              <th class=\"search\">Title</th>
              <th class=\"search\">Summary</th>
              <th>Photo</th>
              <th class=\"search\">Start Time</th>
              <th class=\"search\">End Time</th>
              <th class=\"search\">CTA Type</th>
              <th class=\"search\">CTA URL</th>
              <th class=\"search\">Coupon Code</th>
              <th class=\"search\">Redeem Online URL</th>
              <th class=\"search\">Terms &amp; Conditions</th>
              <th class=\"search\">Created At</th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Product Posts -->
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">New Product Posts from Dealers</h3>
  </div>
  <div class=\"card-body\">
    <div class=\"row\">
      <div class=\"col-12 table-responsive\">
        <table class=\"table table-bordered table-striped\" id=\"new-product-posts-table\">
          <thead>
            <tr>
              <th class=\"search\">Location</th>
              <th class=\"search\">Product Name</th>
              <th class=\"search\">Summary</th>
              <th>Photo</th>
              <th class=\"search\">Min Price</th>
              <th class=\"search\">Max Price</th>
              <th class=\"search\">CTA Type</th>
              <th class=\"search\">CTA URL</th>
              <th class=\"search\">Created At</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            ";
        // line 240
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["posts"] ?? null), "new", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 241
            echo "              ";
            if ((twig_get_attribute($this->env, $this->source, $context["post"], "topic_type", array()) == "product")) {
                // line 242
                echo "              ";
                $context["location"] = (($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 = ($context["locations"] ?? null)) && is_array($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866) || $__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 instanceof ArrayAccess ? ($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866[twig_get_attribute($this->env, $this->source, $context["post"], "location_id", array())] ?? null) : null);
                // line 243
                echo "              ";
                $context["product"] = (($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f = ($context["products"] ?? null)) && is_array($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f) || $__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f instanceof ArrayAccess ? ($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f[twig_get_attribute($this->env, $this->source, $context["post"], "post_id", array())] ?? null) : null);
                // line 244
                echo "              <tr>
                <td>";
                // line 245
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["location"] ?? null), "location_name", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 246
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "product_name", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 247
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "summary", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 248
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["media"] ?? null), twig_get_attribute($this->env, $this->source, $context["post"], "post_id", array()), array(), "array", false, true), "source_url", array(), "any", true, true)) {
                    // line 249
                    echo "                  <img src=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7 = ($context["media"] ?? null)) && is_array($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7) || $__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7 instanceof ArrayAccess ? ($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7[twig_get_attribute($this->env, $this->source, $context["post"], "post_id", array())] ?? null) : null), "source_url", array()), "html", null, true);
                    echo "\" style=\"max-width: 100px; max-height: 100px;\">
                ";
                }
                // line 250
                echo "</td>
                <td>\$";
                // line 251
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "lower_price_units", array()), "html", null, true);
                echo ".";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "lower_price_nanos", array()), "html", null, true);
                echo "</td>
                <td>\$";
                // line 252
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "upper_price_units", array()), "html", null, true);
                echo ".";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "upper_price_nanos", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 253
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["post"], "cta_type", array()), array("_" => " "))), "html", null, true);
                echo "</td>
                <td>";
                // line 254
                if (twig_get_attribute($this->env, $this->source, $context["post"], "cta_url", array())) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "cta_url", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "cta_url", array()), "html", null, true);
                    echo "</a>";
                }
                echo "</td>
                <td>";
                // line 255
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "create_time", array()), "F j, Y H:i:s"), "html", null, true);
                echo "</td>
                <td>
                  <form action=\"/";
                // line 257
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "delete", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "post_id", array()), "html", null, true);
                echo "\">
                    <button type=\"button\" class=\"btn btn-danger delete-post-button\"><i class=\"fa fa-trash\"></i></button>
                  </form>
                </td>
              </tr>
              ";
            }
            // line 263
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 264
        echo "          </tbody>
          <tfoot>
            <tr>
              <th class=\"search\">Location</th>
              <th class=\"search\">Product Name</th>
              <th class=\"search\">Summary</th>
              <th>Photo</th>
              <th class=\"search\">Min Price</th>
              <th class=\"search\">Max Price</th>
              <th class=\"search\">CTA Type</th>
              <th class=\"search\">CTA URL</th>
              <th class=\"search\">Created At</th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
";
    }

    // line 285
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 286
        echo "  <script src=\"/assets/js/sweetalert2.all.min.js\"></script>
  <script src=\"/assets/DataTables/datatables.min.js\"></script>
  <script src=\"/assets/js/admin/posts.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "Admin/gmb/posts/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  577 => 286,  574 => 285,  550 => 264,  544 => 263,  533 => 257,  528 => 255,  518 => 254,  514 => 253,  508 => 252,  502 => 251,  499 => 250,  493 => 249,  491 => 248,  487 => 247,  483 => 246,  479 => 245,  476 => 244,  473 => 243,  470 => 242,  467 => 241,  463 => 240,  413 => 192,  407 => 191,  396 => 185,  391 => 183,  387 => 182,  383 => 181,  379 => 180,  369 => 179,  365 => 178,  361 => 177,  357 => 176,  354 => 175,  348 => 174,  346 => 173,  342 => 172,  338 => 171,  334 => 170,  331 => 169,  328 => 168,  325 => 167,  322 => 166,  319 => 165,  315 => 164,  265 => 116,  259 => 115,  248 => 109,  243 => 107,  233 => 106,  229 => 105,  225 => 104,  221 => 103,  218 => 102,  212 => 101,  210 => 100,  206 => 99,  202 => 98,  198 => 97,  195 => 96,  192 => 95,  189 => 94,  186 => 93,  182 => 92,  138 => 50,  132 => 49,  121 => 43,  116 => 41,  106 => 40,  102 => 39,  99 => 38,  93 => 37,  91 => 36,  87 => 35,  83 => 34,  80 => 33,  77 => 32,  74 => 31,  70 => 30,  45 => 7,  43 => 6,  40 => 5,  34 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Admin/gmb/posts/index.twig", "/home/dealerportal/public_html/app/Views/Admin/gmb/posts/index.twig");
    }
}
