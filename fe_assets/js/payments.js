
function paypal();

var amt = $('.d').html();

amt = amt.replace(/[^\d\.]/g, '');

alert(amt);

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
}

function stripe() {

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
}