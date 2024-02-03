$(document).ready(function(){
    $('.btn-plus').click(function(){
        // when + button click
        $parentNode = $(this).parents("tr");
        $price = Number($parentNode.find('#price').text().replace("Kyats",""));
        $qty = Number($parentNode.find('#qty').val());
        $total = $price*$qty ;
        $parentNode.find('#total').html($total+" Kyats");

        summaryCalculation();
    })

    $('.btn-minus').click(function(){
        //when - button click
        $parentNode = $(this).parents("tr");
        $price = Number($parentNode.find('#price').text().replace("Kyats",""));
        $qty = Number($parentNode.find('#qty').val());
        $total = $price*$qty ;
        $parentNode.find('#total').html($total+" Kyats");

        summaryCalculation();
    })


    function summaryCalculation(){
        // calculate final price for order
        $priceTotal = 0;
        $('#dataTable tr').each(function(index,row){
            $priceTotal += Number($(row).find("#total").text().replace("Kyats",""));
        });
        $("#subTotalPrice").html(`${$priceTotal} Kyats`);
        $("#finalPriceTotal").html(`${$priceTotal+3000} Kyats`);
    }

})
