<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SplFixedArray;

class TrainingController extends Controller
{

    public function algorithm()
    {
        $bookList = ['PHP','Oracle','Java','PGSQL', 'dotNet'];
        $orderedBooks = ['MySQL','Java','PGSQL', 'dotNet'];

        $this->findABook($bookList, 'Java');
        $books = $this->placeAllBooks($orderedBooks, $bookList);
       // dd($books);
        $array = [10,20,30,40,50];
        $array[] = 70;
        $array[] = 80;

        $studentInfo = [];
        $studentInfo['Name'] = "Adiyan";
        $studentInfo['Age'] = 11;
        $studentInfo['Class'] = 6;
        $studentInfo['RollNumber'] = 71;
        $studentInfo['Contact'] = "info@adiyan.com";

        $players = [];
        $players[] = ["Name" => "Ronaldo", "Age" => 31, "Country" => "Portugal", "Team" => "Real Madrid"];
        $players[] = ["Name" => "Messi", "Age" => 27, "Country" => "Argentina", "Team" => "Barcelona"];
        $players[] = ["Name" => "Neymar", "Age" => 24, "Country" => "Brazil", "Team" => "Barcelona"];
        $players[] = ["Name" => "Rooney", "Age" => 30, "Country" => "England", "Team" => "Man United"];

        /*$array =[1 => 10, 2 => 100, 3 => 1000, 4 => 10000];
        $splArray = SplFixedArray::fromArray($array, false);

        $items = 5;
        $array = new SplFixedArray($items);
        for ($i = 0; $i < $items; $i++) {
            $array[$i] = $i * 10;
        }

        $newArray = $array->toArray();

        $items = 5;
        $array = new SplFixedArray($items);
        for ($i = 0; $i < $items; $i++) {
            $array[$i] = $i * 10;
        }

        $array->setSize(10);
        $array[7] = 100;
        $array = new SplFixedArray(100);
        for ($i = 0; $i < 100; $i++){
            $array[$i] = new SplFixedArray(100);
        }
           //dd($array);*/
        $arr = [32, 432, 3, 89, 9, 321, 43];
        $bubbleSort = $this->bubbleSort($arr);
        $selectionSort = $this->selectionSort($arr);
        $selectionSortDesc = $this->selectionSortDesc($arr);

        $arr2 = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];

        $orgArray = $arr2;
        $this->insertionSort($arr2);

