$(document).ready(function(){
    
    function form(e){
        e.preventDefault();
        var closestForm = $(this).closest('form');
        var amount = closestForm.find('.amount');
        var to = closestForm.find('.to');
        var from = closestForm.find('.from');
        var bothInputs =  closestForm.find('.amount, .currency');
        var error = false;
        var self = $(this);        
        var currency = (to.val() != 'ZAR')? to : from;
        var csrfName = closestForm.find('.csrf_token').val();
        var totalAbout = closestForm.find('.total-amount'); 
        
        
        if(currency.val() == ""){
            isError(currency);
            error = true;
        }
        
        if(amount.val() == ""){
            isError(amount);
            error = true;
        }
        
        if(!error){
            totalAbout.text('Loading...'); 
            amount.prop('disabled', true);
            currency.prop('disabled', true);
            $(this).prop('disabled', true);
            
            $.ajax({
                url: closestForm.attr('action'),
                data: {
                    type: self.attr('name'),
                    to: to.val(),
                    from: from.val(),
                    amount: amount.val(),
                    csrt_token: csrfName
                },
                method: "POST",
                success: function (data) {
                    
                    var responseData = JSON.parse(data);
                    var responseData = responseData.success;
                    totalAbout.text(responseData.amount);
                    var massage = (responseData.massage != '')? "<p>"+responseData.massage+"...</p>": false;
                    
                    amount.removeAttr('disabled');
                    currency.removeAttr('disabled');
                    self.removeAttr('disabled');
                    
                    closestForm.prepend($('<div/>')
                     .addClass("alert alert-success alert-dismissable")
                     .append('<a href="#" class="close" data-dismiss="alert">&times;</a>')
                     .append($('<p/>').addClass("small")
                        .append('<b>Total Amount:</b> '+ responseData.amount +"<br>")
                        .append('<b>Surcharge:</b> '+ responseData.surcharge +"<br>")
                        .append('<b>Final Amount:</b> '+ responseData.final_amount +"<br>"))
                     .append(massage))
                
                }

            });
        }
    }
    
    $("#btn-purchase").on('click', form);
    $("#btn-pay").on('click', form);
    
});

function isError(selector) {
        var self = $(this);
        selector.addClass('has-error');
        selector.blur(function(e){
            e.stopImmediatePropagation();
            if(selector.val() != ""){
                 $(this).removeClass('has-error');
            }
        });
    
}
        