<?php

/* Dealers/dashboard/dealer.twig */
class __TwigTemplate_58b9e88710c500b866a1c7912537fe80d18f2f751ef9a4a7d9ac96bf02291edf extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/layouts/dashboard.twig", "Dealers/dashboard/dealer.twig", 1);
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
        echo "Place1SEO Portal Summary";
    }

    // line 3
    public function block_sidebar($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        $this->loadTemplate("Dealers/partials/sidebar/dealer.twig", "Dealers/dashboard/dealer.twig", 4)->display($context);
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "  <h1 class=\"text-center\">Place1SEO Portal Summary</h1>
  <div class=\"row\">
    <div class=\"col-12 text-center\">
      <div class=\"btn-group\">
        <button type=\"button\" class=\"btn btn-large btn-outline-primary dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" id=\"dashboard-period-button\">
          ";
        // line 12
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_last($this->env, ($context["periods"] ?? null)), "start", array()), "F j, Y"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_last($this->env, ($context["periods"] ?? null)), "end", array()), "F j, Y"), "html", null, true);
        echo "
        </button>
        <div class=\"dropdown-menu\" id=\"dashboard-period-dropdown\">
          ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, ($context["periods"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["period"]) {
            // line 16
            echo "            <a class=\"dropdown-item\" href=\"javascript:void(0);\"
              data-period_start=\"";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["period"], "start", array()), "html", null, true);
            echo "\">
              ";
            // line 18
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["period"], "start", array()), "F j, Y"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["period"], "end", array()), "F j, Y"), "html", null, true);
            echo "
            </a>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['period'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "        </div>
      </div>
    </div>
  </div>
  ";
        // line 25
        $context["current"] = (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_array_keys_filter(($context["periods"] ?? null))) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[(twig_length_filter($this->env, ($context["periods"] ?? null)) - 1)] ?? null) : null);
        // line 26
        echo "  ";
        $context["previous"] = (((twig_length_filter($this->env, twig_get_array_keys_filter(($context["periods"] ?? null))) > 1)) ? ((($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = twig_get_array_keys_filter(($context["periods"] ?? null))) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[(twig_length_filter($this->env, ($context["periods"] ?? null)) - 2)] ?? null) : null)) : ( -1));
        // line 27
        echo "  <div class=\"row\">
    <!-- Google My Business -->
    <div class=\"col-sm-6 box\" data-link=\"";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["links"] ?? null), "gmb", array()), "html", null, true);
        echo "\">
      <div class=\"mt-3 mb-3 ml-1 mr-1 p-3 ";
        // line 30
        if (twig_get_attribute($this->env, $this->source, ($context["subscribed"] ?? null), "gmb", array())) {
            echo "bg-lightblue";
        } else {
            echo "bg-lightgrey";
        }
        echo " text-center\">
        <h3>Google My Business</h3>
        ";
        // line 32
        if (twig_get_attribute($this->env, $this->source, ($context["subscribed"] ?? null), "gmb", array())) {
            // line 33
            echo "          <h5 class=\"text-muted\">Calls and Directions</h5>
          <h1 id=\"gmb-count\">";
            // line 34
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "gmb", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = ($context["periods"] ?? null)) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[($context["current"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "calls_directions", array(), "any", true, true)) ? (twig_get_attribute($this->env, $this->source, (($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = twig_get_attribute($this->env, $this->source,             // line 35
($context["summary"] ?? null), "gmb", array())) && is_array($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9) || $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 instanceof ArrayAccess ? ($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9[twig_get_attribute($this->env, $this->source, (($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = ($context["periods"] ?? null)) && is_array($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217) || $__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 instanceof ArrayAccess ? ($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "calls_directions", array())) : (0)), "html", null, true);
            echo "</h1>
          ";
            // line 36
            if (( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "gmb", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 = ($context["periods"] ?? null)) && is_array($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105) || $__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 instanceof ArrayAccess ? ($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105[($context["current"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "calls_directions", array(), "any", true, true) ||  !twig_get_attribute($this->env, $this->source, (($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 = twig_get_attribute($this->env, $this->source,             // line 37
($context["summary"] ?? null), "gmb", array())) && is_array($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779) || $__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 instanceof ArrayAccess ? ($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779[twig_get_attribute($this->env, $this->source, (($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 = ($context["periods"] ?? null)) && is_array($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1) || $__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 instanceof ArrayAccess ? ($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "calls_directions", array()))) {
                // line 38
                echo "            ";
                $context["percent"] =  -100;
                // line 39
                echo "          ";
            }
            // line 40
            echo "          ";
            if ((( !twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true) ||  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 41
($context["summary"] ?? null), "gmb", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 = ($context["periods"] ?? null)) && is_array($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0) || $__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 instanceof ArrayAccess ? ($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0[($context["previous"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "calls_directions", array(), "any", true, true)) ||  !twig_get_attribute($this->env, $this->source, (($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 = twig_get_attribute($this->env, $this->source,             // line 42
($context["summary"] ?? null), "gmb", array())) && is_array($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866) || $__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 instanceof ArrayAccess ? ($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866[twig_get_attribute($this->env, $this->source, (($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f = ($context["periods"] ?? null)) && is_array($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f) || $__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f instanceof ArrayAccess ? ($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "calls_directions", array()))) {
                // line 43
                echo "            ";
                $context["percent"] = 0;
                // line 44
                echo "          ";
            }
            // line 45
            echo "          ";
            if ((((((twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["current"] ?? null), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 46
($context["summary"] ?? null), "gmb", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7 = ($context["periods"] ?? null)) && is_array($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7) || $__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7 instanceof ArrayAccess ? ($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7[($context["current"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "calls_directions", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, (($__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289 = twig_get_attribute($this->env, $this->source,             // line 47
($context["summary"] ?? null), "gmb", array())) && is_array($__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289) || $__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289 instanceof ArrayAccess ? ($__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289[twig_get_attribute($this->env, $this->source, (($__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18 = ($context["periods"] ?? null)) && is_array($__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18) || $__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18 instanceof ArrayAccess ? ($__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "calls_directions", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 48
($context["summary"] ?? null), "gmb", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018 = ($context["periods"] ?? null)) && is_array($__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018) || $__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018 instanceof ArrayAccess ? ($__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018[($context["previous"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "calls_directions", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, (($__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413 = twig_get_attribute($this->env, $this->source,             // line 49
($context["summary"] ?? null), "gmb", array())) && is_array($__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413) || $__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413 instanceof ArrayAccess ? ($__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413[twig_get_attribute($this->env, $this->source, (($__internal_a5ce050c56e2fa0d875fbc5d7e5a277df72ffc991bd0164f3c078803c5d7b4e7 = ($context["periods"] ?? null)) && is_array($__internal_a5ce050c56e2fa0d875fbc5d7e5a277df72ffc991bd0164f3c078803c5d7b4e7) || $__internal_a5ce050c56e2fa0d875fbc5d7e5a277df72ffc991bd0164f3c078803c5d7b4e7 instanceof ArrayAccess ? ($__internal_a5ce050c56e2fa0d875fbc5d7e5a277df72ffc991bd0164f3c078803c5d7b4e7[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "calls_directions", array()))) {
                // line 50
                echo "            ";
                $context["percent"] = (((twig_get_attribute($this->env, $this->source, (($__internal_c3328b7afe486068cdbdc8d1c3c828eef7c877ecbd31cfd5c6604f285bf56a4c = twig_get_attribute($this->env, $this->source,                 // line 51
($context["summary"] ?? null), "gmb", array())) && is_array($__internal_c3328b7afe486068cdbdc8d1c3c828eef7c877ecbd31cfd5c6604f285bf56a4c) || $__internal_c3328b7afe486068cdbdc8d1c3c828eef7c877ecbd31cfd5c6604f285bf56a4c instanceof ArrayAccess ? ($__internal_c3328b7afe486068cdbdc8d1c3c828eef7c877ecbd31cfd5c6604f285bf56a4c[twig_get_attribute($this->env, $this->source, (($__internal_98440f958a27a294f74051b56287200cf8d4ccac3368b6ba585b36549e500d40 = ($context["periods"] ?? null)) && is_array($__internal_98440f958a27a294f74051b56287200cf8d4ccac3368b6ba585b36549e500d40) || $__internal_98440f958a27a294f74051b56287200cf8d4ccac3368b6ba585b36549e500d40 instanceof ArrayAccess ? ($__internal_98440f958a27a294f74051b56287200cf8d4ccac3368b6ba585b36549e500d40[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "calls_directions", array()) / twig_get_attribute($this->env, $this->source, (($__internal_1b6627cccbecc270d890e9c3dd7f6b41e277f9eef79718257925048c26dc6d79 = twig_get_attribute($this->env, $this->source,                 // line 52
($context["summary"] ?? null), "gmb", array())) && is_array($__internal_1b6627cccbecc270d890e9c3dd7f6b41e277f9eef79718257925048c26dc6d79) || $__internal_1b6627cccbecc270d890e9c3dd7f6b41e277f9eef79718257925048c26dc6d79 instanceof ArrayAccess ? ($__internal_1b6627cccbecc270d890e9c3dd7f6b41e277f9eef79718257925048c26dc6d79[twig_get_attribute($this->env, $this->source, (($__internal_7dc3a0a28f55c5f2463e9b46ecafdfeb61e9238ed4d60acf6f7258d1de3c83e1 = ($context["periods"] ?? null)) && is_array($__internal_7dc3a0a28f55c5f2463e9b46ecafdfeb61e9238ed4d60acf6f7258d1de3c83e1) || $__internal_7dc3a0a28f55c5f2463e9b46ecafdfeb61e9238ed4d60acf6f7258d1de3c83e1 instanceof ArrayAccess ? ($__internal_7dc3a0a28f55c5f2463e9b46ecafdfeb61e9238ed4d60acf6f7258d1de3c83e1[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "calls_directions", array())) * 100) - 100);
                // line 54
                echo "          ";
            }
            // line 55
            echo "            <h6 id=\"gmb-percent\" class=\"";
            echo (((($context["percent"] ?? null) > 0)) ? ("text-success") : ((((($context["percent"] ?? null) == 0)) ? ("text-warning") : ("text-danger"))));
            echo "\">
              <i class=\"fa ";
            // line 56
            echo (((($context["percent"] ?? null) > 0)) ? ("fa-arrow-up") : ((((($context["percent"] ?? null) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
            echo "\"></i><span>&nbsp;";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["percent"] ?? null), 1), "html", null, true);
            echo "%</span>
            </h6>
        ";
        } else {
            // line 59
            echo "          <img src=\"/assets/images/padlock.png\" height=\"115\">
        ";
        }
        // line 61
        echo "      </div>
    </div>
    <!-- Social Media -->
    <div class=\"col-sm-6 box\" data-link=\"";
        // line 64
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["links"] ?? null), "social_media", array()), "html", null, true);
        echo "\">
      <div class=\"mt-3 mb-3 ml-1 mr-1 p-3 ";
        // line 65
        if (twig_get_attribute($this->env, $this->source, ($context["subscribed"] ?? null), "social_media", array())) {
            echo "bg-lightblue";
        } else {
            echo "bg-lightgrey";
        }
        echo " text-center\">
        <h3>Social Media</h3>
        ";
        // line 67
        if (twig_get_attribute($this->env, $this->source, ($context["subscribed"] ?? null), "social_media", array())) {
            // line 68
            echo "          <h5 class=\"text-muted\">Engagements</h5>
          <h1 id=\"social-media-count\">";
            // line 69
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "social_media", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_8acbbad4b27a786cad00cba65bc04ee7a503f81018370f2b790d4fe79cfeb21d = ($context["periods"] ?? null)) && is_array($__internal_8acbbad4b27a786cad00cba65bc04ee7a503f81018370f2b790d4fe79cfeb21d) || $__internal_8acbbad4b27a786cad00cba65bc04ee7a503f81018370f2b790d4fe79cfeb21d instanceof ArrayAccess ? ($__internal_8acbbad4b27a786cad00cba65bc04ee7a503f81018370f2b790d4fe79cfeb21d[($context["current"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "engagements", array(), "any", true, true)) ? (twig_get_attribute($this->env, $this->source, (($__internal_fbfc01bf158172b44fe031b3ae2f71c474964929dfcc389cc81ef3f55fcb06f0 = twig_get_attribute($this->env, $this->source,             // line 70
($context["summary"] ?? null), "social_media", array())) && is_array($__internal_fbfc01bf158172b44fe031b3ae2f71c474964929dfcc389cc81ef3f55fcb06f0) || $__internal_fbfc01bf158172b44fe031b3ae2f71c474964929dfcc389cc81ef3f55fcb06f0 instanceof ArrayAccess ? ($__internal_fbfc01bf158172b44fe031b3ae2f71c474964929dfcc389cc81ef3f55fcb06f0[twig_get_attribute($this->env, $this->source, (($__internal_c2705d9276f5639c7ab516a5efff892123f6b2bdcf92245c8c3e7a8e7b8e0b4c = ($context["periods"] ?? null)) && is_array($__internal_c2705d9276f5639c7ab516a5efff892123f6b2bdcf92245c8c3e7a8e7b8e0b4c) || $__internal_c2705d9276f5639c7ab516a5efff892123f6b2bdcf92245c8c3e7a8e7b8e0b4c instanceof ArrayAccess ? ($__internal_c2705d9276f5639c7ab516a5efff892123f6b2bdcf92245c8c3e7a8e7b8e0b4c[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "engagements", array())) : (0)), "html", null, true);
            echo "</h1>
          ";
            // line 71
            if (( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "social_media", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_4450f16bcd6eee436ec803be9cb8dd13e40acb5f3c668ce291f0476abc1a5b69 = ($context["periods"] ?? null)) && is_array($__internal_4450f16bcd6eee436ec803be9cb8dd13e40acb5f3c668ce291f0476abc1a5b69) || $__internal_4450f16bcd6eee436ec803be9cb8dd13e40acb5f3c668ce291f0476abc1a5b69 instanceof ArrayAccess ? ($__internal_4450f16bcd6eee436ec803be9cb8dd13e40acb5f3c668ce291f0476abc1a5b69[($context["current"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "engagements", array(), "any", true, true) ||  !twig_get_attribute($this->env, $this->source, (($__internal_92ed32b8cbedc9f8b5b379c1ef395076f852e6115f19026df86a46e64a8be849 = twig_get_attribute($this->env, $this->source,             // line 72
($context["summary"] ?? null), "social_media", array())) && is_array($__internal_92ed32b8cbedc9f8b5b379c1ef395076f852e6115f19026df86a46e64a8be849) || $__internal_92ed32b8cbedc9f8b5b379c1ef395076f852e6115f19026df86a46e64a8be849 instanceof ArrayAccess ? ($__internal_92ed32b8cbedc9f8b5b379c1ef395076f852e6115f19026df86a46e64a8be849[twig_get_attribute($this->env, $this->source, (($__internal_ea7a33ac6d8a26ad47921e376e6221ddcc8585c46ced0d814217a4f86de9974e = ($context["periods"] ?? null)) && is_array($__internal_ea7a33ac6d8a26ad47921e376e6221ddcc8585c46ced0d814217a4f86de9974e) || $__internal_ea7a33ac6d8a26ad47921e376e6221ddcc8585c46ced0d814217a4f86de9974e instanceof ArrayAccess ? ($__internal_ea7a33ac6d8a26ad47921e376e6221ddcc8585c46ced0d814217a4f86de9974e[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "engagements", array()))) {
                // line 73
                echo "            ";
                $context["percent"] =  -100;
                // line 74
                echo "          ";
            }
            // line 75
            echo "          ";
            if ((( !twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true) ||  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 76
($context["summary"] ?? null), "social_media", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_9522a6cebeae41b694ef7a2cdef578aec938dae7d5acf43b2efd8c4c9bc5dabe = ($context["periods"] ?? null)) && is_array($__internal_9522a6cebeae41b694ef7a2cdef578aec938dae7d5acf43b2efd8c4c9bc5dabe) || $__internal_9522a6cebeae41b694ef7a2cdef578aec938dae7d5acf43b2efd8c4c9bc5dabe instanceof ArrayAccess ? ($__internal_9522a6cebeae41b694ef7a2cdef578aec938dae7d5acf43b2efd8c4c9bc5dabe[($context["previous"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "engagements", array(), "any", true, true)) ||  !twig_get_attribute($this->env, $this->source, (($__internal_9e736303ccc6dbec54334717fdf66a3c6c7a4ed563e8a9c6a92ccdbb773e19bf = twig_get_attribute($this->env, $this->source,             // line 77
($context["summary"] ?? null), "social_media", array())) && is_array($__internal_9e736303ccc6dbec54334717fdf66a3c6c7a4ed563e8a9c6a92ccdbb773e19bf) || $__internal_9e736303ccc6dbec54334717fdf66a3c6c7a4ed563e8a9c6a92ccdbb773e19bf instanceof ArrayAccess ? ($__internal_9e736303ccc6dbec54334717fdf66a3c6c7a4ed563e8a9c6a92ccdbb773e19bf[twig_get_attribute($this->env, $this->source, (($__internal_8acdbb41833471eddc4b3c5a5c648038762a0ba2347958dbb7f312bec87c3d40 = ($context["periods"] ?? null)) && is_array($__internal_8acdbb41833471eddc4b3c5a5c648038762a0ba2347958dbb7f312bec87c3d40) || $__internal_8acdbb41833471eddc4b3c5a5c648038762a0ba2347958dbb7f312bec87c3d40 instanceof ArrayAccess ? ($__internal_8acdbb41833471eddc4b3c5a5c648038762a0ba2347958dbb7f312bec87c3d40[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "engagements", array()))) {
                // line 78
                echo "            ";
                $context["percent"] = 0;
                // line 79
                echo "          ";
            }
            // line 80
            echo "          ";
            if ((((((twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["current"] ?? null), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 81
($context["summary"] ?? null), "social_media", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_0668ed57f15eabeed8d9c4a45059ac93dfae05f7fa406a2dc49ae0ccb4f55bad = ($context["periods"] ?? null)) && is_array($__internal_0668ed57f15eabeed8d9c4a45059ac93dfae05f7fa406a2dc49ae0ccb4f55bad) || $__internal_0668ed57f15eabeed8d9c4a45059ac93dfae05f7fa406a2dc49ae0ccb4f55bad instanceof ArrayAccess ? ($__internal_0668ed57f15eabeed8d9c4a45059ac93dfae05f7fa406a2dc49ae0ccb4f55bad[($context["current"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "engagements", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, (($__internal_e13139c4be4e2ff1c777544a2594638fcc3ca4c2221fe00c2149da0ddd1cc323 = twig_get_attribute($this->env, $this->source,             // line 82
($context["summary"] ?? null), "social_media", array())) && is_array($__internal_e13139c4be4e2ff1c777544a2594638fcc3ca4c2221fe00c2149da0ddd1cc323) || $__internal_e13139c4be4e2ff1c777544a2594638fcc3ca4c2221fe00c2149da0ddd1cc323 instanceof ArrayAccess ? ($__internal_e13139c4be4e2ff1c777544a2594638fcc3ca4c2221fe00c2149da0ddd1cc323[twig_get_attribute($this->env, $this->source, (($__internal_abb62d7ada56c0cfc1a0dee78771b583349487dffc67903f3895606a65c3577c = ($context["periods"] ?? null)) && is_array($__internal_abb62d7ada56c0cfc1a0dee78771b583349487dffc67903f3895606a65c3577c) || $__internal_abb62d7ada56c0cfc1a0dee78771b583349487dffc67903f3895606a65c3577c instanceof ArrayAccess ? ($__internal_abb62d7ada56c0cfc1a0dee78771b583349487dffc67903f3895606a65c3577c[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "engagements", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 83
($context["summary"] ?? null), "social_media", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_c0905adf98cd1533a675c4106b3846093815c41a83169ae22d4b915e0fcb70c3 = ($context["periods"] ?? null)) && is_array($__internal_c0905adf98cd1533a675c4106b3846093815c41a83169ae22d4b915e0fcb70c3) || $__internal_c0905adf98cd1533a675c4106b3846093815c41a83169ae22d4b915e0fcb70c3 instanceof ArrayAccess ? ($__internal_c0905adf98cd1533a675c4106b3846093815c41a83169ae22d4b915e0fcb70c3[($context["previous"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "engagements", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, (($__internal_ec4b59f7be5e729f308b6e48c4483f79749dedb9a482762b64ba149aecfac14b = twig_get_attribute($this->env, $this->source,             // line 84
($context["summary"] ?? null), "social_media", array())) && is_array($__internal_ec4b59f7be5e729f308b6e48c4483f79749dedb9a482762b64ba149aecfac14b) || $__internal_ec4b59f7be5e729f308b6e48c4483f79749dedb9a482762b64ba149aecfac14b instanceof ArrayAccess ? ($__internal_ec4b59f7be5e729f308b6e48c4483f79749dedb9a482762b64ba149aecfac14b[twig_get_attribute($this->env, $this->source, (($__internal_4abb1b337c0ef25ef376bdea173e8ce13160d926e1bcb921fd263a0c3744dc8f = ($context["periods"] ?? null)) && is_array($__internal_4abb1b337c0ef25ef376bdea173e8ce13160d926e1bcb921fd263a0c3744dc8f) || $__internal_4abb1b337c0ef25ef376bdea173e8ce13160d926e1bcb921fd263a0c3744dc8f instanceof ArrayAccess ? ($__internal_4abb1b337c0ef25ef376bdea173e8ce13160d926e1bcb921fd263a0c3744dc8f[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "engagements", array()))) {
                // line 85
                echo "            ";
                $context["percent"] = (((twig_get_attribute($this->env, $this->source, (($__internal_1f87e440d7b5ac0d3821fd704a87cfd009d5f0cfaa151c63b53e5d2f3e117b47 = twig_get_attribute($this->env, $this->source,                 // line 86
($context["summary"] ?? null), "social_media", array())) && is_array($__internal_1f87e440d7b5ac0d3821fd704a87cfd009d5f0cfaa151c63b53e5d2f3e117b47) || $__internal_1f87e440d7b5ac0d3821fd704a87cfd009d5f0cfaa151c63b53e5d2f3e117b47 instanceof ArrayAccess ? ($__internal_1f87e440d7b5ac0d3821fd704a87cfd009d5f0cfaa151c63b53e5d2f3e117b47[twig_get_attribute($this->env, $this->source, (($__internal_5f0601c6aca043f0871c692399d8a4b50f756908e693f6dc8217a09ebec49d63 = ($context["periods"] ?? null)) && is_array($__internal_5f0601c6aca043f0871c692399d8a4b50f756908e693f6dc8217a09ebec49d63) || $__internal_5f0601c6aca043f0871c692399d8a4b50f756908e693f6dc8217a09ebec49d63 instanceof ArrayAccess ? ($__internal_5f0601c6aca043f0871c692399d8a4b50f756908e693f6dc8217a09ebec49d63[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "engagements", array()) / twig_get_attribute($this->env, $this->source, (($__internal_2ca27bbf98b4159f4f59a7748003a9c780384782aa02798832bfdb1e4413f68c = twig_get_attribute($this->env, $this->source,                 // line 87
($context["summary"] ?? null), "social_media", array())) && is_array($__internal_2ca27bbf98b4159f4f59a7748003a9c780384782aa02798832bfdb1e4413f68c) || $__internal_2ca27bbf98b4159f4f59a7748003a9c780384782aa02798832bfdb1e4413f68c instanceof ArrayAccess ? ($__internal_2ca27bbf98b4159f4f59a7748003a9c780384782aa02798832bfdb1e4413f68c[twig_get_attribute($this->env, $this->source, (($__internal_76fb338ba58f80d23455c79f0abb5764e150448d58ab4aec9c47558465bff0b8 = ($context["periods"] ?? null)) && is_array($__internal_76fb338ba58f80d23455c79f0abb5764e150448d58ab4aec9c47558465bff0b8) || $__internal_76fb338ba58f80d23455c79f0abb5764e150448d58ab4aec9c47558465bff0b8 instanceof ArrayAccess ? ($__internal_76fb338ba58f80d23455c79f0abb5764e150448d58ab4aec9c47558465bff0b8[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "engagements", array())) * 100) - 100);
                // line 89
                echo "          ";
            }
            // line 90
            echo "            <h6 id=\"social_media-percent\" class=\"";
            echo (((($context["percent"] ?? null) > 0)) ? ("text-success") : ((((($context["percent"] ?? null) == 0)) ? ("text-warning") : ("text-danger"))));
            echo "\">
              <i class=\"fa ";
            // line 91
            echo (((($context["percent"] ?? null) > 0)) ? ("fa-arrow-up") : ((((($context["percent"] ?? null) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
            echo "\"></i><span>&nbsp;";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["percent"] ?? null), 1), "html", null, true);
            echo "%</span>
            </h6>
          ";
        } else {
            // line 94
            echo "            <img src=\"/assets/images/padlock.png\" height=\"115\">
          ";
        }
        // line 96
        echo "      </div>
    </div>
  </div>
  <div class=\"row\">
    <!-- Pay Per Click -->
    <div class=\"col-sm-6 box\" data-link=\"";
        // line 101
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["links"] ?? null), "ppc", array()), "html", null, true);
        echo "\">
      <div class=\"mt-3 mb-3 ml-1 mr-1 p-3 ";
        // line 102
        if (twig_get_attribute($this->env, $this->source, ($context["subscribed"] ?? null), "local_google_ads", array())) {
            echo "bg-lightblue";
        } else {
            echo "bg-lightgrey";
        }
        echo " text-center\">
        <h3>Pay Per Click</h3>
        ";
        // line 104
        if (twig_get_attribute($this->env, $this->source, ($context["subscribed"] ?? null), "local_google_ads", array())) {
            // line 105
            echo "          <h5 class=\"text-muted\">Conversions</h5>
          <h1 id=\"ppc-count\">";
            // line 106
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "ppc", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_63f73f0dc37a3f090f2879710955e3129a524d5e1461c1d27648aa08f83349f9 = ($context["periods"] ?? null)) && is_array($__internal_63f73f0dc37a3f090f2879710955e3129a524d5e1461c1d27648aa08f83349f9) || $__internal_63f73f0dc37a3f090f2879710955e3129a524d5e1461c1d27648aa08f83349f9 instanceof ArrayAccess ? ($__internal_63f73f0dc37a3f090f2879710955e3129a524d5e1461c1d27648aa08f83349f9[($context["current"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "conversions", array(), "any", true, true)) ? (twig_get_attribute($this->env, $this->source, (($__internal_ee6f5eb48ecbf75fb04eb4b2c7995d0eec850c575001fd8d9630e7a478f36fb7 = twig_get_attribute($this->env, $this->source,             // line 107
($context["summary"] ?? null), "ppc", array())) && is_array($__internal_ee6f5eb48ecbf75fb04eb4b2c7995d0eec850c575001fd8d9630e7a478f36fb7) || $__internal_ee6f5eb48ecbf75fb04eb4b2c7995d0eec850c575001fd8d9630e7a478f36fb7 instanceof ArrayAccess ? ($__internal_ee6f5eb48ecbf75fb04eb4b2c7995d0eec850c575001fd8d9630e7a478f36fb7[twig_get_attribute($this->env, $this->source, (($__internal_77af6e16e7409de2d04b8ff1737ff0494a0d4416ab4470927b19e8c18449b0d6 = ($context["periods"] ?? null)) && is_array($__internal_77af6e16e7409de2d04b8ff1737ff0494a0d4416ab4470927b19e8c18449b0d6) || $__internal_77af6e16e7409de2d04b8ff1737ff0494a0d4416ab4470927b19e8c18449b0d6 instanceof ArrayAccess ? ($__internal_77af6e16e7409de2d04b8ff1737ff0494a0d4416ab4470927b19e8c18449b0d6[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "conversions", array())) : (0)), "html", null, true);
            echo "</h1>
          ";
            // line 108
            if (( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "ppc", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_21a7ab6cfaa4777b496f234972e3a437102bfda4972492e3e4ebd25921b49fca = ($context["periods"] ?? null)) && is_array($__internal_21a7ab6cfaa4777b496f234972e3a437102bfda4972492e3e4ebd25921b49fca) || $__internal_21a7ab6cfaa4777b496f234972e3a437102bfda4972492e3e4ebd25921b49fca instanceof ArrayAccess ? ($__internal_21a7ab6cfaa4777b496f234972e3a437102bfda4972492e3e4ebd25921b49fca[($context["current"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "conversions", array(), "any", true, true) ||  !twig_get_attribute($this->env, $this->source, (($__internal_5b22c47bf69a7c58f9441235c68752cfde2c3566ac2df8c7c449610a0de4a42b = twig_get_attribute($this->env, $this->source,             // line 109
($context["summary"] ?? null), "ppc", array())) && is_array($__internal_5b22c47bf69a7c58f9441235c68752cfde2c3566ac2df8c7c449610a0de4a42b) || $__internal_5b22c47bf69a7c58f9441235c68752cfde2c3566ac2df8c7c449610a0de4a42b instanceof ArrayAccess ? ($__internal_5b22c47bf69a7c58f9441235c68752cfde2c3566ac2df8c7c449610a0de4a42b[twig_get_attribute($this->env, $this->source, (($__internal_07434facb388bc291c6ac048cf590692daf8842ec4451c9383f47ec378036642 = ($context["periods"] ?? null)) && is_array($__internal_07434facb388bc291c6ac048cf590692daf8842ec4451c9383f47ec378036642) || $__internal_07434facb388bc291c6ac048cf590692daf8842ec4451c9383f47ec378036642 instanceof ArrayAccess ? ($__internal_07434facb388bc291c6ac048cf590692daf8842ec4451c9383f47ec378036642[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "conversions", array()))) {
                // line 110
                echo "            ";
                $context["percent"] =  -100;
                // line 111
                echo "          ";
            }
            // line 112
            echo "          ";
            if ((( !twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true) ||  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 113
($context["summary"] ?? null), "ppc", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_2c9253d871b0d69e25a57011dd780abf88e92dcba4b36f70af4717cd81e15333 = ($context["periods"] ?? null)) && is_array($__internal_2c9253d871b0d69e25a57011dd780abf88e92dcba4b36f70af4717cd81e15333) || $__internal_2c9253d871b0d69e25a57011dd780abf88e92dcba4b36f70af4717cd81e15333 instanceof ArrayAccess ? ($__internal_2c9253d871b0d69e25a57011dd780abf88e92dcba4b36f70af4717cd81e15333[($context["previous"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "conversions", array(), "any", true, true)) ||  !twig_get_attribute($this->env, $this->source, (($__internal_061dccfb25fdf2e8c86df832785bce8036d6b7154e5456c6bad32ae413349923 = twig_get_attribute($this->env, $this->source,             // line 114
($context["summary"] ?? null), "ppc", array())) && is_array($__internal_061dccfb25fdf2e8c86df832785bce8036d6b7154e5456c6bad32ae413349923) || $__internal_061dccfb25fdf2e8c86df832785bce8036d6b7154e5456c6bad32ae413349923 instanceof ArrayAccess ? ($__internal_061dccfb25fdf2e8c86df832785bce8036d6b7154e5456c6bad32ae413349923[twig_get_attribute($this->env, $this->source, (($__internal_0afc03374acd15e85d1311fdbd190736569aaa1f2e1936730ea3993f463bdd9e = ($context["periods"] ?? null)) && is_array($__internal_0afc03374acd15e85d1311fdbd190736569aaa1f2e1936730ea3993f463bdd9e) || $__internal_0afc03374acd15e85d1311fdbd190736569aaa1f2e1936730ea3993f463bdd9e instanceof ArrayAccess ? ($__internal_0afc03374acd15e85d1311fdbd190736569aaa1f2e1936730ea3993f463bdd9e[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "conversions", array()))) {
                // line 115
                echo "            ";
                $context["percent"] = 0;
                // line 116
                echo "          ";
            }
            // line 117
            echo "          ";
            if ((((((twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["current"] ?? null), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 118
($context["summary"] ?? null), "ppc", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_e63c8ce4e34b45529c9c2166e26c2c8fbc432f7a854c225f59f58e296df9b646 = ($context["periods"] ?? null)) && is_array($__internal_e63c8ce4e34b45529c9c2166e26c2c8fbc432f7a854c225f59f58e296df9b646) || $__internal_e63c8ce4e34b45529c9c2166e26c2c8fbc432f7a854c225f59f58e296df9b646 instanceof ArrayAccess ? ($__internal_e63c8ce4e34b45529c9c2166e26c2c8fbc432f7a854c225f59f58e296df9b646[($context["current"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "conversions", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, (($__internal_2ece1c3e1f50bca9244dd4c555dec7da811cc2cf5534f2c877fb41db9cf7c2f3 = twig_get_attribute($this->env, $this->source,             // line 119
($context["summary"] ?? null), "ppc", array())) && is_array($__internal_2ece1c3e1f50bca9244dd4c555dec7da811cc2cf5534f2c877fb41db9cf7c2f3) || $__internal_2ece1c3e1f50bca9244dd4c555dec7da811cc2cf5534f2c877fb41db9cf7c2f3 instanceof ArrayAccess ? ($__internal_2ece1c3e1f50bca9244dd4c555dec7da811cc2cf5534f2c877fb41db9cf7c2f3[twig_get_attribute($this->env, $this->source, (($__internal_2a85c9614fea73f24b66b1cb5423773b4b3db33a1d88c103663819b36ebdb427 = ($context["periods"] ?? null)) && is_array($__internal_2a85c9614fea73f24b66b1cb5423773b4b3db33a1d88c103663819b36ebdb427) || $__internal_2a85c9614fea73f24b66b1cb5423773b4b3db33a1d88c103663819b36ebdb427 instanceof ArrayAccess ? ($__internal_2a85c9614fea73f24b66b1cb5423773b4b3db33a1d88c103663819b36ebdb427[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "conversions", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 120
($context["summary"] ?? null), "ppc", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_6b8cb62d8575f82b44644a8959c5aad7457537f62b3f95fc5564d4571b201f1f = ($context["periods"] ?? null)) && is_array($__internal_6b8cb62d8575f82b44644a8959c5aad7457537f62b3f95fc5564d4571b201f1f) || $__internal_6b8cb62d8575f82b44644a8959c5aad7457537f62b3f95fc5564d4571b201f1f instanceof ArrayAccess ? ($__internal_6b8cb62d8575f82b44644a8959c5aad7457537f62b3f95fc5564d4571b201f1f[($context["previous"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "conversions", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, (($__internal_21e652934f7cae41b4b91555f7968af6aaced7c293174aa09edcf77c2b65ce79 = twig_get_attribute($this->env, $this->source,             // line 121
($context["summary"] ?? null), "ppc", array())) && is_array($__internal_21e652934f7cae41b4b91555f7968af6aaced7c293174aa09edcf77c2b65ce79) || $__internal_21e652934f7cae41b4b91555f7968af6aaced7c293174aa09edcf77c2b65ce79 instanceof ArrayAccess ? ($__internal_21e652934f7cae41b4b91555f7968af6aaced7c293174aa09edcf77c2b65ce79[twig_get_attribute($this->env, $this->source, (($__internal_38786113ede825133e0c0c459886851df8e13425ff8ed8deba84858f5bfcee48 = ($context["periods"] ?? null)) && is_array($__internal_38786113ede825133e0c0c459886851df8e13425ff8ed8deba84858f5bfcee48) || $__internal_38786113ede825133e0c0c459886851df8e13425ff8ed8deba84858f5bfcee48 instanceof ArrayAccess ? ($__internal_38786113ede825133e0c0c459886851df8e13425ff8ed8deba84858f5bfcee48[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "conversions", array()))) {
                // line 122
                echo "            ";
                $context["percent"] = (((twig_get_attribute($this->env, $this->source, (($__internal_b300990ac10db04573b0d13f9c4f5d0839a2051e80d4665727ee9f108a42e497 = twig_get_attribute($this->env, $this->source,                 // line 123
($context["summary"] ?? null), "ppc", array())) && is_array($__internal_b300990ac10db04573b0d13f9c4f5d0839a2051e80d4665727ee9f108a42e497) || $__internal_b300990ac10db04573b0d13f9c4f5d0839a2051e80d4665727ee9f108a42e497 instanceof ArrayAccess ? ($__internal_b300990ac10db04573b0d13f9c4f5d0839a2051e80d4665727ee9f108a42e497[twig_get_attribute($this->env, $this->source, (($__internal_4790ce43a59a024be760c8754d57cb4d0dee400b0bd854e4fc1ea0c99930e776 = ($context["periods"] ?? null)) && is_array($__internal_4790ce43a59a024be760c8754d57cb4d0dee400b0bd854e4fc1ea0c99930e776) || $__internal_4790ce43a59a024be760c8754d57cb4d0dee400b0bd854e4fc1ea0c99930e776 instanceof ArrayAccess ? ($__internal_4790ce43a59a024be760c8754d57cb4d0dee400b0bd854e4fc1ea0c99930e776[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "conversions", array()) / twig_get_attribute($this->env, $this->source, (($__internal_76f1e304d8fe1536a815be93e2e7330863cec351a71136eed8be1a3f6c4c82ee = twig_get_attribute($this->env, $this->source,                 // line 124
($context["summary"] ?? null), "ppc", array())) && is_array($__internal_76f1e304d8fe1536a815be93e2e7330863cec351a71136eed8be1a3f6c4c82ee) || $__internal_76f1e304d8fe1536a815be93e2e7330863cec351a71136eed8be1a3f6c4c82ee instanceof ArrayAccess ? ($__internal_76f1e304d8fe1536a815be93e2e7330863cec351a71136eed8be1a3f6c4c82ee[twig_get_attribute($this->env, $this->source, (($__internal_9b2395a0e04441d25c8e8002301fdff3c7a807a997fb50080df6d8f1ec427096 = ($context["periods"] ?? null)) && is_array($__internal_9b2395a0e04441d25c8e8002301fdff3c7a807a997fb50080df6d8f1ec427096) || $__internal_9b2395a0e04441d25c8e8002301fdff3c7a807a997fb50080df6d8f1ec427096 instanceof ArrayAccess ? ($__internal_9b2395a0e04441d25c8e8002301fdff3c7a807a997fb50080df6d8f1ec427096[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "conversions", array())) * 100) - 100);
                // line 126
                echo "          ";
            }
            // line 127
            echo "            <h6 id=\"ppc-percent\" class=\"";
            echo (((($context["percent"] ?? null) > 0)) ? ("text-success") : ((((($context["percent"] ?? null) == 0)) ? ("text-warning") : ("text-danger"))));
            echo "\">
              <i class=\"fa ";
            // line 128
            echo (((($context["percent"] ?? null) > 0)) ? ("fa-arrow-up") : ((((($context["percent"] ?? null) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
            echo "\"></i><span>&nbsp;";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["percent"] ?? null), 1), "html", null, true);
            echo "%</span>
            </h6>
          ";
        } else {
            // line 131
            echo "            <img src=\"/assets/images/padlock.png\" height=\"115\">
          ";
        }
        // line 133
        echo "      </div>
    </div>
    <!-- Listings -->
    <div class=\"col-sm-6 box\" data-link=\"";
        // line 136
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["links"] ?? null), "listings", array()), "html", null, true);
        echo "\">
      <div class=\"mt-3 mb-3 ml-1 mr-1 p-3 ";
        // line 137
        if (twig_get_attribute($this->env, $this->source, ($context["subscribed"] ?? null), "local_listings", array())) {
            echo "bg-lightblue";
        } else {
            echo "bg-lightgrey";
        }
        echo " text-center\">
        <h3>Listings</h3>
        ";
        // line 139
        if (twig_get_attribute($this->env, $this->source, ($context["subscribed"] ?? null), "local_listings", array())) {
            // line 140
            echo "          <h5 class=\"text-muted\">Total Listings</h5>
          <h1 id=\"listings-count\">";
            // line 141
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "listings", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_ae8761103bd1c60af04d19feefa0b4fd823162d6076a3eaf1a1bfa47302417e9 = ($context["periods"] ?? null)) && is_array($__internal_ae8761103bd1c60af04d19feefa0b4fd823162d6076a3eaf1a1bfa47302417e9) || $__internal_ae8761103bd1c60af04d19feefa0b4fd823162d6076a3eaf1a1bfa47302417e9 instanceof ArrayAccess ? ($__internal_ae8761103bd1c60af04d19feefa0b4fd823162d6076a3eaf1a1bfa47302417e9[($context["current"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "total", array(), "any", true, true)) ? (twig_get_attribute($this->env, $this->source, (($__internal_1b8137deccaa0819494754263c6b5c7c39d8063c2f480f55364fc27d89358c92 = twig_get_attribute($this->env, $this->source,             // line 142
($context["summary"] ?? null), "listings", array())) && is_array($__internal_1b8137deccaa0819494754263c6b5c7c39d8063c2f480f55364fc27d89358c92) || $__internal_1b8137deccaa0819494754263c6b5c7c39d8063c2f480f55364fc27d89358c92 instanceof ArrayAccess ? ($__internal_1b8137deccaa0819494754263c6b5c7c39d8063c2f480f55364fc27d89358c92[twig_get_attribute($this->env, $this->source, (($__internal_a978e3f1f39c5d1b109bc6bebe1afcf574f31134f8bdd7c0af11fef3af04f536 = ($context["periods"] ?? null)) && is_array($__internal_a978e3f1f39c5d1b109bc6bebe1afcf574f31134f8bdd7c0af11fef3af04f536) || $__internal_a978e3f1f39c5d1b109bc6bebe1afcf574f31134f8bdd7c0af11fef3af04f536 instanceof ArrayAccess ? ($__internal_a978e3f1f39c5d1b109bc6bebe1afcf574f31134f8bdd7c0af11fef3af04f536[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "total", array())) : (0)), "html", null, true);
            echo "</h1>
          ";
            // line 143
            if (( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["summary"] ?? null), "listings", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_a06639e8aea06553231587fc16ca0ea1a21699883635a45d666a35a97d9ece7a = ($context["periods"] ?? null)) && is_array($__internal_a06639e8aea06553231587fc16ca0ea1a21699883635a45d666a35a97d9ece7a) || $__internal_a06639e8aea06553231587fc16ca0ea1a21699883635a45d666a35a97d9ece7a instanceof ArrayAccess ? ($__internal_a06639e8aea06553231587fc16ca0ea1a21699883635a45d666a35a97d9ece7a[($context["current"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "total", array(), "any", true, true) ||  !twig_get_attribute($this->env, $this->source, (($__internal_39a5cce6fa2bff30530676887bb316ac8354eec8913360d5daac86f4c858f6c8 = twig_get_attribute($this->env, $this->source,             // line 144
($context["summary"] ?? null), "listings", array())) && is_array($__internal_39a5cce6fa2bff30530676887bb316ac8354eec8913360d5daac86f4c858f6c8) || $__internal_39a5cce6fa2bff30530676887bb316ac8354eec8913360d5daac86f4c858f6c8 instanceof ArrayAccess ? ($__internal_39a5cce6fa2bff30530676887bb316ac8354eec8913360d5daac86f4c858f6c8[twig_get_attribute($this->env, $this->source, (($__internal_050c04bce2a3631e67983e8362fe17b4134f5f81b57055bbf2a7b9cf6efe1bfc = ($context["periods"] ?? null)) && is_array($__internal_050c04bce2a3631e67983e8362fe17b4134f5f81b57055bbf2a7b9cf6efe1bfc) || $__internal_050c04bce2a3631e67983e8362fe17b4134f5f81b57055bbf2a7b9cf6efe1bfc instanceof ArrayAccess ? ($__internal_050c04bce2a3631e67983e8362fe17b4134f5f81b57055bbf2a7b9cf6efe1bfc[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "total", array()))) {
                // line 145
                echo "            ";
                $context["percent"] =  -100;
                // line 146
                echo "          ";
            }
            // line 147
            echo "          ";
            if ((( !twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true) ||  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 148
($context["summary"] ?? null), "listings", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_fa6a0e85ff0cd5606fb475c64fbbf1f2467c8021b9df7a12d157d8f459855bbb = ($context["periods"] ?? null)) && is_array($__internal_fa6a0e85ff0cd5606fb475c64fbbf1f2467c8021b9df7a12d157d8f459855bbb) || $__internal_fa6a0e85ff0cd5606fb475c64fbbf1f2467c8021b9df7a12d157d8f459855bbb instanceof ArrayAccess ? ($__internal_fa6a0e85ff0cd5606fb475c64fbbf1f2467c8021b9df7a12d157d8f459855bbb[($context["previous"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "total", array(), "any", true, true)) ||  !twig_get_attribute($this->env, $this->source, (($__internal_513ddf1022810cf682376066d54fc43f60e596daf4c87118aaccf513f1067c74 = twig_get_attribute($this->env, $this->source,             // line 149
($context["summary"] ?? null), "listings", array())) && is_array($__internal_513ddf1022810cf682376066d54fc43f60e596daf4c87118aaccf513f1067c74) || $__internal_513ddf1022810cf682376066d54fc43f60e596daf4c87118aaccf513f1067c74 instanceof ArrayAccess ? ($__internal_513ddf1022810cf682376066d54fc43f60e596daf4c87118aaccf513f1067c74[twig_get_attribute($this->env, $this->source, (($__internal_9a5e489a5a31742be6ab32c5389abee952577e6f85e6982e4dbd62730c4792ee = ($context["periods"] ?? null)) && is_array($__internal_9a5e489a5a31742be6ab32c5389abee952577e6f85e6982e4dbd62730c4792ee) || $__internal_9a5e489a5a31742be6ab32c5389abee952577e6f85e6982e4dbd62730c4792ee instanceof ArrayAccess ? ($__internal_9a5e489a5a31742be6ab32c5389abee952577e6f85e6982e4dbd62730c4792ee[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "total", array()))) {
                // line 150
                echo "            ";
                $context["percent"] = 0;
                // line 151
                echo "          ";
            }
            // line 152
            echo "          ";
            if ((((((twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["current"] ?? null), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 153
($context["summary"] ?? null), "listings", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_a0d4b9c24ecc1069804d5ffd2fb2deb773c447124ee995206d1d298ddc01ef9d = ($context["periods"] ?? null)) && is_array($__internal_a0d4b9c24ecc1069804d5ffd2fb2deb773c447124ee995206d1d298ddc01ef9d) || $__internal_a0d4b9c24ecc1069804d5ffd2fb2deb773c447124ee995206d1d298ddc01ef9d instanceof ArrayAccess ? ($__internal_a0d4b9c24ecc1069804d5ffd2fb2deb773c447124ee995206d1d298ddc01ef9d[($context["current"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "total", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, (($__internal_c0bd37fb023ceb7cdf58c4e1bdb0246219e73ab515a5dbed1e281006a23a53cd = twig_get_attribute($this->env, $this->source,             // line 154
($context["summary"] ?? null), "listings", array())) && is_array($__internal_c0bd37fb023ceb7cdf58c4e1bdb0246219e73ab515a5dbed1e281006a23a53cd) || $__internal_c0bd37fb023ceb7cdf58c4e1bdb0246219e73ab515a5dbed1e281006a23a53cd instanceof ArrayAccess ? ($__internal_c0bd37fb023ceb7cdf58c4e1bdb0246219e73ab515a5dbed1e281006a23a53cd[twig_get_attribute($this->env, $this->source, (($__internal_f47b62a1eaad3f095a3657c8ea134dd4d4d1bd718b4a5ba8e5ae4a2885d114d4 = ($context["periods"] ?? null)) && is_array($__internal_f47b62a1eaad3f095a3657c8ea134dd4d4d1bd718b4a5ba8e5ae4a2885d114d4) || $__internal_f47b62a1eaad3f095a3657c8ea134dd4d4d1bd718b4a5ba8e5ae4a2885d114d4 instanceof ArrayAccess ? ($__internal_f47b62a1eaad3f095a3657c8ea134dd4d4d1bd718b4a5ba8e5ae4a2885d114d4[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "total", array())) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,             // line 155
($context["summary"] ?? null), "listings", array(), "any", false, true), twig_get_attribute($this->env, $this->source, (($__internal_5709e2677b4b83eb2a2d5be30b568b45a9fd42d601be7779abeb037c5bb82bbc = ($context["periods"] ?? null)) && is_array($__internal_5709e2677b4b83eb2a2d5be30b568b45a9fd42d601be7779abeb037c5bb82bbc) || $__internal_5709e2677b4b83eb2a2d5be30b568b45a9fd42d601be7779abeb037c5bb82bbc instanceof ArrayAccess ? ($__internal_5709e2677b4b83eb2a2d5be30b568b45a9fd42d601be7779abeb037c5bb82bbc[($context["previous"] ?? null)] ?? null) : null), "start", array()), array(), "array", false, true), "total", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, (($__internal_85a94be24d27f400d3754518c0fed891a2870cf6c9f7930ecbbd2c0667dcb588 = twig_get_attribute($this->env, $this->source,             // line 156
($context["summary"] ?? null), "listings", array())) && is_array($__internal_85a94be24d27f400d3754518c0fed891a2870cf6c9f7930ecbbd2c0667dcb588) || $__internal_85a94be24d27f400d3754518c0fed891a2870cf6c9f7930ecbbd2c0667dcb588 instanceof ArrayAccess ? ($__internal_85a94be24d27f400d3754518c0fed891a2870cf6c9f7930ecbbd2c0667dcb588[twig_get_attribute($this->env, $this->source, (($__internal_b048cdecd09f3f66f869521ec789beb4047339137104742ed6d8d5f15ebd5d42 = ($context["periods"] ?? null)) && is_array($__internal_b048cdecd09f3f66f869521ec789beb4047339137104742ed6d8d5f15ebd5d42) || $__internal_b048cdecd09f3f66f869521ec789beb4047339137104742ed6d8d5f15ebd5d42 instanceof ArrayAccess ? ($__internal_b048cdecd09f3f66f869521ec789beb4047339137104742ed6d8d5f15ebd5d42[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "total", array()))) {
                // line 157
                echo "            ";
                $context["percent"] = (((twig_get_attribute($this->env, $this->source, (($__internal_99ec2c161ffe4e6b1c6173e61d1085b2976b25fe9aa10f6d1365c01c6de88d6a = twig_get_attribute($this->env, $this->source,                 // line 158
($context["summary"] ?? null), "listings", array())) && is_array($__internal_99ec2c161ffe4e6b1c6173e61d1085b2976b25fe9aa10f6d1365c01c6de88d6a) || $__internal_99ec2c161ffe4e6b1c6173e61d1085b2976b25fe9aa10f6d1365c01c6de88d6a instanceof ArrayAccess ? ($__internal_99ec2c161ffe4e6b1c6173e61d1085b2976b25fe9aa10f6d1365c01c6de88d6a[twig_get_attribute($this->env, $this->source, (($__internal_92767120bd05cd58560300830639c67569c47de084f3b54ba8e8e21eadc07954 = ($context["periods"] ?? null)) && is_array($__internal_92767120bd05cd58560300830639c67569c47de084f3b54ba8e8e21eadc07954) || $__internal_92767120bd05cd58560300830639c67569c47de084f3b54ba8e8e21eadc07954 instanceof ArrayAccess ? ($__internal_92767120bd05cd58560300830639c67569c47de084f3b54ba8e8e21eadc07954[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "total", array()) / twig_get_attribute($this->env, $this->source, (($__internal_199f0b4662f2e9f66318b338fecc6de4eee0110c7a2fc576d0d2e36c815fa905 = twig_get_attribute($this->env, $this->source,                 // line 159
($context["summary"] ?? null), "listings", array())) && is_array($__internal_199f0b4662f2e9f66318b338fecc6de4eee0110c7a2fc576d0d2e36c815fa905) || $__internal_199f0b4662f2e9f66318b338fecc6de4eee0110c7a2fc576d0d2e36c815fa905 instanceof ArrayAccess ? ($__internal_199f0b4662f2e9f66318b338fecc6de4eee0110c7a2fc576d0d2e36c815fa905[twig_get_attribute($this->env, $this->source, (($__internal_076cdfde217cc2dcb1d192bf072c0dd51444fc0425859e28ebe2ca6327b0b306 = ($context["periods"] ?? null)) && is_array($__internal_076cdfde217cc2dcb1d192bf072c0dd51444fc0425859e28ebe2ca6327b0b306) || $__internal_076cdfde217cc2dcb1d192bf072c0dd51444fc0425859e28ebe2ca6327b0b306 instanceof ArrayAccess ? ($__internal_076cdfde217cc2dcb1d192bf072c0dd51444fc0425859e28ebe2ca6327b0b306[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "total", array())) * 100) - 100);
                // line 161
                echo "          ";
            }
            // line 162
            echo "            <h6 id=\"listings-percent\" class=\"";
            echo (((($context["percent"] ?? null) > 0)) ? ("text-success") : ((((($context["percent"] ?? null) == 0)) ? ("text-warning") : ("text-danger"))));
            echo "\">
              <i class=\"fa ";
            // line 163
            echo (((($context["percent"] ?? null) > 0)) ? ("fa-arrow-up") : ((((($context["percent"] ?? null) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
            echo "\"></i><span>&nbsp;";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["percent"] ?? null), 1), "html", null, true);
            echo "%</span>
            </h6>
          ";
        } else {
            // line 166
            echo "            <img src=\"/assets/images/padlock.png\" height=\"115\">
          ";
        }
        // line 168
        echo "      </div>
    </div>
  </div>
  <div class=\"row\">
    <div class=\"col-12\">
      <p>Welcome to ";
        // line 173
        if ((twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "business_name", array(), "any", true, true) && twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "business_name", array()))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company"] ?? null), "business_name", array()), "html", null, true);
            echo "'s";
        }
        echo " Portal. Please use the menu bar on the left to navigate for: reporting for your subscribed services, website order and update forms, and billing and service information.</p>
    </div>
  </div>
";
    }

    // line 178
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 179
        echo "  ";
        $this->displayParentBlock("footer_scripts", $context, $blocks);
        echo "
  <script>
    var summary = ";
        // line 181
        echo json_encode(($context["summary"] ?? null));
        echo ";
    var periods = ";
        // line 182
        echo json_encode(twig_reverse_filter($this->env, ($context["periods"] ?? null)));
        echo ";
  </script>
  <script src=\"/assets/js/dashboard/index.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "Dealers/dashboard/dealer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  452 => 182,  448 => 181,  442 => 179,  439 => 178,  428 => 173,  421 => 168,  417 => 166,  409 => 163,  404 => 162,  401 => 161,  399 => 159,  398 => 158,  396 => 157,  394 => 156,  393 => 155,  392 => 154,  391 => 153,  389 => 152,  386 => 151,  383 => 150,  381 => 149,  380 => 148,  378 => 147,  375 => 146,  372 => 145,  370 => 144,  369 => 143,  365 => 142,  364 => 141,  361 => 140,  359 => 139,  350 => 137,  346 => 136,  341 => 133,  337 => 131,  329 => 128,  324 => 127,  321 => 126,  319 => 124,  318 => 123,  316 => 122,  314 => 121,  313 => 120,  312 => 119,  311 => 118,  309 => 117,  306 => 116,  303 => 115,  301 => 114,  300 => 113,  298 => 112,  295 => 111,  292 => 110,  290 => 109,  289 => 108,  285 => 107,  284 => 106,  281 => 105,  279 => 104,  270 => 102,  266 => 101,  259 => 96,  255 => 94,  247 => 91,  242 => 90,  239 => 89,  237 => 87,  236 => 86,  234 => 85,  232 => 84,  231 => 83,  230 => 82,  229 => 81,  227 => 80,  224 => 79,  221 => 78,  219 => 77,  218 => 76,  216 => 75,  213 => 74,  210 => 73,  208 => 72,  207 => 71,  203 => 70,  202 => 69,  199 => 68,  197 => 67,  188 => 65,  184 => 64,  179 => 61,  175 => 59,  167 => 56,  162 => 55,  159 => 54,  157 => 52,  156 => 51,  154 => 50,  152 => 49,  151 => 48,  150 => 47,  149 => 46,  147 => 45,  144 => 44,  141 => 43,  139 => 42,  138 => 41,  136 => 40,  133 => 39,  130 => 38,  128 => 37,  127 => 36,  123 => 35,  122 => 34,  119 => 33,  117 => 32,  108 => 30,  104 => 29,  100 => 27,  97 => 26,  95 => 25,  89 => 21,  78 => 18,  74 => 17,  71 => 16,  67 => 15,  59 => 12,  52 => 7,  49 => 6,  44 => 4,  41 => 3,  35 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/dashboard/dealer.twig", "/home/dealerportal/public_html/app/Views/Dealers/dashboard/dealer.twig");
    }
}
