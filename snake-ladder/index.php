<?php
$no_grid = '';
$no_player = 3;

if(isset($_POST['no_grid'])){
    $no_grid = (int) trim($_POST['no_grid']);
    //echo '<pre>',print_r($_POST),'</pre>';
}
?>
<html>
<head>
    <title></title>
<style>
body{background-color:#888888;}
div{border:1px solid #000; width: 80px;}
.dhead{fornt-size:14px; font-style:bold; float:left; width:50px; border:1px solid #000;}
.dbody{fornt-size:12px; color:#010101; float:left;width:50px; border:1px solid #000;}
</style>
</head>
<body>
    <form name="frm_sl" method="POST">
        <input type="text" name="no_grid" value="<?php echo $no_grid;?>" />
        <input type="submit" name="sbt_Start" />
        <input type="text" name="no_player" value="<?php echo $no_player;?>" />
<?php
if($no_grid > 1){
    $n = 0;
    $coordinate = array();
    for($r = 0 ; $r <  $no_grid ; $r++){
        if($r % 2 == 0){
            for($c = 0 ; $c < $no_grid; $c++){
                $n++;
                $coordinate[$n] = "($c , $r )";
            }
        }else{
            for($c = $no_grid-1 ; $c >= 0; $c--){
                $n++;
                $coordinate[$n] = "($c , $r )";
            }
        }
    }
    //echo '<pre>',print_r($coordinate),'</pre>';

    $p1 = $p2 = $p3 = 0;
    $p1_total = $p2_total = $p3_total = 0;
    $win = 0;    
    $d1_str = $d2_str = $d3_str = '';
    $pos1_str = $pos2_str = $pos3_str = '';
    $coo1_str = $coo2_str = $coo3_str = '';

    $end_point = $no_grid * $no_grid;

    while($win == 0){
        $p1 = rand(1, 6);
        if($d1_str != '')
            $d1_str .= ', ';
        $d1_str .= $p1;

        if(($p1_total + $p1) <= $end_point){
            $p1_total += $p1;     

            if($pos1_str != '')
                $pos1_str .= ', ';
            $pos1_str .= $p1_total;
            
            if(isset($coordinate[$p1_total])){
                if($coo1_str != '')
                    $coo1_str .= ', ';
                $coo1_str .= $coordinate[$p1_total];
            }
            
            if($p1_total == $end_point){
                $win = 1;
                break;
            }
        }

        $p2 = rand(1, 6);
        if($d2_str != '')
            $d2_str .= ', ';
        $d2_str .= $p2;

        if(($p2_total + $p2) <= $end_point){
            $p2_total += $p2;   

            if($pos2_str != '')
                $pos2_str .= ', ';
            $pos2_str .= $p2_total;
            
            if(isset($coordinate[$p2_total])){
                if($coo2_str != '')
                    $coo2_str .= ', ';
                $coo2_str .= $coordinate[$p2_total];
            }

            if($p2_total == $end_point){
                $win = 2;
                break;
            }
        }

        $p3 = rand(1, 6);
        if($d3_str != '')
            $d3_str .= ', ';
        $d3_str .= $p3;

        if(($p3_total + $p3) <= $end_point){
            $p3_total += $p3; 

            if($pos3_str != '')
                $pos3_str .= ', ';
            $pos3_str .= $p3_total;   
            
            if(isset($coordinate[$p3_total])){
                if($coo3_str != '')
                    $coo3_str .= ', ';
                $coo3_str .= $coordinate[$p3_total];
            }     

            if($p3_total == $end_point){
                $win = 3;
                break;
            }
        }

        //if($p1_total == $end_point || $p2_total == $end_point || $p3_total == $end_point){

        //}
    }
    
    //echo "1 = $d1_str || $pos1_str || $coo1_str || ".($win == 1? "Winner":"")." <br/><br/>";
    //echo "2 = $d2_str || $pos2_str || $coo2_str || ".($win == 2? "Winner":"")." <br/><br/>";
    //echo "3 = $d3_str || $pos3_str || $coo3_str || ".($win == 3? "Winner":"")." <br/><br/>";
}
?>
<table style="width:500px;" border="1">
    <tr><td>PLAYER NO.</td><td>DICE ROLL HISTORY</td><td>POSITION HISTORY</td><td>COORDINATE HISTORY</td><td>WINNER STATUS</td></tr>
    <tr><td>1</td><td><?php echo $d1_str;?></td><td><?php echo $pos1_str;?></td><td><?php echo $coo1_str;?></td><td><?php if($win==1){ echo "WINNER";}?></td></tr>
    <tr><td>2</td><td><?php echo $d2_str;?></td><td><?php echo $pos2_str;?></td><td><?php echo $coo2_str;?></td><td><?php if($win==2){ echo "WINNER";}?></td></tr>
    <tr><td>3</td><td><?php echo $d3_str;?></td><td><?php echo $pos3_str;?></td><td><?php echo $coo3_str;?></td><td><?php if($win==3){ echo "WINNER";}?></td></tr>

</table>
    </form>
</body>

</html>