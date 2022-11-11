window.onload=function(){
    var httpRequest;
    var lookup= document.querySelector("#lookup");
    var lookupc= document.querySelector("#lookupc");
    
    lookup.addEventListener('click', function(element){
        element.preventDefault();
        httpRequest = new XMLHttpRequest();
        var countryval=document.querySelector('#country').value;
        var url = "world.php?country="+countryval;
        httpRequest.onreadystatechange=load;
        httpRequest.open('POST',url);
        httpRequest.send('country='+encodeURIComponent(countryval));
    });

    lookupc.addEventListener('click', function(element){
        element.preventDefault();
        httpRequest = new XMLHttpRequest();
        var cityval=document.querySelector('#country').value;
        var url = "world.php?city="+cityval;
        //var url = "world.php?country="+Jamaica&"city="+cities;
        
        httpRequest.onreadystatechange=load;
        httpRequest.open('POST',url);
        httpRequest.send('city='+encodeURIComponent(cityval));
    });



    function load(){
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
            var location = httpRequest.responseText;
            var result = document.querySelector('#result');
            result.innerHTML = location;
            } else {
            alert("Error with the request.");
            }
        }
    }
};


/*
//previous php output method
?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>


*/