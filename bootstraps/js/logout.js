function logout()
{
	$.post("logout.php", {
		
	}, function(data) {
		location.reload();
	});
}
