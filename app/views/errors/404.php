{% extends 'templates/errors.php' %}

{% block title %}404 Page not found{% endblock %}
{% block style %}about{% endblock %}
{% block content %}

<h4>404</h4>

<h3>Oops! The Page You Are Looking For Was Not Found...</h3>

<a href="{{ urlFor('home')}}"><span>Back to Home</span></a>
{% endblock %}