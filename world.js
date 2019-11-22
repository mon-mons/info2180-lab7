window.onload= function(){

    var lookupbtn =document.getElementById("lookup");
    var citiesbtn=document.getElementById("lookupcities");
	var httpRequest;
    lookupbtn.onclick=mkrequest;
    citiesbtn.onclick=cities;

	function mkrequest(){
		event.preventDefault()
		httpRequest = new XMLHttpRequest();
		var ser= document.getElementById("country").value;
		var url = "world.php?country="+ser;
		httpRequest.onreadystatechange = something;
		httpRequest.open('GET', url);
		httpRequest.send();        
    }
    
    function cities(){
        event.preventDefault();
        httpRequest = new XMLHttpRequest();
		var ser= document.getElementById("country").value;
		var url = "world.php?country="+ser+ "&context=cities";
		httpRequest.onreadystatechange = something;
		httpRequest.open('GET', url);
		httpRequest.send();   
    

    }
	function something() {
		if (httpRequest.readyState === XMLHttpRequest.DONE) {
		 if (httpRequest.status === 200) {
		 var response = httpRequest.responseText;
		 document.getElementById("result").innerHTML = response;
		 } else {
		 alert('There was a problem with the request.');
		 }
		}
	}
};