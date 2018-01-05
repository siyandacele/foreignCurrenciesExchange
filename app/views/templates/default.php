<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">   
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css" type="text/css">   
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">   
    <link rel="shortcut icon" type="image/x-icon" href="{{ myUrl }}favicon.ico">
    <title>{% block title %}{% endblock %} | Purchase Foreign Currencies </title>
   
    </head>
       
 <body>
{% include 'templates/partials/navigation.php' %}
    
     <div class="container page">

        {% block content %}{% endblock %}

     </div>
     
{% include 'templates/partials/footer.php' %}
</body>
</html>