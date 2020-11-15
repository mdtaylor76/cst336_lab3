<!DOCTYPE html>
<html>
    
    <head>
        <title> Sign Up Page </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" type="text/css" />
    </head>
    
    <body>
        <div class="jumbotron">
        <h1> Sign Up </h1>
        </div>
        <form id="signupForm" action="welcome.html">
<!--
        First Name: <input type="text"  name="fname"><br>
        Last Name:  <input type="text"  name="lname"><br>
        Gender:     <input type="radio"  name="fname" value="m"> Male
                    <input type="radio"  name="fname" value="f"> Female<br>
        Zip Code:   <input type="text" id="zip" name="zip"><br>
        City:       <span id="city"></span><br>
        Latitude:   <span id="latitude"></span><br><br>
        Longitute:  <span id="longitude"></span><br><br>
        State:
        <select id="state" name="state">
            <option> Select One </option>
            <option value="ca"> California </option>
            <option value="ny"> New York   </option>
            <option value="tx"> Texas </option>
        </select><br>
        Desired Username: <input type="text" id="username" name="username">
        <span id="usernameError"></span><br /><br>
        Password:         <input type="text" id="password" name="password"><br>
        Password Again    <input type="text" id="passwordAgain" >
        <span id="passwordAgainError"></span><br /><br>
-->

        <div class="form-row">
            <div class="form-group col-md-5">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
            </div>
            <div class="form-group col-md-5">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
            </div>
        </div>
        
        <div class="form-group">
        
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Gender:</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="genderRadioMale" value="m" checked>
                        <label class="form-check-label" for="genderRadioMale">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="genderRadioFemale" value="m">
                        <label class="form-check-label" for="genderRadioFemale">
                            Female
                        </label>
                    </div>
                </div>
            </div>
        </fieldset>
        
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip">
            </div>
            <div class="form-group col-md-4">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="latitude">Latitude</label>
                <input type="text" class="form-control" id="latitude" readonly>
            </div>
            <div class="form-group col-md-2">
                <label for="longitude">Longitude</label>
                <input type="text" class="form-control" id="longitude" readonly>
            </div>    
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="state">State:</label>
                <select id="state" class="form-control" name="state">
                    <option> Select One </option>
                    <option value="ca"> California </option>
                    <option value="ny"> New York   </option>
                    <option value="tx"> Texas </option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="county">County:</label>
                <select id="county" class="form-control" name="county">
                </select>
            </div>
        </div>
        
        <div class="form-row">
        	<div class="form-group col-md-4">
        		<label for="username">Desired Username</label>
        		<input type="text" class="form-control" id="username" name="username" placeholder="Username">
        	</div>
        	<div class="form-group col-md-3">
        		<label for="password">Password</label>
        		<input type="text" class="form-control" id="password" name="password" placeholder="Password">
        	</div>
        	<div class="form-group col-md-3">
        		<label for="passwordAgain">Repeat Password</label>
        		<input type="text" class="form-control" id="passwordAgain" name="passwordAgain" placeholder="Repeat Password">
        	</div>
        </div>
        
        <div class="form-row" id="validationRow">
        	<div class="form-group col-md-4" id="usernameError">
        	</div>
        	<div class="form-group col-md-3" id="passwordAgainError">
        	</div>
        </div>

        <input id="submit" type="submit" value="Sign up!"><br>
        </form>
        
        <script>
            
            var usernameAvailable = false;
            //Display City from API after typing a zip code
            $("#zip").on("change", async function(){
                
                //alert($("#zip").val());
                let zipCode = $("#zip").val();
                let url =  `https://cst336.herokuapp.com/projects/api/cityInfoAPI.php?zip=${zipCode}`;
                let response = await fetch(url);
                let data = await response.json();
                //console.log(data);
                //$("#city").html(data.city);
                //$("#latitude").html(data.latitude);
                //$("#longitude").html(data.longitude);
                $("#city").val(data.city);
                $("#latitude").val(data.latitude);
                $("#longitude").val(data.longitude);
                
            }); //city
            
            $("#state").on("change", async function(){
                
                //alert($("#state").val());
                let state = $("#state").val();
                let url = `https://cst336.herokuapp.com/projects/api/countyListAPI.php?state=${state}`;
                let response = await fetch(url);
                let data = await response.json()
                //console.log(data);
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
                
                if ($("#password").val().length < 6) {
                    isValid = false;
                    $("#passwordAgainError").html("Password must be at least 6 characters long!");
                    $("#passwordAgainError").css("color","red");                    
                }
                
                return isValid;
            };
            
        </script>
        
    </body>
</html>