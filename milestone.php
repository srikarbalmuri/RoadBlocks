<?php 
session_start();

$prev_value=0;
$_SESSION['dice']= '0' ;
$_SESSION['play']="Welcome";
function throw_dice()
{ $dice=rand(1, 6);
$_SESSION['dice']= $dice ;
return $dice;
     
}
$player_turn=isset($_POST["player_turn"])?$_POST["player_turn"]:1;

    $is_initial_load = true;
	  if ( isset( $_POST[ "user_guess" ] ) ) {
       
	   if ($player_turn==1){
		   $player_turn=2;
		 
	$players  = [
            [ "name" => $_POST[ "player_1_name" ], "score" => throw_dice()+$_SESSION['players'][ 0 ][ "score" ]],
            [ "name" => $_POST[ "player_2_name" ], "score" => $_SESSION['players'][ 1 ][ "score" ]]
        ];		
 if( $players[ 0 ][ "score" ]>100)
 {$players  = [
            [ "name" => $_POST[ "player_1_name" ], "score" => +$_SESSION['players'][ 0 ][ "score" ]],
            [ "name" => $_POST[ "player_2_name" ], "score" => $_SESSION['players'][ 1 ][ "score" ]]
        ];	
 }
 
	 
$_SESSION['players']= $players ;	

	
	   }
	   else{
		   $player_turn=1;
		   
		   $players  = [
            [ "name" => $_POST[ "player_1_name" ], "score" => $_SESSION['players'][ 0 ][ "score" ] ],
            [ "name" => $_POST[ "player_2_name" ], "score" => throw_dice()+$_SESSION['players'][ 1 ][ "score" ]],
        ];	
		if( $players[ 1 ][ "score" ]>100)
 {$players  = [
            [ "name" => $_POST[ "player_1_name" ], "score" => +$_SESSION['players'][ 0 ][ "score" ]],
            [ "name" => $_POST[ "player_2_name" ], "score" => $_SESSION['players'][ 1 ][ "score" ]]
        ];	
 }
		$_SESSION['players']= $players ;
	   }
	   
         
        $is_initial_load = false;
    }
	
	else  if ( isset( $players ) ) 
	{
		
		$players[ $player_turn - 1 ][ "score" ] += $players[ $player_turn - 1 ][ "score" ];
		
	}
		else
     if ( isset( $_GET[ "start" ] ) ) {
        $players           = [
            [ "name" => $_GET[ "player_1_name" ], "score" => 0 ],
            [ "name" => $_GET[ "player_2_name" ], "score" => 0 ],
        ];
        $is_initial_load   = false;
		$_SESSION['players']= $players ;
       //print_r( $_SESSION['players']);
        
    } 
	
	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Road Blocks</title>
        <link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/index.css"/>
</head>
<body> 
<a href="/~sbalmuri1/P">Quit</a>

        <?php if ( ! $is_initial_load ) : ?>
       
            <form id="main_game_form" action="milestone.php" method="post">
            	
                <div id="conatiner">
                <?php
                $rows = 10; // define number of rows
$cols = 10;// define number of columns
$count=100;
echo "<table border='1' align='center'>";

