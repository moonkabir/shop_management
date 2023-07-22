<?php


function imageSavePublicFolder($image)
{
    $filename = time()."-".pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME).'.'.$image->getClientOriginalExtension();
    $image->move(public_path('uploadImages'), $filename);
    return $filename;
}
