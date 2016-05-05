var departmentId;
function getTicketOpeningData(id, screen_name, name, body){
    $('#tweetId').val(id);
    $('#screenName').val(screen_name);
    $('#CustomerTwitter').val(screen_name);
    $('#CustomerName').val(name);
    $('#tweetBody').text(body);
    $('#customerName').text('');
    $('#customerEmail').text('');
    $('#customerMobile').text('');
    $('#customerId').val('');
    $('#UserData').hide();

}
function reply(id){
    var formId = '#replyForm-'+id;
    $.ajax({
        type: "GET",
        url: tweetReply,
        data: $(formId).serializeArray(),
        success: function(response){
            var reply = jQuery.parseJSON(response);
            $('#replies').append("<li>"+
           " <i class='fa fa-twitter bg-aqua'></i>"+
               " <div class='timeline-item'>" +
                "<span class='time'><i class='fa fa-clock-o'></i>"+ reply.created_at +"</span>"+
           "<h3 class='timeline-header'><a>"+
                reply.user.name+
                "</a></h3>"+
            "<div class='timeline-body'>"+
                reply.text+
            "</div> </div> </li>"
            );


        },
        error: function(ts) {
            alert(ts)
        }
    });
}
window.onload = function () {

    $('.assign-ticket-button').on('click', function () {
        $('#assign-ticket-form').attr('action', $(this).data('assign-route'));
    });

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

    $.get(route, function(data){
        $('#tweets').empty();
        $.each(data, function(i, field){
            var id = field.id_str;
            var checkRoute = checkTweet + '/' + id;
            $.ajax({
                type: 'GET',
                url: checkRoute,
                success: function(){
                    $('#tweets').append("<div class='box box-primary'>"+
                        " <div class='box-header with-border'>"+
                        "<h3 class='box-title text-primary'>"+field.user['name']+
                        "<small>@"+field.user['screen_name']+"</small> </h3>"+
                        "<div class='box-tools pull-right'>"+
                        " </div> </div>"+
                        "<div class='box-body'>"+
                        field.text
                        +"</div></div>");

                },
                error: function(){
                    $('#tweets').append("<div class='box box-primary'>"+
                        " <div class='box-header with-border'>"+
                        "<h3 class='box-title text-primary'>"+field.user['name']+
                        "<small>@"+field.user['screen_name']+"</small> </h3>"+
                        "<div class='box-tools pull-right'>"+
                        "<button type='button' onClick=\'getTicketOpeningData(\""
                        +id+"\"\,\""+field.user.screen_name+ "\"" + " \,\" "+field.user.name+ " \"" + " \,\" "+field.text
                        +" \" \) \' class='btn btn-primary btn-sm' data-toggle='modal' data-target='#addTicket'>"+
                        "<i class='fa fa-plus'></i>  New Ticket </button> </div> </div>"+
                        "<div class='box-body'>"+
                        field.text
                        +"</div></div>");
                }
            });

        });
    }).fail(function(){
        $('#tweets').empty();
        $('#tweets').append("<div class='alert alert-danger alert-dismissable'>Error in getting your tweets please check with your IT department</div>");
    });
    $('#UserCheck').click(function(){
        var screenName = $('#screenName').val();
        $.getJSON(customerCheck+'\/'+screenName, function(data){
            $('#showNewCustomer').hide();
            $('#customerName').text(data[0].name);
            $('#customerEmail').text(data[0].email);
            $('#customerMobile').text(data[0].phone);
            $('#customerId').val(data[0].id);
        }).fail(function(){
            $('#UserData').hide();
            $('#AddNewCustomer').fadeIn();
            $('#CurrentUser').fadeOut();
            console.log("404");
        });
    });
    $('#createNewCustomerForm').submit(function(e){
        $.ajax({
            type: "POST",
            url: customerCreate,
            data: $("#createNewCustomerForm").serializeArray(), // serializes the form's elements.
            success: function(result)
            {
                $.getJSON(customerCheck+'\/'+result, function(data){
                    $('#showNewCustomer').hide();
                    $('#AddNewCustomer').fadeOut();
                    $('#CurrentUser').fadeIn();
                    $('#UserData').fadeIn();
                    $('#customerName').text(data[0].name);
                    $('#customerEmail').text(data[0].email);
                    $('#customerMobile').text(data[0].phone);
                    $('#customerId').val(data[0].id);
                })
            }
        });

        e.preventDefault(); // avoid to execute the actual submit of the form.
    });
    $('#newTicket').submit(function(e){
        $.ajax({
            type: "POST",
            url: newTicket,
            data: $('#newTicket').serializeArray(),
            success: function(data){
                alert(data);
                $('#addTicket').modal('hide');
                location.reload();
            },
            error: function(ts) {
                alert(ts.response)
            }
        });
        e.preventDefault();
    });
}