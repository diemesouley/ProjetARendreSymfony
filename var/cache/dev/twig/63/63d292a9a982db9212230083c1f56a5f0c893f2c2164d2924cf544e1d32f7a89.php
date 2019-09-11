<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* compte_partenaire/show.html.twig */
class __TwigTemplate_e890e1ad5622c97a439c0c8da7e04851b52865f9d917f3ce5fba2e5cd0f4a10e extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "compte_partenaire/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "compte_partenaire/show.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "ComptePartenaire";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <h1>ComptePartenaire</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["compte_partenaire"]) || array_key_exists("compte_partenaire", $context) ? $context["compte_partenaire"] : (function () { throw new RuntimeError('Variable "compte_partenaire" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>NumCompte</th>
                <td>";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["compte_partenaire"]) || array_key_exists("compte_partenaire", $context) ? $context["compte_partenaire"] : (function () { throw new RuntimeError('Variable "compte_partenaire" does not exist.', 16, $this->source); })()), "numCompte", [], "any", false, false, false, 16), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>SoldeCompte</th>
                <td>";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["compte_partenaire"]) || array_key_exists("compte_partenaire", $context) ? $context["compte_partenaire"] : (function () { throw new RuntimeError('Variable "compte_partenaire" does not exist.', 20, $this->source); })()), "soldeCompte", [], "any", false, false, false, 20), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>DateCreation</th>
                <td>";
        // line 24
        ((twig_get_attribute($this->env, $this->source, (isset($context["compte_partenaire"]) || array_key_exists("compte_partenaire", $context) ? $context["compte_partenaire"] : (function () { throw new RuntimeError('Variable "compte_partenaire" does not exist.', 24, $this->source); })()), "dateCreation", [], "any", false, false, false, 24)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["compte_partenaire"]) || array_key_exists("compte_partenaire", $context) ? $context["compte_partenaire"] : (function () { throw new RuntimeError('Variable "compte_partenaire" does not exist.', 24, $this->source); })()), "dateCreation", [], "any", false, false, false, 24), "Y-m-d"), "html", null, true))) : (print ("")));
        echo "</td>
            </tr>
        </tbody>
    </table>

    <a href=\"";
        // line 29
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("compte_partenaire_index");
        echo "\">back to list</a>

    <a href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("compte_partenaire_edit", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["compte_partenaire"]) || array_key_exists("compte_partenaire", $context) ? $context["compte_partenaire"] : (function () { throw new RuntimeError('Variable "compte_partenaire" does not exist.', 31, $this->source); })()), "id", [], "any", false, false, false, 31)]), "html", null, true);
        echo "\">edit</a>

    ";
        // line 33
        echo twig_include($this->env, $context, "compte_partenaire/_delete_form.html.twig");
        echo "
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "compte_partenaire/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 33,  115 => 31,  110 => 29,  102 => 24,  95 => 20,  88 => 16,  81 => 12,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}ComptePartenaire{% endblock %}

{% block body %}
    <h1>ComptePartenaire</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ compte_partenaire.id }}</td>
            </tr>
            <tr>
                <th>NumCompte</th>
                <td>{{ compte_partenaire.numCompte }}</td>
            </tr>
            <tr>
                <th>SoldeCompte</th>
                <td>{{ compte_partenaire.soldeCompte }}</td>
            </tr>
            <tr>
                <th>DateCreation</th>
                <td>{{ compte_partenaire.dateCreation ? compte_partenaire.dateCreation|date('Y-m-d') : '' }}</td>
            </tr>
        </tbody>
    </table>

    <a href=\"{{ path('compte_partenaire_index') }}\">back to list</a>

    <a href=\"{{ path('compte_partenaire_edit', {'id': compte_partenaire.id}) }}\">edit</a>

    {{ include('compte_partenaire/_delete_form.html.twig') }}
{% endblock %}
", "compte_partenaire/show.html.twig", "/home/souleymane/Bureau/monWari/samaWari/templates/compte_partenaire/show.html.twig");
    }
}
