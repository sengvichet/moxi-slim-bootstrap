<?php

/* Dealers/paid_ads/index.twig */
class __TwigTemplate_061460495d348601539671195813b57c19abcf07779032dbd745a79dae71d183 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("Dealers/layouts/dashboard.twig", "Dealers/paid_ads/index.twig", 1);
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
        echo "Paid Ads";
    }

    // line 3
    public function block_sidebar($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        $this->loadTemplate("Dealers/partials/sidebar/dealer.twig", "Dealers/paid_ads/index.twig", 4)->display($context);
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "  ";
        if (($context["forbidden"] ?? null)) {
            // line 8
            echo "    <img src=\"/assets/images/paid_ads/dashboard.png\" class=\"img-fluid\">
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
            <p class=\"mt-3 font-large text-white\">Please contact your account manager to learn more about Place1SEO's managed Paid Ads Accounts.</p>
          </div>
          <div class=\"modal-footer\">
            <a class=\"btn btn-lg btn-block btn-primary\" href=\"/";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["action"] ?? null), "services", array()), "html", null, true);
            echo "#local_google_ads\">Activate Paid Ads section</a>
          </div>
        </div>
      </div>
    </div>
  ";
        } else {
            // line 29
            echo "    <h1 class=\"text-center\">Google PPC Summary</h1>
    ";
            // line 30
            if (((($context["periods"] ?? null) && ($context["totals"] ?? null)) && ($context["counts"] ?? null))) {
                // line 31
                echo "      <div class=\"row\">
        <div class=\"col-12 text-center\">
          <div class=\"btn-group\">
            <button type=\"button\" class=\"btn btn-large btn-outline-primary dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" id=\"paid-ads-period-button\">
              ";
                // line 35
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["periods"] ?? null)), "start", array()), "F j, Y"), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_first($this->env, ($context["periods"] ?? null)), "end", array()), "F j, Y"), "html", null, true);
                echo "
            </button>
            <div class=\"dropdown-menu\" id=\"paid-ads-period-dropdown\">
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
      <div class=\"row\">
        <div class=\"col-sm-4\">
          ";
                // line 50
                $context["current"] = (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_array_keys_filter(($context["periods"] ?? null))) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[0] ?? null) : null);
                // line 51
                echo "          ";
                $context["previous"] = (((twig_length_filter($this->env, twig_get_array_keys_filter(($context["periods"] ?? null))) > 1)) ? ((($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = twig_get_array_keys_filter(($context["periods"] ?? null))) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[1] ?? null) : null)) : ( -1));
                // line 52
                echo "          <!-- Spend -->
          <div class=\"row\">
              <div class=\"col-md-6\">
                <img src=\"/assets/images/paid_ads/spend.png\" width=\"75\" height=\"75\">
              </div>
              <div class=\"col-md-6\">
                <p class=\"text-secondary h4 font-weight-light mb-0\">Spend</p>
                <h2 class=\"mb-0\" id=\"spend-count\">";
                // line 59
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = ($context["totals"] ?? null)) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[twig_get_attribute($this->env, $this->source, (($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = ($context["periods"] ?? null)) && is_array($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9) || $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 instanceof ArrayAccess ? ($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "spend", array()), "html", null, true);
                echo "</h2>
                ";
                // line 60
                if ( !twig_get_attribute($this->env, $this->source, (($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = ($context["totals"] ?? null)) && is_array($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217) || $__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 instanceof ArrayAccess ? ($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217[twig_get_attribute($this->env, $this->source, (($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 = ($context["periods"] ?? null)) && is_array($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105) || $__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 instanceof ArrayAccess ? ($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "spend", array())) {
                    // line 61
                    echo "                  ";
                    $context["percent"] =  -100;
                    // line 62
                    echo "                ";
                }
                // line 63
                echo "                ";
                if (( !twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true) ||  !twig_get_attribute($this->env, $this->source, (($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 = ($context["totals"] ?? null)) && is_array($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779) || $__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 instanceof ArrayAccess ? ($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779[twig_get_attribute($this->env, $this->source, (($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 = ($context["periods"] ?? null)) && is_array($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1) || $__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 instanceof ArrayAccess ? ($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "spend", array()))) {
                    // line 64
                    echo "                  ";
                    $context["percent"] = 0;
                    // line 65
                    echo "                ";
                }
                // line 66
                echo "                ";
                if ((((twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["current"] ?? null), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true)) && twig_get_attribute($this->env, $this->source, (($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 =                 // line 67
($context["totals"] ?? null)) && is_array($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0) || $__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 instanceof ArrayAccess ? ($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0[twig_get_attribute($this->env, $this->source, (($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 = ($context["periods"] ?? null)) && is_array($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866) || $__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 instanceof ArrayAccess ? ($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "spend", array())) && twig_get_attribute($this->env, $this->source, (($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f = ($context["totals"] ?? null)) && is_array($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f) || $__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f instanceof ArrayAccess ? ($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f[twig_get_attribute($this->env, $this->source, (($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7 = ($context["periods"] ?? null)) && is_array($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7) || $__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7 instanceof ArrayAccess ? ($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "spend", array()))) {
                    // line 68
                    echo "                  ";
                    $context["percent"] = (((twig_get_attribute($this->env, $this->source, (($__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289 = ($context["totals"] ?? null)) && is_array($__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289) || $__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289 instanceof ArrayAccess ? ($__internal_89dde7175ba0b16509237b3e9e7cf99ba9e1b72bd3e7efcbe667781538aca289[twig_get_attribute($this->env, $this->source, (($__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18 = ($context["periods"] ?? null)) && is_array($__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18) || $__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18 instanceof ArrayAccess ? ($__internal_869a4b51bf6f65c335ddd8115360d724846983ee5a04751d683ca60a03391d18[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "spend", array()) / twig_get_attribute($this->env, $this->source, (($__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018 = ($context["totals"] ?? null)) && is_array($__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018) || $__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018 instanceof ArrayAccess ? ($__internal_90d913d778d5b09eba503796cc624cad16d1bef853f6e54f02eb01d7ed891018[twig_get_attribute($this->env, $this->source, (($__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413 = ($context["periods"] ?? null)) && is_array($__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413) || $__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413 instanceof ArrayAccess ? ($__internal_5c0169d493d4872ad26d34703fc2ce22459eddaa09bc03024c8105160dc27413[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "spend", array())) * 100) - 100);
                    // line 69
                    echo "                ";
                }
                // line 70
                echo "                <h6 id=\"spend-percent\" class=\"";
                echo (((($context["percent"] ?? null) > 0)) ? ("text-success") : ((((($context["percent"] ?? null) == 0)) ? ("text-warning") : ("text-danger"))));
                echo "\">
                  <i class=\"fa ";
                // line 71
                echo (((($context["percent"] ?? null) > 0)) ? ("fa-arrow-up") : ((((($context["percent"] ?? null) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
                echo "\"></i><span>&nbsp;";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["percent"] ?? null), 1), "html", null, true);
                echo "%</span>
                </h6>
              </div>
          </div>
          <!-- Impressions -->
          <div class=\"row\">
              <div class=\"col-md-6\">
                <img src=\"/assets/images/paid_ads/impressions.png\" width=\"75\" height=\"75\">
              </div>
              <div class=\"col-md-6\">
                <p class=\"text-secondary h4 font-weight-light mb-0\">Impressions</p>
                <h2 class=\"mb-0\" id=\"impressions-count\">";
                // line 82
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_a5ce050c56e2fa0d875fbc5d7e5a277df72ffc991bd0164f3c078803c5d7b4e7 = ($context["totals"] ?? null)) && is_array($__internal_a5ce050c56e2fa0d875fbc5d7e5a277df72ffc991bd0164f3c078803c5d7b4e7) || $__internal_a5ce050c56e2fa0d875fbc5d7e5a277df72ffc991bd0164f3c078803c5d7b4e7 instanceof ArrayAccess ? ($__internal_a5ce050c56e2fa0d875fbc5d7e5a277df72ffc991bd0164f3c078803c5d7b4e7[twig_get_attribute($this->env, $this->source, (($__internal_c3328b7afe486068cdbdc8d1c3c828eef7c877ecbd31cfd5c6604f285bf56a4c = ($context["periods"] ?? null)) && is_array($__internal_c3328b7afe486068cdbdc8d1c3c828eef7c877ecbd31cfd5c6604f285bf56a4c) || $__internal_c3328b7afe486068cdbdc8d1c3c828eef7c877ecbd31cfd5c6604f285bf56a4c instanceof ArrayAccess ? ($__internal_c3328b7afe486068cdbdc8d1c3c828eef7c877ecbd31cfd5c6604f285bf56a4c[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "impressions", array()), "html", null, true);
                echo "</h2>
                ";
                // line 83
                if ( !twig_get_attribute($this->env, $this->source, (($__internal_98440f958a27a294f74051b56287200cf8d4ccac3368b6ba585b36549e500d40 = ($context["totals"] ?? null)) && is_array($__internal_98440f958a27a294f74051b56287200cf8d4ccac3368b6ba585b36549e500d40) || $__internal_98440f958a27a294f74051b56287200cf8d4ccac3368b6ba585b36549e500d40 instanceof ArrayAccess ? ($__internal_98440f958a27a294f74051b56287200cf8d4ccac3368b6ba585b36549e500d40[twig_get_attribute($this->env, $this->source, (($__internal_1b6627cccbecc270d890e9c3dd7f6b41e277f9eef79718257925048c26dc6d79 = ($context["periods"] ?? null)) && is_array($__internal_1b6627cccbecc270d890e9c3dd7f6b41e277f9eef79718257925048c26dc6d79) || $__internal_1b6627cccbecc270d890e9c3dd7f6b41e277f9eef79718257925048c26dc6d79 instanceof ArrayAccess ? ($__internal_1b6627cccbecc270d890e9c3dd7f6b41e277f9eef79718257925048c26dc6d79[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "impressions", array())) {
                    // line 84
                    echo "                  ";
                    $context["percent"] =  -100;
                    // line 85
                    echo "                ";
                }
                // line 86
                echo "                ";
                if (( !twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true) ||  !twig_get_attribute($this->env, $this->source, (($__internal_7dc3a0a28f55c5f2463e9b46ecafdfeb61e9238ed4d60acf6f7258d1de3c83e1 = ($context["totals"] ?? null)) && is_array($__internal_7dc3a0a28f55c5f2463e9b46ecafdfeb61e9238ed4d60acf6f7258d1de3c83e1) || $__internal_7dc3a0a28f55c5f2463e9b46ecafdfeb61e9238ed4d60acf6f7258d1de3c83e1 instanceof ArrayAccess ? ($__internal_7dc3a0a28f55c5f2463e9b46ecafdfeb61e9238ed4d60acf6f7258d1de3c83e1[twig_get_attribute($this->env, $this->source, (($__internal_8acbbad4b27a786cad00cba65bc04ee7a503f81018370f2b790d4fe79cfeb21d = ($context["periods"] ?? null)) && is_array($__internal_8acbbad4b27a786cad00cba65bc04ee7a503f81018370f2b790d4fe79cfeb21d) || $__internal_8acbbad4b27a786cad00cba65bc04ee7a503f81018370f2b790d4fe79cfeb21d instanceof ArrayAccess ? ($__internal_8acbbad4b27a786cad00cba65bc04ee7a503f81018370f2b790d4fe79cfeb21d[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "impressions", array()))) {
                    // line 87
                    echo "                  ";
                    $context["percent"] = 0;
                    // line 88
                    echo "                ";
                }
                // line 89
                echo "                ";
                if ((((twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["current"] ?? null), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true)) && twig_get_attribute($this->env, $this->source, (($__internal_fbfc01bf158172b44fe031b3ae2f71c474964929dfcc389cc81ef3f55fcb06f0 =                 // line 90
($context["totals"] ?? null)) && is_array($__internal_fbfc01bf158172b44fe031b3ae2f71c474964929dfcc389cc81ef3f55fcb06f0) || $__internal_fbfc01bf158172b44fe031b3ae2f71c474964929dfcc389cc81ef3f55fcb06f0 instanceof ArrayAccess ? ($__internal_fbfc01bf158172b44fe031b3ae2f71c474964929dfcc389cc81ef3f55fcb06f0[twig_get_attribute($this->env, $this->source, (($__internal_c2705d9276f5639c7ab516a5efff892123f6b2bdcf92245c8c3e7a8e7b8e0b4c = ($context["periods"] ?? null)) && is_array($__internal_c2705d9276f5639c7ab516a5efff892123f6b2bdcf92245c8c3e7a8e7b8e0b4c) || $__internal_c2705d9276f5639c7ab516a5efff892123f6b2bdcf92245c8c3e7a8e7b8e0b4c instanceof ArrayAccess ? ($__internal_c2705d9276f5639c7ab516a5efff892123f6b2bdcf92245c8c3e7a8e7b8e0b4c[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "impressions", array())) && twig_get_attribute($this->env, $this->source, (($__internal_4450f16bcd6eee436ec803be9cb8dd13e40acb5f3c668ce291f0476abc1a5b69 = ($context["totals"] ?? null)) && is_array($__internal_4450f16bcd6eee436ec803be9cb8dd13e40acb5f3c668ce291f0476abc1a5b69) || $__internal_4450f16bcd6eee436ec803be9cb8dd13e40acb5f3c668ce291f0476abc1a5b69 instanceof ArrayAccess ? ($__internal_4450f16bcd6eee436ec803be9cb8dd13e40acb5f3c668ce291f0476abc1a5b69[twig_get_attribute($this->env, $this->source, (($__internal_92ed32b8cbedc9f8b5b379c1ef395076f852e6115f19026df86a46e64a8be849 = ($context["periods"] ?? null)) && is_array($__internal_92ed32b8cbedc9f8b5b379c1ef395076f852e6115f19026df86a46e64a8be849) || $__internal_92ed32b8cbedc9f8b5b379c1ef395076f852e6115f19026df86a46e64a8be849 instanceof ArrayAccess ? ($__internal_92ed32b8cbedc9f8b5b379c1ef395076f852e6115f19026df86a46e64a8be849[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "impressions", array()))) {
                    // line 91
                    echo "                  ";
                    $context["percent"] = (((twig_get_attribute($this->env, $this->source, (($__internal_ea7a33ac6d8a26ad47921e376e6221ddcc8585c46ced0d814217a4f86de9974e = ($context["totals"] ?? null)) && is_array($__internal_ea7a33ac6d8a26ad47921e376e6221ddcc8585c46ced0d814217a4f86de9974e) || $__internal_ea7a33ac6d8a26ad47921e376e6221ddcc8585c46ced0d814217a4f86de9974e instanceof ArrayAccess ? ($__internal_ea7a33ac6d8a26ad47921e376e6221ddcc8585c46ced0d814217a4f86de9974e[twig_get_attribute($this->env, $this->source, (($__internal_9522a6cebeae41b694ef7a2cdef578aec938dae7d5acf43b2efd8c4c9bc5dabe = ($context["periods"] ?? null)) && is_array($__internal_9522a6cebeae41b694ef7a2cdef578aec938dae7d5acf43b2efd8c4c9bc5dabe) || $__internal_9522a6cebeae41b694ef7a2cdef578aec938dae7d5acf43b2efd8c4c9bc5dabe instanceof ArrayAccess ? ($__internal_9522a6cebeae41b694ef7a2cdef578aec938dae7d5acf43b2efd8c4c9bc5dabe[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "impressions", array()) / twig_get_attribute($this->env, $this->source, (($__internal_9e736303ccc6dbec54334717fdf66a3c6c7a4ed563e8a9c6a92ccdbb773e19bf = ($context["totals"] ?? null)) && is_array($__internal_9e736303ccc6dbec54334717fdf66a3c6c7a4ed563e8a9c6a92ccdbb773e19bf) || $__internal_9e736303ccc6dbec54334717fdf66a3c6c7a4ed563e8a9c6a92ccdbb773e19bf instanceof ArrayAccess ? ($__internal_9e736303ccc6dbec54334717fdf66a3c6c7a4ed563e8a9c6a92ccdbb773e19bf[twig_get_attribute($this->env, $this->source, (($__internal_8acdbb41833471eddc4b3c5a5c648038762a0ba2347958dbb7f312bec87c3d40 = ($context["periods"] ?? null)) && is_array($__internal_8acdbb41833471eddc4b3c5a5c648038762a0ba2347958dbb7f312bec87c3d40) || $__internal_8acdbb41833471eddc4b3c5a5c648038762a0ba2347958dbb7f312bec87c3d40 instanceof ArrayAccess ? ($__internal_8acdbb41833471eddc4b3c5a5c648038762a0ba2347958dbb7f312bec87c3d40[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "impressions", array())) * 100) - 100);
                    // line 92
                    echo "                ";
                }
                // line 93
                echo "                <h6 id=\"impressions-percent\" class=\"";
                echo (((($context["percent"] ?? null) > 0)) ? ("text-success") : ((((($context["percent"] ?? null) == 0)) ? ("text-warning") : ("text-danger"))));
                echo "\">
                  <i class=\"fa ";
                // line 94
                echo (((($context["percent"] ?? null) > 0)) ? ("fa-arrow-up") : ((((($context["percent"] ?? null) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
                echo "\"></i><span>&nbsp;";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["percent"] ?? null), 1), "html", null, true);
                echo "%</span>
                </h6>
              </div>
          </div>
          <!-- Clicks -->
          <div class=\"row\">
              <div class=\"col-md-6\">
                <img src=\"/assets/images/paid_ads/clicks.png\" width=\"75\" height=\"75\">
              </div>
              <div class=\"col-md-6\">
                <p class=\"text-secondary h4 font-weight-light mb-0\">Clicks</p>
                <h2 class=\"mb-0\" id=\"clicks-count\">";
                // line 105
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_0668ed57f15eabeed8d9c4a45059ac93dfae05f7fa406a2dc49ae0ccb4f55bad = ($context["totals"] ?? null)) && is_array($__internal_0668ed57f15eabeed8d9c4a45059ac93dfae05f7fa406a2dc49ae0ccb4f55bad) || $__internal_0668ed57f15eabeed8d9c4a45059ac93dfae05f7fa406a2dc49ae0ccb4f55bad instanceof ArrayAccess ? ($__internal_0668ed57f15eabeed8d9c4a45059ac93dfae05f7fa406a2dc49ae0ccb4f55bad[twig_get_attribute($this->env, $this->source, (($__internal_e13139c4be4e2ff1c777544a2594638fcc3ca4c2221fe00c2149da0ddd1cc323 = ($context["periods"] ?? null)) && is_array($__internal_e13139c4be4e2ff1c777544a2594638fcc3ca4c2221fe00c2149da0ddd1cc323) || $__internal_e13139c4be4e2ff1c777544a2594638fcc3ca4c2221fe00c2149da0ddd1cc323 instanceof ArrayAccess ? ($__internal_e13139c4be4e2ff1c777544a2594638fcc3ca4c2221fe00c2149da0ddd1cc323[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "clicks", array()), "html", null, true);
                echo "</h2>
                ";
                // line 106
                if ( !twig_get_attribute($this->env, $this->source, (($__internal_abb62d7ada56c0cfc1a0dee78771b583349487dffc67903f3895606a65c3577c = ($context["totals"] ?? null)) && is_array($__internal_abb62d7ada56c0cfc1a0dee78771b583349487dffc67903f3895606a65c3577c) || $__internal_abb62d7ada56c0cfc1a0dee78771b583349487dffc67903f3895606a65c3577c instanceof ArrayAccess ? ($__internal_abb62d7ada56c0cfc1a0dee78771b583349487dffc67903f3895606a65c3577c[twig_get_attribute($this->env, $this->source, (($__internal_c0905adf98cd1533a675c4106b3846093815c41a83169ae22d4b915e0fcb70c3 = ($context["periods"] ?? null)) && is_array($__internal_c0905adf98cd1533a675c4106b3846093815c41a83169ae22d4b915e0fcb70c3) || $__internal_c0905adf98cd1533a675c4106b3846093815c41a83169ae22d4b915e0fcb70c3 instanceof ArrayAccess ? ($__internal_c0905adf98cd1533a675c4106b3846093815c41a83169ae22d4b915e0fcb70c3[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "clicks", array())) {
                    // line 107
                    echo "                  ";
                    $context["percent"] =  -100;
                    // line 108
                    echo "                ";
                }
                // line 109
                echo "                ";
                if (( !twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true) ||  !twig_get_attribute($this->env, $this->source, (($__internal_ec4b59f7be5e729f308b6e48c4483f79749dedb9a482762b64ba149aecfac14b = ($context["totals"] ?? null)) && is_array($__internal_ec4b59f7be5e729f308b6e48c4483f79749dedb9a482762b64ba149aecfac14b) || $__internal_ec4b59f7be5e729f308b6e48c4483f79749dedb9a482762b64ba149aecfac14b instanceof ArrayAccess ? ($__internal_ec4b59f7be5e729f308b6e48c4483f79749dedb9a482762b64ba149aecfac14b[twig_get_attribute($this->env, $this->source, (($__internal_4abb1b337c0ef25ef376bdea173e8ce13160d926e1bcb921fd263a0c3744dc8f = ($context["periods"] ?? null)) && is_array($__internal_4abb1b337c0ef25ef376bdea173e8ce13160d926e1bcb921fd263a0c3744dc8f) || $__internal_4abb1b337c0ef25ef376bdea173e8ce13160d926e1bcb921fd263a0c3744dc8f instanceof ArrayAccess ? ($__internal_4abb1b337c0ef25ef376bdea173e8ce13160d926e1bcb921fd263a0c3744dc8f[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "clicks", array()))) {
                    // line 110
                    echo "                  ";
                    $context["percent"] = 0;
                    // line 111
                    echo "                ";
                }
                // line 112
                echo "                ";
                if ((((twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["current"] ?? null), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true)) && twig_get_attribute($this->env, $this->source, (($__internal_1f87e440d7b5ac0d3821fd704a87cfd009d5f0cfaa151c63b53e5d2f3e117b47 =                 // line 113
($context["totals"] ?? null)) && is_array($__internal_1f87e440d7b5ac0d3821fd704a87cfd009d5f0cfaa151c63b53e5d2f3e117b47) || $__internal_1f87e440d7b5ac0d3821fd704a87cfd009d5f0cfaa151c63b53e5d2f3e117b47 instanceof ArrayAccess ? ($__internal_1f87e440d7b5ac0d3821fd704a87cfd009d5f0cfaa151c63b53e5d2f3e117b47[twig_get_attribute($this->env, $this->source, (($__internal_5f0601c6aca043f0871c692399d8a4b50f756908e693f6dc8217a09ebec49d63 = ($context["periods"] ?? null)) && is_array($__internal_5f0601c6aca043f0871c692399d8a4b50f756908e693f6dc8217a09ebec49d63) || $__internal_5f0601c6aca043f0871c692399d8a4b50f756908e693f6dc8217a09ebec49d63 instanceof ArrayAccess ? ($__internal_5f0601c6aca043f0871c692399d8a4b50f756908e693f6dc8217a09ebec49d63[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "clicks", array())) && twig_get_attribute($this->env, $this->source, (($__internal_2ca27bbf98b4159f4f59a7748003a9c780384782aa02798832bfdb1e4413f68c = ($context["totals"] ?? null)) && is_array($__internal_2ca27bbf98b4159f4f59a7748003a9c780384782aa02798832bfdb1e4413f68c) || $__internal_2ca27bbf98b4159f4f59a7748003a9c780384782aa02798832bfdb1e4413f68c instanceof ArrayAccess ? ($__internal_2ca27bbf98b4159f4f59a7748003a9c780384782aa02798832bfdb1e4413f68c[twig_get_attribute($this->env, $this->source, (($__internal_76fb338ba58f80d23455c79f0abb5764e150448d58ab4aec9c47558465bff0b8 = ($context["periods"] ?? null)) && is_array($__internal_76fb338ba58f80d23455c79f0abb5764e150448d58ab4aec9c47558465bff0b8) || $__internal_76fb338ba58f80d23455c79f0abb5764e150448d58ab4aec9c47558465bff0b8 instanceof ArrayAccess ? ($__internal_76fb338ba58f80d23455c79f0abb5764e150448d58ab4aec9c47558465bff0b8[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "clicks", array()))) {
                    // line 114
                    echo "                  ";
                    $context["percent"] = (((twig_get_attribute($this->env, $this->source, (($__internal_63f73f0dc37a3f090f2879710955e3129a524d5e1461c1d27648aa08f83349f9 = ($context["totals"] ?? null)) && is_array($__internal_63f73f0dc37a3f090f2879710955e3129a524d5e1461c1d27648aa08f83349f9) || $__internal_63f73f0dc37a3f090f2879710955e3129a524d5e1461c1d27648aa08f83349f9 instanceof ArrayAccess ? ($__internal_63f73f0dc37a3f090f2879710955e3129a524d5e1461c1d27648aa08f83349f9[twig_get_attribute($this->env, $this->source, (($__internal_ee6f5eb48ecbf75fb04eb4b2c7995d0eec850c575001fd8d9630e7a478f36fb7 = ($context["periods"] ?? null)) && is_array($__internal_ee6f5eb48ecbf75fb04eb4b2c7995d0eec850c575001fd8d9630e7a478f36fb7) || $__internal_ee6f5eb48ecbf75fb04eb4b2c7995d0eec850c575001fd8d9630e7a478f36fb7 instanceof ArrayAccess ? ($__internal_ee6f5eb48ecbf75fb04eb4b2c7995d0eec850c575001fd8d9630e7a478f36fb7[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "clicks", array()) / twig_get_attribute($this->env, $this->source, (($__internal_77af6e16e7409de2d04b8ff1737ff0494a0d4416ab4470927b19e8c18449b0d6 = ($context["totals"] ?? null)) && is_array($__internal_77af6e16e7409de2d04b8ff1737ff0494a0d4416ab4470927b19e8c18449b0d6) || $__internal_77af6e16e7409de2d04b8ff1737ff0494a0d4416ab4470927b19e8c18449b0d6 instanceof ArrayAccess ? ($__internal_77af6e16e7409de2d04b8ff1737ff0494a0d4416ab4470927b19e8c18449b0d6[twig_get_attribute($this->env, $this->source, (($__internal_21a7ab6cfaa4777b496f234972e3a437102bfda4972492e3e4ebd25921b49fca = ($context["periods"] ?? null)) && is_array($__internal_21a7ab6cfaa4777b496f234972e3a437102bfda4972492e3e4ebd25921b49fca) || $__internal_21a7ab6cfaa4777b496f234972e3a437102bfda4972492e3e4ebd25921b49fca instanceof ArrayAccess ? ($__internal_21a7ab6cfaa4777b496f234972e3a437102bfda4972492e3e4ebd25921b49fca[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "clicks", array())) * 100) - 100);
                    // line 115
                    echo "                ";
                }
                // line 116
                echo "                <h6 id=\"clicks-percent\" class=\"";
                echo (((($context["percent"] ?? null) > 0)) ? ("text-success") : ((((($context["percent"] ?? null) == 0)) ? ("text-warning") : ("text-danger"))));
                echo "\">
                  <i class=\"fa ";
                // line 117
                echo (((($context["percent"] ?? null) > 0)) ? ("fa-arrow-up") : ((((($context["percent"] ?? null) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
                echo "\"></i><span>&nbsp;";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["percent"] ?? null), 1), "html", null, true);
                echo "%</span>
                </h6>
              </div>
          </div>
          <!-- Conversions -->
          <div class=\"row\">
              <div class=\"col-md-6\">
                <img src=\"/assets/images/paid_ads/conversions.png\" width=\"75\" height=\"75\">
              </div>
              <div class=\"col-md-6\">
                <p class=\"text-secondary h4 font-weight-light mb-0\">Conversions</p>
                <h2 class=\"mb-0\" id=\"conversions-count\">";
                // line 128
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_5b22c47bf69a7c58f9441235c68752cfde2c3566ac2df8c7c449610a0de4a42b = ($context["totals"] ?? null)) && is_array($__internal_5b22c47bf69a7c58f9441235c68752cfde2c3566ac2df8c7c449610a0de4a42b) || $__internal_5b22c47bf69a7c58f9441235c68752cfde2c3566ac2df8c7c449610a0de4a42b instanceof ArrayAccess ? ($__internal_5b22c47bf69a7c58f9441235c68752cfde2c3566ac2df8c7c449610a0de4a42b[twig_get_attribute($this->env, $this->source, (($__internal_07434facb388bc291c6ac048cf590692daf8842ec4451c9383f47ec378036642 = ($context["periods"] ?? null)) && is_array($__internal_07434facb388bc291c6ac048cf590692daf8842ec4451c9383f47ec378036642) || $__internal_07434facb388bc291c6ac048cf590692daf8842ec4451c9383f47ec378036642 instanceof ArrayAccess ? ($__internal_07434facb388bc291c6ac048cf590692daf8842ec4451c9383f47ec378036642[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "conversions", array()), "html", null, true);
                echo "</h2>
                ";
                // line 129
                if ( !twig_get_attribute($this->env, $this->source, (($__internal_2c9253d871b0d69e25a57011dd780abf88e92dcba4b36f70af4717cd81e15333 = ($context["totals"] ?? null)) && is_array($__internal_2c9253d871b0d69e25a57011dd780abf88e92dcba4b36f70af4717cd81e15333) || $__internal_2c9253d871b0d69e25a57011dd780abf88e92dcba4b36f70af4717cd81e15333 instanceof ArrayAccess ? ($__internal_2c9253d871b0d69e25a57011dd780abf88e92dcba4b36f70af4717cd81e15333[twig_get_attribute($this->env, $this->source, (($__internal_061dccfb25fdf2e8c86df832785bce8036d6b7154e5456c6bad32ae413349923 = ($context["periods"] ?? null)) && is_array($__internal_061dccfb25fdf2e8c86df832785bce8036d6b7154e5456c6bad32ae413349923) || $__internal_061dccfb25fdf2e8c86df832785bce8036d6b7154e5456c6bad32ae413349923 instanceof ArrayAccess ? ($__internal_061dccfb25fdf2e8c86df832785bce8036d6b7154e5456c6bad32ae413349923[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "conversions", array())) {
                    // line 130
                    echo "                  ";
                    $context["percent"] =  -100;
                    // line 131
                    echo "                ";
                }
                // line 132
                echo "                ";
                if (( !twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true) ||  !twig_get_attribute($this->env, $this->source, (($__internal_0afc03374acd15e85d1311fdbd190736569aaa1f2e1936730ea3993f463bdd9e = ($context["totals"] ?? null)) && is_array($__internal_0afc03374acd15e85d1311fdbd190736569aaa1f2e1936730ea3993f463bdd9e) || $__internal_0afc03374acd15e85d1311fdbd190736569aaa1f2e1936730ea3993f463bdd9e instanceof ArrayAccess ? ($__internal_0afc03374acd15e85d1311fdbd190736569aaa1f2e1936730ea3993f463bdd9e[twig_get_attribute($this->env, $this->source, (($__internal_e63c8ce4e34b45529c9c2166e26c2c8fbc432f7a854c225f59f58e296df9b646 = ($context["periods"] ?? null)) && is_array($__internal_e63c8ce4e34b45529c9c2166e26c2c8fbc432f7a854c225f59f58e296df9b646) || $__internal_e63c8ce4e34b45529c9c2166e26c2c8fbc432f7a854c225f59f58e296df9b646 instanceof ArrayAccess ? ($__internal_e63c8ce4e34b45529c9c2166e26c2c8fbc432f7a854c225f59f58e296df9b646[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "conversions", array()))) {
                    // line 133
                    echo "                  ";
                    $context["percent"] = 0;
                    // line 134
                    echo "                ";
                }
                // line 135
                echo "                ";
                if ((((twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["current"] ?? null), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, ($context["periods"] ?? null), ($context["previous"] ?? null), array(), "array", true, true)) && twig_get_attribute($this->env, $this->source, (($__internal_2ece1c3e1f50bca9244dd4c555dec7da811cc2cf5534f2c877fb41db9cf7c2f3 =                 // line 136
($context["totals"] ?? null)) && is_array($__internal_2ece1c3e1f50bca9244dd4c555dec7da811cc2cf5534f2c877fb41db9cf7c2f3) || $__internal_2ece1c3e1f50bca9244dd4c555dec7da811cc2cf5534f2c877fb41db9cf7c2f3 instanceof ArrayAccess ? ($__internal_2ece1c3e1f50bca9244dd4c555dec7da811cc2cf5534f2c877fb41db9cf7c2f3[twig_get_attribute($this->env, $this->source, (($__internal_2a85c9614fea73f24b66b1cb5423773b4b3db33a1d88c103663819b36ebdb427 = ($context["periods"] ?? null)) && is_array($__internal_2a85c9614fea73f24b66b1cb5423773b4b3db33a1d88c103663819b36ebdb427) || $__internal_2a85c9614fea73f24b66b1cb5423773b4b3db33a1d88c103663819b36ebdb427 instanceof ArrayAccess ? ($__internal_2a85c9614fea73f24b66b1cb5423773b4b3db33a1d88c103663819b36ebdb427[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "conversions", array())) && twig_get_attribute($this->env, $this->source, (($__internal_6b8cb62d8575f82b44644a8959c5aad7457537f62b3f95fc5564d4571b201f1f = ($context["totals"] ?? null)) && is_array($__internal_6b8cb62d8575f82b44644a8959c5aad7457537f62b3f95fc5564d4571b201f1f) || $__internal_6b8cb62d8575f82b44644a8959c5aad7457537f62b3f95fc5564d4571b201f1f instanceof ArrayAccess ? ($__internal_6b8cb62d8575f82b44644a8959c5aad7457537f62b3f95fc5564d4571b201f1f[twig_get_attribute($this->env, $this->source, (($__internal_21e652934f7cae41b4b91555f7968af6aaced7c293174aa09edcf77c2b65ce79 = ($context["periods"] ?? null)) && is_array($__internal_21e652934f7cae41b4b91555f7968af6aaced7c293174aa09edcf77c2b65ce79) || $__internal_21e652934f7cae41b4b91555f7968af6aaced7c293174aa09edcf77c2b65ce79 instanceof ArrayAccess ? ($__internal_21e652934f7cae41b4b91555f7968af6aaced7c293174aa09edcf77c2b65ce79[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "conversions", array()))) {
                    // line 137
                    echo "                  ";
                    $context["percent"] = (((twig_get_attribute($this->env, $this->source, (($__internal_38786113ede825133e0c0c459886851df8e13425ff8ed8deba84858f5bfcee48 = ($context["totals"] ?? null)) && is_array($__internal_38786113ede825133e0c0c459886851df8e13425ff8ed8deba84858f5bfcee48) || $__internal_38786113ede825133e0c0c459886851df8e13425ff8ed8deba84858f5bfcee48 instanceof ArrayAccess ? ($__internal_38786113ede825133e0c0c459886851df8e13425ff8ed8deba84858f5bfcee48[twig_get_attribute($this->env, $this->source, (($__internal_b300990ac10db04573b0d13f9c4f5d0839a2051e80d4665727ee9f108a42e497 = ($context["periods"] ?? null)) && is_array($__internal_b300990ac10db04573b0d13f9c4f5d0839a2051e80d4665727ee9f108a42e497) || $__internal_b300990ac10db04573b0d13f9c4f5d0839a2051e80d4665727ee9f108a42e497 instanceof ArrayAccess ? ($__internal_b300990ac10db04573b0d13f9c4f5d0839a2051e80d4665727ee9f108a42e497[($context["current"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "conversions", array()) / twig_get_attribute($this->env, $this->source, (($__internal_4790ce43a59a024be760c8754d57cb4d0dee400b0bd854e4fc1ea0c99930e776 = ($context["totals"] ?? null)) && is_array($__internal_4790ce43a59a024be760c8754d57cb4d0dee400b0bd854e4fc1ea0c99930e776) || $__internal_4790ce43a59a024be760c8754d57cb4d0dee400b0bd854e4fc1ea0c99930e776 instanceof ArrayAccess ? ($__internal_4790ce43a59a024be760c8754d57cb4d0dee400b0bd854e4fc1ea0c99930e776[twig_get_attribute($this->env, $this->source, (($__internal_76f1e304d8fe1536a815be93e2e7330863cec351a71136eed8be1a3f6c4c82ee = ($context["periods"] ?? null)) && is_array($__internal_76f1e304d8fe1536a815be93e2e7330863cec351a71136eed8be1a3f6c4c82ee) || $__internal_76f1e304d8fe1536a815be93e2e7330863cec351a71136eed8be1a3f6c4c82ee instanceof ArrayAccess ? ($__internal_76f1e304d8fe1536a815be93e2e7330863cec351a71136eed8be1a3f6c4c82ee[($context["previous"] ?? null)] ?? null) : null), "start", array())] ?? null) : null), "conversions", array())) * 100) - 100);
                    // line 138
                    echo "                ";
                }
                // line 139
                echo "                <h6 id=\"conversions-percent\" class=\"";
                echo (((($context["percent"] ?? null) > 0)) ? ("text-success") : ((((($context["percent"] ?? null) == 0)) ? ("text-warning") : ("text-danger"))));
                echo "\">
                  <i class=\"fa ";
                // line 140
                echo (((($context["percent"] ?? null) > 0)) ? ("fa-arrow-up") : ((((($context["percent"] ?? null) == 0)) ? ("fa-arrows-alt-h") : ("fa-arrow-down"))));
                echo "\"></i><span>&nbsp;";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["percent"] ?? null), 1), "html", null, true);
                echo "%</span>
                </h6>
              </div>
          </div>
        </div>
        <div class=\"col-sm-8\">
          <canvas id=\"ppc-chart\" width=\"400\" height=\"300\"></canvas>
        </div>
      </div>
    ";
            } else {
                // line 150
                echo "      <div class=\"alert alert-danger\">Sorry, there is not enough data to display.</div>
    ";
            }
            // line 152
            echo "  ";
        }
    }

    // line 155
    public function block_footer_scripts($context, array $blocks = array())
    {
        // line 156
        echo "  ";
        $this->displayParentBlock("footer_scripts", $context, $blocks);
        echo "
  ";
        // line 157
        if (((( !($context["forbidden"] ?? null) && ($context["periods"] ?? null)) && ($context["totals"] ?? null)) && ($context["counts"] ?? null))) {
            // line 158
            echo "  <script>
    var totals  = ";
            // line 159
            echo json_encode(($context["totals"] ?? null));
            echo ";
    var counts  = ";
            // line 160
            echo json_encode(($context["counts"] ?? null));
            echo ";
    var periods = ";
            // line 161
            echo json_encode(($context["periods"] ?? null));
            echo ";
  </script>
  <script src=\"/assets/js/Chart.bundle.min.js\"></script>
  <script src=\"/assets/js/paid-ads/ppc-chart.js\"></script>
  <script src=\"/assets/js/paid-ads/index.js\"></script>
  ";
        } else {
            // line 167
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
        return "Dealers/paid_ads/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  390 => 167,  381 => 161,  377 => 160,  373 => 159,  370 => 158,  368 => 157,  363 => 156,  360 => 155,  355 => 152,  351 => 150,  336 => 140,  331 => 139,  328 => 138,  325 => 137,  323 => 136,  321 => 135,  318 => 134,  315 => 133,  312 => 132,  309 => 131,  306 => 130,  304 => 129,  300 => 128,  284 => 117,  279 => 116,  276 => 115,  273 => 114,  271 => 113,  269 => 112,  266 => 111,  263 => 110,  260 => 109,  257 => 108,  254 => 107,  252 => 106,  248 => 105,  232 => 94,  227 => 93,  224 => 92,  221 => 91,  219 => 90,  217 => 89,  214 => 88,  211 => 87,  208 => 86,  205 => 85,  202 => 84,  200 => 83,  196 => 82,  180 => 71,  175 => 70,  172 => 69,  169 => 68,  167 => 67,  165 => 66,  162 => 65,  159 => 64,  156 => 63,  153 => 62,  150 => 61,  148 => 60,  144 => 59,  135 => 52,  132 => 51,  130 => 50,  122 => 44,  111 => 41,  107 => 40,  104 => 39,  100 => 38,  92 => 35,  86 => 31,  84 => 30,  81 => 29,  72 => 23,  55 => 8,  52 => 7,  49 => 6,  44 => 4,  41 => 3,  35 => 2,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/paid_ads/index.twig", "/home/dealerportal/public_html/app/Views/Dealers/paid_ads/index.twig");
    }
}
