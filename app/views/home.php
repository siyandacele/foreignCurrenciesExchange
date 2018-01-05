{% extends 'templates/default.php' %}

{% block user %} Welcome {% endblock %}
{% block title %} Welcome{% endblock %}
{% block content %}
<div class="row">


    <div class="col-md-2"></div>
    <div class="col-md-6">
    <form action="{{ urlFor('home.post') }}" method="post">
                <div class="col-md-12">
                    {% if errors.first('email') %} {{ errors.first('email') }} {% endif %}
                     <div class="form-group row">
                        <label for="email" class="col-4 col-form-label">Password</label>
                        <input type="text" class="form-control" name="email" id="email" {% if request.post( 'email') %} value="{{ request.post('email') }}" {% endif %} />
                        {% if errors.first('email') %}<p class="small text-danger">{{ errors.first('email') }}</p>{% endif %}
                    </div> 
                    {% if errors.first('password') %} {{ errors.first('password') }} {% endif %}
                     <div class="form-group row">
                        <label for="password" class="col-4 col-form-label">Password</label>
                       <input type="password" class="form-control" name="password" id="password" {% if request.post( 'password') %} value="{{ request.post('password') }}" {% endif %} />  {% if errors.first('password') %}<p class="small text-danger">{{ errors.first('password') }}</p>{% endif %}
                    </div> 
                </div>
                
                <div class="col-md-6">
                    <a class="news-letter " href="#">
                     <label class="checkbox1"><input type="checkbox" name="remember" id="remember" ><i> </i>Remember</label>
                   </a> 
                </div>
                <div class="col-md-6">
                    <a class="news-letter " href="{{ urlFor('password.recover') }}">
                     Forget your Password?
                   </a> 
                    </div>
              
                 
                <div class="col-md-6 login-do">
                    <label class="hvr-shutter-in-horizontal login-sub">
                        <input type="submit"  class="btn btn-primary" value="login">
                        </label>
                </div>

                <div class="clearfix"> </div>
                <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
			</form>

    </div>
</div>

            
{% endblock %}