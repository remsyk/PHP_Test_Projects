<?php
    // get the data from the form
    $taxable_income = $_POST['taxable_income'];

    $single= 0;
    $married_jointly=0;
    $married_seperately=0;
    $head_house=0;


    define('TAX_RATES',
      array(
        'single' => array(
          'Rates' => array(10,15,25,28,33,35,39.6),
          'Ranges' => array(0,9275,37650,91150,190150,413350,415050),
          'MinTax' => array(0,927.50,5183.75,18558.75,46278.75,119934.75,120529.75)
        ),
        'married_jointly' => array(
          'Rates' => array(10,15,25,28,33,35,39.6),
          'Ranges' => array(0,18550,75300,151900,231450,413350,466950),
          'MinTax' => array(0,1855.00,10367.50,29517.50,51791.50,111818.50,130578.50)
        ),
        'married_seperately' => array(
          'Rates' => array(10,15,25,28,33,35,39.6),
          'Ranges' => array(0,9275,37650,75950,115725,206675,233475),
          'MinTax' => array(0,927.5,5183.75,14758.75,25895.75,55909.25,65289.25)
        ),
        'head_house' => array(
          'Rates' => array(10,15,25,28,33,35,39.6),
          'Ranges' => array(0,13250,50400,130150,210800,413350,441000),
          'MinTax' => array(0,1325.00,6897.50,26835.00,49417,116258.50,125936)
        )
      )
    );

    function incomeTax($taxable_income, $filing_status){
      foreach(TAX_RATES['singal'] as $value) {
        foreach(Ranges as $index =>$range) {
          if($index <=$taxable_income){
            $single = (($taxable_income - Ranges[$index+1])* Rates[$index+1])+MinTex[$index+1];
          }
      }
    }
  }



    // apply currency formatting to the dollar amounts
    $single_format = "$".number_format($single, 2);
    $married_jointly_format = "$".number_format($married_jointly, 2);
    $married_seperately_format = "$".number_format($married_seperately, 2);
    $head_house_format = "$".number_format($head_house, 2);
    $taxable_income_format = "$".number_format($taxable_income, 2);


    // escape the unformatted input
    $taxable_income_escaped = htmlspecialchars($taxable_income);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
      <h1>Income Tax Calculator</h1>

      <form action="" method="post">

        <div id="data">
          <label>Your Net Income:</label>
          <input type="text" name="taxable_income"><br>
        </div>

        <div id="buttons">
          <label>&nbsp;</label>
          <input type="submit" value="Submit"><br>
        </div>

        <div>
      </form>

        <label>With a net taxable income of </label>
        <span><?php echo $taxable_income_format; ?></span><br>

        <table>
          <tr>
            <th>Status </th>
            <th>Tax</th>
          </tr>
          <tr>
            <td>Single</td>
            <td><?php echo $single_format; ?></td>
          </tr>
          <tr>
            <td>Married Filling Jointly</td>
            <td><?php echo $married_jointly_format; ?></td>
          </tr>
          <tr>
            <td>Married Filling Seperately</td>
            <td><?php echo $married_seperately_format; ?></td>
          </tr>
          <tr>
            <td>Head of Household</td>
            <td><?php echo $head_house_format; ?></td>
          </tr>
        </table>

    </main>
</body>
</html>
