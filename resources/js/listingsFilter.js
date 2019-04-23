$(document).ready(function(){
    $("#conditionMint").click(function(){
        if ($('#conditionMint').prop('checked')) {
            $("[condition=Mint]").show();
        }
        else {
            $("[condition=Mint]").hide();
        }
    });
    $("#conditionGood").click(function(){
        if ($('#conditionGood').prop('checked')) {
            $("[condition=Good]").show();
        }
        else {
            $("[condition=Good]").hide();
        }
    });
    $("#conditionFair").click(function(){
        if ($('#conditionFair').prop('checked')) {
            $("[condition=Fair]").show();
        }
        else {
            $("[condition=Fair]").hide();
        }
    });
    $("#conditionPoor").click(function(){
        if ($('#conditionPoor').prop('checked')) {
            $("[condition=Poor]").show();
        }
        else {
            $("[condition=Poor]").hide();
        }
    });
    $("#minPrice").blur(function(){
        var i;
        var arr = $('[price]');
        for (i = 0; i < arr.length; i++) {
            if (arr[i].price >= $("#minPrice").val()) {
                arr[i].style.display = 'table-row';
            }
            else {
                arr[i].style.display = 'none';
            }
        }
    });
});