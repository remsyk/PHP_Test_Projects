<?php
    // get the data from the form
    $taxable_income = $_POST['taxable_income'];

    $single= 0;
    $married_jointly=0;
    $married_seperately=0;
    $head_house=0;

    // calculate the tax
  function incomeTaxSingle($taxable_income){
    if($taxable_income<9275){
      $single = $taxable_income * .1;
    }elseif ($taxable_income>=9276 and $taxable_income<=37650) {
      $single = (($taxable_income - 9275)* .15)+927.5;
    }elseif ($taxable_income>=37651 and $taxable_income<=91150) {
      $single = (($taxable_income -37650) *.25)+5183.75;
    }elseif ($taxable_income>=91151 and $taxable_income<=190150) {
      $single = (($taxable_income -91150 )* .28)+18558.75;
    }elseif ($taxable_income>=190151 and $taxable_income<=413350) {
      $single = (($taxable_income -190150) * .33)+46278.75;
    }elseif ($taxable_income>=413351 and $taxable_income<=415050) {
      $single = (($taxable_income -413350)* .35)+119934.75;
    }elseif ($taxable_income>=415051) {
      $single = (($taxable_income- 415050) * .396)+120529.75;
    }
    return $single;
  }

  function incomeTaxMarriedJointly($taxable_income){
    if($taxable_income<18550){
      $married_jointly = $taxable_income * .1;
    }elseif ($taxable_income>=18551 and $taxable_income<=75300) {
      $married_jointly = (($taxable_income-18550) * .15)+1855;
    }elseif ($taxable_income>=75301 and $taxable_income<=151900) {
      $married_jointly = (($taxable_income-75300) * .25)+10367.5;
    }elseif ($taxable_income>=151901 and $taxable_income<=231450) {
      $married_jointly = (($taxable_income-151900) * .28)+29517.5;
    }elseif ($taxable_income>=231451 and $taxable_income<=413350) {
      $married_jointly = (($taxable_income-231450) * .33)+51791.5;
    }elseif ($taxable_income>=413351 and $taxable_income<=466950) {
      $married_jointly = (($taxable_income-413350) * .35)+111818.5;
    }elseif ($taxable_income>=466951) {
      $married_jointly = (($taxable_income-466950) * .396)+130578.5;
    }
    return $married_jointly;
  }


  function incomeTaxMarriedSeparatly($taxable_income){
    if($taxable_income<9275){
      $married_seperately = $taxable_income * .1;
    }elseif ($taxable_income>=9276 and $taxable_income<=37650) {
      $married_seperately = (($taxable_income-9275) * .15)+927.5;
    }elseif ($taxable_income>=37651 and $taxable_income<=75950) {
      $married_seperately = (($taxable_income-37650) * .25)+5183.75;
    }elseif ($taxable_income>=75951 and $taxable_income<=115725) {
      $married_seperately = (($taxable_income-75950) * .28)+14758.75;
    }elseif ($taxable_income>=115726 and $taxable_income<=206675) {
      $married_seperately = (($taxable_income-115725) * .33)+25895.75;
    }elseif ($taxable_income>=206676 and $taxable_income<=233475) {
      $married_seperately = (($taxable_income-206675) * .35)+55909.25;
    }elseif ($taxable_income>=233476) {
      $married_seperately = (($taxable_income-233475) * .396)+65289.25;
    }
    return $married_seperately;
  }
  
  function incomeTaxHeadOfHousehold($taxable_income){
    if($taxable_income<13250){
      $head_house = $taxable_income * .1;
    }elseif ($taxable_income>=13251 and $taxable_income<=50400) {
      $head_house = (($taxable_income-13250) * .15)+1325;
    }elseif ($taxable_income>=50401 and $taxable_income<=130150) {
      $head_house = (($taxable_income-50400) * .25)+6897.5;
    }elseif ($taxable_income>=130151 and $taxable_income<=210800) {
      $head_house = (($taxable_income-130150) * .28)+26835;
    }elseif ($taxable_income>=210801 and $taxable_income<=413350) {
      $head_house = (($taxable_income-210800) * .33)+49417;
    }elseif ($taxable_income>=413351 and $taxable_income<=441000) {
      $head_house = (($taxable_income-413350) * .35)+116258.5;
    }elseif ($taxable_income>=441001) {
      $head_house = (($taxable_income-441000) * .396)+125936;
    }
    return $head_house;
  }

  $single = incomeTaxSingle($taxable_income);
  $married_jointly= incomeTaxMarriedJointly($taxable_income);
  $married_seperately= incomeTaxMarriedSeparatly($taxable_income);
  $head_house = incomeTaxHeadOfHousehold($taxable_income);


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
