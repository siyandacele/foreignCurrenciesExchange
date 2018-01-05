{% extends 'templates/default.php' %} 
{% block title %}Reset Password{% endblock %}
{% block content %}
<div class="banner-page col-md-12">
	
	
	</div>
</div>
<div class="full-container-white site-content clearfix">
	<div class="container paddd">
		<div class="col-md-12 page-content">
          
             <h2>Reset your password</h2>
            <p></p>
            <form class="form-horizontal col-md-10" action="{{ urlFor('password.reset.post') }}?email={{ email }}&identifier={{ identifier|url_encode }}" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>{% if errors.has('password') %} {{ errors.first('password') }} {% endif %}
                </div>
                <div class="form-group">
                    <label for="password_confirm" class="col-sm-4 control-label">Confirm Password</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Confirm Password">
                    </div>{% if errors.has('password_confirm') %} {{ errors.first('password_confirm') }} {% endif %}
                </div>
                     
                <button class="btn btn-primary pull-right">Change Password</button>
                <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
            </form> 
        </div>
    </div>
</div>
{% endblock %}