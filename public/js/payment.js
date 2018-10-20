const stripe = Stripe('pk_test_4aki4JIuC3W0TrSWkmA17fsU');
const elements = stripe.elements();

var style = {
    base: {
        // Add your base input styles here. For example:
        fontSize: '16px',
        color: "#32325d",
    }
};

const card = elements.create('card', {style: style});
const form = $('#payment-form');

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

form.submit((event) => {
    event.preventDefault();
    stripe.createToken(card).then(function (result) {
        console.clear()
        if (result.error) {

            console.log(result.error)
            // // Inform the customer that there was an error.
            // var errorElement = document.getElementById('card-errors');
            // errorElement.textContent = result.error.message;
        } else {
            // Send the token to your server.
            handleStripe(result.token);
            console.log(result.token)
        }
    });
    return false;

})

handleStripe = (token) => {
    $('#stripeToken').val(token.id)
    form.get(0).submit()
}
