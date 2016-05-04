<form method="POST" action="{{ url('pay/{id}') }}" role="form">
    <label>If you would like to get a premium service for your request. Kindly proceed with the payment on paypal for the following ticket. A ticket costs you 20 Euros. :* </label>
    <input type="hidden" name="item_name" value="ticket">
    <input type="hidden" name="item_price" value="20">
    <input type="hidden" name="total" value="20">
    <input type="hidden" name="ticket_id" value={!!$ticket_id1!!}>

    <input type="image" src="http://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>