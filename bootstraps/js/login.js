function ceklogin()
{
	var username = document.getElementById("username").value;
	var pass = document.getElementById("password").value;

	if(username != "" && pass != "")
	{
		$.post("login.php", {
			username1		: username,
			pass1			: pass
		}, function(data) {
			//alert(data);
			//var temp = data.includes("Data Benar");;
			if(data != "Data Gagal")
			{
				document.getElementById("username").value = "";
				document.getElementById("password").value = "";
				//var temp1 = data.split(",");
				swal("Success!", "Login Success, Here is Your Data : \n"+data, "success");
				//alert("Register Succes. Your API-KEY is : "+temp1[1]);
			}
			else
			{
				swal(
				  "Failed", "Login Failed. Error : "+data, "error"
				);
				//alert("Register Failed. Error : "+data);
			}
		});
	}
	else
	{
		/*
		swal({
		  title: "Data Tidak Lengkap!",
		  text: "Here's a custom image.",
		  imageUrl: "images/thumbs-up.jpg"
		});
		*/
		swal("Failed", "Data isn't Completed", "error");
	}
}
