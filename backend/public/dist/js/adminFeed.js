var departmentId;
function getTicketOpeningData(){

}
window.onload = function () {


    $.getJSON( getDepartments, function(departments){
        $.each(departments,function(i, field){
            $('#departments').append("<option value='"+field.id+"'>" + field.name + "</option>");
        });
    });
    $.getJSON( getPriorities, function(priorities){
        $.each(priorities,function(i, field){
            $('#priorities').append("<option value='"+field.id+"'>" + field.name + "</option>");
        });
    });
    $.getJSON( getStatuses, function(status){
        $.each(status,function(i, field){
            $('#status').append("<option value='"+field.id+"'>" + field.name + "</option>");
        });
    });
    $('#departments').change(function(){
        $('#agents').empty();
        id = $('#departments').val();
        $('#agents').append("<option value='0'>not assigned</option>");
        if(id != 0 ){
            $.getJSON(agentsURL+'/'+ id, function(agents){
                $.each(agents, function(i, field){
                    $('#agents').append("<option value='"+field.id+"'>"+field.name+"</option>");
                });
            });
            $('#agentsDiv').show();
        }else{
            $('#agentsDiv').hide();
        }

    });
    $('#agentsDiv').hide();

    $.getJSON(route, function(data){
        $('#tweets').empty();
        $.each(data, function(i, field){
            $('#tweets').append("<div class='box box-primary'>"+
                " <div class='box-header with-border'>"+
                "<h3 class='box-title text-primary'>"+field.user['name']+
                "<small>@"+field.user['screen_name']+"</small> </h3>"+
                "<div class='box-tools pull-right'>"+
                "<button type='button' onClick='getTicketOpeningData()' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#addTicket'>"+
                "<i class='fa fa-plus'></i>  New Ticket </button> </div> </div>"+
                "<div class='box-body'>"+
                field.text
                +"</div></div>")
        });
    }).fail(function(){
        $('#tweets').empty();
        $('#tweets').append(" <div class='alert alert-danger alert-dismissable'>Error in getting your tweets please check with your IT department</div>");
    });
}