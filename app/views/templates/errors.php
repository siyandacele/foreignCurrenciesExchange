<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{% block title %}{% endblock %}</title>
   <style>
       body {
           background-size: cover;
           margin: 0;
       }
       a {
           text-decoration: none;
       }
       .errormas{
           width: 100%;
           text-align: center;
       }
       .errormas h4{ 
                   font-size: 174px;
                     font-family: 'Norwester', sans-serif;
           color: #000d14;
    
    margin: 40px 0 10px;

       }
        .errormas h4 span{ 

        
       }
       .errormas h3{ 
           font-size: 24px;
                   font-family: 'museo500', sans-serif;
           margin: 10px 0 60px;
           color: #000d14;
           font-weight: 900;
       }
       .errormas a span {
           border: 2px solid #000d14;
            font-family: 'museo500', sans-serif;
           font-weight: 900;
           padding: 15px 20px;
            color: #000d14;
           margin-top: 60px;
       }
    </style>
    </head>
       
 <body>
     
     <div class="errormas">
          
        {% block content %}{% endblock %}
     </div>
     
     
</body>
</html>
