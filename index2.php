<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <style>
        .body {
            border: 3px solid #fff;
            padding: 20px;
        }

        .float-child {
            width: 50%;
            float: left;
            padding: 20px;
            /*border: 2px solid black;*/
        }

        .contactBody{
            /*border: 3px solid #fff;*/
            padding: 0px;
        }

        .float-child-contact {
            width: 50%;
            float: left;
            padding: 0px;
            /*border: 2px solid black;*/
        }

        .helpHidden{
            display: none;
        }

        .help{
            display: inline;
            background-color: red;
            color: white;
        }

    </style>

    <script>
        function addContact(){
            $("#name").val("");
            $("#email").val("");
            $("#phone").val("");
            $("#name2").val("");
            $("#email2").val("");
            $("#phone2").val("");
        }

        function validate(){
            if (!/^[a-zA-Z ]+$/.test($("#name").val())){
                $("#hn").removeClass("helpHidden");
                $("#hn").addClass("help");
            } else {
                $("#hn").removeClass("help");
                $("#hn").addClass("helpHidden");
            }

            if (!validateEmail($("#email").val())){
                $("#he").removeClass("helpHidden");
                $("#he").addClass("help");
            } else {
                $("#he").removeClass("help");
                $("#he").addClass("helpHidden");
            }

            if (!/^[0-9]+$/.test($("#phone").val())){
                $("#hp").removeClass("helpHidden");
                $("#hp").addClass("help");
            } else {
                $("#hp").removeClass("help");
                $("#hp").addClass("helpHidden");
            }



            if (!/^[a-zA-Z ]+$/.test($("#name2").val())){
                $("#hn2").removeClass("helpHidden");
                $("#hn2").addClass("help");
            } else {
                $("#hn2").removeClass("help");
                $("#hn2").addClass("helpHidden");
            }

            if (!validateEmail($("#email2").val())){
                $("#he2").removeClass("helpHidden");
                $("#he2").addClass("help");
            } else {
                $("#he2").removeClass("help");
                $("#he2").addClass("helpHidden");
            }

            if (!/^[0-9]+$/.test($("#phone2").val())){
                $("#hp2").removeClass("helpHidden");
                $("#hp2").addClass("help");
            } else {
                $("#hp2").removeClass("help");
                $("#hp2").addClass("helpHidden");
            }
        }

        function validateEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-success my-2 my-sm-0" onclick="addContact()" >Add Contact</button>
            <button class="btn btn-outline-success my-2 my-sm-0" onclick="validate()">Validate</button>
            <button class="btn btn-outline-success my-2 my-sm-0" onclick="$('form#form1').submit();">Save</button>
        </div>
    </div>
    </nav>
    <div class="body">
        <div class="float-child">
            <form method="post" action="index2.php" id="form1" name="form1">
                <b>Contact</b>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <span class="helpHidden" id="hn">Only alphabet</span>
                </div>
                <div class="form-group">
                    <label for="email1">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <span class="helpHidden" id="he">eMail Invalid</span>
                </div>
                <div class="form-group">
                    <label for="phone">Telephone</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                    <span class="helpHidden" id="hp">Phone Invalid</span>
                </div>
            </form>
        </div>

        <div class="float-child">
            <form method="post" action="index2.php" id="form2" name="form2">
                <div class="contactBody">
                    <div class="float-child-contact">
                        <b>Contact</b>
                    </div>
                    <div class="float-child-contact">
                        <button type="submit" class="btn btn-primary">Remove</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name2">Name</label>
                    <input type="text" class="form-control" id="name2" name="name2">
                    <span class="helpHidden" id="hn2">Only alphabet</span>
                </div>
                <div class="form-group">
                    <label for="email2">Email address</label>
                    <input type="email" class="form-control" id="email2" name="email2">
                    <span class="helpHidden" id="he2">eMail Invalid</span>
                </div>
                <div class="form-group">
                    <label for="phone2">Telephone</label>
                    <input type="text" class="form-control" id="phone2" name="phone2">
                    <span class="helpHidden" id="hp2">Phone Invalid</span>
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>

<?php

include_once 'model/ContactDAO.php';

$contactDAO = new ContactDAO();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    if(isset($_POST["name"])){
        if (ctype_alpha(str_replace(' ', '', $_POST['name'])) === false) {
            $errors[] = 'Name must contain letters and spaces only';
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email invalid';
        }

        if (!ctype_digit($_POST['phone'])) {
            $errors[] = 'Invalid phone number';
        }

        if(count($errors) > 0){
            foreach($errors as $e){
            echo "<div class='help'>" . $e . "</div><br/>";
            }
        } else {
            $contactDAO->saveContact($_POST['name'], $_POST['email'], $_POST['phone']);
            echo "<div class='help'>Saved!</div><br/>";
        }
    } else if(isset($_POST["name2"])){
        if($contactDAO->checkIfExist($_POST['name2'], $_POST['email2'], $_POST['phone2'])){
            $contactDAO->deleteFile();
            echo "<div class='help'>Record deleted!</div><br/>";
        } else {
            echo "<div class='help'>Record not found!</div><br/>";
        }
    }
}

?>