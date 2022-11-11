window.onload=function(){
    var httpRequest;
    var lookup= document.querySelector("#lookup");
    
    lookup.addEventListener('click', function(element){
        element.preventDefault();
        httpRequest = new XMLHttpRequest();
        var countryval=document.querySelector('#country').value;
        var url = "world.php?country="+countryval;
        httpRequest.onreadystatechange=load;
        httpRequest.open('POST',url);
        httpRequest.send('country='+encodeURIComponent(countryval));
    });



    function load(){
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
            var heros = httpRequest.responseText;
            var result = document.querySelector('#result');
            result.innerHTML = heros;
            } else {
            alert("Error with the request.");
            }
        }
    }
};
