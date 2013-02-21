<?php

$filas=$columnas=10;
$minas=round($filas*$columnas/3);
//$minas=10;
//global $minas, $arminas, $filas, $columnas;

/**
 * Se comprueba si en una celda dada hay mina
 * @param integer $fi
 * @param integer $co
 * @param integer $si
 * @return boolean
 */
function hayMina($fi, $co, $si)
{
global $minas, $arminas;

	for ($n=1;$n<$si;$n++) {
		if (($arminas[$n][1]==$fi) &&
		    ($arminas[$n][2]==$co)) return TRUE;
	}
	return FALSE;
}

/**
 * Se cuenta el número de minas alrededor de una celda
 * @param integer $fi
 * @param integer $co
 * @return number
 */
function contarMinas($fi, $co)
{
	global $minas, $arminas, $filas, $columnas;
$si=$minas+1;
$cont=0;
	$if=$fi-1; if ($if<0) $if=0; 
	$ic=$co-1; if ($ic<0) $ic=0; 
	$ff=$fi+1; if ($ff>$filas) $ff=$filas; 
	$fc=$co+1; if ($fc>$columnas) $fc=$columnas; 
	for ($f=$if;$f<=$ff;$f++) {
		for ($c=$ic;$c<=$fc;$c++) {
			if (hayMina($f, $c, $si)) $cont++;
		}
	}
	return $cont;
}

$n=1;
while ($n<=$minas) {
	for ($c=1;$c<=2;$c++) {
		$mina[$c]=rand(1, $filas);
	}
	if (!haymina($mina[1], $mina[2], $n)) {
 		$arminas[$n][1]=$mina[1];
		$arminas[$n][2]=$mina[2];
		$n++;
	}
}

$si=$minas+1;
echo "<table border='1'>";
for ($f=1;$f<=$filas;$f++) {
	echo "<tr>";
	for ($c=1;$c<=$columnas;$c++) {
		echo "<td>";
			if (haymina($f, $c, $si)) echo "*";
			else {
				$cm=contarMinas($f, $c);
				echo "$cm";
			};
		echo "</td>";
	}
	echo "</tr>";
}
echo "</table>";

/*
 for ($n=1;$n<=$minas;$n++) {
do {
for ($c=1;$c<=2;$c++) {
$mina[$c]=rand(1, $filas);
}
} while (haymina($mina[1], $mina[2], $n));
$arminas[$n][1]=$mina[1];
$arminas[$n][2]=$mina[2];
};
*/

/*
 for ($n=1;$n<=$minas;$n++) {
for ($c=1;$c<=2;$c++) {
echo "$arminas[$n][$c]  ";
print_r($arminas[$n][$c]);
echo "<br/>";
}
}
*/
