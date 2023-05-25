<?php


function layoutJsonResponseValidate($message)
{
    return response()->json(
        [
            "message" => $message,
            "status" => false,
            "data" => [],
        ],
        \BAD_REQUEST
    );
}


function responseSuccess($message, $data)
{
    return response()->json(
        [
            "message" => $message,
            "status" => true,
            "data" => $data,
        ],
        \OK
    );
}
