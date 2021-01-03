<?php

 function responsejson($status =1 , $mas ="تم بنجاح",$data =null){
    $response =[
        'status'=> $status,
        'mas'=> $mas,
        'data'=> $data
    ];
    return response()->json($response);
 }


 