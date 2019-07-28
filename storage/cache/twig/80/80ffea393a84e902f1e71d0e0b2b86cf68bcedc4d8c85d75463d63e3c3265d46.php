<?php

/* Dealers/company-profile/social-media.twig */
class __TwigTemplate_60c2283e2b38820384027cb1a2b53ca7399d4b06fbc075d73ad87a8f9c6b12a4 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h5 class=\"text-uppercase\">Social Media</h5>
<p>Please enter the URLs for the Social Media accounts you currently use for your business.</p>
";
        // line 3
        $this->loadTemplate("Dealers/partials/errors.twig", "Dealers/company-profile/social-media.twig", 3)->display($context);
        // line 4
        echo "<form action=\"/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["social_media"] ?? null), "action", array()), "html", null, true);
        echo "\" method=\"POST\" id=\"social-media-form\" class=\"needs-validation\" novalidate>
  <input type=\"hidden\" name=\"company_id\" value=\"";
        // line 5
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array())) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "id", array()), "html", null, true);
        }
        echo "\">
  ";
        // line 6
        if (twig_get_attribute($this->env, $this->source, ($context["social_media"] ?? null), "social_media", array(), "any", true, true)) {
            // line 7
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["social_media"] ?? null), "social_media", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["media"]) {
                // line 8
                echo "      <div class=\"form-group row ";
                if (twig_get_attribute($this->env, $this->source, $context["media"], "has_login", array())) {
                    echo "mb-5";
                }
                echo "\">
        <div class=\"col-3 col-sm-1 ";
                // line 9
                if ( !twig_get_attribute($this->env, $this->source, $context["media"], "has_login", array())) {
                    echo "mb-3";
                }
                echo "\">
          <img src=\"/assets/images/social_media/";
                // line 10
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["media"], "name", array()), "html", null, true);
                echo ".png\" alt=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["media"], "title", array()), "html", null, true);
                echo "\" width=\"50\">
        </div>
        <div class=\"col-9 col-sm-3 ";
                // line 12
                if ( !twig_get_attribute($this->env, $this->source, $context["media"], "has_login", array())) {
                    echo "mb-3";
                }
                echo " d-flex align-self-center\">
          <h6 class=\"mb-0\">";
                // line 13
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["media"], "title", array()), "html", null, true);
                echo "</h6>
        </div>
        <div class=\"col-12 col-sm-8\">
          <input type=\"text\" name=\"social_media[";
                // line 16
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["media"], "id", array()), "html", null, true);
                echo "]\"
            class=\"form-control ";
                // line 17
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "social_media", array(), "any", false, true), twig_get_attribute($this->env, $this->source, $context["media"], "name", array()), array(), "array", true, true)) {
                    echo "is-invalid";
                }
                echo "\"
            maxlength=\"";
                // line 18
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 = twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "social_media", array())) && is_array($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5) || $__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5 instanceof ArrayAccess ? ($__internal_7cd7461123377b8c9c1b6a01f46c7bbd94bd12e59266005df5e93029ddbc0ec5[twig_get_attribute($this->env, $this->source, $context["media"], "name", array())] ?? null) : null), "max_length", array()), "html", null, true);
                echo "\"
            value=\"";
                // line 19
                if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "social_media", array(), "any", false, true), twig_get_attribute($this->env, $this->source, $context["media"], "id", array()), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
                    echo twig_escape_filter($this->env, (($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "social_media", array())) && is_array($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a) || $__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a instanceof ArrayAccess ? ($__internal_3e28b7f596c58d7729642bcf2acc6efc894803703bf5fa7e74cd8d2aa1f8c68a[twig_get_attribute($this->env, $this->source, $context["media"], "id", array())] ?? null) : null), "html", null, true);
                } else {
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["social_media"] ?? null), "data", array(), "any", false, true), "social_media", array(), "any", false, true), twig_get_attribute($this->env, $this->source, $context["media"], "id", array()), array(), "array", true, true)) {
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["social_media"] ?? null), "data", array()), "social_media", array())) && is_array($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57) || $__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57 instanceof ArrayAccess ? ($__internal_b0b3d6199cdf4d15a08b3fb98fe017ecb01164300193d18d78027218d843fc57[twig_get_attribute($this->env, $this->source, $context["media"], "id", array())] ?? null) : null), "url", array()), "html", null, true);
                    }
                }
                echo "\">
          ";
                // line 20
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "social_media", array(), "any", false, true), twig_get_attribute($this->env, $this->source, $context["media"], "name", array()), array(), "array", true, true)) {
                    // line 21
                    echo "            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "social_media", array())) && is_array($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9) || $__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9 instanceof ArrayAccess ? ($__internal_81ccf322d0988ca0aa9ae9943d772c435c5ff01fb50b956278e245e40ae66ab9[twig_get_attribute($this->env, $this->source, $context["media"], "name", array())] ?? null) : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                        // line 22
                        echo "              <div class=\"invalid-feedback\">";
                        echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                        echo "</div>
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 24
                    echo "          ";
                }
                // line 25
                echo "        </div>
        ";
                // line 26
                if (twig_get_attribute($this->env, $this->source, $context["media"], "has_login", array())) {
                    // line 27
                    echo "        <!--<div class=\"row\">-->
          <div class=\"col-sm-4\">&nbsp;</div>
          <div class=\"col-sm-4\">
            <label for=\"";
                    // line 30
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["media"], "name", array()), "html", null, true);
                    echo "-username-input\">Username</label>
            <input type=\"text\" name=\"social_media_username[";
                    // line 31
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["media"], "id", array()), "html", null, true);
                    echo "]\"
              id=\"";
                    // line 32
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["media"], "name", array()), "html", null, true);
                    echo "-username-input\"
              class=\"form-control ";
                    // line 33
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "social_media_username", array(), "any", false, true), twig_get_attribute($this->env, $this->source, $context["media"], "name", array()), array(), "array", true, true)) {
                        echo "is-invalid";
                    }
                    echo "\"
              maxlength=\"";
                    // line 34
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 = twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "social_media_username", array())) && is_array($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217) || $__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217 instanceof ArrayAccess ? ($__internal_add9db1f328aaed12ef1a33890510da978cc9cf3e50f6769d368473a9c90c217[twig_get_attribute($this->env, $this->source, $context["media"], "name", array())] ?? null) : null), "max_length", array()), "html", null, true);
                    echo "\"
              value=\"";
                    // line 35
                    if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "social_media_username", array(), "any", false, true), twig_get_attribute($this->env, $this->source, $context["media"], "id", array()), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
                        echo twig_escape_filter($this->env, (($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "social_media_username", array())) && is_array($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105) || $__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105 instanceof ArrayAccess ? ($__internal_128c19eb75d89ae9acc1294da2e091b433005202cb9b9351ea0c5dd5f69ee105[twig_get_attribute($this->env, $this->source, $context["media"], "id", array())] ?? null) : null), "html", null, true);
                    } else {
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["social_media"] ?? null), "data", array(), "any", false, true), "social_media", array(), "any", false, true), twig_get_attribute($this->env, $this->source, $context["media"], "id", array()), array(), "array", false, true), "username", array(), "any", true, true)) {
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["social_media"] ?? null), "data", array()), "social_media", array())) && is_array($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779) || $__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779 instanceof ArrayAccess ? ($__internal_921de08f973aabd87ecb31654784e2efda7404f12bd27e8e56991608c76e7779[twig_get_attribute($this->env, $this->source, $context["media"], "id", array())] ?? null) : null), "username", array()), "html", null, true);
                        }
                    }
                    echo "\">
            ";
                    // line 36
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "social_media_username", array(), "any", false, true), twig_get_attribute($this->env, $this->source, $context["media"], "name", array()), array(), "array", true, true)) {
                        // line 37
                        echo "              ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "social_media_username", array())) && is_array($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1) || $__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1 instanceof ArrayAccess ? ($__internal_3e040fa9f9bcf48a8b054d0953f4fffdaf331dc44bc1d96f1bb45abb085e61d1[twig_get_attribute($this->env, $this->source, $context["media"], "name", array())] ?? null) : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                            // line 38
                            echo "                <div class=\"invalid-feedback\">";
                            echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                            echo "</div>
              ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 40
                        echo "            ";
                    }
                    // line 41
                    echo "          </div>
          <div class=\"col-sm-4\">
            <label for=\"";
                    // line 43
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["media"], "name", array()), "html", null, true);
                    echo "-password-input\">Password</label>
            <div class=\"input-group\">
                <div class=\"input-group-prepend\">
                  <button class=\"btn btn-outline-secondary show-password-button\" type=\"button\" data-media=\"";
                    // line 46
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["media"], "name", array()), "html", null, true);
                    echo "\">Show</button>
                </div>
                <input type=\"password\" name=\"social_media_password[";
                    // line 48
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["media"], "id", array()), "html", null, true);
                    echo "]\"
                  id=\"";
                    // line 49
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["media"], "name", array()), "html", null, true);
                    echo "-password-input\"
                  class=\"form-control ";
                    // line 50
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "social_media_password", array(), "any", false, true), twig_get_attribute($this->env, $this->source, $context["media"], "name", array()), array(), "array", true, true)) {
                        echo "is-invalid";
                    }
                    echo "\"
                  maxlength=\"";
                    // line 51
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 = twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "social_media_password", array())) && is_array($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0) || $__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0 instanceof ArrayAccess ? ($__internal_bd1cf16c37e30917ff4f54b7320429bcc2bb63615cd8a735bfe06a3f1b5c82a0[twig_get_attribute($this->env, $this->source, $context["media"], "name", array())] ?? null) : null), "max_length", array()), "html", null, true);
                    echo "\"
                  value=\"";
                    // line 52
                    if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array(), "any", false, true), "social_media_password", array(), "any", false, true), twig_get_attribute($this->env, $this->source, $context["media"], "id", array()), array(), "array", true, true) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "count", array(), "any", true, true)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "count", array()))) {
                        echo twig_escape_filter($this->env, (($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "input", array()), "social_media_password", array())) && is_array($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866) || $__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866 instanceof ArrayAccess ? ($__internal_602f93ae9072ac758dc9cd47ca50516bbc1210f73d2a40b01287f102c3c40866[twig_get_attribute($this->env, $this->source, $context["media"], "id", array())] ?? null) : null), "html", null, true);
                    } else {
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["social_media"] ?? null), "data", array(), "any", false, true), "social_media", array(), "any", false, true), twig_get_attribute($this->env, $this->source, $context["media"], "id", array()), array(), "array", false, true), "password", array(), "any", true, true)) {
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["social_media"] ?? null), "data", array()), "social_media", array())) && is_array($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f) || $__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f instanceof ArrayAccess ? ($__internal_de222b1ef20cf829a938a4545cbb79f4996337944397dd43b1919bce7726ae2f[twig_get_attribute($this->env, $this->source, $context["media"], "id", array())] ?? null) : null), "password", array()), "html", null, true);
                        }
                    }
                    echo "\">
                ";
                    // line 53
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array(), "any", false, true), "social_media_password", array(), "any", false, true), twig_get_attribute($this->env, $this->source, $context["media"], "name", array()), array(), "array", true, true)) {
                        // line 54
                        echo "                  ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["messages"] ?? null), "error", array()), "social_media_password", array())) && is_array($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7) || $__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7 instanceof ArrayAccess ? ($__internal_517751e212021442e58cf8c5cde586337a42455f06659ad64a123ef99fab52e7[twig_get_attribute($this->env, $this->source, $context["media"], "name", array())] ?? null) : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                            // line 55
                            echo "                    <div class=\"invalid-feedback\">";
                            echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                            echo "</div>
                  ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 57
                        echo "                ";
                    }
                    // line 58
                    echo "            </div>
          </div>
        <!--</div>-->
      ";
                }
                // line 62
                echo "      </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['media'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "  ";
        }
        // line 65
        echo "  <div class=\"form-group row\">
    <div class=\"col-sm-12\">
      <input type=\"submit\" class=\"btn btn-md btn-warning\" value=\"Save Changes\">
    </div>
  </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "Dealers/company-profile/social-media.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  261 => 65,  258 => 64,  251 => 62,  245 => 58,  242 => 57,  233 => 55,  228 => 54,  226 => 53,  216 => 52,  212 => 51,  206 => 50,  202 => 49,  198 => 48,  193 => 46,  187 => 43,  183 => 41,  180 => 40,  171 => 38,  166 => 37,  164 => 36,  154 => 35,  150 => 34,  144 => 33,  140 => 32,  136 => 31,  132 => 30,  127 => 27,  125 => 26,  122 => 25,  119 => 24,  110 => 22,  105 => 21,  103 => 20,  93 => 19,  89 => 18,  83 => 17,  79 => 16,  73 => 13,  67 => 12,  60 => 10,  54 => 9,  47 => 8,  42 => 7,  40 => 6,  34 => 5,  29 => 4,  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/company-profile/social-media.twig", "/home/dealerportal/public_html/app/Views/Dealers/company-profile/social-media.twig");
    }
}
