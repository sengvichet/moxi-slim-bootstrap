<?php

/* Admin/gmb/reviews/index.twig */
class __TwigTemplate_86e4996073a29d0060e2fd9a1d58739a0e0b0ba6f193354155224cd6f5c9751a extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Admin/layouts/index.twig", "Admin/gmb/reviews/index.twig", 1);
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
        echo "Admin - GMB - Reviews";
    }

    // line 5
    public function block_page_content($context, array $blocks = array())
    {
        // line 6
        $this->loadTemplate("Admin/partials/gmb-button.twig", "Admin/gmb/reviews/index.twig", 6)->display($context);
        // line 7
        echo "<h2 class=\"text-center mt-3 mb-3\">Review Replies</h2>

<!-- New Reviews -->
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">New Replies</h3>
  </div>
  <div class=\"card-body\">
    <div class=\"row\">
      <div class=\"col-12 table-responsive\">
        <table class=\"table table-bordered table-striped\" id=\"new-reviews-table\">
          <thead>
            <tr>
              <th class=\"search\">Location</th>
              <th class=\"search\">Reviewer</th>
              <th class=\"search\">Review</th>
              <th class=\"search\">Rating</th>
              <th class=\"search\">Review Created At</th>
              <th class=\"search\">Review Updated At</th>
              <th class=\"search\">Reply</th>
              <th class=\"search\">Reply Updated At</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["reviews"] ?? null), "new", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["review"]) {
            // line 33
            echo "              ";
            $context["location"] = (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = ($context["locations"] ?? null)) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[twig_get_attribute($this->env, $this->source, $context["review"], "location_id", array())] ?? null) : null);
            // line 34
            echo "              <tr>
                <td>";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["location"] ?? null), "location_name", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "reviewer_name", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "comment", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 38
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "star_rating", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 39
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "create_timestamp", array()), "F j, Y H:i:s"), "html", null, true);
            echo "</td>
                <td>";
            // line 40
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "update_timestamp", array()), "F j, Y H:i:s"), "html", null, true);
            echo "</td>
                <td>";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "reply_comment", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 42
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "reply_update_timestamp", array()), "F j, Y H:i:s"), "html", null, true);
            echo "</td>
                <td>
                  ";
            // line 44
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "reply_comment", array())) > 0)) {
                // line 45
                echo "                  <form action=\"/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "delete", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "review_id", array()), "html", null, true);
                echo "\">
                    <button type=\"button\" class=\"btn btn-danger delete-reply-button\"><i class=\"fa fa-trash\"></i> reply</button>
                  </form>
                  ";
            } else {
                // line 49
                echo "                    <span class=\"font-italic text-info\">reply has already been deleted</span>
                  ";
            }
            // line 51
            echo "                </td>
              </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['review'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "          </tbody>
          <tfoot>
            <tr>
              <th class=\"search\">Location</th>
              <th class=\"search\">Reviewer</th>
              <th class=\"search\">Review</th>
              <th class=\"search\">Rating</th>
              <th class=\"search\">Review Created At</th>
              <th class=\"search\">Review Updated At</th>
              <th class=\"search\">Reply</th>
              <th class=\"search\">Reply Updated At</th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Old Reviews -->
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">Old Reviews and Replies</h3>
  </div>
  <div class=\"card-body\">
    <div class=\"row\">
      <div class=\"col-12 table-responsive\">
        <table class=\"table table-bordered table-striped\" id=\"old-reviews-table\">
          <thead>
            <tr>
              <th class=\"search\">Location</th>
              <th class=\"search\">Reviewer</th>
              <th class=\"search\">Review</th>
              <th class=\"search\">Rating</th>
              <th class=\"search\">Review Created At</th>
              <th class=\"search\">Review Updated At</th>
              <th class=\"search\">Reply</th>
              <th class=\"search\">Reply Updated At</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            ";
        // line 97
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["reviews"] ?? null), "old", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["review"]) {
            // line 98
            echo "              ";
            $context["location"] = (($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = ($context["locations"] ?? null)) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[twig_get_attribute($this->env, $this->source, $context["review"], "location_id", array())] ?? null) : null);
            // line 99
            echo "              <tr>
                <td>";
            // line 100
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["location"] ?? null), "location_name", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 101
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "reviewer_name", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 102
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "comment", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 103
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "star_rating", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 104
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "create_timestamp", array()), "F j, Y H:i:s"), "html", null, true);
            echo "</td>
                <td>";
            // line 105
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "update_timestamp", array()), "F j, Y H:i:s"), "html", null, true);
            echo "</td>
                <td>";
            // line 106
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "reply_comment", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 107
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "reply_update_timestamp", array()), "F j, Y H:i:s"), "html", null, true);
            echo "</td>
                <td>
                  ";
            // line 109
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "reply_comment", array())) > 0)) {
                // line 110
                echo "                  <form action=\"/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "delete", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["review"], "review_id", array()), "html", null, true);
                echo "\">
                    <button type=\"button\" class=\"btn btn-danger delete-reply-button\"><i class=\"fa fa-trash\"></i> reply</button>
                  </form>
                  ";
            }
            // line 114
            echo "                </td>
              </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['review'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 117
        echo "          </tbody>
          <tfoot>
            <tr>
              <th class=\"search\">Location</th>
              <th class=\"search\">Reviewer</th>
              <th class=\"search\">Review</th>
              <th class=\"search\">Rating</th>
              <th class=\"search\">Review Created At</th>
              <th class=\"search\">Review Updated At</th>
              <th class=\"search\">Reply</th>
              <th class=\"search\">Reply Updated At</th>
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

    // line 137
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 138
        echo "  <script src=\"/assets/js/sweetalert2.all.min.js\"></script>
  <script src=\"/assets/DataTables/datatables.min.js\"></script>
  <script src=\"/assets/js/admin/reviews.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "Admin/gmb/reviews/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  273 => 138,  270 => 137,  247 => 117,  239 => 114,  229 => 110,  227 => 109,  222 => 107,  218 => 106,  214 => 105,  210 => 104,  206 => 103,  202 => 102,  198 => 101,  194 => 100,  191 => 99,  188 => 98,  184 => 97,  139 => 54,  131 => 51,  127 => 49,  117 => 45,  115 => 44,  110 => 42,  106 => 41,  102 => 40,  98 => 39,  94 => 38,  90 => 37,  86 => 36,  82 => 35,  79 => 34,  76 => 33,  72 => 32,  45 => 7,  43 => 6,  40 => 5,  34 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Admin/gmb/reviews/index.twig", "/home/dealerportal/public_html/app/Views/Admin/gmb/reviews/index.twig");
    }
}
