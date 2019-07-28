<?php

/* Dealers/company-profile/company-photos.twig */
class __TwigTemplate_5a2ff6f1b7ff59a95ca78134ed809244c65d79867ae6aa05516669129c451727 extends Twig_Template
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
        echo "<h5 class=\"text-center\">File Upload</h5>
<hr class=\"section-divider\">
";
        // line 3
        $this->loadTemplate("Dealers/partials/errors.twig", "Dealers/company-profile/company-photos.twig", 3)->display($context);
        // line 4
        echo "<form action=\"/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company_photos"] ?? null), "action", array()), "html", null, true);
        echo "\" method=\"POST\" id=\"fileupload\" enctype=\"multipart/form-data\">
  <input type=\"hidden\" name=\"company_id\" value=\"";
        // line 5
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array())) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "id", array()), "html", null, true);
        }
        echo "\">
  <div class=\"row fileupload-buttonbar\">
    <div class=\"col-sm-4\">
        <span class=\"btn fileinput-button\">
            <img src=\"/assets/images/fileupload/button.jpg\" style=\"width: 100%\" alt=\"Drag file here or click to browse\">
            <input type=\"file\" name=\"files[]\" multiple accept=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["fields"] ?? null), "company_photos", array()), "files", array()), "format", array()), "html", null, true);
        echo "\">
        </span>
    </div>
    <div class=\"col-sm-8\">
        <h5>Uploading</h5>
        <p class=\"uploading-files-text\">Company Files is a place for you to upload pertinent files and documents for your business. If we are developing a new website for you, please upload necessary files we have specified from you, here. Additionally, if you are enrolled in marketing services (ie Social Media) this is where you will upload your Business logo, images of your facility, staff etc. for promotional use.</p>
        <table role=\"presentation\" class=\"table\">
            <tbody class=\"files\"></tbody>
        </table>
    </div>
  </div>
</form>
<h5 class=\"text-center\">Uploaded Files</h5>
<hr class=\"section-divider\">
<div class=\"row uploaded-files\">
    ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["company_photos"] ?? null), "data", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["photo"]) {
            // line 26
            echo "      <div class=\"col-6 col-sm-4 text-center uploaded-file\">
        <div class=\"uploaded-file-image\">
          <img src=\"";
            // line 28
            if (((((twig_in_filter(".png", twig_get_attribute($this->env, $this->source, $context["photo"], "filename", array())) || twig_in_filter(".jpg", twig_get_attribute($this->env, $this->source, $context["photo"], "filename", array()))) || twig_in_filter(".jpeg", twig_get_attribute($this->env, $this->source, $context["photo"], "filename", array()))) || twig_in_filter(".gif", twig_get_attribute($this->env, $this->source, $context["photo"], "filename", array()))) || twig_in_filter(".svg", twig_get_attribute($this->env, $this->source, $context["photo"], "filename", array())))) {
                echo "/files/company_photos/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "id", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["photo"], "filename", array()), "html", null, true);
            } else {
                echo "/assets/images/fileupload/default.png";
            }
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["photo"], "filename", array()), "html", null, true);
            echo "\">
        </div>
        <p>";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["photo"], "filename", array()), "html", null, true);
            echo "</p>
        <p><a href=\"/files/company_photos/";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["contact_information"] ?? null), "data", array()), "company", array()), "id", array()), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["photo"], "filename", array()), "html", null, true);
            echo "\" download=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["photo"], "filename", array()), "html", null, true);
            echo "\">download</a> | <a class=\"delete-file-link\" href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["company_photos"] ?? null), "action", array()), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["photo"], "id", array()), "html", null, true);
            echo "\">remove</a></p>
      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['photo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "</div>
<div id=\"blueimp-gallery\" class=\"blueimp-gallery blueimp-gallery-controls\" data-filter=\":even\">
    <div class=\"slides\"></div>
    <h3 class=\"title\"></h3>
    <a class=\"prev\">‹</a>
    <a class=\"next\">›</a>
    <a class=\"close\">×</a>
    <a class=\"play-pause\"></a>
    <ol class=\"indicator\"></ol>
</div>
<script id=\"template-upload\" type=\"text/x-tmpl\">
";
        // line 87
        echo "
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class=\"template-upload fade\">
        <td>
            <span class=\"preview-file\">
                {% if (file.type == 'image/png'
                    || file.type == 'image/jpeg'
                    || file.type == 'image/jpg'
                    || file.type == 'image/gif') { %}
                    <img src=\"/assets/images/fileupload/image.png\" alt=\"image\">
                {% } else if (file.type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                    || file.type == 'application/pdf') { %}
                    <img src=\"/assets/images/fileupload/doc.png\" alt=\"document\">
                {% } else if (file.type == 'video/mp4') { %}
                    <img src=\"/assets/images/fileupload/video.png\" alt=\"video\">
                {% } else { %}
                    <img src=\"/assets/images/fileupload/default.png\" alt=\"default\">
                {% } %}
            </span>
        </td>
        <td>
            <p class=\"name\">{%=file.name%}</p>
            <div class=\"progress progress-striped active\" role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" aria-valuenow=\"0\"><div class=\"progress-bar progress-bar-success\" style=\"width:0%;\"></div></div>
            <div class=\"progress-text\"></div>
            <strong class=\"error badge badge-danger\"></strong>
        </td>
        <td>
            <p class=\"size\">Processing...</p>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class=\"btn btn-primary start\" disabled>
                    <i class=\"glyphicon glyphicon-upload\"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class=\"btn cancel\">&times;</button>
            {% } %}
        </td>
    </tr>
{% } %}
";
        echo "
</script>
<!-- The template to display files available for download -->
<script id=\"template-download\" type=\"text/x-tmpl\">
";
        // line 137
        echo "
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class=\"template-download fade\">
        <td>
            <span class=\"preview\">
                {% if (file.type == 'image/png'
                    || file.type == 'image/jpeg'
                    || file.type == 'image/jpg'
                    || file.type == 'image/gif') { %}
                    <img src=\"/assets/images/fileupload/image.png\" alt=\"image\">
                {% } else if (file.type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                    || file.type == 'application/pdf') { %}
                    <img src=\"/assets/images/fileupload/doc.png\" alt=\"document\">
                {% } else if (file.type == 'video/mp4') { %}
                    <img src=\"/assets/images/fileupload/video.png\" alt=\"video\">
                {% } else { %}
                    <img src=\"/assets/images/fileupload/default.png\" alt=\"default\">
                {% } %}
            </span>
        </td>
        <td>
            <p class=\"name\">
                {% if (file.url) { %}
                    <a href=\"{%=file.url%}\" title=\"{%=file.name%}\" download=\"{%=file.name%}\" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class=\"badge badge-danger\">Error:</span> <small>{%=file.error%}</small></div>
            {% } else { %}
                <div>Complete</div>
            {% } %}
        </td>
        <td>
            <span class=\"size\">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class=\"btn delete\" data-type=\"{%=file.deleteType%}\" data-url=\"{%=file.deleteUrl%}\">&times;</button>
            {% } else { %}
                <button class=\"btn cancel\">&times;</button>
            {% } %}
        </td>
    </tr>
{% } %}
";
        echo "
</script>
";
    }

    public function getTemplateName()
    {
        return "Dealers/company-profile/company-photos.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 137,  118 => 87,  105 => 34,  88 => 31,  84 => 30,  70 => 28,  66 => 26,  62 => 25,  44 => 10,  34 => 5,  29 => 4,  27 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Dealers/company-profile/company-photos.twig", "/home/dealerportal/public_html/app/Views/Dealers/company-profile/company-photos.twig");
    }
}
