<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test Client API</title>

    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">
    <link rel='stylesheet' href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/main.css">

</head>
<body>
<header>
    <nav class="navbar navbar-light bg-light ">
        <div class=" container container-fluid">
            <a class="navbar-brand"  href="/" >Questions</a>
            <form class="d-flex justify-content-between">
                <div class="col p-0 m-0" id="search-bar">
                    <div class="input-group input-group-sm m-0 p-1 border d-flex justify-content-between">
                        <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <input type="search" class="form-control me-2 pl-0 w-75 h-100 m-0 align-items-center border-0" id="search-item"
                               placeholder="Search...">
                    </div>
                </div>
                <a type="button" class="btn btn-primary ml-2" href="./view/login.html" >Log in</a>
                <a type="button" class="btn btn-primary ml-2" href="view/register.html" >Sign up</a>

            </form>
        </div>
    </nav>
</header>