        return view('algorithms.index', compact('books', 'array', 'studentInfo', 'players', 'bubbleSort', 'arr', 'selectionSort', 'selectionSortDesc', 'arr2', 'orgArray'));
    }

    public function findABook(Array $bookList, String $bookName) {
        $found = FALSE;
        foreach($bookList as $index => $book) {
            if($book === $bookName) {
                $found = $index;
                break;
            }
        }
        return $found;
    }

    function placeAllBooks(Array $orderedBooks, Array &$bookList) {
        foreach ($orderedBooks as $book) {
            $bookFound = $this->findABook($bookList, $book);
            if($bookFound !== FALSE) {
                array_splice($bookList, $bookFound, 1);
            }
        }
        return $bookList;
    }

    function numericArray($array){
        foreach ($array as $i => $iValue) {
            echo "Position ".$i." holds the value ". $iValue ."\n";
        }
    }

    function bubbleSort(array $arr): array {
        $len = count($arr);

        for ($i = 0; $i < $len; $i++) {
            for ($j = 0; $j < $len - 1; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j + 1];
                    $arr[$j + 1] = $arr[$j];
                    $arr[$j] = $tmp;
                }
            }
        }
        return $arr;
    }

    function selectionSort(array $arr): array {
        $len = count($arr);
        foreach ($arr as $i => $iValue) {
            $min = $i;
            for ($j = $i+1; $j < $len; $j++) {
                if ($arr[$j] < $arr[$min]) {
                    $min = $j;
                }
            }

            if ($min !== $i) {
                $tmp = $iValue;
                $arr[$i] = $arr[$min];
                $arr[$min] = $tmp;
            }
        }
        return $arr;
    }

    function selectionSortDesc(array $arr): array {
        $len = count($arr);
        foreach ($arr as $i => $iValue) {
            $max = $i;
            for ($j = $i+1; $j < $len; $j++) {
                if ($arr[$j] > $arr[$max]) {
                    $max = $j;
                }
            }

            if ($max !== $i) {
                $tmp = $iValue;
                $arr[$i] = $arr[$max];
                $arr[$max] = $tmp;
            }
        }
        return $arr;
    }

    function insertionSort(array &$arr) {
        $len = count($arr);
        for ($i = 1; $i < $len; $i++) {
            $key = $arr[$i];
            $j = $i - 1;

            while($j >= 0 && $arr[$j] > $key) {
                $arr[$j+1] = $arr[$j];
                $j--;
            }
            $arr[$j+1] = $key;
        }
    }

    public function searchView()
    {
        $arr = $this->bubbleSort($this->randomGen());

        return view('algorithms.search', compact('arr'));
    }

    public function linearSearch()
    {
        $numbers = range(1, 200, 5);
       // print_r($numbers);
        if ($this->search($numbers, 361)) {
            echo "Found";
        } else {
            echo "Not found";
        }
    }

    function search(array $numbers, int $needle): bool {

        foreach ($numbers as $iValue) {
            if($iValue === $needle){
                return TRUE;
            }
        }
        return FALSE;
    }

    public function randomGen()
    {
        $random_number_array = range(0, 100);
        shuffle($random_number_array );
        $random_number_array = array_slice($random_number_array ,0,10);

        return $random_number_array;
    }

    public function result(Request  $request)
    {
       // dd($request->all());
        $arr = array('arr' => json_decode($request->arr));
        $numberToSearch = $request->number;
        $result = $this->search($arr, $numberToSearch);
       // dd($result);

        if ($result === true) {
            echo "Found";
        } else {
            echo "Not found";
        }
    }

    public function binary()
    {
        $numbers = range(1, 200, 5);

        $number = 31;
        if ($this->binarySearch($numbers, $number) !== FALSE) {
            echo "$number Found \n";
        } else {
            echo "$number Not found \n";
        }

        $number = 500;
        if ($this->binarySearch($numbers, $number) !== FALSE) {
            echo "$number Found \n";
        } else {
            echo "$number Not found \n";
        }
    }

    function binarySearch(array $numbers, int $needle): bool {
        $low = 0;
        $high = count($numbers) - 1;
        while ($low <= $high) {
            $mid = (int) (($low + $high) / 2);

            if ($numbers[$mid] > $needle) {
                $high = $mid - 1;
            } else if ($numbers[$mid] < $needle) {
                $low = $mid + 1;
            } else {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function binarySearchRecResult()
    {
        $numbers = range(1, 200, 5);

        $number = 31;
        if ($this->binarySearchRec($numbers, $number, 0, count($numbers) - 1) !== FALSE) {
            echo "$number Found \n";
        } else {
            echo "$number Not found \n";
        }

        $number = 36;
        if ($this->binarySearchRec($numbers, $number, 0, count($numbers) - 1) !== FALSE) {
            echo "$number Found \n";
        } else {
            echo "$number Not found \n";
        }
    }

    function binarySearchRec(array $numbers, int $needle,
                          int $low, int $high): bool {

        if ($high < $low) {
            return FALSE;
        }

        $mid = (int) (($low + $high) / 2);

        if ($numbers[$mid] > $needle) {
            return $this->binarySearchRec($numbers, $needle, $low, $mid - 1);
        } else if ($numbers[$mid] < $needle) {
            return $this->binarySearchRec($numbers, $needle, $mid + 1, $high);
        } else {
            return TRUE;
        }
    }

    public function observer()
    {
        $subject1 = new \App\RealSubject('subject1');
        $observer1 = new \App\RealObserver('observer1');
        $observer2 = new \App\RealObserver('observer2');
        $observer3 = new \App\RealObserver('observer3');

        $subject1->attach($observer1);
        $subject1->attach($observer2);
        $subject1->attach($observer3);

        $subject1->notify();
    }

    public function cheese()
    {
        $taylor = new \App\Person("Taylor");
        $dayle = new \App\Person("Dayle");
        $jeffery = new \App\Person("Jeffery");
        $machuga = new \App\Hipster("Machuga");
        $campbell = new \App\Person('Graham');

        $taylor->nearBy($dayle, $jeffery, $machuga, $campbell);
        $taylor->cuts('cheedar');
        $taylor->says('oops...');

        $taylor->noLongerNearBy($dayle, $jeffery, $machuga);
        $taylor->cuts('monterey jack');
        $taylor->says('This monterey jack cheese is all mine! muhahaha!');
    }

}
