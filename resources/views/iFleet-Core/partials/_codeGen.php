<?php

//---------Password Reset Token generator-------------------------------------------//
    $length = 30;
    $tk = substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM1234567890"),1,$length);
    
//------------Dummy Password Generator----------------------------------------------//
    $length = 8;
    $rc= substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM1234567890"),1,$length);

//----------System Generated Staff Number------------------------------------------//
    $length = 4;
    $alpha= substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM"),1,$length);
    $ln = 4;
    $beta = substr(str_shuffle("1234567890"),1,$length);

?>