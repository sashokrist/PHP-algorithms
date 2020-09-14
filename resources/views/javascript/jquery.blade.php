<!DOCTYPE html>
<html>
<head>
    <title>Changing Properties with jQuery</title>
</head>
<style>
    div {
        background-color:yellow;
    }
    .changeit {
        background-color:red;
        font-size:50px;
    }
    .changeit2 {
        background-color:green;
        font-size:60px;
    }
</style>
<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
<script>
    jQuery(document).ready(function() {
        $("button").click(function() {
            $("h1").toggleClass("changeit2");
            $("p").after("<h2>This is a new node H2</h2>");
            $("p").toggleClass("changeit");
            $("p").animate({"font-size": "50px"});
        });
    });
</script>
<body>
<div id="container">
    <h1>This is my heading</h1>
    <p id="content">This is some content on my web page</p>
    <button>Test button</button>
</div>
</body>
</html>
