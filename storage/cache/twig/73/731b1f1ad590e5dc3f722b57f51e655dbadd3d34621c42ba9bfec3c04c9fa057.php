<?php

/* Dealers/social_media/index.twig */
class __TwigTemplate_fbd36491fe460a5df0a74f503865e271d04d4a9e8af9327e09ac8bf180913e65 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/layouts/dashboard.twig", "Dealers/social_media/index.twig", 1);
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
        echo "Social Marketing";
    }

    // line 3
    public function block_sidebar($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        $this->loadTemplate("Dealers/partials/sidebar/dealer.twig", "Dealers/social_media/index.twig", 4)->display($context);
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "  ";
        if (($context["forbidden"] ?? null)) {
            // line 8
            echo "    <img src=\"/assets/images/social_media/dashboard.png\" class=\"img-fluid\">
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
            <p class=\"mt-3 font-large text-white\">Please contact your account manager to learn more about Place1SEO's managed Social Media Accounts.</p>
          </div>
          <div class=\"modal-footer\">
            <a class=\"btn btn-lg btn-block btn-primary\" href=\"/";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "services", array()), "html", null, true);
            echo "#social_media\">Activate Social Media section</a>
          </div>
        </div>
      </div>
    </div>
  ";
        } else {
            // line 29
            echo "    <h1 class=\"text-center\">Social Media Monthly Summary</h1>
    ";
            // line 30
            if (((($context["periods"] ?? null) && ($context["totals"] ?? null)) && ($context["posts"] ?? null))) {
                // line 31
                echo "      <div class=\"row\">
        <div class=\"col-12 text-center\">
          <div class=\"btn-group\">
            <button type=\"button\" class=\"btn btn-large btn-outline-primary dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" id=\"social-media-period-button\">
              ";
                // line 35
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["periods"] ?? null)), "start", array()), "F j, Y"), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["periods"] ?? null)), "end", array()), "F j, Y"), "html", null, true);
                echo "
            </button>
            <div class=\"dropdown-menu\" id=\"social-media-period-dropdown\">
              ";
                // line 38
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["periods"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["period"]) {
                    // line 39
                    echo "                <a class=\"dropdown-item\" href=\"javascript:void(0);\"
                  data-period_start=\"";
                    // line 40
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["period"], "start", array()), "html", null, true);
                    echo "\">
                  ";
                    // line 41
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
                // line 44
                echo "            </div>
          </div>
        </div>
      </div>
      <div class=\"row mt-3 mb-3\">
        <div class=\"col-12 text-center\">
          ";
                // line 50
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["media"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 51
                    echo "            <img src=\"/assets/images/social_media/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "name", array()), "html", null, true);
                    echo ".png\" alt=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "title", array()), "html", null, true);
                    echo "\" width=\"100\" height=\"100\" class=\"ml-1 mr-1\">
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 53
                echo "        </div>
      </div>
      <div class=\"row\">
        <div class=\"col-sm-4\">
          <div class=\"row\">
            ";
                // line 58
                $context["current"] = (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_array_keys_filter(($context["periods"] ?? null))) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[0] ?? null) : null);
                // line 59
                echo "            ";
                $context["previous"] = (((twig_length_filter($this->env, twig_get_array_keys_filter(($context["periods"] ?? null))) > 1)) ? ((($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = twig_get_array_keys_filter(($context["periods"] ?? null))) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[1] ?? null) : null)) : ( -1));
                // line 60
                echo "            <!-- Posts -->
            <div class=\"col-md-6\">
              <p class=\"text-secondary h4 font-weight-light mb-0\">Posts</p>
              <h2 class=\"mb-0\" id=\"posts-count\">";
                // line 63
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = ($context["totals"] ?? null)) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[twig_get_attribute($this->env, $this->source, (($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = ($context["periods"] ?? null)) && is_array($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9) || $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 instanceof ArrayAccess ? ($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "posts", array()), "html", null, true);
                echo "</h2>
              ";
                // line 64
                if ( !twig_get_attribute($this->env, $this->source, (($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = ($context["totals"] ?? null)) && is_array($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217) || $__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 instanceof ArrayAccess ? ($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217[twig_get_attribute($this->env, $this->source, (($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 = ($context["periods"] ?? null)) && is_array($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105) || $__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 instanceof ArrayAccess ? ($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "posts", array())) {
                    // line 65
                    echo "                ";
                    $context["percent"] =  -100;
                    // line 66
                    echo "              ";
                }
                // line 67
                echo "              ";
                if (( !twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true) ||  !twig_get_attribute($this->env, $this->source, (($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 = ($context["totals"] ?? null)) && is_array($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779) || $__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 instanceof ArrayAccess ? ($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779[twig_get_attribute($this->env, $this->source, (($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 = ($context["periods"] ?? null)) && is_array($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1) || $__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 instanceof ArrayAccess ? ($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "posts", array()))) {
                    // line 68
                    echo "                ";
                    $context["percent"] = 0;
                    // line 69
                    echo "              ";
                }
                // line 70
                echo "              ";
                if ((((twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["current"] ?? null), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true)) && twig_get_attribute($this->env, $this->source, (($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 =                 // line 71
($context["totals"] ?? null)) && is_array($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0) || $__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 instanceof ArrayAccess ? ($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0[twig_get_attribute($this->env, $this->source, (($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 = ($context["periods"] ?? null)) && is_array($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866) || $__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 instanceof ArrayAccess ? ($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "posts", array())) && twig_get_attribute($this->env, $this->source, (($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f = ($context["totals"] ?? null)) && is_array($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f) || $__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f instanceof ArrayAccess ? ($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f[twig_get_attribute($this->env, $this->source, (($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7 = ($context["periods"] ?? null)) && is_array($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7) || $__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7 instanceof ArrayAccess ? ($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "posts", array()))) {
                    // line 72
                    echo "                ";
                    $context["percent"] = (((twig_get_attribute($this->env, $this->source, (($__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289 = ($context["totals"] ?? null)) && is_array($__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289) || $__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289 instanceof ArrayAccess ? ($__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289[twig_get_attribute($this->env, $this->source, (($__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18 = ($context["periods"] ?? null)) && is_array($__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18) || $__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18 instanceof ArrayAccess ? ($__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "posts", array()) / twig_get_attribute($this->env, $this->source, (($__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018 = ($context["totals"] ?? null)) && is_array($__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018) || $__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018 instanceof ArrayAccess ? ($__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018[twig_get_attribute($this->env, $this->source, (($__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413 = ($context["periods"] ?? null)) && is_array($__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413) || $__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413 instanceof ArrayAccess ? ($__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "posts", array())) * 100) - 100);
                    // line 73
                    echo "              ";
                }
                // line 74
                echo "              <h6 id=\"posts-percent\" class=\"";
                echo (((($context["percent"] ?? null) > 0)) ? ("text-success") : ((((($context["percent"] ?? null) == 0)) ? ("text-warning") : ("text-danger"))));
                echo "\">
                <i class=\"fa ";
                // line 75
                echo (((($context["percent"] ?? null) > 0)) ? ("fa-arrow-up") : ((((($context["percent"] ?? null) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
                echo "\"></i><span>&nbsp;";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["percent"] ?? null), 1), "html", null, true);
                echo "%</span>
              </h6>
            </div>
            <!-- Engagements -->
            <div class=\"col-md-6\">
              <p class=\"text-secondary h4 font-weight-light mb-0\">Engagements</p>
              <h2 class=\"mb-0\" id=\"engagements-count\">";
                // line 81
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_a5ce050c56e2fa0d875fbc5d7e5a277df72ffc991bd0164f3c078803c5d7b4e7 = ($context["totals"] ?? null)) && is_array($__internal_a5ce050c56e2fa0d875fbc5d7e5a277df72ffc991bd0164f3c078803c5d7b4e7) || $__internal_a5ce050c56e2fa0d875fbc5d7e5a277df72ffc991bd0164f3c078803c5d7b4e7 instanceof ArrayAccess ? ($__internal_a5ce050c56e2fa0d875fbc5d7e5a277df72ffc991bd0164f3c078803c5d7b4e7[twig_get_attribute($this->env, $this->source, (($__internal_c3328b7afe486068cdbdc8d1c3c828eef7c877ecbd31cfd5c6604f285bf56a4c = ($context["periods"] ?? null)) && is_array($__internal_c3328b7afe486068cdbdc8d1c3c828eef7c877ecbd31cfd5c6604f285bf56a4c) || $__internal_c3328b7afe486068cdbdc8d1c3c828eef7c877ecbd31cfd5c6604f285bf56a4c instanceof ArrayAccess ? ($__internal_c3328b7afe486068cdbdc8d1c3c828eef7c877ecbd31cfd5c6604f285bf56a4c[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "engagements", array()), "html", null, true);
                echo "</h2>
              ";
                // line 82
                if ( !twig_get_attribute($this->env, $this->source, (($__internal_98440f958a27a294f74051b56287200cf8d4ccac3368b6ba585b36549e500d40 = ($context["totals"] ?? null)) && is_array($__internal_98440f958a27a294f74051b56287200cf8d4ccac3368b6ba585b36549e500d40) || $__internal_98440f958a27a294f74051b56287200cf8d4ccac3368b6ba585b36549e500d40 instanceof ArrayAccess ? ($__internal_98440f958a27a294f74051b56287200cf8d4ccac3368b6ba585b36549e500d40[twig_get_attribute($this->env, $this->source, (($__internal_1b6627cccbecc270d890e9c3dd7f6b41e277f9eef79718257925048c26dc6d79 = ($context["periods"] ?? null)) && is_array($__internal_1b6627cccbecc270d890e9c3dd7f6b41e277f9eef79718257925048c26dc6d79) || $__internal_1b6627cccbecc270d890e9c3dd7f6b41e277f9eef79718257925048c26dc6d79 instanceof ArrayAccess ? ($__internal_1b6627cccbecc270d890e9c3dd7f6b41e277f9eef79718257925048c26dc6d79[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "engagements", array())) {
                    // line 83
                    echo "                ";
                    $context["percent"] =  -100;
                    // line 84
                    echo "              ";
                }
                // line 85
                echo "              ";
                if (( !twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true) ||  !twig_get_attribute($this->env, $this->source, (($__internal_7dc3a0a28f55c5f2463e9b46ecafdfeb61e9238ed4d60acf6f7258d1de3c83e1 = ($context["totals"] ?? null)) && is_array($__internal_7dc3a0a28f55c5f2463e9b46ecafdfeb61e9238ed4d60acf6f7258d1de3c83e1) || $__internal_7dc3a0a28f55c5f2463e9b46ecafdfeb61e9238ed4d60acf6f7258d1de3c83e1 instanceof ArrayAccess ? ($__internal_7dc3a0a28f55c5f2463e9b46ecafdfeb61e9238ed4d60acf6f7258d1de3c83e1[twig_get_attribute($this->env, $this->source, (($__internal_8acbbad4b27a786cad00cba65bc04ee7a503f81018370f2b790d4fe79cfeb21d = ($context["periods"] ?? null)) && is_array($__internal_8acbbad4b27a786cad00cba65bc04ee7a503f81018370f2b790d4fe79cfeb21d) || $__internal_8acbbad4b27a786cad00cba65bc04ee7a503f81018370f2b790d4fe79cfeb21d instanceof ArrayAccess ? ($__internal_8acbbad4b27a786cad00cba65bc04ee7a503f81018370f2b790d4fe79cfeb21d[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "engagements", array()))) {
                    // line 86
                    echo "                ";
                    $context["percent"] = 0;
                    // line 87
                    echo "              ";
                }
                // line 88
                echo "              ";
                if ((((twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["current"] ?? null), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true)) && twig_get_attribute($this->env, $this->source, (($__internal_fbfc01bf158172b44fe031b3ae2f71c474964929dfcc389cc81ef3f55fcb06f0 =                 // line 89
($context["totals"] ?? null)) && is_array($__internal_fbfc01bf158172b44fe031b3ae2f71c474964929dfcc389cc81ef3f55fcb06f0) || $__internal_fbfc01bf158172b44fe031b3ae2f71c474964929dfcc389cc81ef3f55fcb06f0 instanceof ArrayAccess ? ($__internal_fbfc01bf158172b44fe031b3ae2f71c474964929dfcc389cc81ef3f55fcb06f0[twig_get_attribute($this->env, $this->source, (($__internal_c2705d9276f5639c7ab516a5efff892123f6b2bdcf92245c8c3e7a8e7b8e0b4c = ($context["periods"] ?? null)) && is_array($__internal_c2705d9276f5639c7ab516a5efff892123f6b2bdcf92245c8c3e7a8e7b8e0b4c) || $__internal_c2705d9276f5639c7ab516a5efff892123f6b2bdcf92245c8c3e7a8e7b8e0b4c instanceof ArrayAccess ? ($__internal_c2705d9276f5639c7ab516a5efff892123f6b2bdcf92245c8c3e7a8e7b8e0b4c[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "engagements", array())) && twig_get_attribute($this->env, $this->source, (($__internal_4450f16bcd6eee436ec803be9cb8dd13e40acb5f3c668ce291f0476abc1a5b69 = ($context["totals"] ?? null)) && is_array($__internal_4450f16bcd6eee436ec803be9cb8dd13e40acb5f3c668ce291f0476abc1a5b69) || $__internal_4450f16bcd6eee436ec803be9cb8dd13e40acb5f3c668ce291f0476abc1a5b69 instanceof ArrayAccess ? ($__internal_4450f16bcd6eee436ec803be9cb8dd13e40acb5f3c668ce291f0476abc1a5b69[twig_get_attribute($this->env, $this->source, (($__internal_92ed32b8cbedc9f8b5b379c1ef395076f852e6115f19026df86a46e64a8be849 = ($context["periods"] ?? null)) && is_array($__internal_92ed32b8cbedc9f8b5b379c1ef395076f852e6115f19026df86a46e64a8be849) || $__internal_92ed32b8cbedc9f8b5b379c1ef395076f852e6115f19026df86a46e64a8be849 instanceof ArrayAccess ? ($__internal_92ed32b8cbedc9f8b5b379c1ef395076f852e6115f19026df86a46e64a8be849[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "engagements", array()))) {
                    // line 90
                    echo "                ";
                    $context["percent"] = (((twig_get_attribute($this->env, $this->source, (($__internal_ea7a33ac6d8a26ad47921e376e6221ddcc8585c46ced0d814217a4f86de9974e = ($context["totals"] ?? null)) && is_array($__internal_ea7a33ac6d8a26ad47921e376e6221ddcc8585c46ced0d814217a4f86de9974e) || $__internal_ea7a33ac6d8a26ad47921e376e6221ddcc8585c46ced0d814217a4f86de9974e instanceof ArrayAccess ? ($__internal_ea7a33ac6d8a26ad47921e376e6221ddcc8585c46ced0d814217a4f86de9974e[twig_get_attribute($this->env, $this->source, (($__internal_9522a6cebeae41b694ef7a2cdef578aec938dae7d5acf43b2efd8c4c9bc5dabe = ($context["periods"] ?? null)) && is_array($__internal_9522a6cebeae41b694ef7a2cdef578aec938dae7d5acf43b2efd8c4c9bc5dabe) || $__internal_9522a6cebeae41b694ef7a2cdef578aec938dae7d5acf43b2efd8c4c9bc5dabe instanceof ArrayAccess ? ($__internal_9522a6cebeae41b694ef7a2cdef578aec938dae7d5acf43b2efd8c4c9bc5dabe[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "engagements", array()) / twig_get_attribute($this->env, $this->source, (($__internal_9e736303ccc6dbec54334717fdf66a3c6c7a4ed563e8a9c6a92ccdbb773e19bf = ($context["totals"] ?? null)) && is_array($__internal_9e736303ccc6dbec54334717fdf66a3c6c7a4ed563e8a9c6a92ccdbb773e19bf) || $__internal_9e736303ccc6dbec54334717fdf66a3c6c7a4ed563e8a9c6a92ccdbb773e19bf instanceof ArrayAccess ? ($__internal_9e736303ccc6dbec54334717fdf66a3c6c7a4ed563e8a9c6a92ccdbb773e19bf[twig_get_attribute($this->env, $this->source, (($__internal_8acdbb41833471eddc4b3c5a5c648038762a0ba2347958dbb7f312bec87c3d40 = ($context["periods"] ?? null)) && is_array($__internal_8acdbb41833471eddc4b3c5a5c648038762a0ba2347958dbb7f312bec87c3d40) || $__internal_8acdbb41833471eddc4b3c5a5c648038762a0ba2347958dbb7f312bec87c3d40 instanceof ArrayAccess ? ($__internal_8acdbb41833471eddc4b3c5a5c648038762a0ba2347958dbb7f312bec87c3d40[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "engagements", array())) * 100) - 100);
                    // line 91
                    echo "              ";
                }
                // line 92
                echo "              <h6 id=\"engagements-percent\" class=\"";
                echo (((($context["percent"] ?? null) > 0)) ? ("text-success") : ((((($context["percent"] ?? null) == 0)) ? ("text-warning") : ("text-danger"))));
                echo "\">
                <i class=\"fa ";
                // line 93
                echo (((($context["percent"] ?? null) > 0)) ? ("fa-arrow-up") : ((((($context["percent"] ?? null) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
                echo "\"></i><span>&nbsp;";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["percent"] ?? null), 1), "html", null, true);
                echo "%</span>
              </h6>
            </div>
          </div>
          <!-- Impressions -->
          <div class=\"row\">
            <div class=\"col-12\">
              <canvas id=\"impressions-chart\" width=\"200\" height=\"150\"></canvas>
            </div>
          </div>
        </div>
        <div class=\"col-sm-8\">
          <canvas id=\"monthly-post-counts-chart\" width=\"400\" height=\"300\"></canvas>
        </div>
      </div>
    ";
            } else {
                // line 109
                echo "      <div class=\"alert alert-danger\">Sorry, there is not enough data to display.</div>
    ";
            }
            // line 111
            echo "  ";
        }
    }

    // line 114
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 115
        echo "  ";
        $this->displayParentBlock("footer_scripts", $context, $blocks);
        echo "
  ";
        // line 116
        if (((( !($context["forbidden"] ?? null) && ($context["periods"] ?? null)) && ($context["totals"] ?? null)) && ($context["posts"] ?? null))) {
            // line 117
            echo "  <script>
    var totals  = ";
            // line 118
            echo json_encode(($context["totals"] ?? null));
            echo ";
    var posts   = ";
            // line 119
            echo json_encode(($context["posts"] ?? null));
            echo ";
    var periods = ";
            // line 120
            echo json_encode(($context["periods"] ?? null));
            echo ";
  </script>
  <script src=\"/assets/js/Chart.bundle.min.js\"></script>
  <script src=\"/assets/js/social-media/monthly-post-counts-chart.js\"></script>
  <script src=\"/assets/js/social-media/impressions-chart.js\"></script>
  <script src=\"/assets/js/social-media/index.js\"></script>
  ";
        } else {
            // line 127
            echo "    <script>
    \$(document).ready(function() {
      \$('.forbidden-modal').modal({backdrop: 'static', keyboard: false});
    });
    </script>
  ";
        }
    }

    public function getTemplateName()
    {
        return "Dealers/social_media/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  306 => 127,  296 => 120,  292 => 119,  288 => 118,  285 => 117,  283 => 116,  278 => 115,  275 => 114,  270 => 111,  266 => 109,  245 => 93,  240 => 92,  237 => 91,  234 => 90,  232 => 89,  230 => 88,  227 => 87,  224 => 86,  221 => 85,  218 => 84,  215 => 83,  213 => 82,  209 => 81,  198 => 75,  193 => 74,  190 => 73,  187 => 72,  185 => 71,  183 => 70,  180 => 69,  177 => 68,  174 => 67,  171 => 66,  168 => 65,  166 => 64,  162 => 63,  157 => 60,  154 => 59,  152 => 58,  145 => 53,  134 => 51,  130 => 50,  122 => 44,  111 => 41,  107 => 40,  104 => 39,  100 => 38,  92 => 35,  86 => 31,  84 => 30,  81 => 29,  72 => 23,  55 => 8,  52 => 7,  49 => 6,  44 => 4,  41 => 3,  35 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/social_media/index.twig", "/home/dealerportal/public_html/app/Views/Dealers/social_media/index.twig");
    }
}
