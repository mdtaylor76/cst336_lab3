$(document).ready(function(){

    var usernameAvailable = false;
    //Display City from API after typing a zip code
    
    populateStates();
    
    async function populateStates(){
        let url="https://cst336.herokuapp.com/projects/api/state_abbrAPI.php";
        let response = await fetch(url);
        let data = await response.json();
        
        console.log(data[1]);
        
        data.forEach( function(i) {
            
            console.log(`<option value="${i.usps}"> ${i.state} </option>`);
            $("#state").append(`<option value="${i.usps}"> ${i.state} </option>`);
        });
        
    }
    
    $("#zip").on("change", async function(){
        
        //alert($("#zip").val());
        let zipCode = $("#zip").val();
        let url =  `https://cst336.herokuapp.com/projects/api/cityInfoAPI.php?zip=${zipCode}`;
        let response = await fetch(url);
        let data = await response.json();
        
        console.log(data);
        //$("#city").html(data.city);
        //$("#latitude").html(data.latitude);
        //$("#longitude").html(data.longitude);
        if (data) {
            $("#city").val(data.city);
            $("#latitude").val(data.latitude);
            $("#longitude").val(data.longitude);
            $("#zipError").empty();
        }
        else {
            $("#zipError").html("Zip code not found");
            $("#zipError").css("color","red");
        }
        
    }); //city
    
    $("#state").on("change", async function(){
        
        let state = $("#state").val();
        let url = `https://cst336.herokuapp.com/projects/api/countyListAPI.php?state=${state}`;
        let response = await fetch(url);
        let data = await response.json()
        $("#county").html("<option> Select one </option>");
    
        data.forEach( function(i) {
            $("#county").append(`<option> ${i.county} </option>`)
        });
        
    }); //state
    
    $("#username").on("change", async function(){
       let user = $("#username").val();
       let url = `https://cst336.herokuapp.com/projects/api/usernamesAPI.php?username=${user}`;
       let response = await fetch(url);
       let data = await response.json();
       
       console.log("User: " + user + " Available: " + data.available);
       
       if (data.available) {
           $("#usernameError").html("Username available");
           $("#usernameError").css("color","green");
           usernameAvailable = true;
       }
       else {
           $("#usernameError").html("Username unavailable");
           $("#usernameError").css("color","red");
           usernameAvailable = false;
       }
        
    }); //username
    
    $("#signupForm").on("submit", function(e) {
        
        if (!isFormValid()) {
            e.preventDefault();    
        }
    
    });
    
    function isFormValid(){
        isValid = true;
        
        if (!usernameAvailable) {
            isValid = false;
        }
        
        if ($("#username").val().length == 0) {
            isValid = false;
            $("#usernameError").html("Username is required");
            $("#usernameError").css("color","red");
        }
        
        if ($("#password").val() != $("#passwordAgain").val()) {
            isValid = false;
            $("#passwordAgainError").html("Passwords Mismatch!");
            $("#passwordAgainError").css("color","red");
        }
        else if ($("#password").val().length < 6) {
            isValid = false;
            $("#passwordAgainError").html("Password must be at least 6 characters long!");
            $("#passwordAgainError").css("color","red");                    
        }
        else {
            $("#passwordAgainError").empty();
        }
        
        return isValid;
    };
})