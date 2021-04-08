var xrate = getConversionRate();
var xrate2 = getConversionRateCANZ();
var country = getCountryByIP();
var formatter = setFormat(country);

//alert(JSON.stringify(xrate.USD_AUD.val));
//alert(JSON.stringify(country));

function compute(amt=0,callback="") {    

    var rates = {
                      'hs':{
                        '1':{'a':'48.00','d':'24.00'},
                        '2':{'a':'43.20','d':'21.60'},
                        '3':{'a':'39.00','d':'19.50'},
                        '4':{'a':'34.80','d':'17.40'},
                        '5':{'a':'30.60','d':'15.30'},
                        '6':{'a':'24.60','d':'12.00'},			
                      }, 
                      'col':{
                        '1':{'a':'52.80','d':'24.40'},
                        '2':{'a':'47.50','d':'23.70'},
                        '3':{'a':'42.90','d':'21.40'},
                        '4':{'a':'38.20','d':'19.10'},
                        '5':{'a':'34.00','d':'17.00'},
                        '6':{'a':'26.40','d':'13.20'},
                      }, 
                      'mba':{
                        '1':{'a':'55.20','d':'27.60'},
                        '2':{'a':'49.60','d':'24.80'},
                        '3':{'a':'44.80','d':'22.40'},
                        '4':{'a':'40.00','d':'20.00'},
                        '5':{'a':'36.00','d':'17.50'},
                        '6':{'a':'27.60','d':'13.80'},
                      }, 
                      'doc':{
                        '1':{'a':'57.60','d':'28.80'},
                        '2':{'a':'51.80','d':'25.90'},
                        '3':{'a':'46.80','d':'23.40'},
                        '4':{'a':'41.70','d':'20.80'},
                        '5':{'a':'40.10','d':'18.80'},
                        '6':{'a':'28.80','d':'14.40'},
                      }
                    };

                    var urgency = {
                      1 : "1 day",
                      2 : "2 days",
                      3 : "3-4 days",
                      4 : "5-7 days",
                      5 : "7-8 days",
                      6 : "10+ days",
                    };

                    var product = {
                      1 : "Essay",
                      2 :"Narrative Essay",
                      3 :"Descriptive Essay",
                      4 :"Argumentative Essay Term Paper",
                      5 :"Research Paper",
                      6 :"Draft",
                      7 :"Abstract",
                      8 :"Literature Review"
                    };

      var count = amt;
      
      var jsonobj = JSON.parse(JSON.stringify(rates));    

      var type = $('#type').val();
      var days = $('#days').val();
       
      var rate = jsonobj[type][days];

      var discount = rate['d'];
      var amount = rate['a']

      var percent = getDiscountRate(amount, discount);

      var formatter = setFormat(country);
      var lrate = 0;
      var original_amt = 0;
      var discount_amt = 0;

      $('#country').html(country);
    

      if(country == "AU") {
          lrate = xrate.USD_AUD.val;
          original_amt = amount * lrate;
          discount_amt = discount * lrate;
      } else if (country == "GB"){
          lrate = xrate.USD_EUR.val;
          original_amt = amount * lrate;
          discount_amt = discount * lrate;   
      } else if (country == "NZ"){
          lrate = xrate2.USD_NZD.val;
          original_amt = amount * lrate;
          discount_amt = discount * lrate; 
      } else if (country == "CA"){
          lrate = xrate2.USD_CAD.val;
          original_amt = amount * lrate;
          discount_amt = discount * lrate;      
      } else if (country == "US") {
          original_amt = amount;
          discount_amt = discount;
      } else {
         original_amt = amount;
         discount_amt = discount;
      }
      


      if(count > 1) {
        $('.d').html(formatter.format(discount_amt * count));
        $('.d').val(formatter.format(discount_amt * count));
     } else {
        $('.d').html(formatter.format(discount_amt));
        $('.d').val(formatter.format(discount_amt));
     }
      
      $('.a').html(formatter.format(original_amt));
      $('.a').val(formatter.format(original_amt));

      $('.pr').html(Math.round(percent) + "%");
      $('.pr').val(Math.round(percent) + "%");

      $('.origamt').html(discount_amt);
      $('.origamt').val(discount_amt);

     // $('.prod').html("Urgency Level : " + urgency[days]);
      //$('.prod').val("Urgency Level : " + urgency[days]);

      $('.prod').html(product[$('#doctype').val()]);
      $('.prod').val($('#doctype').val());

      $('.urgency').html(urgency[$('#days').val()]);
      $('.urgency').val($('#days').val());

  };

  function getDiscountRate(a, d) {
        var discount = a - d;
        var x =  discount / a;
        var result = x * 100;
        return result;
  }

  function setFormat(country) {
    var formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: getCurrency(country),
        minimumFractionDigits: 2
    });
    return formatter;
  }

  function getCurrency(country) {
    var currency = "";
    switch(country) {
        case "GB" : 
            currency = "EUR";
            break;

        case "US" : 
            currency = "USD";
            break;
        
        case "AU" : 
            currency = "AUD";
            break;

        case "NZ" : 
            currency = "NZD";
            break;

        case "CA" : 
            currency = "CAD";
            break;

        default: 
            currency = "USD";

    }    
    return currency;
   }

   function getConversionRate()
    {
     var result = null;
     var scriptUrl = "https://free.currconv.com/api/v7/convert?apiKey=b0d9ba40dd1f87589779&q=USD_AUD,USD_EUR&compact=y.php?name=";
     $.ajax({
        url: scriptUrl,
        type: 'get',
        dataType: 'json',
        async: false,
        success: function(data) {
            result = data.results;
        } 
     });
     return result;
    }

    function getConversionRateCANZ()
    {
     var result = null;
     var scriptUrl = "https://free.currconv.com/api/v7/convert?apiKey=b0d9ba40dd1f87589779&q=USD_NZD,USD_CAD&compact=y.php?name=";
     $.ajax({
        url: scriptUrl,
        type: 'get',
        dataType: 'json',
        async: false,
        success: function(data) {
            result = data.results;
        } 
     });
     return result;
    }

    function getCountryByIP() {
            var result = null;
            var scriptUrl = "https://extreme-ip-lookup.com/json/" ;
            $.ajax({
               url: scriptUrl,
               type: 'get',
               dataType: 'json',
               async: false,
               success: function(data) {
                   result = data;
               } 
            });
         return result.countryCode;
    }
  
  $(function() {

    //$("#paypal-button").hide();
    //$("#stripe-button").hide();

    var v = $('#pagetxt').val();

    compute(v,formatter);

   
  $('#minus-button').click(function(){
    var value= $('#pagetxt').val();
    var amt = 0;
    var cur = 0

      if(value > 1) {
        value--;
      }

      cur = $('.origamt').html();
      amt = cur * value; 
      $('#pagetxt').val(value); 
      $('.d').html(formatter.format(amt));
  });

  $('#plus-button').click(function(){
    var value= $('#pagetxt').val();
    var amt = 0;
    var cur = 0;

    value++;

    cur = $('.origamt').html();
    amt = cur * value;
    $('#pagetxt').val(value);
    $('.d').html(formatter.format(amt));
  });

   $('#days').change(function(){
     var v = $('#pagetxt').val();
      compute(v,formatter);
   });

   $('#type').change(function(){
    var v = $('#pagetxt').val();
      compute(v,formatter);
   });

   $('#doctype').change(function(){
    var v = $('#pagetxt').val();
      compute(v,formatter);
   });

   $('#pagetxt').change(function(){
    var v = $('#pagetxt').val();
      compute(v,formatter);
   });

   $('#pagetxt').on('input',function(e){
    var v = $('#pagetxt').val();
    $('.qty').html(v);  
    $('.qty').val(v);  
    compute(v,formatter);
  });


   /*-- navigation animation --*/

   var toggleAffix = function(navLinks, affixElement, scrollElement, wrapper) {
      
    //var height = affixElement.outerHeight();
    var height = affixElement.outerHeight() + 50,
        top = wrapper.offset().top;

    
    if (scrollElement.scrollTop() >= 90){
        wrapper.height(height);
        affixElement.addClass("affix");
        navLinks.addClass("blue");
        
    }else {
        affixElement.removeClass("affix");
        wrapper.height('auto');
    }
      
  };
  

  $('[data-toggle="affix"]').each(function() {
    var ele = $(this),
        wrapper = $('<div></div>'),
        nav = $('#nav-link');
    
    ele.before(wrapper);
    $(window).on('scroll resize', function() {
        toggleAffix(ele, $(this), wrapper);
    });
    
    // init
    toggleAffix(nav, ele, $(window), wrapper);

     /*-- navigation animation end --*/
   var gadgetCarousel = $(".carousel");
  
   gadgetCarousel.each(function() {
     if ($(this).is(".sample-carousel-bar")) {
     $(this).slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: true,
      speed: 300,
      centerMode: true,
      autoplay:true,
      variableWidth: true
       });
     } 
     else if ($(this).is(".review-carousel-bar")){
       $(this).slick({
         adaptiveHeight: true,
         autoplay:true,
         speed:100,
       });
     }
   });

   
   $('.count').each(function () {
    $(this).prop('Counter',0).animate(
    {
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
   });

if (window.matchMedia('(max-width: 768px)').matches)
{
  $("#main-content-inner").hide();
}

});


   //if($("#payment_mode").val() == true) {
   /*-- navigation animation end --*/
   /*
   var amt = $('.d').html();

   amt = amt.replace(/[^\d\.]/g, '');

   paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'demo_sandbox_client_id',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },
  
    // Enable Pay Now checkout flow (optional)
    commit: true,
  
     // Set up a payment
     payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: amt,
            currency: getCurrency(country),
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');

*/
 // Create an instance of the Stripe object with your publishable API key
 var stripe = Stripe("pk_test_51IYJk5Fja5mPsBlX6FFrua7pWz72X82SOU92QFU5c8A0HJm8HcB158UdVUuQ0wj49dqj8fiKxcPVQDYH0MMzQZLg00uG0EI9sH");
 var checkoutButton = document.getElementById("stripe-button");


 var amt = $('.d').html() ;
 amt = amt.replace(/[^\d\.]/g, '');
 amt = amt.replace(".","");

 var  formdata = JSON.stringify({
              'amount'  : amt,
              'product' : $('.prod').html(),
              'currency' :  getCurrency(country),
          });

console.log(formdata);
 var x = JSON.parse(formdata);

 
 var data = new FormData();
 data.append("amount", x['amount']);
 data.append("currency", x['currency']);
 data.append("product", x['product']);
 data.append("quantity", '1');

 
/*
var data = new FormData();
data.append("amount", "10050");
data.append("currency", "aud");
data.append("product", "Test product asd asd");
data.append("quantity", "5");
*/
console.log("Formdata",data);

 checkoutButton.addEventListener("click", function () {
   //var endpoint = "http://staging.assignmentdoctor.com/stripe/createsession";
   var endpoint = "http://localhost/assignmentdoctor/stripe/createsession";
   fetch(endpoint, {
     method: "POST",
     body : data
   })
     .then(function (response) {
       return response.text();
     })
     .then(function (session) {
       var x = JSON.parse(session);
       return stripe.redirectToCheckout({ sessionId: x.id });
     })
     .then(function (result) {
       // If redirectToCheckout fails due to a browser or network
       // error, you should display the localized error message to your
       // customer using error.message.
       if (result.error) {
         alert(result.error.message);
       }
     })
     .catch(function (error) {
       console.error("Error:", error);
     });
 });

 /*

 $('input[type="radio"]').click(function(){

  var inputValue = $(this).attr("value");

  if(inputValue == "Paypal") {
    $("#paypal-button").show();
    $("#stripe-button").hide();
  } else if(inputValue == "Stripe") {
    $("#paypal-button").hide();
    $("#stripe-button").show();
  }
});
*/
//}

  

  });