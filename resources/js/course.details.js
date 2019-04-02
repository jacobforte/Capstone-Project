function subscribeByCrn(str, email) {
    $.ajax({
        url:"resources/functions/course/course.details.subscribe.function.php?id=",
        type: "POST",
        data:{
            id: str,
            email: email
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