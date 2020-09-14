@extends('layouts.app')

@section('content')
    <script>
        function changeit() {
            var answer = prompt("Enter some new text");
            var spot = document.getElementById("here");
            spot.innerHTML = answer;
        }

        function changeit2() {
            var spot = document.getElementById("mylist");
            var item1 = spot.firstChild;
            var item2 = item1.nextSibling;
            var item3 = item2.nextSibling;
            var item4 = item3.firstChild;
            item1.innerHTML = "Cake";
            item2.innerHTML = "Ice Cream";
            item3.innerHTML = "Cookies";
            item4.innerHTML = "Fudge";
        }

        function textBox(){
            var textbox = document.getElementById("test");
            var answer = prompt("Enter text to change");
            textbox.value = answer;
            textbox.innerHTML = answer;
        }

        function checkBox(){
            var pizza = document.getElementById("pizzabox");

            if (pizza.checked) {
                alert("your pizza will be delivered shortly with color").pizza.value;
            }
        }


    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ml-5">
                <div class="card">
                    <div class="card-header">{{ __('JS') }}</div>
                    <h1>Trying to find an element</h1>
                    <button type="button" onclick="changeit()">
                        Click to change
                    </button>
                    <p id="here">This is the original text</p>
                    <h1>Changing elements by walking</h1>
                    <h2>Here's a list of food to buy</h2>
                    <ul id="mylist"><li>Carrots</li><li>Brussel Sprouts</li><li>Eggplant
                        </li><li>Tofu</li></ul>
                    <button type="button" onclick="changeit2()">
                        Change the list
                    </button>
                    <div>
                        <h1 id="test">Textbox value that will be changed</h1>
                        <button type="button" onclick="textBox()">
                            Click to change
                        </button>
                    </div>
                    <div>
                        <h1>checkbox</h1>
                        <input id="pizzabox" type="checkbox" value="blue">
                        <input id="pizzabox" type="checkbox" value="red">
                        <button type="button" onclick="checkBox()">
                            Click to change
                        </button>
                    </div>
                    <div class="card-body" style="margin-left: 100px;">
                        <script>
                            document.write("<h1>This is a test of the DOM</h1>");
                        </script>
                        <h1>This is the heading of the web page</h1>
                        <p>This is sample text</p>
                        <br>
                        <button type="button" onclick="changeme('red')">Change background to
                            red</button>
                        <button type="button" onclick="changeme('white')">Change background to
                            white</button>
                        <button type="button" onclick="changeme('blue')">Change background to
                            blue</button>
                        <button type="button" onclick="changeme('green')">Change background to
                            green</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>

    function changeme(color) {
        document.body.style.backgroundColor = color;
    }
   var test = 10;
   console.log("the  value of variable = " + test);
   document.write("<p>" + "the  value of variable = " + test + "</p>");
   var scores = [100, 110, 105];
   console.log("array: " + scores);
   console.log("the second value of array = " + scores[1]);
   document.write("<p>" + "the second value of array = " + scores[1] + "</p>");
   var games = scores.length;
   scores.sort();
   scores.push(300);
   console.log("add item " + scores[3] + " and sort array: " + scores);
   document.write("<p> add item " + scores[3] + " and sort array: " + scores + "</p>");
   var age = 11;
   var display = (age > 21) ? "Too old":"Young enough";
   console.log(display);
   document.write("<p> Your age are :" + "<strong>" + age +  "</strong>" + " and you are " + display  + "</p>");

   if (age < 18) {
       display = "Sorry, you are not old enough to play";
       status = "failed";
   } else {
       display = "You may begin the game";
       status = "ok";
   }
   document.write(display + " status: " + status);
   var age = prompt("How old are you?");

   switch (true) {
       case (age < 18):
           alert("Sorry, you are too young to play");
           break;
       case (age < 50):
           alert("Welcome to the game!");
           break;
       case (age >= 50):
           alert("Sorry, you are too old to play");
   }



   /*var factorial = 1;
   for (counter = 1; counter <= number; counter++) {
       factorial = factorial * counter;
       document.write("<br>")
       document.write(factorial);
   }*/

   function factorial() {
       var num = prompt("Please enter a number:");
       var factorial = 1;
       for(counter = 1; counter <= num; counter++) {
           fact = fact * counter;
       }
       return document.write(fact);
   }
   factorial();

</script>
@endsection
