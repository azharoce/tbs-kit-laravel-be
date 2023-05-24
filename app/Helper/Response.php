<?php



function layoutJsonResponseValidate($data)
{
    return response()->json(
        $data,
        UNPROCESSABLE_ENTITY
    );
}
