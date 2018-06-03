function queryJSON(query){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            // Create the tables
            for(var i = 0 ; i < myObj.length ; i++ ){

                if(myObj[i].nom == query){
                    tr = document.createElement('tr');
                    td = document.createElement('td');
                    tr.appendChild(td);
                    tbody = document.getElementById('index-results');
                    tbody.appendChild(tr);
                    td.innerHTML = myObj[i].nom;
           
                }
                
            }
        }
    };
    xmlhttp.open("GET", "index.php?controller=" + getVariable("controller")  + "&action=search&query=" + query, true);
    xmlhttp.send();
}

function filterSearch(query){
    // Take the query and compare it with each line on the table ifyou find a line tht doesn't match the query then display none

    var x = document.getElementsByClassName("nom");
    
    var pattern = new RegExp("*" + query + "*");    
    console.log(pattern);
    if(x){
        for(var i = 0 ; i < x.length ; i++){

            if(!pattern.test(x[i].innerHTML)){
                x[i].parentElement.style.display = "none";
                console.log(x[i].parentElement);
            }

            if(!pattern.test("Hamza")){
                console.log("failed");
            }else{
                console.log("success");
            }

            console.log(x[i].innerHTML);


        }
    }
    
    
}

function getVariable(param){

    var $_GET = {};
    if(document.location.toString().indexOf('?') !== -1) {
        var query = document.location
                    .toString()
                    // get the query string
                    .replace(/^.*?\?/, '')
                    // and remove any existing hash string (thanks, @vrijdenker)
                    .replace(/#.*$/, '')
                    .split('&');

        for(var i=0, l=query.length; i<l; i++) {
        var aux = decodeURIComponent(query[i]).split('=');
        $_GET[aux[0]] = aux[1];
        }
    }
    //get the 'index' query parameter
   return $_GET[param];
}