<?php

/* Admin/gmb/locations/index.twig */
class __TwigTemplate_9ce7fde2317d7f65e19ba32d02878a5196c6d24ae3a3b44a8ed2112d1d6042a5 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Admin/layouts/index.twig", "Admin/gmb/locations/index.twig", 1);
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
        echo "Admin - GMB - Locations";
    }

    // line 5
    public function block_page_content($context, array $blocks = array())
    {
        // line 6
        $this->loadTemplate("Admin/partials/gmb-button.twig", "Admin/gmb/locations/index.twig", 6)->display($context);
        // line 7
        echo "<h2 class=\"text-center mt-3 mb-3\">Review Locations Updates</h2>
";
        // line 8
        $this->loadTemplate("Dealers/partials/errors.twig", "Admin/gmb/locations/index.twig", 8)->display($context);
        // line 9
        echo "<!-- Standard Posts -->
<div class=\"card\">
  <div class=\"card-header\">
    <h3 class=\"text-center\">Locations Updates</h3>
  </div>
  <div class=\"card-body\">
    <div class=\"row\">
      <div class=\"col-12\">
        <form id=\"location-select-form\">
          <div class=\"input-group\">
            <select class=\"form-control\" name=\"location\">
              ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["locations"] ?? null));
        foreach ($context['_seq'] as $context["id"] => $context["item"]) {
            // line 21
            echo "                <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "location", array()), "location_id", array()), "html", null, true);
            echo "\"
                  ";
            // line 22
            if (($context["id"] == ($context["location"] ?? null))) {
                echo "selected";
            }
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "location", array()), "location_name", array()), "html", null, true);
            echo "</option>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "            </select>
            <div class=\"input-group-append\">
              <button class=\"btn btn-primary\" type=\"submit\">Select Location To Review</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class=\"row\">
      <div class=\"col-12 table-responsive\">
        <table class=\"table table-bordered table-striped\" id=\"locations-table\">
          <thead>
            <tr>
              <th class=\"search\">Field</th>
              <th class=\"search\">Value Before</th>
              <th class=\"search\">Value After</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Location Name / Business Name</td>
              <td>";
        // line 46
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = ($context["locations"] ?? null)) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[($context["location"] ?? null)] ?? null) : null), "location", array()), "location_name", array()), "html", null, true);
        echo "</td>
              <td>";
        // line 47
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = ($context["companies"] ?? null)) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[($context["company"] ?? null)] ?? null) : null), "company", array()), "business_name", array()), "html", null, true);
        echo "</td>
              <td>
                ";
        // line 49
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = ($context["locations"] ?? null)) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[($context["location"] ?? null)] ?? null) : null), "location", array()), "location_name", array()) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = ($context["companies"] ?? null)) && is_array($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9) || $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 instanceof ArrayAccess ? ($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9[($context["company"] ?? null)] ?? null) : null), "company", array()), "business_name", array()))) {
            // line 50
            echo "                  <form action=\"/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "update", array()), "html", null, true);
            echo "\" method=\"POST\">
                    <input type=\"hidden\" name=\"field\" value=\"location_name\">
                    <input type=\"hidden\" name=\"location\" value=\"";
            // line 52
            echo twig_escape_filter($this->env, ($context["location"] ?? null), "html", null, true);
            echo "\">
                    <button type=\"submit\" class=\"btn btn-danger\">Discard</button>
                  </form>
                ";
        }
        // line 56
        echo "              </td>
            </tr>
            <tr>
              <td>Address Line 1 / Street</td>
              <td>";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = ($context["locations"] ?? null)) && is_array($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217) || $__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 instanceof ArrayAccess ? ($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217[($context["location"] ?? null)] ?? null) : null), "location", array()), "address_line_1", array()), "html", null, true);
        echo "</td>
              <td>";
        // line 61
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 = ($context["companies"] ?? null)) && is_array($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105) || $__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 instanceof ArrayAccess ? ($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105[($context["company"] ?? null)] ?? null) : null), "company", array()), "street", array()), "html", null, true);
        echo "</td>
              <td>
                ";
        // line 63
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 = ($context["locations"] ?? null)) && is_array($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779) || $__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 instanceof ArrayAccess ? ($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779[($context["location"] ?? null)] ?? null) : null), "location", array()), "address_line_1", array()) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 = ($context["companies"] ?? null)) && is_array($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1) || $__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 instanceof ArrayAccess ? ($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1[($context["company"] ?? null)] ?? null) : null), "company", array()), "street", array()))) {
            // line 64
            echo "                  <form action=\"/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "update", array()), "html", null, true);
            echo "\" method=\"POST\">
                    <input type=\"hidden\" name=\"field\" value=\"address_line_1\">
                    <input type=\"hidden\" name=\"location\" value=\"";
            // line 66
            echo twig_escape_filter($this->env, ($context["location"] ?? null), "html", null, true);
            echo "\">
                    <button type=\"submit\" class=\"btn btn-danger\">Discard</button>
                  </form>
                ";
        }
        // line 70
        echo "              </td>
            </tr>
            <tr>
              <td>Address Line 2</td>
              <td>";
        // line 74
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 = ($context["locations"] ?? null)) && is_array($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0) || $__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 instanceof ArrayAccess ? ($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0[($context["location"] ?? null)] ?? null) : null), "location", array()), "address_line_2", array()), "html", null, true);
        echo "</td>
              <td>";
        // line 75
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 = ($context["companies"] ?? null)) && is_array($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866) || $__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 instanceof ArrayAccess ? ($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866[($context["company"] ?? null)] ?? null) : null), "company", array()), "address_line_2", array()), "html", null, true);
        echo "</td>
              <td>
                ";
        // line 77
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f = ($context["locations"] ?? null)) && is_array($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f) || $__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f instanceof ArrayAccess ? ($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f[($context["location"] ?? null)] ?? null) : null), "location", array()), "address_line_2", array()) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7 = ($context["companies"] ?? null)) && is_array($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7) || $__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7 instanceof ArrayAccess ? ($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7[($context["company"] ?? null)] ?? null) : null), "company", array()), "address_line_2", array()))) {
            // line 78
            echo "                  <form action=\"/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "update", array()), "html", null, true);
            echo "\" method=\"POST\">
                    <input type=\"hidden\" name=\"field\" value=\"address_line_2\">
                    <input type=\"hidden\" name=\"location\" value=\"";
            // line 80
            echo twig_escape_filter($this->env, ($context["location"] ?? null), "html", null, true);
            echo "\">
                    <button type=\"submit\" class=\"btn btn-danger\">Discard</button>
                  </form>
                ";
        }
        // line 84
        echo "              </td>
            </tr>
            <tr>
              <td>City</td>
              <td>";
        // line 88
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289 = ($context["locations"] ?? null)) && is_array($__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289) || $__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289 instanceof ArrayAccess ? ($__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289[($context["location"] ?? null)] ?? null) : null), "location", array()), "city", array()), "html", null, true);
        echo "</td>
              <td>";
        // line 89
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18 = ($context["companies"] ?? null)) && is_array($__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18) || $__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18 instanceof ArrayAccess ? ($__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18[($context["company"] ?? null)] ?? null) : null), "company", array()), "city", array()), "html", null, true);
        echo "</td>
              <td>
                ";
        // line 91
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018 = ($context["locations"] ?? null)) && is_array($__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018) || $__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018 instanceof ArrayAccess ? ($__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018[($context["location"] ?? null)] ?? null) : null), "location", array()), "city", array()) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413 = ($context["companies"] ?? null)) && is_array($__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413) || $__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413 instanceof ArrayAccess ? ($__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413[($context["company"] ?? null)] ?? null) : null), "company", array()), "city", array()))) {
            // line 92
            echo "                  <form action=\"/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "update", array()), "html", null, true);
            echo "\" method=\"POST\">
                    <input type=\"hidden\" name=\"field\" value=\"city\">
                    <input type=\"hidden\" name=\"location\" value=\"";
            // line 94
            echo twig_escape_filter($this->env, ($context["location"] ?? null), "html", null, true);
            echo "\">
                    <button type=\"submit\" class=\"btn btn-danger\">Discard</button>
                  </form>
                ";
        }
        // line 98
        echo "              </td>
            </tr>
            <tr>
              <td>State</td>
              <td>";
        // line 102
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_a5ce050c56e2fa0d875fbc5d7e5a277df72ffc991bd0164f3c078803c5d7b4e7 = ($context["locations"] ?? null)) && is_array($__internal_a5ce050c56e2fa0d875fbc5d7e5a277df72ffc991bd0164f3c078803c5d7b4e7) || $__internal_a5ce050c56e2fa0d875fbc5d7e5a277df72ffc991bd0164f3c078803c5d7b4e7 instanceof ArrayAccess ? ($__internal_a5ce050c56e2fa0d875fbc5d7e5a277df72ffc991bd0164f3c078803c5d7b4e7[($context["location"] ?? null)] ?? null) : null), "location", array()), "state", array()), "html", null, true);
        echo "</td>
              <td>";
        // line 103
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_c3328b7afe486068cdbdc8d1c3c828eef7c877ecbd31cfd5c6604f285bf56a4c = ($context["companies"] ?? null)) && is_array($__internal_c3328b7afe486068cdbdc8d1c3c828eef7c877ecbd31cfd5c6604f285bf56a4c) || $__internal_c3328b7afe486068cdbdc8d1c3c828eef7c877ecbd31cfd5c6604f285bf56a4c instanceof ArrayAccess ? ($__internal_c3328b7afe486068cdbdc8d1c3c828eef7c877ecbd31cfd5c6604f285bf56a4c[($context["company"] ?? null)] ?? null) : null), "company", array()), "state", array()), "html", null, true);
        echo "</td>
              <td>
                ";
        // line 105
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_98440f958a27a294f74051b56287200cf8d4ccac3368b6ba585b36549e500d40 = ($context["locations"] ?? null)) && is_array($__internal_98440f958a27a294f74051b56287200cf8d4ccac3368b6ba585b36549e500d40) || $__internal_98440f958a27a294f74051b56287200cf8d4ccac3368b6ba585b36549e500d40 instanceof ArrayAccess ? ($__internal_98440f958a27a294f74051b56287200cf8d4ccac3368b6ba585b36549e500d40[($context["location"] ?? null)] ?? null) : null), "location", array()), "state", array()) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_1b6627cccbecc270d890e9c3dd7f6b41e277f9eef79718257925048c26dc6d79 = ($context["companies"] ?? null)) && is_array($__internal_1b6627cccbecc270d890e9c3dd7f6b41e277f9eef79718257925048c26dc6d79) || $__internal_1b6627cccbecc270d890e9c3dd7f6b41e277f9eef79718257925048c26dc6d79 instanceof ArrayAccess ? ($__internal_1b6627cccbecc270d890e9c3dd7f6b41e277f9eef79718257925048c26dc6d79[($context["company"] ?? null)] ?? null) : null), "company", array()), "state", array()))) {
            // line 106
            echo "                  <form action=\"/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "update", array()), "html", null, true);
            echo "\" method=\"POST\">
                    <input type=\"hidden\" name=\"field\" value=\"state\">
                    <input type=\"hidden\" name=\"location\" value=\"";
            // line 108
            echo twig_escape_filter($this->env, ($context["location"] ?? null), "html", null, true);
            echo "\">
                    <button type=\"submit\" class=\"btn btn-danger\">Discard</button>
                  </form>
                ";
        }
        // line 112
        echo "              </td>
            </tr>
            <tr>
              <td>Postal Code</td>
              <td>";
        // line 116
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_7dc3a0a28f55c5f2463e9b46ecafdfeb61e9238ed4d60acf6f7258d1de3c83e1 = ($context["locations"] ?? null)) && is_array($__internal_7dc3a0a28f55c5f2463e9b46ecafdfeb61e9238ed4d60acf6f7258d1de3c83e1) || $__internal_7dc3a0a28f55c5f2463e9b46ecafdfeb61e9238ed4d60acf6f7258d1de3c83e1 instanceof ArrayAccess ? ($__internal_7dc3a0a28f55c5f2463e9b46ecafdfeb61e9238ed4d60acf6f7258d1de3c83e1[($context["location"] ?? null)] ?? null) : null), "location", array()), "postal_code", array()), "html", null, true);
        echo "</td>
              <td>";
        // line 117
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_8acbbad4b27a786cad00cba65bc04ee7a503f81018370f2b790d4fe79cfeb21d = ($context["companies"] ?? null)) && is_array($__internal_8acbbad4b27a786cad00cba65bc04ee7a503f81018370f2b790d4fe79cfeb21d) || $__internal_8acbbad4b27a786cad00cba65bc04ee7a503f81018370f2b790d4fe79cfeb21d instanceof ArrayAccess ? ($__internal_8acbbad4b27a786cad00cba65bc04ee7a503f81018370f2b790d4fe79cfeb21d[($context["company"] ?? null)] ?? null) : null), "company", array()), "zip", array()), "html", null, true);
        echo "</td>
              <td>
                ";
        // line 119
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_fbfc01bf158172b44fe031b3ae2f71c474964929dfcc389cc81ef3f55fcb06f0 = ($context["locations"] ?? null)) && is_array($__internal_fbfc01bf158172b44fe031b3ae2f71c474964929dfcc389cc81ef3f55fcb06f0) || $__internal_fbfc01bf158172b44fe031b3ae2f71c474964929dfcc389cc81ef3f55fcb06f0 instanceof ArrayAccess ? ($__internal_fbfc01bf158172b44fe031b3ae2f71c474964929dfcc389cc81ef3f55fcb06f0[($context["location"] ?? null)] ?? null) : null), "location", array()), "postal_code", array()) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_c2705d9276f5639c7ab516a5efff892123f6b2bdcf92245c8c3e7a8e7b8e0b4c = ($context["companies"] ?? null)) && is_array($__internal_c2705d9276f5639c7ab516a5efff892123f6b2bdcf92245c8c3e7a8e7b8e0b4c) || $__internal_c2705d9276f5639c7ab516a5efff892123f6b2bdcf92245c8c3e7a8e7b8e0b4c instanceof ArrayAccess ? ($__internal_c2705d9276f5639c7ab516a5efff892123f6b2bdcf92245c8c3e7a8e7b8e0b4c[($context["company"] ?? null)] ?? null) : null), "company", array()), "zip", array()))) {
            // line 120
            echo "                  <form action=\"/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "update", array()), "html", null, true);
            echo "\" method=\"POST\">
                    <input type=\"hidden\" name=\"field\" value=\"postal_code\">
                    <input type=\"hidden\" name=\"location\" value=\"";
            // line 122
            echo twig_escape_filter($this->env, ($context["location"] ?? null), "html", null, true);
            echo "\">
                    <button type=\"submit\" class=\"btn btn-danger\">Discard</button>
                  </form>
                ";
        }
        // line 126
        echo "              </td>
            </tr>
            <tr>
              <td>Primary Phone / Company Phone</td>
              <td>";
        // line 130
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_4450f16bcd6eee436ec803be9cb8dd13e40acb5f3c668ce291f0476abc1a5b69 = ($context["locations"] ?? null)) && is_array($__internal_4450f16bcd6eee436ec803be9cb8dd13e40acb5f3c668ce291f0476abc1a5b69) || $__internal_4450f16bcd6eee436ec803be9cb8dd13e40acb5f3c668ce291f0476abc1a5b69 instanceof ArrayAccess ? ($__internal_4450f16bcd6eee436ec803be9cb8dd13e40acb5f3c668ce291f0476abc1a5b69[($context["location"] ?? null)] ?? null) : null), "location", array()), "primary_phone", array()), "html", null, true);
        echo "</td>
              <td>";
        // line 131
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_92ed32b8cbedc9f8b5b379c1ef395076f852e6115f19026df86a46e64a8be849 = ($context["companies"] ?? null)) && is_array($__internal_92ed32b8cbedc9f8b5b379c1ef395076f852e6115f19026df86a46e64a8be849) || $__internal_92ed32b8cbedc9f8b5b379c1ef395076f852e6115f19026df86a46e64a8be849 instanceof ArrayAccess ? ($__internal_92ed32b8cbedc9f8b5b379c1ef395076f852e6115f19026df86a46e64a8be849[($context["company"] ?? null)] ?? null) : null), "company", array()), "phone", array()), "html", null, true);
        echo "</td>
              <td>
                ";
        // line 133
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_ea7a33ac6d8a26ad47921e376e6221ddcc8585c46ced0d814217a4f86de9974e = ($context["locations"] ?? null)) && is_array($__internal_ea7a33ac6d8a26ad47921e376e6221ddcc8585c46ced0d814217a4f86de9974e) || $__internal_ea7a33ac6d8a26ad47921e376e6221ddcc8585c46ced0d814217a4f86de9974e instanceof ArrayAccess ? ($__internal_ea7a33ac6d8a26ad47921e376e6221ddcc8585c46ced0d814217a4f86de9974e[($context["location"] ?? null)] ?? null) : null), "location", array()), "primary_phone", array()) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_9522a6cebeae41b694ef7a2cdef578aec938dae7d5acf43b2efd8c4c9bc5dabe = ($context["companies"] ?? null)) && is_array($__internal_9522a6cebeae41b694ef7a2cdef578aec938dae7d5acf43b2efd8c4c9bc5dabe) || $__internal_9522a6cebeae41b694ef7a2cdef578aec938dae7d5acf43b2efd8c4c9bc5dabe instanceof ArrayAccess ? ($__internal_9522a6cebeae41b694ef7a2cdef578aec938dae7d5acf43b2efd8c4c9bc5dabe[($context["company"] ?? null)] ?? null) : null), "company", array()), "phone", array()))) {
            // line 134
            echo "                  <form action=\"/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "update", array()), "html", null, true);
            echo "\" method=\"POST\">
                    <input type=\"hidden\" name=\"field\" value=\"primary_phone\">
                    <input type=\"hidden\" name=\"location\" value=\"";
            // line 136
            echo twig_escape_filter($this->env, ($context["location"] ?? null), "html", null, true);
            echo "\">
                    <button type=\"submit\" class=\"btn btn-danger\">Discard</button>
                  </form>
                ";
        }
        // line 140
        echo "              </td>
            </tr>
            <tr>
              <td>Website URL</td>
              <td>";
        // line 144
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_9e736303ccc6dbec54334717fdf66a3c6c7a4ed563e8a9c6a92ccdbb773e19bf = ($context["locations"] ?? null)) && is_array($__internal_9e736303ccc6dbec54334717fdf66a3c6c7a4ed563e8a9c6a92ccdbb773e19bf) || $__internal_9e736303ccc6dbec54334717fdf66a3c6c7a4ed563e8a9c6a92ccdbb773e19bf instanceof ArrayAccess ? ($__internal_9e736303ccc6dbec54334717fdf66a3c6c7a4ed563e8a9c6a92ccdbb773e19bf[($context["location"] ?? null)] ?? null) : null), "location", array()), "website_url", array()), "html", null, true);
        echo "</td>
              <td>";
        // line 145
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_8acdbb41833471eddc4b3c5a5c648038762a0ba2347958dbb7f312bec87c3d40 = ($context["companies"] ?? null)) && is_array($__internal_8acdbb41833471eddc4b3c5a5c648038762a0ba2347958dbb7f312bec87c3d40) || $__internal_8acdbb41833471eddc4b3c5a5c648038762a0ba2347958dbb7f312bec87c3d40 instanceof ArrayAccess ? ($__internal_8acdbb41833471eddc4b3c5a5c648038762a0ba2347958dbb7f312bec87c3d40[($context["company"] ?? null)] ?? null) : null), "company", array()), "website", array()), "html", null, true);
        echo "</td>
              <td>
                ";
        // line 147
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_0668ed57f15eabeed8d9c4a45059ac93dfae05f7fa406a2dc49ae0ccb4f55bad = ($context["locations"] ?? null)) && is_array($__internal_0668ed57f15eabeed8d9c4a45059ac93dfae05f7fa406a2dc49ae0ccb4f55bad) || $__internal_0668ed57f15eabeed8d9c4a45059ac93dfae05f7fa406a2dc49ae0ccb4f55bad instanceof ArrayAccess ? ($__internal_0668ed57f15eabeed8d9c4a45059ac93dfae05f7fa406a2dc49ae0ccb4f55bad[($context["location"] ?? null)] ?? null) : null), "location", array()), "website_url", array()) != twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_e13139c4be4e2ff1c777544a2594638fcc3ca4c2221fe00c2149da0ddd1cc323 = ($context["companies"] ?? null)) && is_array($__internal_e13139c4be4e2ff1c777544a2594638fcc3ca4c2221fe00c2149da0ddd1cc323) || $__internal_e13139c4be4e2ff1c777544a2594638fcc3ca4c2221fe00c2149da0ddd1cc323 instanceof ArrayAccess ? ($__internal_e13139c4be4e2ff1c777544a2594638fcc3ca4c2221fe00c2149da0ddd1cc323[($context["company"] ?? null)] ?? null) : null), "company", array()), "website", array()))) {
            // line 148
            echo "                  <form action=\"/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "update", array()), "html", null, true);
            echo "\" method=\"POST\">
                    <input type=\"hidden\" name=\"field\" value=\"primary_phone\">
                    <input type=\"hidden\" name=\"location\" value=\"";
            // line 150
            echo twig_escape_filter($this->env, ($context["location"] ?? null), "html", null, true);
            echo "\">
                    <button type=\"submit\" class=\"btn btn-danger\">Discard</button>
                  </form>
                ";
        }
        // line 154
        echo "              </td>
            </tr>
            <tr>
              <td>Description</td>
              <td>";
        // line 158
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_abb62d7ada56c0cfc1a0dee78771b583349487dffc67903f3895606a65c3577c = ($context["locations"] ?? null)) && is_array($__internal_abb62d7ada56c0cfc1a0dee78771b583349487dffc67903f3895606a65c3577c) || $__internal_abb62d7ada56c0cfc1a0dee78771b583349487dffc67903f3895606a65c3577c instanceof ArrayAccess ? ($__internal_abb62d7ada56c0cfc1a0dee78771b583349487dffc67903f3895606a65c3577c[($context["location"] ?? null)] ?? null) : null), "location", array()), "description", array()), "html", null, true);
        echo "</td>
              <td>";
        // line 159
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_c0905adf98cd1533a675c4106b3846093815c41a83169ae22d4b915e0fcb70c3 = ($context["companies"] ?? null)) && is_array($__internal_c0905adf98cd1533a675c4106b3846093815c41a83169ae22d4b915e0fcb70c3) || $__internal_c0905adf98cd1533a675c4106b3846093815c41a83169ae22d4b915e0fcb70c3 instanceof ArrayAccess ? ($__internal_c0905adf98cd1533a675c4106b3846093815c41a83169ae22d4b915e0fcb70c3[($context["company"] ?? null)] ?? null) : null), "description", array()), "html", null, true);
        echo "</td>
              <td>
                ";
        // line 161
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_ec4b59f7be5e729f308b6e48c4483f79749dedb9a482762b64ba149aecfac14b = ($context["locations"] ?? null)) && is_array($__internal_ec4b59f7be5e729f308b6e48c4483f79749dedb9a482762b64ba149aecfac14b) || $__internal_ec4b59f7be5e729f308b6e48c4483f79749dedb9a482762b64ba149aecfac14b instanceof ArrayAccess ? ($__internal_ec4b59f7be5e729f308b6e48c4483f79749dedb9a482762b64ba149aecfac14b[($context["location"] ?? null)] ?? null) : null), "location", array()), "description", array()) != twig_get_attribute($this->env, $this->source, (($__internal_4abb1b337c0ef25ef376bdea173e8ce13160d926e1bcb921fd263a0c3744dc8f = ($context["companies"] ?? null)) && is_array($__internal_4abb1b337c0ef25ef376bdea173e8ce13160d926e1bcb921fd263a0c3744dc8f) || $__internal_4abb1b337c0ef25ef376bdea173e8ce13160d926e1bcb921fd263a0c3744dc8f instanceof ArrayAccess ? ($__internal_4abb1b337c0ef25ef376bdea173e8ce13160d926e1bcb921fd263a0c3744dc8f[($context["company"] ?? null)] ?? null) : null), "description", array()))) {
            // line 162
            echo "                  <form action=\"/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "update", array()), "html", null, true);
            echo "\" method=\"POST\">
                    <input type=\"hidden\" name=\"field\" value=\"description\">
                    <input type=\"hidden\" name=\"location\" value=\"";
            // line 164
            echo twig_escape_filter($this->env, ($context["location"] ?? null), "html", null, true);
            echo "\">
                    <button type=\"submit\" class=\"btn btn-danger\">Discard</button>
                  </form>
                ";
        }
        // line 168
        echo "              </td>
            </tr>
            <tr>
              <td>Categories</td>
              <td>
                ";
        // line 173
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (($__internal_1f87e440d7b5ac0d3821fd704a87cfd009d5f0cfaa151c63b53e5d2f3e117b47 = ($context["locations"] ?? null)) && is_array($__internal_1f87e440d7b5ac0d3821fd704a87cfd009d5f0cfaa151c63b53e5d2f3e117b47) || $__internal_1f87e440d7b5ac0d3821fd704a87cfd009d5f0cfaa151c63b53e5d2f3e117b47 instanceof ArrayAccess ? ($__internal_1f87e440d7b5ac0d3821fd704a87cfd009d5f0cfaa151c63b53e5d2f3e117b47[($context["location"] ?? null)] ?? null) : null), "categories", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 174
            echo "                  ";
            echo twig_escape_filter($this->env, $context["category"], "html", null, true);
            echo "<br>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 176
        echo "              </td>
              <td>
                ";
        // line 178
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (($__internal_5f0601c6aca043f0871c692399d8a4b50f756908e693f6dc8217a09ebec49d63 = ($context["companies"] ?? null)) && is_array($__internal_5f0601c6aca043f0871c692399d8a4b50f756908e693f6dc8217a09ebec49d63) || $__internal_5f0601c6aca043f0871c692399d8a4b50f756908e693f6dc8217a09ebec49d63 instanceof ArrayAccess ? ($__internal_5f0601c6aca043f0871c692399d8a4b50f756908e693f6dc8217a09ebec49d63[($context["company"] ?? null)] ?? null) : null), "categories", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 179
            echo "                  ";
            echo twig_escape_filter($this->env, $context["category"], "html", null, true);
            echo "<br>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 181
        echo "              </td>
              <td>
                ";
        // line 183
        if (twig_get_attribute($this->env, $this->source, (($__internal_2ca27bbf98b4159f4f59a7748003a9c780384782aa02798832bfdb1e4413f68c = ($context["discards"] ?? null)) && is_array($__internal_2ca27bbf98b4159f4f59a7748003a9c780384782aa02798832bfdb1e4413f68c) || $__internal_2ca27bbf98b4159f4f59a7748003a9c780384782aa02798832bfdb1e4413f68c instanceof ArrayAccess ? ($__internal_2ca27bbf98b4159f4f59a7748003a9c780384782aa02798832bfdb1e4413f68c[($context["location"] ?? null)] ?? null) : null), "categories", array())) {
            // line 184
            echo "                  <form action=\"/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "update", array()), "html", null, true);
            echo "\" method=\"POST\">
                    <input type=\"hidden\" name=\"field\" value=\"categories\">
                    <input type=\"hidden\" name=\"location\" value=\"";
            // line 186
            echo twig_escape_filter($this->env, ($context["location"] ?? null), "html", null, true);
            echo "\">
                    <button type=\"submit\" class=\"btn btn-danger\">Discard</button>
                  </form>
                ";
        }
        // line 190
        echo "              </td>
            </tr>
            <tr>
              <td>Regular Hours</td>
              <td>
                <table class=\"table table-borderless\">
                ";
        // line 196
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (($__internal_76fb338ba58f80d23455c79f0abb5764e150448d58ab4aec9c47558465bff0b8 = ($context["locations"] ?? null)) && is_array($__internal_76fb338ba58f80d23455c79f0abb5764e150448d58ab4aec9c47558465bff0b8) || $__internal_76fb338ba58f80d23455c79f0abb5764e150448d58ab4aec9c47558465bff0b8 instanceof ArrayAccess ? ($__internal_76fb338ba58f80d23455c79f0abb5764e150448d58ab4aec9c47558465bff0b8[($context["location"] ?? null)] ?? null) : null), "regular_hours", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["hours"]) {
            // line 197
            echo "                  <tr>
                  <td>";
            // line 198
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, $context["hours"], "open_day", array())), "html", null, true);
            echo "</td>
                  <td>";
            // line 199
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["hours"], "open_time", array()), "H:i"), "html", null, true);
            echo "</td>
                  <td>";
            // line 200
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["hours"], "close_time", array()), "H:i"), "html", null, true);
            echo "</td>
                  </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hours'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 203
        echo "                </table>
              </td>
              <td>
                <table class=\"table table-borderless\">
                  ";
        // line 207
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (($__internal_63f73f0dc37a3f090f2879710955e3129a524d5e1461c1d27648aa08f83349f9 = ($context["companies"] ?? null)) && is_array($__internal_63f73f0dc37a3f090f2879710955e3129a524d5e1461c1d27648aa08f83349f9) || $__internal_63f73f0dc37a3f090f2879710955e3129a524d5e1461c1d27648aa08f83349f9 instanceof ArrayAccess ? ($__internal_63f73f0dc37a3f090f2879710955e3129a524d5e1461c1d27648aa08f83349f9[($context["company"] ?? null)] ?? null) : null), "hours", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["hours"]) {
            // line 208
            echo "                  <tr>
                  <td>";
            // line 209
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, $context["hours"], "day", array())), "html", null, true);
            echo "</td>
                  <td>";
            // line 210
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["hours"], "start", array()), "H:i"), "html", null, true);
            echo "</td>
                  <td>";
            // line 211
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["hours"], "end", array()), "H:i"), "html", null, true);
            echo "</td>
                  </tr>
                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hours'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 214
        echo "                </table>
              </td>
              <td>
                ";
        // line 217
        if (twig_get_attribute($this->env, $this->source, (($__internal_ee6f5eb48ecbf75fb04eb4b2c7995d0eec850c575001fd8d9630e7a478f36fb7 = ($context["discards"] ?? null)) && is_array($__internal_ee6f5eb48ecbf75fb04eb4b2c7995d0eec850c575001fd8d9630e7a478f36fb7) || $__internal_ee6f5eb48ecbf75fb04eb4b2c7995d0eec850c575001fd8d9630e7a478f36fb7 instanceof ArrayAccess ? ($__internal_ee6f5eb48ecbf75fb04eb4b2c7995d0eec850c575001fd8d9630e7a478f36fb7[($context["location"] ?? null)] ?? null) : null), "hours", array())) {
            // line 218
            echo "                  <form action=\"/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "update", array()), "html", null, true);
            echo "\" method=\"POST\">
                    <input type=\"hidden\" name=\"field\" value=\"regular_hours\">
                    <input type=\"hidden\" name=\"location\" value=\"";
            // line 220
            echo twig_escape_filter($this->env, ($context["location"] ?? null), "html", null, true);
            echo "\">
                    <button type=\"submit\" class=\"btn btn-danger\">Discard</button>
                  </form>
                ";
        }
        // line 224
        echo "              </td>
            </tr>
            <tr>
              <td>Payment Methods</td>
              <td>
                ";
        // line 229
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (($__internal_77af6e16e7409de2d04b8ff1737ff0494a0d4416ab4470927b19e8c18449b0d6 = ($context["locations"] ?? null)) && is_array($__internal_77af6e16e7409de2d04b8ff1737ff0494a0d4416ab4470927b19e8c18449b0d6) || $__internal_77af6e16e7409de2d04b8ff1737ff0494a0d4416ab4470927b19e8c18449b0d6 instanceof ArrayAccess ? ($__internal_77af6e16e7409de2d04b8ff1737ff0494a0d4416ab4470927b19e8c18449b0d6[($context["location"] ?? null)] ?? null) : null), "payment_methods", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
            // line 230
            echo "                  ";
            echo twig_escape_filter($this->env, $context["method"], "html", null, true);
            echo "<br>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 232
        echo "              </td>
              <td>
                ";
        // line 234
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (($__internal_21a7ab6cfaa4777b496f234972e3a437102bfda4972492e3e4ebd25921b49fca = ($context["companies"] ?? null)) && is_array($__internal_21a7ab6cfaa4777b496f234972e3a437102bfda4972492e3e4ebd25921b49fca) || $__internal_21a7ab6cfaa4777b496f234972e3a437102bfda4972492e3e4ebd25921b49fca instanceof ArrayAccess ? ($__internal_21a7ab6cfaa4777b496f234972e3a437102bfda4972492e3e4ebd25921b49fca[($context["company"] ?? null)] ?? null) : null), "payment_methods", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
            // line 235
            echo "                  ";
            echo twig_escape_filter($this->env, $context["method"], "html", null, true);
            echo "<br>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 237
        echo "              </td>
              <td>
                ";
        // line 239
        if (twig_get_attribute($this->env, $this->source, (($__internal_5b22c47bf69a7c58f9441235c68752cfde2c3566ac2df8c7c449610a0de4a42b = ($context["discards"] ?? null)) && is_array($__internal_5b22c47bf69a7c58f9441235c68752cfde2c3566ac2df8c7c449610a0de4a42b) || $__internal_5b22c47bf69a7c58f9441235c68752cfde2c3566ac2df8c7c449610a0de4a42b instanceof ArrayAccess ? ($__internal_5b22c47bf69a7c58f9441235c68752cfde2c3566ac2df8c7c449610a0de4a42b[($context["location"] ?? null)] ?? null) : null), "payment_methods", array())) {
            // line 240
            echo "                  <form action=\"/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "update", array()), "html", null, true);
            echo "\" method=\"POST\">
                    <input type=\"hidden\" name=\"field\" value=\"payment_methods\">
                    <input type=\"hidden\" name=\"location\" value=\"";
            // line 242
            echo twig_escape_filter($this->env, ($context["location"] ?? null), "html", null, true);
            echo "\">
                    <button type=\"submit\" class=\"btn btn-danger\">Discard</button>
                  </form>
                ";
        }
        // line 246
        echo "              </td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th class=\"search\">Field</th>
              <th class=\"search\">Value Before</th>
              <th class=\"search\">Value After</th>
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

    // line 263
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 264
        echo "  <script src=\"/assets/js/sweetalert2.all.min.js\"></script>
  <script src=\"/assets/DataTables/datatables.min.js\"></script>
  <script src=\"/assets/js/admin/locations.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "Admin/gmb/locations/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  589 => 264,  586 => 263,  566 => 246,  559 => 242,  553 => 240,  551 => 239,  547 => 237,  538 => 235,  534 => 234,  530 => 232,  521 => 230,  517 => 229,  510 => 224,  503 => 220,  497 => 218,  495 => 217,  490 => 214,  481 => 211,  477 => 210,  473 => 209,  470 => 208,  466 => 207,  460 => 203,  451 => 200,  447 => 199,  443 => 198,  440 => 197,  436 => 196,  428 => 190,  421 => 186,  415 => 184,  413 => 183,  409 => 181,  400 => 179,  396 => 178,  392 => 176,  383 => 174,  379 => 173,  372 => 168,  365 => 164,  359 => 162,  357 => 161,  352 => 159,  348 => 158,  342 => 154,  335 => 150,  329 => 148,  327 => 147,  322 => 145,  318 => 144,  312 => 140,  305 => 136,  299 => 134,  297 => 133,  292 => 131,  288 => 130,  282 => 126,  275 => 122,  269 => 120,  267 => 119,  262 => 117,  258 => 116,  252 => 112,  245 => 108,  239 => 106,  237 => 105,  232 => 103,  228 => 102,  222 => 98,  215 => 94,  209 => 92,  207 => 91,  202 => 89,  198 => 88,  192 => 84,  185 => 80,  179 => 78,  177 => 77,  172 => 75,  168 => 74,  162 => 70,  155 => 66,  149 => 64,  147 => 63,  142 => 61,  138 => 60,  132 => 56,  125 => 52,  119 => 50,  117 => 49,  112 => 47,  108 => 46,  84 => 24,  72 => 22,  67 => 21,  63 => 20,  50 => 9,  48 => 8,  45 => 7,  43 => 6,  40 => 5,  34 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Admin/gmb/locations/index.twig", "/home/dealerportal/public_html/app/Views/Admin/gmb/locations/index.twig");
    }
}
