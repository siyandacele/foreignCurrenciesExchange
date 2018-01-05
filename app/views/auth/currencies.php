{% extends 'templates/default.php' %} 
{% block title %}Foreign Currencies {% endblock %}
{% block content %}
    <div class="row">

        <div class="col-md-6 the-form">
               
                <h2>Purchase Foreign Currency</h2>
                 
                <form action="{{ urlFor('rate.post') }}" id="form-purchase" method="post">

                    <div class="form-group row">
                        <label for="Amount"><b>Amount</b></label>
                        <input type="number" id="purchase-amount"  class="form-control col-12 amount" name="amount" autocomplete="off" placeholder="0" min="0" required>
                        <span class="helpr"></span>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-6 col-form-label"><b>Currency</b></label>
                        <select class="custom-select col-6 to" required>
                            <option value="">Select...</option>
                            <option value="USD">US Dollars (USD)</option>
                            <option value="GBP">British Pound (GBP)</option>
                            <option value="EUR">Euro (EUR)</option>
                            <option value="KES">Kenyan Shilling (KES)</option>
                        </select>
                        <span class="helpr"></span>
                    </div>
                    <div class="money row">
                        <h3><span class="total-amount">0.0000 </span> <span class="badge badge-info">ZAR</span></h3>
                    </div>
                    
                    <input type="hidden" name="from" class="from" value="ZAR">
                    <input type="hidden" class="csrf_token" name="{{ csrf_key }}" value="{{ csrf_token }}">
                  
                    <div class="form-group row">
                        <input type="submit" class="btn btn-primary" id="btn-purchase" value="Purchase" name="purchase">
                    </div>
                     
                </form>
     
        </div>

        <div class="col-md-6 the-form">
       
                <h2>Pay with ZAR Currency</h2>
                  
                <form action="{{ urlFor('rate.post') }}" id="form-pay"  method="post">

                    <div class="form-group row">
                        <label for="Amount"><b>ZAR Amount</b></label>
                        <input type="number" id="purchase-amount"  class="form-control col-12 amount" name="amount" min="0" autocomplete="off" placeholder="0" required>
                        <span class="helpr"></span>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-6 col-form-label"><b>Currency</b></label>
                        <select class="custom-select col-6 from" required>
                            <option value="">Select...</option>
                            <option value="USD">US Dollars (USD)</option>
                            <option value="GBP">British Pound (GBP)</option>
                            <option value="EUR">Euro (EUR)</option>
                            <option value="KES">Kenyan Shilling (KES)</option>
                        </select>
                        <span class="helpr"></span>
                    </div>
                    <div class="money row">
                        <h3><span class="total-amount">0.0000 </span> <span class="badge badge-danger">ZAR</span></h3>
                    </div>
                    
                    <input type="hidden" name="to" class="to" value="ZAR">
                    <input type="hidden" class="csrf_token" name="{{ csrf_key }}" value="{{ csrf_token }}">
                    
                    <div class="form-group row">
                        <input type="submit" class="btn btn-primary" id="btn-pay" value="Pay" name="pay">
                    </div>
                </form>
 
        </div>

    
    </div>

{% endblock %}
