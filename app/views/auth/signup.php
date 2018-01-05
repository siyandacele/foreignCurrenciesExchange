{% extends 'templates/default.php' %} 
{% block title %}Sign up {% endblock %}
{% block content %}
<div class="row">


    <div class="col-md-2"></div>
    <div class="col-md-6">


        <form action="{{ urlFor('signup.post') }}" method="post" autocomplete="off">
            <div class="form-group row">
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="email" id="email" {% if request.post( 'email') %} value="{{ request.post('email') }}" {% endif %} /> {% if errors.first('email') %}<p class="small text-danger">{{ errors.first('email') }}</p>{% endif %}
                </div>
            </div>
            <div class="form-group row">
                <label for="first_name" class="col-4 col-form-label">First Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="first_name" id="first_name" {% if request.post( 'first_name') %} value="{{ request.post('first_name') }}" {% endif %} /> 

                        {% if errors.first('first_name') %}<p class="small text-danger">{{ errors.first('first_name') }}</p>{% endif %}
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-4 col-form-label">Last Name</label>
                <div class="col-8">
                    <input type="text" class="form-control" name="last_name" id="last_name" {% if request.post( 'last_name') %} value="{{ request.post('last_name') }}" {% endif %} /> 
                        {% if errors.first('last_name') %}<p class="small text-danger">{{ errors.first('last_name') }}</p>{% endif %}
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-4 col-form-label">Password</label>
                <div class="col-8">
                    <input type="password" class="form-control" name="password" id="password" /> 
                        {% if errors.first('password') %}<p class="small text-danger">{{ errors.first('password') }}</p>{% endif %}
                </div>
            </div>
            <div class="form-group row">
                <label for="password_confirm" class="col-4 col-form-label">Confirm Password</label>
                <div class="col-8">
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" /> 
                           {% if errors.first('password_confirm') %}<p class="small text-danger">{{ errors.first('password_confirm') }}</p>{% endif %}
                </div>
            </div>
            <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
            <div>
                <input type="submit" class="btn btn-primary" value="Register" />
            </div>
        </form>

    </div>
</div>
{% endblock %}
