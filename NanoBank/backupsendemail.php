<?php


	  $author= $_REQUEST['author'] ;
	  $title = $_REQUEST['title'] ;
	  $recipient = $_REQUEST['recipient'];
	  $datey = $_REQUEST['datey'];		//date of the year
	  $source = $_REQUEST['source']; 
	  $search = $_REQUEST['search'];

	//lets keep track of 
	$andingStuff = false;

	//lets do the logic for the radio button
	$matchall_status = 'unchecked';
	$matchsome_status = 'unchecked';

	$selected_radio = $_POST['search'];

	if ($selected_radio == 'matchall')
	{
	$matchall_status = 'checked';
	}

	else if ($selected_radio == 'matchsome') 
	{
	$matchsome_status = 'checked';
	}
	else
		{
		print("match none");
		}




	//connect to the database
	$link = mysql_connect("localhost","csep","march28");
	  mysql_select_db("csep", $link);

	//this  is for the match all option
	if($matchall_status == 'checked')
	{	
	//we are going to formulate a query for each, and then merge!
	  //formulate a query
	   $query = "SELECT fileName FROM metadata";
	  if($author != "")
	  {
		 $query .= " WHERE authors like '%";
		 $query .= $author;
		 $query .="%'";
		 $andingStuff = true;
	  }

	  if($title != "")
	  {
		 if($andingStuff == true)
			  $query .=" and ";

		 $query .= " subject like '%";
		 $query .= $title;
		 $query .="%'";
		 $andingStuff = true;
	  }
	  if($recipient != "")
	  {
		 if($andingStuff == true)
			  $query .=" and ";

		 $query .= " recipients like '%";
		 $query .= $recipient;
		 $query .="%'";
		 $andingStuff = true;
	  }
	  if($source != "")
	  {
		  if($andingStuff == true)
			  $query .=" and ";

		 $query .= " source like '%";
		 $query .= $source;
		 $query .="%'";
		 $andingStuff = true;
	  }

	  if($datey != "")
	  {
		  if($andingStuff == true)
			  $query .=" and ";
		 $query .= " YEAR(daySent) = '";
		 $query .= $datey;
		 $query .="'";
		 $andingStuff = true;
	  }

	   $query .= " limit 10; ";
	  $result = mysql_query($query,$link);
	  $rows = mysql_num_rows($result);

	  echo $daysent;

	print("");
	  print("");
		if($rows == 0)
		  print("Very sorry, but your search did not match any results");
	  for($i = 0; $i < $rows; $i++)
	   {
		$rowdata = mysql_fetch_array($result); 
	   $name="http://hum.iit.edu/~csep/NanoEthicsBank/2/";
	   echo $name;
	   echo $shortname;
		$shortname = $rowdata["fileName"];	
		print("");
		print'<pre>';
		print'<a href=';
		print$name;
		print$shortname;
		print'>';
		print$shortname;
		print'</a>';
		$newl = "\n\n";	
		echo $newl;
	   }

	}
	else		//this is when it can match any
	{

	//we are going to formulate a query for each, and then merge!
	  //formulate a query
	   $query = "SELECT fileName FROM metadata";
	  if($author != "")
	  {
		 $query .= " WHERE authors like '%";
		 $query .= $author;
		 $query .="%'";
		 $andingStuff = true;
	  }

	  if($title != "")
	  {
		  if($andingStuff == true)
			  $query .=" or ";
		 $query .= " subject like '%";
		 $query .= $title;
		 $query .="%'";
		 $andingStuff = true;
	  }
	  if($recipient != "")
	  {
		  if($andingStuff == true)
			  $query .=" or ";
		 $query .= " recipients like '%";
		 $query .= $recipient;
		 $query .="%'";
		 $andingStuff = true;
	  }
	  if($source != "")
	  {
		  if($andingStuff == true)
			  $query .=" or ";
		 $query .= " source like '%";
		 $query .= $source;
		 $query .="%'";
		 $andingStuff = true;
	  }

	  if($datey != "")
	  {
		  if($andingStuff == true)
			  $query .=" or ";
		 $query .= " YEAR(daySent) = '";
		 $query .= $datey;
		 $query .="'";
		 $andingStuff = true;
	  }

	   $query .= " limit 10; ";
	  $result = mysql_query($query,$link);
	  $rows = mysql_num_rows($result);

	  echo $daysent;

	print("");
	  print("");
	  if($rows == 0)
		  print("Very sorry, but your search did not match any results");
	  for($i = 0; $i < $rows; $i++)
	   {
			$rowdata = mysql_fetch_array($result);
			$name=$rowdata["fileName"];
			echo $name;
			print("");
			print("");
			if($rows == 0)
				  print("Very sorry, but your search did not match any results");
		  for($i = 0; $i < $rows; $i++)
		   {
			$rowdata = mysql_fetch_array($result);
		   $name="http://hum.iit.edu/~csep/NanoEthicsBank/2/";
		   echo $name;
		   echo $shortname;
				$shortname = $rowdata["fileName"];
			print("");
				print'<pre>';
				print'<a href=';
				print$name;
				print$shortname;
				print'>';
				print$shortname;
				print'</a>';
				$newl = "\n\n";	
			}
	  }
	}
?>