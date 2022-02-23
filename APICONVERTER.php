<?php 

function TASAS () { 

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://www.bcv.org.ve/');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$data = curl_exec($ch);
$BUFIN = $data;

if ($BUFIN != false) {
    
//USD
$DATATASA = 'USD';
$POSVALUE = strpos($BUFIN, $DATATASA);
$VALUE = substr($BUFIN, $POSVALUE);
$POS = strpos($VALUE, '><strong>');
$DATA = substr($VALUE, $POS +1);
$TASAUSDR = strstr($DATA, '</strong>', true);

$POSVALUE = strpos($BUFIN, $TASAUSDR);
$VALUE = substr($BUFIN, $POSVALUE);
$POS = strpos($VALUE, '>');
$DATA = substr($VALUE, $POS +1);
$DATA = substr($DATA, 0, 5);
$USD = $DATA;

//EUR
$DATATASA = 'EUR';
$POSVALUE = strpos($BUFIN, $DATATASA);
$VALUE = substr($BUFIN, $POSVALUE);
$POS = strpos($VALUE, '><strong>');
$DATA = substr($VALUE, $POS +1);
$TASAUSDR = strstr($DATA, '</strong>', true);

$POSVALUE = strpos($BUFIN, $TASAUSDR);
$VALUE = substr($BUFIN, $POSVALUE);
$POS = strpos($VALUE, '>');
$DATA = substr($VALUE, $POS +1);
$DATA = substr($DATA, 0, 5);
$EUR = $DATA;

//RUB
$DATATASA = 'RUB';
$POSVALUE = strpos($BUFIN, $DATATASA);
$VALUE = substr($BUFIN, $POSVALUE);
$POS = strpos($VALUE, '><strong>');
$DATA = substr($VALUE, $POS +1);
$TASAUSDR = strstr($DATA, '</strong>', true);

$POSVALUE = strpos($BUFIN, $TASAUSDR);
$VALUE = substr($BUFIN, $POSVALUE);
$POS = strpos($VALUE, '>');
$DATA = substr($VALUE, $POS +1);
$DATA = substr($DATA, 0, 5);
$RUB = $DATA;

//CNY
$DATATASA = 'CNY';
$POSVALUE = strpos($BUFIN, $DATATASA);
$VALUE = substr($BUFIN, $POSVALUE);
$POS = strpos($VALUE, '><strong>');
$DATA = substr($VALUE, $POS +1);
$TASAUSDR = strstr($DATA, '</strong>', true);

$POSVALUE = strpos($BUFIN, $TASAUSDR);
$VALUE = substr($BUFIN, $POSVALUE);
$POS = strpos($VALUE, '>');
$DATA = substr($VALUE, $POS +1);
$DATA = substr($DATA, 0, 5);
$CNY = $DATA;

//TRY
$DATATASA = 'TRY';
$POSVALUE = strpos($BUFIN, $DATATASA);
$VALUE = substr($BUFIN, $POSVALUE);
$POS = strpos($VALUE, '><strong>');
$DATA = substr($VALUE, $POS +1);
$TASAUSDR = strstr($DATA, '</strong>', true);

$POSVALUE = strpos($BUFIN, $TASAUSDR);
$VALUE = substr($BUFIN, $POSVALUE);
$POS = strpos($VALUE, '>');
$DATA = substr($VALUE, $POS +1);
$DATA = substr($DATA, 0, 5);
$TRY = $DATA;

$FECHAP = 'Fecha Valor';
$POSVALUE = strpos($BUFIN, $FECHAP);
$VALUE = substr($BUFIN, $POSVALUE);
$POS = strpos($VALUE, '<');
$DATA = substr($VALUE, $POS +86);
$FECHAR = strstr($DATA, '>', true);
$FECHA =  substr($FECHAR, 0, -16); 

curl_close($ch);

$MONEDAS = array('USD' => $USD, 'EUR' => $EUR, 'RUB' => $RUB, 'CNY' => $CNY, 'TRY' => $TRY, 'FECHA' => $FECHA);

return $MONEDAS;
}
else {
$MONEDAS = array('USD' => 0, 'EUR' => 0, 'RUB' => 0, 'CNY' => 0, 'TRY' => 0, 'FECHA' => null);
return $MONEDAS;
}
}

$tasas = TASAS();
echo json_encode($tasas);
?>