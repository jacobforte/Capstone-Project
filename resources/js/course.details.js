function subscribeByCrn(str, email) {
    $.ajax({
        url:"resources/functions/course/course.details.subscribe.function.php",
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

function addReview(email) {
    $.ajax({
        url:"resources/functions/course/course.details.addreview.function.php",
        type: "POST",
        data:{
            email: email,
            crn: $("#crn").val(),
            review: $("#reviewDescription").val(),
            rating: $("#ratingValue").val(),
            instructor: $("#instructor").val(),
            semester: $("#semester").val() + " " + $("#year").val(),
            campus: $("#campus").val()
        },
        success:function(data) {
            alert(data);
        },
        error:function(data){
            alert(data);
        }
    });
}


