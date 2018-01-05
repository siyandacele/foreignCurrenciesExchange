{% extends 'templates/default.php' %}

{% block title %}Change Password{% endblock %}
{% block style %}accounts{% endblock %}
{% block content %}

</div>
<div class="full-container-white site-content clearfix">
	<div class="container paddd">
		<div class="col-md-12 page-content">
          
             <h2>Change Password</h2>
            <p>Change your password by completing in the below form.</p>
            <p></p>
            
            <form class="form-horizontal col-md-10" action="{{ urlFor('change.password.post') }}" method="post">
        
                  <div class="form-group">
                    <label for="old_password" class="col-sm-4 control-label">Old Password</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Old Password"  value="">{% if errors.first('old_password') %}{{ errors.first('old_password') }}{% endif %}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">New Password</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" name="password" id="password" placeholder="New Password"  value="">{% if errors.first('password') %}{{ errors.first('password') }}{% endif %}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="confirm_password" class="col-sm-4 control-label">Confirm Password</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password"  value="">{% if errors.first('confirm_password') %}{{ errors.first('confirm_password') }}{% endif %}
                    </div>
                  </div>   
                      <button class="btn btn-primary pull-right">Update Password</button>
                </div>
                <input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
            </form>
		 
		 <div class="clearfix"></div>		 
	 
</div>

    </div>
</div>
</div>
	
{% endblock %}