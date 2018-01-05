{% extends 'templates/default.php' %} 
{% block title %}Recover Password{% endblock %}
{% block content %}
    <h5>Enter your email address to recover your password.</h5>
    <br />
    <form action="{{ urlFor('password.recover.post') }}" method="post" autocomplete="off">
        <div class="col-md-4">
           
            <div class="form-group row">
                <input type="text" name="email" id="email" class="form-control" placeholder="Email" {% if request.post('email') %}  value="{{ request.post('email') }}" {% endif %} >
                <i class="fa fa-envelope"></i>
            </div>{% if errors.has('email') %} {{ errors.first('email') }} {% endif %}
             
        </div>
        <div class="login-do">
                <label class="hvr-shutter-in-horizontal login-sub">
                    <input type="submit"  class="btn btn-primary" value="Request reset">
                </label>
            </div>
            <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
             <div class="clearfix"> </div>
    </form>
{% endblock %}