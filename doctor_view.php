<html>
<head>
  <meta charset="UTF-8">
  <title>Responsive Table + Detail View</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">
  <!-- <div style="background-image: url('images.png');"> -->
  
</head>
<style >
  td{
    color: #000000;
  }
  dt{
    color: #000000;
  }
  dd{
    color: #000000;
  }
/*.background-image{
  background-image: url('images.png');
}*/

</style>
<body>
  <div class="about_us_img">
<img src="img/top_service.png" alt="">
</div>
<!-- <div class="background-image"> -->
  <h1>
  Doctor Portal
</h1>
<!-- <p>
  (An example table + detail view scenario)
</p> -->
<main>
  <table>
    <thead>
      <tr>
        <th>
          Patient ID
        </th>
        <th>
          Full Name
        </th>
         <th>
          Status
        </th>
        
        <th></th>
      </tr>
    </thead>
    <tfoot>
      <tr>
      <!--   <th colspan="3">
          Year: 2014
        </th> -->
      </tr>
    </tfoot>
    <tbody>
      <tr>
        <td data-title="Provider Name">
          Iacob Geaorgescu
        </td>
        <td data-title="E-mail">
          e-mail@test-email.com
        </td>
         <td data-title="E-mail">
          e-mail@test-email.com
        </td>
        <td class="select">
          <a class="button" href="#">
           View Patient
          </a>
        </td>
       
      </tr>
      <tr>
        <td data-title="Provider Name">
          Julius Neumann
        </td>
        <td data-title="E-mail">
          e-mail@test-email.com
        </td>
         <td data-title="E-mail">
          e-mail@test-email.com
        </td>
        <td class="select">
          <a class="button" href="#">
            View Patient
          </a>
        </td>
      </tr>
      <tr>
        <td data-title="Provider Name">
          Christoph Koller
        </td>
        <td data-title="E-mail">
          e-mail@test-email.com
        </td>
          <td data-title="E-mail">
          e-mail@test-email.com
        </td>
        <td class="select">
          <a class="button" href="#">
            View Patient
          </a>
        </td>
      </tr>
      <tr>
        <td data-title="Provider Name">
          Bram Lemmens
        </td>
        <td data-title="E-mail">
          e-mail@test-email.com
        </td>
          <td data-title="E-mail">
          e-mail@test-email.com
        </td>
        <td class="select">
          <a class="button" href="#">
            View Patient
          </a>
        </td>
      </tr>
    </tbody>
  </table>
  <div class="detail">
    <div class="detail-container">
      <dl>
        <dt>
          Provider Name
        </dt>
        <dd>
          John Doe
        </dd>
        <dt>
          E-mail
        </dt>
        <dd>
          email@example.com
        </dd>
        <dt>
          City
        </dt>
        <dd>
          Detroit
        </dd>
        <dt>
          Phone-Number
        </dt>
        <dd>
          555-555-5555
        </dd>
        <dt>
          Last Update
        </dt>
        <dd>
          Jun 20 2014
        </dd>
        <dt>
          Notes
        </dt>
        <dd>
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
        </dd>
      </dl>
    </div>
    <div class="detail-nav">
      <button class="close">
        Close
      </button>
    </div>
  </div>
</main>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="js/index.js"></script>

</div>
</body>

</html>
