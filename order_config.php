<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Invoice</title>
  <link rel="stylesheet" href="style.scss">
</head>
<body>
  <header>
    <h1>Invoice</h1>
    <address>
      <p>John Doe</p>
      <p>123 Main Street</p>
      <p>Anytown, CA 12345</p>
      <p>(123) 456-7890</p>
    </address>
  </header>
  <article>
    <h1>Recipient</h1>
    <address>
      <p>Jane Doe</p>
      <p>456 Elm Street</p>
      <p>Anytown, CA 54321</p>
      <p>(555) 678-9012</p>
    </address>
    <table class="meta">
      <tr>
        <th>Invoice Number</th>
        <td>123456</td>
      </tr>
      <tr>
        <th>Date</th>
        <td>2023-05-24</td>
      </tr>
      <tr>
        <th>Terms</th>
        <td>Net 30</td>
      </tr>
    </table>
    <table class="items">
      <thead>
        <tr>
          <th>Item</th>
          <th>Description</th>
          <th>Quantity</th>
          <th>Unit Price</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Widget</td>
          <td>A widget is a thing that does things.</td>
          <td>1</td>
          <td>$100</td>
          <td>$100</td>
        </tr>
        <tr>
          <td>Gizmo</td>
          <td>A gizmo is a thing that does other things.</td>
          <td>2</td>
          <td>$50</td>
          <td>$100</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="4">Subtotal</th>
          <td>$200</td>
        </tr>
        <tr>
          <th colspan="4">Tax</th>
          <td>$20</td>
        </tr>
        <tr>
          <th colspan="4">Shipping</th>
          <td>$10</td>
        </tr>
        <tr>
          <th colspan="4">Total</th>
          <td>$230</td>
        </tr>
      </tfoot>
    </table>
    <p>Payment due within 30 days of invoice date.</p>
  </article>
</body>
</html>
