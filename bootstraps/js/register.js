function buatuser()
{
	var nama = document.getElementById("name").value;
	var email = document.getElementById("email").value;
	var telpon = document.getElementById("phone").value;
	var username = document.getElementById("usernamereg").value;
	var pass = document.getElementById("passwordreg").value;

	if(nama != "" && email != "" && telpon != "" && username != "" && pass != "")
	{
		$.post("register.php", {
			nama1			: nama,
			email1			: email,
			telpon1			: telpon,
			username1		: username,
			pass1			: pass
		}, function(data) {
			//alert(data);
			//var temp = data.includes("Data Benar");;
			if(data != "Data Gagal")
			{
				document.getElementById("name").value = "";
				document.getElementById("email").value = "";
				document.getElementById("phone").value = "";
				document.getElementById("usernamereg").value = "";
				document.getElementById("passwordreg").value = "";
				//var temp1 = data.split(",");
				swal("Success!", "Register Done! Please Login to See Your API Key", "success");
				//alert("Register Succes. Your API-KEY is : "+temp1[1]);
			}
			else
			{
				swal(
				  "Failed", "Register Failed. Error : "+data, "error"
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
