$(document).ready(function(){
    $('.subcategory').hide();
    if($('.category').val() == 1){
        $('.subcategory').show();
    }
    $('.category').change(function(){
        var value = $(this).val();
        if(value == 1){
            $('.subcategory').show();
        }else{
            $('.subcategory').hide();
        }
    });

    // preview
    $("#bannerImg").change(function(){
         var bannerInput = document.getElementById('bannerImg');
        
        if(bannerInput.files.length > 0){
            var file = bannerInput.files[0];
            var reader = new FileReader();
            var t ="";
            reader.readAsDataURL(file);
            reader.onloadend = function () {
                t = reader.result;
                $(".data_image").val(t);
            }
        }
    });

    $(".preview").click(function(){
    var dataString = $('#form').serialize();
        console.log('fc');
       $.ajax({
            url: baseURL + 'products/preview',
            data: dataString,
            method: 'POST',
            success: function (result) {
                console.log(result);
                var w = window.open(baseURL,'_blank','toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500');
                w.document.write(result);
                w.document.close();
                w.focus();  
              
                
            }
        });
        return false;
    });
});