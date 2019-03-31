function removeById(str) {
    $.ajax({
        url:"resources/functions/account/account.listings.remove.function.php?id=" + str,
        type: "POST",
        data:{
            id: str,
        },
        success:function(data) {
            $('#' + str).fadeOut(function() {
                if (Number(data) === 0) {
                    $('#no-listings').removeClass( "d-none" );
                }
            });
        },
        error:function(data){
            alert("Whoops, something went wrong! Please try again.");
        }
    });
}