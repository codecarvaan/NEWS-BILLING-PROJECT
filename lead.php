<?php 
session_start();
include "conn.php";
if(empty($_SESSION["employeeid"]))
{
	header("location:main.php");
}
else
	
{
	?>
	
<?php
if($_SESSION["admin"]==(1 or 2))
{

include 'headeradmin.php';
}
else{
	include 'header.php';
}

?>
<body>

<body >
 <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">New Lead</h1>
                    </div>
                </div>
    
</div>

<form action="add.php" method="post">
 <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover " ><tr>
<td colspan="6" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;height:18px"><div><h2>Lead</h2></div>
</td>
</tr>
<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;">First Name:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;">
 <input style="width:200px;padding:5px" type="text" name="name1"placeholder="First Name" required>
</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px">Middle Name:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;"><input style="width:200px;padding:5px" type="text" name="name2"placeholder="Middle Name"></span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;">Last Name:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;"><input style="width:100%;padding:5px" type="text" name="name3"placeholder="Last name" required></span></div>
</td>
</tr>
<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;">E-Mail:</span></div>
</td>
<td colspan="2" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:16px;"><input style="width:100%;padding:5px" type="email" name="email1" placeholder="E-mail" required></span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;"> Alternate E-mail:</span></div>
</td>
<td colspan="2" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:16px;"><input style="width:100%;padding:5px"type="email"placeholder="E-mail" name="email2">
</tr>
<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:38px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;">Phone-Number:</span></div>
</td>
<td colspan="2" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:38px;">
<div><span style="color:#000000;font-family:Arial;font-size:16px;"><input  required style="width:100%;padding:5px" type="number" name="phone1"placeholder="Phone-Num" min="999999999" max="9999999999"></span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:38px;">
<div><span style="color:#000000;font-family:Arial;font-size:13px;"> Alternate Phone-Num:</span></div>
</td>
<td colspan="2" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:38px;">
<div><span style="color:#000000;font-family:Arial;font-size:16px;"><input style="width:100%;padding:5px"placeholder="Phone-Num"type="number" name="phone2" min="999999999" max="9999999999"></span></div>
</td>
</tr>

<tr>
<td colspan="6" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:38px;"><div><h2>Description</h2></div>
</td>
</tr>

<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;"colspan="1">Call type:<select required name="bound" style="padding:5px"><option value="">Call type</option><option value="Inbound">Inbound</option><option> Outbound</option></select></td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;">
<div><span style="color:#000000;font-family:Arial;font-size:13px;">Call status:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;">
 <select style="width:100%;padding:5px" name="callstatus" required>
 <option value=""> call status </option>
<option value="Sale made"> Sale made </option>
    <option value="sale decline">Sale decline</option>
	 <option value="OOS">OOS</option>
	  <option value="Call back arranged">Call back arranged</option>
	  <option value="Dead call">Dead call</option>
	  <option value="Call below 10sec">Call below 10sec</option>
	   </select></td>
<td colspan="2 "style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;"><div><span style="color:#000000;font-family:Arial;font-size:13px;">Call schedule:</span>

<input type="time"style="width:90px "name="time1" ><input type="date" name="time2" ></div></td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;vertical-align:middle;text-align:center;height:36px;"><div><span style="color:#000000;font-family:Arial;font-size:13px;">Time Zone:</span>

<select style="padding:5px" name="timezone" required>
<option value=""> ZONE</option>
<option value="EST"> EST</option>
    <option value="PST">PST</option>
	 <option value="MST">MST</option>
	  <option value="CST">CST</option>
	 
	   </select></div></td>
</tr>
<tr>
<td colspan="6" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:100px;"><div class="form-group">
  <label for="comment">Comment:</label>
  <textarea  rows="6" cols="150" id="comment" Placeholder="Write on me" style="resize:none" name="description" required></textarea>
</div></td>
</tr>


<tr>
<td colspan="6" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:38px"><div><h2>Sales</h2></div>
</td>
</tr>
<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;">Sales Made:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;">
<select style="width:200px ;padding:5px" name="salemade" >

<option value="no">no</option><option value="yes"> yes</option>
</td>

<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;">Sales Amount:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:36px;">
<input style="width:200px ; padding:5px" type="text" name="saleamount"placeholder="Sales Amount"></td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:200px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;">Sales Package:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;">
<select name="salepackage" style="width:100%; padding:5px">
 <option value=""> Sales Package</option>
 <option value="Single incident"> Single incident</option>
 <option value="6months"> 6months </option>
   <option value="1year"> 1 year </option>
    <option value="2year">2 year</option>
	 <option value="3year">3 year</option>
	  <option value="4year">4 year</option>
	  <option value="5year">5 year</option>
	   <option value="lifetime">life time</option>
	   </select></td>
</tr>

<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;"><div><span style="color:#000000;font-family:Arial;font-size:13px;">Card Type:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:206px;height:36px;"> <select style="width=00px;padding:5px" name="cardtype">
 <option value="">Card Type</option>
<option value="Visa"> Visa </option>
    <option value="Amex">Amex</option>
	 <option value="Master card">Master card</option>
	  <option value="Discover">Discover</option>
	   </select></td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;"><div><span style="color:#000000;font-family:Arial;font-size:13px;">Card last(4 digit):</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;"><input type="text" style="width:100% ;padding:5px" name="cardlast"  placeholder="Card last(4 digit)"></td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;"><div><span style="color:#000000;font-family:Arial;font-size:13px;">Card exp:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;">
 <select  name="exp1" style="width:40%;padding:5px;" >
  <option value=""> mm</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>

</select>






<b>/</b><select name="exp2" style="width:40%;padding:5px;" >
 <option value=""> yy</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>

</select>
	 </td>
</tr>
<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;">Authorisation:
<td><select  name="authorisation" style="padding:5px;width:100%"><option value="">Auth</option><option value="YES">YES</option><option value="NO">NO</option></select>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;">No of Computers:
<td><input type="text" name="computer" style="width:100% ;padding:5px" placeholder="Computers">
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;">Peripherals Devices:
<td><select  name="devices" style="padding:5px;width:100%"><option value="NO">NO</option><option value="YES">YES</option></select>
</tr>
<tr>
<td colspan="6" style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:38px;"><div><h2>Address</h2></div>
</td>
</tr>

<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;">Address:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;" colspan="5">
<input style="width:100%;padding:5px" type="text" name="address" placeholder="Address"></td>

</tr>
<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;">Street :</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;" colspan="5">
<input style="width:100%;padding:5px" type="text" name="street" placeholder="Street"></td>

</tr>

<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;">City:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:146px;height:36px;">
<input style="width:100%;padding:5px" type="text" name="city" placeholder="City"></td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;">State:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;">

<select name="state" style="width:100% ; padding:5px">
        <option value="CANADA" style="background-color:grey"><B>CANADA(Provinces&Territories)</B></option>
      <option value="AB">Alberta</option>
	<option value="BC">British Columbia</option>
	<option value="MB">Manitoba</option>
	<option value="NB">New Brunswick</option>
	<option value="NL">Newfoundland and Labrador</option>
	<option value="NS">Nova Scotia</option>
	<option value="ON">Ontario</option>
	<option value="PE">Prince Edward Island</option>
	<option value="QC">Quebec</option>
	<option value="SK">Saskatchewan</option>
	<option value="NT">Northwest Territories</option>
	<option value="NU">Nunavut</option>
	<option value="YT">Yukon</option>
     <option value="USA" style="background-color:grey"><B>USA(states)</B></option>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
	
</select>	</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;width:148px;height:36px;"><div>
<span style="color:#000000;font-family:Arial;font-size:13px;">Country:</span></div>
</td>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;">
<SElect style="width:100% ;PADDING:5PX" type="text" name="country"><OPTION VALUE="CANADA">CANADA</OPTION><option value="USA">USA </OPTION></SELECT></td>
</tr>
<tr>
<td style="background-color:transparent;border:1px #C0C0C0 solid;text-align:center;vertical-align:middle;height:36px;"><div>Zip code:</div></td>
<td><input type="text" name="zipcode" placeholder="Zip code" style="padding:5px;width:100%">
</td>
<td colspan=3><input type="submit" style=";width:100%;padding:10px" class="btn btn-primary "name="sumbit"></td>


</tr>
</table>

</form>
</div>
</body>
</html>
<?php
include 'footer.php';}
?>