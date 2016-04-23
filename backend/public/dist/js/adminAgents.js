$(function () {
    $("#systemAgents").DataTable();
});
var agentId = 0 ;
function setAgentId(id){
    agentId = id;
    route = show+'/' + id;

    $.getJSON(route, function(agent){
        $('#editName').val(agent.name);
        $('#editEmail').val(agent.email);
    });
    $('#editForm').attr("action", edit+"/"+agentId);
}
window.onload = function () {
    $('[data-method]').click(function(e) {
        e.preventDefault();
        // If the user confirm the delete
        if (confirm($(this).data('confirm'))) {
            // Get the route URL
            var url = $(this).prop('href');
            // Get the token
            var token = $(this).data('token');
            //Get the method type
            var method = $(this).data('method');
            // Create a form element
            var $form = $('<form/>', {action: url, method: 'post'});
            // Add the DELETE hidden input method
            var $inputMethod = $('<input/>', {type: 'hidden', name: '_method', value: method});
            // Add the token hidden input
            var $inputToken = $('<input/>', {type: 'hidden', name: '_token', value: token});
            // Append the inputs to the form, hide the form, append the form to the <body>, SUBMIT !
            $form.append($inputMethod, $inputToken).hide().appendTo('body').submit();
        }
    });

    $('#teams').hide();
    $('#editTeams').hide();
    $('#editDepartments').change(function () {
        $('#teamsOptionsEdit').empty();
        var id = $('#editDepartments').val();
        var route = department +"/"+ id + '/teams';
        $.getJSON(route, function (json) {
            $.each(json, function(i, field){
                $('#teamsOptionsEdit').append("<option value='"+ field.id +"'>" + field.name + "</option>");
            });
            $('#editTeams').show();
        });

    });
    $('#departments').change(function () {
        $('#teamsOptions').empty();
        var id = $('#departments').val();
        var route = department +"/"+ id + '/teams';
        $.getJSON(route, function (json) {
            $.each(json, function(i, field){
                $('#teamsOptions').append("<option value='"+ field.id +"'>" + field.name + "</option>");
            });
            $('#teams').show();
        });

    });

}