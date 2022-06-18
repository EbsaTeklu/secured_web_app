<link rel="stylesheet" href="../css/addfeedback.css" />
<div class="contact-us">
  <form action="#">
    <label for="customerName">Name <em>&#x2a;</em></label>
    <input id="customerName" name="customerName" required="" type="text" />
    <label for="customerEmail">Email <em>&#x2a;</em></label>
    <input id="customerEmail" name="customerEmail" required="" type="email" />
    <label for="customerPhone">Phone</label>
    <input id="customerPhone" name="customerPhone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" type="tel" />
    <label for="cars">Type:</label>
    <select id="cars" name="cars">
    <option value="volvo">Public Abuse</option>
    <option value="saab">Man Holes</option>
    <option value="fiat">Road defects</option>
    <option value="audi">Parking Problems</option>
    </select>
    <label for="orderNumber">Title</label>
    <input id="orderNumber" name="orderNumber" type="text" />
    <label for="customerNote">Your Feedback <em>&#x2a;</em>
    </label><textarea id="customerNote" name="customerNote" required="" rows="4"></textarea>
    <h3>
      Please provide all the information about your issue you can.
    </h3>
    <button id="customerOrder">SUBMIT</button>
  </form>
</div>