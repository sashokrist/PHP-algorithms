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

        return view('algorithms.index', compact('books', 'array', 'studentInfo', 'players', 'bubbleSort', 'arr', 'selectionSort', 'selectionSortDesc'));
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

}
