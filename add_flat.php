<?php
require 'session_required.php';

require 'connection.php';
$id=$_SESSION['id'];
if(isset($_POST['submit']))
{
	$flat_division=$_POST['flat_division'][0];
	$_SESSION['flat_division']=$flat_division;
	$flat_type=$_POST['flat_type'][0];
	$_SESSION['flat_type']=$flat_type;
	header("location:add_flat_final.php");
	
}






?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Flat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
 <link type="text/css" rel="stylesheet" href="css/doctor_profile.css">
 <link type="text/css" rel="stylesheet" href="css/navbar.css">
 <link type="text/css" rel="stylesheet" href="styles/footer.css">
 
</head>

<body>
<?php
$user_type=$_SESSION['user_type'];
if($user_type=="House Owner")
{
 include 'navbar_house_owner.php'; 
 }
 else if($user_type="Customer")
 {
  include 'navbar_logged_in.php'; 
 }
?>

	<div class="container">
		<div class="col-md-offset-4 col-md-4">
			<div class="flat">
			<p class="head"><b> Choose Your flat location & type: </b></p><br>
				<form method="POST">
					  <div class="form-group">
					    <label for="formGroupExampleInput">Select Division</label>
						<select name="flat_division[]" class="form-control" id="slct1" >  
	                        <option value="Dhaka">Dhaka</option>
	                        <option value="Chittagong">Chittagong</option>
	                        <option value="Barisal">Barisal</option>
	                        <option value="Rajshahi">Rajshahi</option>
	                        <option value="Sylhet">Sylhet</option>
	                        <option value="Khulna">Khulna</option>
	                        <option value="Rangpur">Rangpur</option>
                        
                        </select>
					  </div>

					  
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Flat type</label>
					    <select name="flat_type[]" class="form-control">  
	                        <option>For family</option>
	                        <option>Sharing</option>
	                        
                        
                      </select>
					    
					  </div>
					  
					  
					  <div class="form-group">
					    <button type="submit" class="btn btn-success" input type="submit" name="submit"> Submit </button>
					  </div>
				</form>
			</div>
		</div>

	</div>


	
	
</body>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	function initSelectors()
	{
		MAIN.createRelatedSelector();
		MAIN.createRelatedSelector(document.querySelector('#division'));

		MAIN.createRelatedSelector
		( document.querySelector('#division'),
			document.querySelector('#area'),
			{
				Dhaka: ['Gabtoli','Farmgate','Motijheel','Mohammadpur','Dhanmondi','Gulshan','Banani','Uttara','Badda','Mohakhali','Shahbag','Ajimpur','Old Dhaka','Baridhara','Khilgaon','Mipur','Shyamoli','Kallyanpur','Kakoli','Lalmatia'],
				Chittagong: ['Patharghata','Patuakhali','Barguna','Nalchhiti','Bauphal'],
				Barisal: ['Patharghata','Patuakhali','Barguna','Nalchhiti','Bauphal'],
				Rajshahi: ['Patharghata','Patuakhali','Barguna','Nalchhiti','Bauphal'],
				Sylhet: ['Patharghata','Patuakhali','Barguna','Nalchhiti','Bauphal'],
				Khulna: ['Patharghata','Patuakhali','Barguna','Nalchhiti','Bauphal'],
				Rangpur: ['Patharghata','Patuakhali','Barguna','Nalchhiti','Bauphal']





			},
			 function(a,b)
			{
				return a>b ? 1: a<b ? -1 : 0;
			}


		);

		(function(ns))
		{
			function create(from,to,obj,srt)
			{
				if(!from)
				{
					throw CreationError('create: parameter selector [from] missing');
				}

				if(!to)
				{
					throw CreationError('create: parameter selector [to] missing');
				}

				if(!obj)
				{
					throw CreationError('create: parameter selector [obj] missing');
				}
				obj.all = (function(o){
					var a = [];
					for (var l in o)
					{
						a = /array/i.test (o[l].constructor) ? a.concat(o[l]) : a;
					}
					return a.sort(srt);
				}(obj));

				populator.call(from
					,null
					,to
					,obj
					,srt);
				from.onchange = populator;

				function initStatics(fn,obj)
				{
					for (var l in obj)
					{
						if(obj.hasOwnProperty(l))
						{
							fn[l]=obj[l];
						}
					}

					fn.initialized = true;
				}

				function populator (e,relatedto,obj,srt)
				{
					var self = populator;
					if(!self.initialized)
					{
						initStatics(self,{optselects:obj,optselectsall:obj.all,relatedTo:relatedto,sorter:srt || false});
					}
					if(!self.relatedTo)
					{
						throw 'not related to a selector';
					}

					var optsfilter = this.selectedIndex < 1 ? self.optselectsall : self.optselects[this.selectedIndex].firstChild.nodevalue],
					cselect = self.relatedTo,
					opts = cselect.options;

					if (self.sorter) optsfilter.sort(self.sorter);
					opts.length = 0;

					for(var i=0;i<optsfilter.length;i++)
					{
						opts[i] = new Option(optsfilter[i],i);
					}
				}
			}
			function CreationError(msg)
			{
				return {name:'CreationError', message:mssg};
			}
			window[ns] = {
				createRelatedSelector: function(from,to,obj,srt)
				{
					try
					{
						if (arguments.length<1)
						{
							throw CreationError('no parameters');
						}
						create.call(null,from,to,obj,srt);
					}
					catch(e) 
					{
						console.log('createRelatedSelector ->',e.name, '\n' + e.message + '\ncheck parameters');
					}
				}
			}
		};
	}('MAIN'));

initSelectors();
</script>

<script type="text/javascript">
	function populate(s1,s2){
	var s1 = document.getElementById(s1);
	var s2 = document.getElementById(s2);
	s2.innerHTML = "";
	if(s1.value == "Dhaka"){
		var optionArray = ["|","camaro|Camaro","corvette|Corvette","impala|Impala"];
	} else if(s1.value == "Chittagong"){
		var optionArray = ["|","avenger|Avenger","challenger|Challenger","charger|Charger"];
	} else if(s1.value == "Barisal"){
		var optionArray = ["|","mustang|Mustang","shelby|Shelby"];
	}else if(s1.value == "Rajshahi"){
		var optionArray = ["|","mustang|Mustang","shelby|Shelby"];
	}else if(s1.value == "Sylhet"){
		var optionArray = ["|","mustang|Mustang","shelby|Shelby"];
	}else if(s1.value == "Khulna"){
		var optionArray = ["|","mustang|Mustang","shelby|Shelby"];
	}else if(s1.value == "Rangpur"){
		var optionArray = ["|","mustang|Mustang","shelby|Shelby"];
	}
	for(var option in optionArray){
		var pair = optionArray[option].split("|");
		var newOption = document.createElement("option");
		newOption.value = pair[0];
		newOption.innerHTML = pair[1];
		s2.options.add(newOption);
	}
}
</script>

</html>