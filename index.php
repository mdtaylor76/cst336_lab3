<!DOCTYPE html>
<html>
    
    <head>
        <title> Sign Up Page </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" type="text/css" />
    </head>
    
    <body>
        <div id="top">
        <div class="jumbotron">
        <h1> Sign Up </h1>
        </div>
        </div>
        
        <div id="signUpForm">
        <form id="signupForm" action="welcome.html">

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
        
        <div class="form-row" id="validationRow">
        	<div class="form-group col-md-4" id="zipError">
        	</div>
        </div>
        
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="state">State:</label>
                <select id="state" class="form-control" name="state">
                    <option> Select One </option>
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
        <br>
        </form>
        <br>
        </div>
        
        <footer id="foot">
        <br>Matt Taylor<br>
        CST 336<br>
        November 10, 2020<br><br>
        </footer>

        <script src="js/app.js"></script>

    </body>
</html>