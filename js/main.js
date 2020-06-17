$(document).ready(function() {
    $('.add-new-button').click(()=>{
        $('#add-new-form').show();
        $('.add-new').hide();
    });

    $('.edit').click(function () {
        let text = $(this).parent().siblings('.text');
        let id = $(this).parent().parent().attr('data-id');

        text.attr("contenteditable","true");
        text.css("background-color","white");

        let button = text.siblings('.save-button');
        button.css("display","inline-block");
        button.click(function(){
            $.post('tasks/edit', {id: id, text: text.text()}, function(data){
                  location.reload();
            });
        });
    });

    $('.complete').click(function () {
        let id = $(this).parent().parent().attr('data-id');
            $.post('tasks/complete', {id: id}, function(data){
                location.reload();
            });
    });
});