for($tr=1;$tr<=$rows;$tr++){

    echo "<tr >";
        for($td=1;$td<=$cols;$td++){
	          
		   
		   if($count%8==0)
			{
				echo "<td  id='snake'>".$count."</td>";
			 if($count==$_SESSION['players'][ 0 ][ "score" ])
				{
					
				 $players  = [
            [ "name" => $_POST[ "player_1_name" ], "score" => $_SESSION['players'][ 0 ][ "score" ]-5],
            [ "name" => $_POST[ "player_2_name" ], "score" => $_SESSION['players'][ 1 ][ "score" ]]
        ];
		$_SESSION['players']= $players ;
		$_SESSION['dice']= $_SESSION['dice']." ,Thus score reduced by 5";
			} 
			if($count==$_SESSION['players'][ 1 ][ "score" ])
				{
				 $players  = [
            [ "name" => $_POST[ "player_1_name" ], "score" => $_SESSION['players'][ 0 ][ "score" ]],
            [ "name" => $_POST[ "player_2_name" ], "score" => $_SESSION['players'][ 1 ][ "score" ]-5]
        ];
		$_SESSION['players']= $players ;
		$_SESSION['dice']=$_SESSION['dice']." ,Thus score reduced by 5";
			}
			}
			 else
			 {
				
				 if($count==$_SESSION['players'][ 0 ][ "score" ] && $count==$_SESSION['players'][ 1 ][ "score" ] ){


	
               echo "<td width='80px' height='40px' align='center' bgcolor='Green'>".$_SESSION['players'][ 0 ][ "name" ]."\n".$_SESSION['players'][ 1 ][ "name" ] ."</td>";
           }
		   else  if($count==$_SESSION['players'][ 0 ][ "score" ])
		   {
				 if($count==100)
			{ $_SESSION['dice']=$_SESSION['dice']." ,".$_SESSION['players'][ 0 ][ "name" ]."  Won";}
		echo "<td width='80px' height='40px' align='center'  bgcolor='blue'>".$_SESSION['players'][ 0 ][ "name" ]."</td>"; 
		   }
			 else if($count==$_SESSION['players'][ 1 ][ "score" ])
		   { 
	   
				 if($count==100)
			{ $_SESSION['dice']=$_SESSION['dice']." ,".$_SESSION['players'][ 1 ][ "name" ]."  Won";}
			
	   
	   echo "<td width='80px' height='40px' align='center' bgcolor='orange'>".$_SESSION['players'][ 1 ][ "name" ]."</td>";
		   }else
               echo "<td width='80px' height='40px' align='center'>".$count."</td>";
			}
            $count--;
			
        }
    echo "</tr>";
}



echo "</table>";
                ?>
                </div>
                <?php
                 
                    if ( isset( $players ) ) {
                        echo "<input hidden name=\"player_1_name\" type=\"text\" value=\"" . $players[ 0 ][ "name" ] . "\">";
                        echo "<input hidden name=\"player_2_name\" type=\"text\" value=\"" . $players[ 1 ][ "name" ] . "\">";
                        echo "<input hidden name=\"player_1_score\" type=\"text\" value=\"" . $players[ 0 ][ "score" ] . "\">";
                        echo "<input hidden name=\"player_2_score\" type=\"text\" value=\"" . $players[ 1 ][ "score" ] . "\">";
                    }
                    
                    echo "<input hidden name=\"player_turn\" type=\"text\" value=\"$player_turn\">";
                ?>
                
                <div id="player_1_gui">
                    <?php
                        $player_being_configured = 1;
                        include "player_gui.php" ?>
                </div>
                <div>
         
                	<?php if (isset($_POST[ "player_2_name" ]) && $player_turn== 1)
                	$_SESSION['play']=$_POST[ "player_2_name" ];?>
		
					<?php if (isset($_POST[ "player_1_name" ]) && $player_turn== 2)
                	$_SESSION['play']=$_POST[ "player_1_name" ];?>

                    <h1 id="show"><?php if ( isset( $_SESSION['dice'] ) && isset($_SESSION['play']))

                            echo $_SESSION['play']," rolled ".$_SESSION['dice'];
                         ?></h1>
                </div>
                <div id="player_2_gui">
                    <?php
                        $player_being_configured = 2;
                        include "player_gui.php" ?>
                </div>
            </form>
            
        <?php else: ?>
            <div id="start-form-wrapper">
            
                <form id="start-form" action="milestone.php" method="get">
                   
                    <h1 style="color:#F65058FF;">Enter Player Details:</h1>
                    <br>
                    <div id="names">
                        <input type="text" class = "button2" required name="player_1_name" placeholder="Player 1 Name" />
                        <input type="text" class = "button2" required name="player_2_name" placeholder="Player 2 Name" />
                    </div>
                    <br>
                    <br>
                    <input type="submit" class = "button" value="Start" name="start">
                
                </form>
             </div>
   
           
        <?php endif; ?>
    </body>
</html>