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
    $("#sortPriceLowHigh").change(function(){
        var i;
        var array = $('[price]');
        for (i = 1; i < array.count(); i++) {
            if (array[i].prop('price') >= $("#sortPriceLowHigh").val()) {
                array[i].show();
            }
            else {
                array[i].hide();
            }
        }
    });
});