function callreq(cariapa)
{
	/*var datasatu = document.getElementById("data1").value;
	var datadua = document.getElementById("data2").value;
	if(datasatu != "" && datadua != "")
	{

	}
	else
	{

		swal({
		  title: "Data Tidak Lengkap!",
		  text: "Here's a custom image.",
		  imageUrl: "images/thumbs-up.jpg"
		});

		swal("Failed", "Data Tidak Lengkap", "error");
	}*/
	if(cariapa == "Semua Resto")
	{
		$.post("curltest.php", {
			reqapa : cariapa
		}, function(data) {
			document.getElementById("result1").value = data;
			swal("Success!","", "success");
		});
	}
	else if(cariapa == "Resto By Id")
	{
		var restoid = document.getElementById("restoid").value;
		$.post("curltest.php", {
			reqapa : cariapa,
			restoid : restoid
		}, function(data) {
			document.getElementById("result1").value = data;
			swal("Success!","", "success");
		});
	}
	else if(cariapa == "Resto Rating By Id")
	{
		var restoid = document.getElementById("restoid1").value;
		$.post("curltest.php", {
			reqapa : cariapa,
			restoid : restoid
		}, function(data) {
			document.getElementById("result1").value = data;
			swal("Success!","", "success");
		});
	}
	else if(cariapa == "User By Id")
	{
		var userid = document.getElementById("userid").value;
		$.post("curltest.php", {
			reqapa : cariapa,
			userid : userid
		}, function(data) {
			document.getElementById("result1").value = data;
			swal("Success!","", "success");
		});
	}
	else if(cariapa == "Semua User")
	{
		$.post("curltest.php", {
			reqapa : cariapa
		}, function(data) {
			document.getElementById("result1").value = data;
			swal("Success!","", "success");
		});
	}
	else if(cariapa == "Semua Menu")
	{
		$.post("curltest.php", {
			reqapa : cariapa
		}, function(data) {
			document.getElementById("result1").value = data;
			swal("Success!","", "success");
		});
	}
	else if(cariapa == "findrestaurant")
	{
		var namaresto = document.getElementById("nameresto").value;
		var latituderesto = document.getElementById("latituderesto").value;
		var longituderesto = document.getElementById("longituderesto").value;
		var timenowresto = document.getElementById("timenowresto").value;

		$.post("curltest.php", {
			reqapa : cariapa,
			namaresto : namaresto,
			latituderesto: latituderesto,
			longituderesto : longituderesto,
			timenowresto : timenowresto
		}, function(data) {
			document.getElementById("result1").value = data;
			swal("Success!","", "success");
		});
	}
	else if(cariapa == "findbymenu")
	{
		var menuname = document.getElementById("menuname").value;
		var minprice = document.getElementById("minprice").value;
		var maxprice = document.getElementById("maxprice").value;


		$.post("curltest.php", {
			reqapa : cariapa,
			menuname : menuname,
			minprice: minprice,
			maxprice : maxprice
		}, function(data) {
			document.getElementById("result1").value = data;
			swal("Success!","", "success");
		});
	}
	else if(cariapa == "findnearby")
	{
		var latituderesto = document.getElementById("latituderesto1").value;
		var longituderesto = document.getElementById("longituderesto1").value;

		$.post("curltest.php", {
			reqapa : cariapa,
			latituderesto: latituderesto,
			longituderesto : longituderesto
		}, function(data) {
			document.getElementById("result1").value = data;
			swal("Success!","", "success");
		});
	}
	else if(cariapa == "Register Menu")
	{
		var data = "Remember, All Data Must be Filled \n\nExample Parameters : \n\tNAME:Nasi Bali Udang\n\tPRICE:18000\n\tRECOMMENDED:4\n\tNOTE:Nasi Bali dilengkapi udang gurih\n\tRESTAURANT_NO:6\n";
		data += '\nResponse for success Register : \n\t{"success":true}';
		document.getElementById("result1").value = data;
		swal("Success!","", "success");
	}
	else if(cariapa == "Update Menu")
	{
		var data = "Remember, NOT All Data Must be Filled \n\nExample Parameters : \n\tNAME:Nasi Bali Udang Kering\n\tPRICE:20000\n\tRECOMMENDED:5\n\tNOTE:Nasi Bali dilenkapi Udang Kering dengan saus andalan\n";
		data += '\nResponse for success Update : \n\t{"success":true}';
		document.getElementById("result1").value = data;
		swal("Success!","", "success");
	}
	else if(cariapa == "Delete Menu")
	{
		var data = "Example : ";
		data += 'Response for successs Delete : \n\t{"success":true}';
		document.getElementById("result1").value = data;
		swal("Success!","", "success");
	}
	else if(cariapa == "rate")
	{
		var data = "Remember, All Data Must be Filled \n\nExample Parameters : \n\tUSER_NO:4\n\tRESTAURANT_NO:6\n\tRATE:3\n";
		data += '\nResponse for Success Rating Restaurant : \n\t{"success":true}';
		document.getElementById("result1").value = data;
		swal("Success!","", "success");
	}
	else if(cariapa == "Register User")
	{
		var data = "Remember, All Data Must be Filled \n\nExample Parameters : \n\tNAME:Budi Susanto\n\tADDRESS:Keputran\n\tPHONE:568424\n\tDOB:1996-06-14\n\tEMAIL:budisusanto@gmail.com\n\tGENDER:1\n\tUSERNAME:budisusanto\n\tPASSWORD:budisusanto\n\tSTATUS:1\n";
		data += '\nResponse for Success Register User : \n\t{"success":true}';
		document.getElementById("result1").value = data;
		swal("Success!","", "success");
	}
	else if(cariapa == "Update User")
	{
		var data = "Remember, NOT All Data Must be Filled \n\nExample Parameters : \n\tNAME:Budi Susanto\n\tADDRESS:Keputran\n\tPHONE:568424\n\tDOB:1996-06-14\n\tEMAIL:budisusanto@gmail.com\n\tGENDER:1\n\tUSERNAME:budisusanto\n\tPASSWORD:budisusanto\n\tSTATUS:1\n";
		data += '\nResponse for Success Register User : \n\t{"success":true}';
		document.getElementById("result1").value = data;
		swal("Success!","", "success");
	}
	else if(cariapa == "User Login")
	{
		var data = "Remember, All Data Must be Filled \n\nExample Parameters : \n\tusername:budisusanto\n\tpassword:budisusanto\n";
		data += '\nResponse for Success Login User : \n\t{"success":true}';
		document.getElementById("result1").value = data;
		swal("Success!","", "success");
	}
	else if(cariapa == "Register Restaurant")
	{
		var data = "Remember, NOT All Data Must be Filled \n\nExample Parameters : \n\tTIME_OPEN_MONDAY:09:00:00\n\tTIME_CLOSE_MONDAY:15:00:00\n\t"+
					"TIME_CLOSE_TUESDAY:15:00:00\n\tTIME_OPEN_WEDNESDAY:09:00:00\n\tTIME_CLOSE_WEDNESDAY:15:00:00\n\t"+
					"TIME_OPEN_THURSDAY:09:00:00\n\tTIME_CLOSE_THURSDAY:15:00:00\n\t"+
					"TIME_OPEN_FRIDAY:09:00:00\n\tTIME_CLOSE_FRIDAY:15:00:00\n\t"+
					"TIME_OPEN_SATURDAY:09:00:00\n\tTIME_CLOSE_SATURDAY:15:00:00\n\t"+
					"TIME_OPEN_SUNDAY:09:00:00\n\tTIME_CLOSE_SUNDAY:15:00:00\n\t"+
					"NAME:Kukus\n\tADDRESS:Ngagel 525 Surabaya\n\t"+
					"PHONE:568923\n\tEMAIL:kukus@gmail.com\n\t"+
					"TIME_OPEN:9\n\tLATITUDE:62.5\n\t"+
					"LONGITUDE:144\n\tBIO:Semua Makanan Kukus\n\t"+
					"USERNAME:kukus\n\tPASSWORD:kukus\n\tSTATUS:1\n";

		var data1 = "\nAnother Example Parameters : \n\tTIME_OPEN_MONDAY:09:00:00\n\tTIME_CLOSE_MONDAY:15:00:00\n\t"+
					"NAME:Kukus\n\tADDRESS:Ngagel 525 Surabaya\n\t"+
					"PHONE:568923\n\tEMAIL:kukus@gmail.com\n\t"+
					"LATITUDE:62.5\n\t"+
					"LONGITUDE:144\n\tBIO:Semua Makanan Kukus\n\t"+
					"USERNAME:kukus\n\tPASSWORD:kukus\n\tSTATUS:1\n";
		data += data1;
		data += '\nResponse for Success Register Restaurant : \n\t{"success":true}';
		document.getElementById("result1").value = data;
		swal("Success!","", "success");
	}
	else if(cariapa == "Update Restaurant")
	{
		var data = "Remember, NOT All Data Must be Filled \n\nExample Parameters : \n\tNAME:Bli Putu 1\n\t"+
				"ADDRESS: Ngagel 321\n\tPHONE:521248975\n\t"+
				"EMAIL:bliputu1@gamil.com\n\tLATITUDE:123.45\n\t"+
				"LONGITUDE:89.5\n\tBIO:Bli Putu Pindah\n\t"+
				"USERNAME:bliputu\n\tPASSWORD:bliputu\n\t"+
				"STATUS:1 \n\tTIME_OPEN_MONDAY:10:00:00\n\t"+
				"TIME_CLOSE_MONDAY:16:00:00\n\tTIME_OPEN_TUESDAY:10:00:00\n\t"+
				"TIME_CLOSE_TUESDAY:16:00:00\n\tTIME_OPEN_WEDNESDAY:10:00:00\n\t"+
				"TIME_CLOSE_WEDNESDAY:16:00:00\n\tTIME_OPEN_THURSDAY:10:00:00\n\t"+
				"TIME_CLOSE_THURSDAY:16:00:00\n\tTIME_OPEN_FRIDAY:10:00:00\n\t"+
				"TIME_CLOSE_FRIDAY:16:00:00\n\tTIME_OPEN_SATURDAY:10:00:00\n\t"+
				"TIME_CLOSE_SATURDAY:16:00:00\n\tTIME_OPEN_SUNDAY:10:00:00\n\t"+
				"TIME_CLOSE_SUNDAY:16:00:00\n";

		var data1 = "\nAnother Example Parameters : \n\tNAME:Bli Putu 1\n\t"+
				"ADDRESS: Ngagel 321\n\tPHONE:521248975\n\t"+
				"EMAIL:bliputu1@gamil.com\n\tLATITUDE:123.45\n\t"+
				"LONGITUDE:89.5\n\tBIO:Bli Putu Pindah\n\t"+
				"USERNAME:bliputu\n\tPASSWORD:bliputu\n\t"+
				"STATUS:1 \n\tTIME_OPEN_MONDAY:10:00:00\n\t"+
				"TIME_CLOSE_MONDAY:16:00:00\n\tTIME_OPEN_TUESDAY:10:00:00\n\t";

		data += data1;
		data += '\nResponse for Success Update Restaurant : \n\t{"success":true}';
		document.getElementById("result1").value = data;
		swal("Success!","", "success");
	}
	else if(cariapa == "Restaurant Login")
	{
		var data = "Remember, All Data Must be Filled \n\nExample Parameters : \n\tusername:bliputu\n\tpassword:bliputu\n";
		data += '\nResponse for Success Login Restaurant : \n\t{"success":true}';
		document.getElementById("result1").value = data;
		swal("Success!","", "success");
	}
}
