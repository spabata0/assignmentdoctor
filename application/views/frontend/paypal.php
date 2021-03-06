<!DOCTYPE html>
<html>
<body>

<script src="https://www.paypal.com/sdk/js?components=hosted-fields&client-id=Client-ID&merchant-id=Merchant-ID&currency=USD&intent=capture" data-partner-attribution-id="BN-Code" data-client-token="Client-Token"</script>

<form id="my-sample-form">
  <label for="card-number">Card Number</label>
  <div id="card-number"><input type="text" name="card_number"></div>
  <label for="expiration-date">Expiration Date</label>
  <div id="expiration-date"></div>
  <label for="cvv">CVV</label>
  <div id="cvv"></div>
  <button value="submit" id="submit" class="btn">Pay with Card</button>
</form>

<script>
// Check if card fields are eligible to render for the buyer's country. The card fields are not eligible in all countries where buyers are located.
  if (paypal.HostedFields.isEligible() === true) {
    paypal.HostedFields.render({
      createOrder: function(data, actions) {
        return fetch('/my-server/create-order', {
            method: 'POST'
        }).then(function(res) {
            return res.json();
        }).then(function(data) {
            return data.id;
        });
      },
      styles: {
          'input': {
              'font-size': '14px',
              'font-family': 'Product Sans',
              'color': '#3a3a3a'
          },
          ':focus': {
              'color': 'black'
          }
      },
      fields: {
          number: {
              selector: '#card-number',
              placeholder: 'Credit Card Number',
          },
          cvv: {
              selector: '#cvv',
              placeholder: 'CVV',
          },
          expirationDate: {
              selector: '#expiration-date',
              placeholder: 'MM/YYYY',
          }
      }
    }).then(hostedFields => {
      document.querySelector('#my-sample-form').addEventListener('submit', event => {
        event.preventDefault();
        hostedFields.submit().then(payload => {
          return fetch('/my-server/handle-approve/' + payload.orderId, {
            method: 'POST'
           }).then(response => {
            if (!response.ok) {
              alert('Something went wrong');
            }
          });
        });
      });
    });
  }
</script>

</body>
</html>