<?php
if(!function_exists('formatLengthMenuLabels')){
    function formatLengthMenuLabels(array $pagination): array
    {
        return array_map(function ($value) {
            return $value === -1 ? 'All' : $value;
        }, $pagination);
    }
}
