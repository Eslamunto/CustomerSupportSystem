$(document).ready(function(){
    $('#AddNewCustomer').hide();
    $('#UserData').hide();
    $("#hideNewCustomer").click(function(){
        $('#AddNewCustomer').fadeOut();
        $('#CurrentUser').fadeIn();
    });

    $("#showNewCustomer").click(function(){
        $('#AddNewCustomer').fadeIn();
        $('#CurrentUser').fadeOut();
    });
        $("#UserCheck").click(function(){
        $('#UserData').fadeIn();
    });

});
