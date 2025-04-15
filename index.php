

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALCULATOR</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="calculatorContainer">
    <form action="" method="post">
       
    <?php

$btn=isset($_POST['display'])? $_POST['display']:" ";
$action=isset($_POST['action'])&& $_POST['action']=='true';
// $reasult=eval("$btn ;");

$button=[0,1,2,3,4,5,6,7,8,9,'+','-','*','/','C','='];

foreach($button as $i){
    
    if(isset($_POST [(string)$i])){

    if ($i=='C'){
        $btn=" ";
        $action=false;} 
        else if($i>=0 && $i<=9){
            if ($action){
            $btn ="";
            $action=false;
            $btn .=$i;}
            else{$btn .=$i; 
                }
        }
        else if($i=="+"||$i=="-"||$i=="*"||$i=="/"){
            $btn .=$i;
            $action=false;
        }
        else if($i=='='){
            $btn=eval("return $btn;");
            $action=true;
            
        }
    }}



?>
 <input type="hidden" name="display" value="<?php echo $btn; ?>" >
 <div class="display"> <?php echo $btn  ?> </div>
 <input type="hidden" name="action" value=<?php echo $action && $action ?'true':'false' ?> >

    

<div class=numberBtn>

</br>
<div class="operator">
    <input type="submit" name="+" value="+">
    <input type="submit" name="-" value="-">
    <input type="submit" name="*" value="X">
    <input type="submit" name="/" value="/"></br>
</div>
    <input type="submit" name="1" value="1">
    <input type="submit" name="2" value="2">
    <input type="submit" name="3" value="3">
    <input type="submit" name="4" value="4"></br>
    <input type="submit" name="5" value="5">
    <input type="submit" name="6" value="6">
    <input type="submit" name="7" value="7">
    <input type="submit" name="8" value="8"></br>
    <input type="submit" name="9" value="9">
    <input type="submit" name="0" value="0">
    <input  id="submit" type="submit" name="=" value="=">
    <input id="spaceBtn" type="submit" name="C" value="C">
</div>


    
   
   

    </form>
    </div>
</body>
</html>