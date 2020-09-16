<!DOCTYPE html>
<html>
<head>
    <title>Changing Properties with jQuery</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<style>
    #test {
        background-color: yellow;
        width:400px;
    }
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
<script>
    function welcome(){
        alert('Welcome');
    }

    function changeit(state) {
        if (state === "in") {
            document.getElementById("test").style.backgroundColor="red";
            document.getElementById("delEl").style.backgroundColor="red";
        } else if (state === "out") {
            document.getElementById("test").style.backgroundColor="yellow";
            document.getElementById("delEl").style.backgroundColor="yellow";
        }
    }

    function gotkey() {
        var count = document.getElementById("text").value.length;
        if (count > 20) {
            var output = "Sorry, that's too many characters";
            document.getElementById("text").disabled="disabled";
        } else {
            var output = "Character count: " + count;
        }
        document.getElementById("status").innerHTML=output;
    }

    function clickme(name) {
        if (name === "help") {
            alert("Do you need some help?");
        } else if (name === "buy") {
            alert("What would you like to buy?");
        } else if (name === "browse") {
            alert("You can browse our catalog");
        }
    }

    $(document).ready(function() {
        $("button").click(function() {
            $("h1").toggleClass("changeit2");
            $("p").after("<h2>This is a new node H2</h2>");
            $("p").toggleClass("changeit");
            $("p").animate({"font-size": "50px"});
        });
    });
</script>
<body onload="welcome()" class="container">
<div id="container">
    <h1>This is my heading</h1>
    <p id="content">This is some content on my web page</p>
    <div id="divId"></div>
    <div id="div">
        <p>remove element</p>
        <button id="delEl" onclick="delEl()" onmouseover="changeit('in')" onmouseout="changeit('out')" class="btn-danger">Delete element</button>
        <button onclick="addEl()" class="btn-info">Add element DIV with H2</button>
        <button class="btn-primary btn-dark">Test button</button>
    </div>
    <div>
        <h1>Store Menu</h1>
        <p>Here are the current options:</p>
        <button onclick="clickme('buy')" class="btn-primary">Buy a product</button>
        <button onclick="clickme('browse')" class="btn-primary">Browse our catalog</button>
        <button onclick="clickme('help')" class="btn-primary">Get Help</button>
    </div>
    <div>
      <h1>This is a test of the mouse events</h1>
        <p id="test" onmouseover="changeit('in')" onmouseout="changeit('out')">
            This is some content that will change color!</p>
    </div>
    <div>
        <h1>Testing for keystrokes</h1>
        <p>Please enter some text into the text area</p>
        <textarea id="text" cols="50" rows="20" onkeyup="gotkey()"></textarea><br>
        <p id="status"></p>
    </div>
    <script>
        function delEl(){
            var element = document.getElementById("delEl");
            element.remove();
        }

        function addEl(){
          var newEl = document.getElementById("div");
          newEl.after("<h2>This is new node div with h2</h2>");

          var appentDiv = document.getElementById('divId');
          appentDiv.append("<h1>this is append el h1</h1>");
          $(appentDiv).toggleClass("changeit");
          $("<h1>insert before</h1>").insertBefore("divId");


        }
    </script>

</div>
</body>
</html>

