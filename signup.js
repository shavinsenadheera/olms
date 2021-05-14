	//initialize the variable i
	var i = 0;
	//initialize the variable array with want to display item
	var array = ["50 millions up Books","Online Library Service","50+ millions Student Registered","Registered Below!"];
	//create variable ele
	var ele;
	
	//create function called Next
	function Next()
	{
		//Increasing i by one
		i++;
		//Set opacity 0 of array item
		ele.style.opacity=0;
		//check the i=0, 1, 2, 3 > 3
		if(i > (array.length - 1))
		{
			//If it is set i = 0
			i=0;
		}
		//If it is not or if it is goes to Slide within 1s
		setTimeout('Slide()',1000);
	}

//create function called Slide
	function Slide()
	{
		//Get array item one by one into ele variable
		ele.innerHTML = array[i];
		//Set opacity 1 of array item
		ele.style.opacity = 1;
		//Goes to Next function within 1.5s
		setTimeout('Next()',1500);
	}