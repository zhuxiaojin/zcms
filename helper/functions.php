<?php
/**
 * Created by PhpStorm.
 * User: zhuxiaojin
 * Date: 2019/8/15
 * Time: 9:32 AM
 */
/**
 * @param $value
 * @return string
 */
function important($value) {
    return $value . (' <span class="text-danger">*</span>');
}


function thumbnail(\Plank\Mediable\Media $media) {
    return asset('storage/' . $media->directory . '/' . $media->filename . '_thumbnail' . '.' . $media->extension);
}
