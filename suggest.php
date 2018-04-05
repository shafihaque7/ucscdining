<?php


$websiteURL = "http://nutrition.sa.ucsc.edu/menuSamp.asp?locationNum=40&locationName=College+Nine+%26+Ten&sName=&naFlag=";

$diningHall = "9/10 Dining Hall";

include('simple_html_dom.php');

$html = file_get_html($websiteURL);

$typeMeal = "None";

$breakFast = array();
$lunch = array();
$dinner = array();
$lateNight = array();

foreach($html->find('table[height=100%]') as $type) {

    foreach($type->find('.menusampmeals') as $postDiv){
        // echo '<h1>' . $postDiv -> plaintext . '</h1>'.'<br>';

        $typeMeal = $postDiv -> plaintext;
    }
    foreach($type->find('.menusamprecipes') as $item)
    {
        $itemText = trim($item->plaintext);
        if ($typeMeal == "Breakfast"){
            $breakFast[] = $itemText;
        }
        else if ($typeMeal == "Lunch"){
            $lunch[] = $itemText;
        }
        else if ($typeMeal == "Dinner"){
            $dinner[] = $itemText;
        }
        else if ($typeMeal == "Late Night"){
            $lateNight[] = $itemText;

        }
    }
}

$people = array_merge($breakFast, $lunch, $dinner, $lateNight);

$q = $_REQUEST['q'];

$suggestion = "";

// Get Suggestions
if($q !== ""){
	$q = strtolower($q);
	$len = strlen($q);
	foreach($people as $person){
		if(stristr($q, substr($person, 0, $len))){
			if($suggestion === ""){
				$suggestion = $person;
			} else {
				$suggestion .= ", $person";
			}
		}
	}
}

echo $suggestion === "" ? "No Suggestion" : $suggestion;
