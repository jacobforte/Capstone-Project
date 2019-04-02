function subscribeByCrn(str) {
    $.ajax({
        url:"resources/functions/course/course.details.subscribe.function.php?id=" + str,
        type: "POST",
        data:{
            id: str,
        },
        success:function(data) {
            $('#btn' + str).text('Subscribed');
            $('#btn' + str).prop('disabled', true);
        },
        error:function(data){
            alert("Whoops, something went wrong! Please try again.");
        }
    });
}